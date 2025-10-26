// Calculator functionality
class ProfitCalculator {
    constructor() {
        this.currency = '₹';
        this.lastSavedState = null;
        this.saveTimeout = null;
        this.initializeElements();
        this.attachEventListeners();
        this.loadHistory();
    }

    initializeElements() {
        this.inputs = {
            productCost: document.getElementById('productCost'),
            shippingCost: document.getElementById('shippingCost'),
            packagingCost: document.getElementById('packagingCost'),
            marketingCost: document.getElementById('marketingCost'),
            platformFees: document.getElementById('platformFees'),
            additionalCosts: document.getElementById('additionalCosts'),
            sellingPrice: document.getElementById('sellingPrice'),
            taxRate: document.getElementById('taxRate'),
            taxToggle: document.getElementById('taxToggle')
        };

        this.outputs = {
            totalExpenses: document.getElementById('totalExpenses'),
            profitPerProduct: document.getElementById('profitPerProduct'),
            profitMargin: document.getElementById('profitMargin'),
            taxValue: document.getElementById('taxValue'),
            taxAmount: document.getElementById('taxAmount'),
            breakEvenUnits: document.getElementById('breakEvenUnits'),
            price20: document.getElementById('price20'),
            price30: document.getElementById('price30'),
            price50: document.getElementById('price50')
        };

        this.currencySelector = document.getElementById('currencySelector');
        this.exportPDFBtn = document.getElementById('exportPDF');
        this.printBtn = document.getElementById('printResults');
        this.resetBtn = document.getElementById('resetForm');
        this.clearHistoryBtn = document.getElementById('clearHistory');
        this.historyList = document.getElementById('historyList');
    }

    attachEventListeners() {
        Object.values(this.inputs).forEach(input => {
            if (input && input.type !== 'checkbox') {
                input.addEventListener('input', () => this.calculate());
            }
        });

        this.inputs.taxToggle.addEventListener('change', () => {
            this.inputs.taxRate.disabled = !this.inputs.taxToggle.checked;
            if (!this.inputs.taxToggle.checked) {
                this.inputs.taxRate.value = '';
            }
            this.calculate();
        });

        this.currencySelector.addEventListener('change', (e) => {
            this.currency = e.target.value;
            this.updateCurrencySymbols();
            this.calculate();
        });

        this.exportPDFBtn.addEventListener('click', () => this.exportPDF());
        this.printBtn.addEventListener('click', () => this.printResults());
        this.resetBtn.addEventListener('click', () => this.resetForm());
        this.clearHistoryBtn.addEventListener('click', () => this.clearHistory());
    }

    getValue(input) {
        return parseFloat(input.value) || 0;
    }

    calculate() {
        const productCost = this.getValue(this.inputs.productCost);
        const shippingCost = this.getValue(this.inputs.shippingCost);
        const packagingCost = this.getValue(this.inputs.packagingCost);
        const marketingCost = this.getValue(this.inputs.marketingCost);
        const platformFeesPercent = this.getValue(this.inputs.platformFees);
        const additionalCosts = this.getValue(this.inputs.additionalCosts);
        const sellingPrice = this.getValue(this.inputs.sellingPrice);
        const taxRate = this.inputs.taxToggle.checked ? this.getValue(this.inputs.taxRate) : 0;

        const platformFeesAmount = (sellingPrice * platformFeesPercent) / 100;
        
        const totalExpenses = productCost + shippingCost + packagingCost + 
                            marketingCost + platformFeesAmount + additionalCosts;

        const taxAmount = (sellingPrice * taxRate) / 100;
        const netSellingPrice = sellingPrice - taxAmount;
        
        const profitPerProduct = netSellingPrice - totalExpenses;
        
        const profitMargin = sellingPrice > 0 ? (profitPerProduct / sellingPrice) * 100 : 0;

        this.outputs.totalExpenses.innerHTML = `<span class="currency-display">${this.currency}</span>${totalExpenses.toFixed(2)}`;
        this.outputs.profitPerProduct.innerHTML = `<span class="currency-display">${this.currency}</span>${profitPerProduct.toFixed(2)}`;
        this.outputs.profitMargin.textContent = profitMargin.toFixed(2) + '%';

        if (this.inputs.taxToggle.checked && taxRate > 0) {
            this.outputs.taxAmount.classList.remove('hidden');
            this.outputs.taxValue.innerHTML = `<span class="currency-display">${this.currency}</span>${taxAmount.toFixed(2)}`;
        } else {
            this.outputs.taxAmount.classList.add('hidden');
        }

        const profitColor = profitPerProduct >= 0 ? 'text-green-400' : 'text-red-400';
        this.outputs.profitPerProduct.className = `text-3xl font-bold ${profitColor}`;

        this.calculateBreakeven(totalExpenses, profitPerProduct);
        this.calculatePricingSuggestions(totalExpenses);

        this.addColorIndicators(profitMargin);

        if (productCost > 0 && sellingPrice > 0) {
            clearTimeout(this.saveTimeout);
            this.saveTimeout = setTimeout(() => {
                this.saveToHistoryAuto(totalExpenses, profitPerProduct, profitMargin);
            }, 1500);
        }
    }

    calculateBreakeven(totalExpenses, profitPerProduct) {
        if (profitPerProduct >= 0) {
            this.outputs.breakEvenUnits.textContent = '1';
        } else {
            this.outputs.breakEvenUnits.textContent = 'Never';
        }
    }

    calculatePricingSuggestions(totalExpenses) {
        const taxRate = this.inputs.taxToggle.checked ? this.getValue(this.inputs.taxRate) : 0;
        
        const calculatePrice = (margin) => {
            const price = totalExpenses / (1 - margin);
            const taxAmount = (price * taxRate) / 100;
            return price + taxAmount;
        };

        const price20 = calculatePrice(0.20);
        const price30 = calculatePrice(0.30);
        const price50 = calculatePrice(0.50);

        this.outputs.price20.innerHTML = `<span class="currency-display">${this.currency}</span>${price20.toFixed(2)}`;
        this.outputs.price30.innerHTML = `<span class="currency-display">${this.currency}</span>${price30.toFixed(2)}`;
        this.outputs.price50.innerHTML = `<span class="currency-display">${this.currency}</span>${price50.toFixed(2)}`;
    }

    addColorIndicators(profitMargin) {
        const marginElement = this.outputs.profitMargin;
        marginElement.className = 'text-4xl font-bold';
        
        if (profitMargin < 0) {
            marginElement.classList.add('text-red-400');
        } else if (profitMargin < 20) {
            marginElement.classList.add('text-yellow-400');
        } else {
            marginElement.classList.add('text-green-400');
        }
    }

    updateCurrencySymbols() {
        document.querySelectorAll('.currency-symbol').forEach((el, index) => {
            el.textContent = this.currency;
        });
        
        document.querySelectorAll('.currency-display').forEach(el => {
            el.textContent = this.currency;
        });
    }

    exportPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        const productCost = this.getValue(this.inputs.productCost);
        const sellingPrice = this.getValue(this.inputs.sellingPrice);
        const totalExpenses = this.outputs.totalExpenses.textContent.replace(/[^\d.-]/g, '');
        const profitPerProduct = this.outputs.profitPerProduct.textContent.replace(/[^\d.-]/g, '');
        const profitMargin = this.outputs.profitMargin.textContent;

        doc.setFontSize(20);
        doc.text('eCommerce Profit Calculation Report', 20, 20);
        
        doc.setFontSize(12);
        doc.text(`Generated: ${new Date().toLocaleString()}`, 20, 35);
        doc.text(`Currency: ${this.currency}`, 20, 45);

        doc.setFontSize(14);
        doc.text('Cost Breakdown:', 20, 60);
        
        doc.setFontSize(11);
        let yPos = 70;
        doc.text(`Product Cost: ${this.currency}${productCost.toFixed(2)}`, 30, yPos);
        doc.text(`Shipping Cost: ${this.currency}${this.getValue(this.inputs.shippingCost).toFixed(2)}`, 30, yPos += 8);
        doc.text(`Packaging Cost: ${this.currency}${this.getValue(this.inputs.packagingCost).toFixed(2)}`, 30, yPos += 8);
        doc.text(`Marketing Cost: ${this.currency}${this.getValue(this.inputs.marketingCost).toFixed(2)}`, 30, yPos += 8);
        doc.text(`Platform Fees: ${this.getValue(this.inputs.platformFees)}%`, 30, yPos += 8);
        doc.text(`Additional Costs: ${this.currency}${this.getValue(this.inputs.additionalCosts).toFixed(2)}`, 30, yPos += 8);

        doc.setFontSize(14);
        doc.text('Results:', 20, yPos += 20);
        
        doc.setFontSize(11);
        doc.text(`Selling Price: ${this.currency}${sellingPrice.toFixed(2)}`, 30, yPos += 10);
        doc.text(`Total Expenses: ${this.currency}${totalExpenses}`, 30, yPos += 8);
        doc.text(`Profit Per Product: ${this.currency}${profitPerProduct}`, 30, yPos += 8);
        doc.text(`Profit Margin: ${profitMargin}`, 30, yPos += 8);

        const breakeven = this.outputs.breakEvenUnits.textContent;
        doc.text(`Breakeven Units: ${breakeven}`, 30, yPos += 8);

        doc.setFontSize(14);
        doc.text('Pricing Suggestions:', 20, yPos += 20);
        
        doc.setFontSize(11);
        doc.text(`20% Profit: ${this.outputs.price20.textContent}`, 30, yPos += 10);
        doc.text(`30% Profit: ${this.outputs.price30.textContent}`, 30, yPos += 8);
        doc.text(`50% Profit: ${this.outputs.price50.textContent}`, 30, yPos += 8);

        doc.save('profit-calculation.pdf');
        
        this.saveToHistory();
    }

    printResults() {
        window.print();
        this.saveToHistory();
    }

    saveToHistory() {
        const calculation = {
            timestamp: new Date().toLocaleString(),
            currency: this.currency,
            sellingPrice: this.getValue(this.inputs.sellingPrice),
            totalExpenses: parseFloat(this.outputs.totalExpenses.textContent.replace(/[^\d.-]/g, '')),
            profit: parseFloat(this.outputs.profitPerProduct.textContent.replace(/[^\d.-]/g, '')),
            margin: this.outputs.profitMargin.textContent
        };

        this.lastSavedState = `${calculation.currency}-${calculation.totalExpenses.toFixed(2)}-${calculation.profit.toFixed(2)}-${calculation.margin}`;

        let history = JSON.parse(localStorage.getItem('profitHistory') || '[]');
        history.unshift(calculation);
        history = history.slice(0, 10);
        localStorage.setItem('profitHistory', JSON.stringify(history));
        
        this.loadHistory();
    }

    saveToHistoryAuto(totalExpenses, profitPerProduct, profitMargin) {
        const currentState = `${this.currency}-${totalExpenses.toFixed(2)}-${profitPerProduct.toFixed(2)}-${profitMargin.toFixed(2)}`;
        
        if (this.lastSavedState === currentState) {
            return;
        }
        
        this.lastSavedState = currentState;
        
        const calculation = {
            timestamp: new Date().toLocaleString(),
            currency: this.currency,
            sellingPrice: this.getValue(this.inputs.sellingPrice),
            totalExpenses: totalExpenses,
            profit: profitPerProduct,
            margin: profitMargin.toFixed(2) + '%'
        };

        let history = JSON.parse(localStorage.getItem('profitHistory') || '[]');
        history.unshift(calculation);
        history = history.slice(0, 10);
        localStorage.setItem('profitHistory', JSON.stringify(history));
        
        this.loadHistory();
    }

    loadHistory() {
        const history = JSON.parse(localStorage.getItem('profitHistory') || '[]');
        
        if (history.length === 0) {
            this.historyList.innerHTML = '<p class="text-sm text-gray-500 dark:text-gray-400 text-center py-4">No calculations yet</p>';
            return;
        }

        this.historyList.innerHTML = history.map((calc, index) => `
            <div class="p-3 bg-gray-50 dark:bg-gray-700 rounded-lg text-sm">
                <div class="flex justify-between items-start mb-1">
                    <span class="text-xs text-gray-500 dark:text-gray-400">${calc.timestamp}</span>
                </div>
                <div class="flex justify-between">
                    <span>Profit: ${calc.currency}${calc.profit.toFixed(2)}</span>
                    <span class="${calc.profit >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'}">${calc.margin}</span>
                </div>
            </div>
        `).join('');
    }

    clearHistory() {
        if (confirm('Are you sure you want to clear all calculation history?')) {
            localStorage.removeItem('profitHistory');
            this.loadHistory();
        }
    }

    resetForm() {
        if (confirm('Are you sure you want to reset all fields?')) {
            Object.values(this.inputs).forEach(input => {
                if (input && input.type !== 'checkbox') {
                    input.value = '';
                }
            });
            this.inputs.taxToggle.checked = false;
            this.inputs.taxRate.disabled = true;
            this.calculate();
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const calculator = new ProfitCalculator();
});
