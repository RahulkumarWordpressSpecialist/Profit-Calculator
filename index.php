<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title>eCommerce Product Profit Calculator | Free Business Tools</title>
    <meta name="description" content="Free eCommerce Product Profit Calculator. Calculate profit margins, breakeven points, and optimal pricing for your online business. Supports GST/VAT, multi-currency, and dark mode.">
    <meta name="keywords" content="profit calculator, ecommerce calculator, profit margin, breakeven analysis, product pricing, business calculator, GST calculator, VAT calculator">
    <meta name="author" content="eCommerce Tools">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:title" content="eCommerce Product Profit Calculator | Free Business Tools">
    <meta property="og:description" content="Calculate profit margins, breakeven points, and optimal pricing for your online business.">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="eCommerce Product Profit Calculator">
    <meta property="twitter:description" content="Calculate profit margins, breakeven points, and optimal pricing for your online business.">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>💰</text></svg>">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        secondary: '#8b5cf6',
                    }
                }
            }
        }
    </script>
    
    <!-- Custom Styles -->
    <style>
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .dark .glass-effect {
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        input:focus, select:focus {
            outline: none;
            ring: 2px;
            ring-color: #3b82f6;
        }
        
        .currency-symbol {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
        }
        
        .dark .currency-symbol {
            color: #9ca3af;
        }
    </style>
    
    <!-- Structured Data for SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "eCommerce Product Profit Calculator",
        "description": "Free online calculator for eCommerce profit margins and breakeven analysis",
        "applicationCategory": "BusinessApplication",
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "USD"
        }
    }
    </script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800 min-h-screen transition-colors duration-300">
    
    <!-- Header -->
    <header class="container mx-auto px-4 py-6">
        <nav class="flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <span class="text-4xl">💰</span>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-white">
                    Profit Calculator
                </h1>
            </div>
            
            <div class="flex items-center space-x-4">
                <!-- Currency Selector -->
                <select id="currencySelector" class="px-3 py-2 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-primary cursor-pointer">
                    <option value="₹">₹ INR</option>
                    <option value="$">$ USD</option>
                    <option value="€">€ EUR</option>
                    <option value="£">£ GBP</option>
                </select>
                
                <!-- Dark Mode Toggle -->
                <button id="darkModeToggle" class="p-2 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors">
                    <i class="fas fa-moon dark:hidden"></i>
                    <i class="fas fa-sun hidden dark:inline"></i>
                </button>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        
        <!-- Description Section -->
        <section class="mb-8 text-center animate-fade-in">
            <p class="text-lg text-gray-700 dark:text-gray-300 max-w-3xl mx-auto">
                Calculate your product profitability with precision. Analyze costs, margins, breakeven points, and get smart pricing recommendations for your eCommerce business.
            </p>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Left Column - Input Form -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Cost Breakdown Card -->
                <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 animate-fade-in">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                        <i class="fas fa-calculator text-primary mr-3"></i>
                        Cost Breakdown
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="productCost" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Product Cost <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="currency-symbol" id="symbol1">₹</span>
                                <input type="number" id="productCost" step="0.01" min="0" 
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-primary transition-all"
                                    placeholder="0.00">
                            </div>
                        </div>
                        
                        <div>
                            <label for="shippingCost" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Shipping Cost
                            </label>
                            <div class="relative">
                                <span class="currency-symbol" id="symbol2">₹</span>
                                <input type="number" id="shippingCost" step="0.01" min="0" 
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-primary transition-all"
                                    placeholder="0.00">
                            </div>
                        </div>
                        
                        <div>
                            <label for="packagingCost" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Packaging Cost
                            </label>
                            <div class="relative">
                                <span class="currency-symbol" id="symbol3">₹</span>
                                <input type="number" id="packagingCost" step="0.01" min="0" 
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-primary transition-all"
                                    placeholder="0.00">
                            </div>
                        </div>
                        
                        <div>
                            <label for="marketingCost" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Marketing/Ad Spend
                            </label>
                            <div class="relative">
                                <span class="currency-symbol" id="symbol4">₹</span>
                                <input type="number" id="marketingCost" step="0.01" min="0" 
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-primary transition-all"
                                    placeholder="0.00">
                            </div>
                        </div>
                        
                        <div>
                            <label for="platformFees" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Platform Fees (%)
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">%</span>
                                <input type="number" id="platformFees" step="0.1" min="0" max="100" 
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-primary transition-all"
                                    placeholder="0.00">
                            </div>
                        </div>
                        
                        <div>
                            <label for="additionalCosts" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Additional Costs
                            </label>
                            <div class="relative">
                                <span class="currency-symbol" id="symbol5">₹</span>
                                <input type="number" id="additionalCosts" step="0.01" min="0" 
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-primary transition-all"
                                    placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Pricing Card -->
                <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 animate-fade-in">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                        <i class="fas fa-tag text-primary mr-3"></i>
                        Pricing & Tax
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="sellingPrice" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Selling Price <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="currency-symbol" id="symbol6">₹</span>
                                <input type="number" id="sellingPrice" step="0.01" min="0" 
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white focus:ring-2 focus:ring-primary transition-all"
                                    placeholder="0.00">
                            </div>
                        </div>
                        
                        <div>
                            <label for="taxRate" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 flex items-center justify-between">
                                <span>GST/VAT Rate (%)</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="taxToggle" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary rounded-full peer dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                                    <span class="ml-2 text-xs text-gray-600 dark:text-gray-400">Enable</span>
                                </label>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">%</span>
                                <input type="number" id="taxRate" step="0.1" min="0" max="100" disabled
                                    class="w-full pl-8 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-100 dark:bg-gray-600 text-gray-800 dark:text-white focus:ring-2 focus:ring-primary transition-all disabled:opacity-50"
                                    placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Breakeven Analysis Card -->
                <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 animate-fade-in">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 flex items-center">
                        <i class="fas fa-chart-line text-primary mr-3"></i>
                        Breakeven & Pricing Suggestions
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="p-4 bg-blue-50 dark:bg-blue-900/30 rounded-lg">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Sales Needed to Breakeven</p>
                            <p class="text-3xl font-bold text-blue-600 dark:text-blue-400" id="breakEvenUnits">0</p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="p-4 bg-green-50 dark:bg-green-900/30 rounded-lg">
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">20% Profit</p>
                                <p class="text-xl font-bold text-green-600 dark:text-green-400" id="price20">
                                    <span class="currency-display">₹</span>0.00
                                </p>
                            </div>
                            
                            <div class="p-4 bg-yellow-50 dark:bg-yellow-900/30 rounded-lg">
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">30% Profit</p>
                                <p class="text-xl font-bold text-yellow-600 dark:text-yellow-400" id="price30">
                                    <span class="currency-display">₹</span>0.00
                                </p>
                            </div>
                            
                            <div class="p-4 bg-purple-50 dark:bg-purple-900/30 rounded-lg">
                                <p class="text-xs text-gray-600 dark:text-gray-400 mb-1">50% Profit</p>
                                <p class="text-xl font-bold text-purple-600 dark:text-purple-400" id="price50">
                                    <span class="currency-display">₹</span>0.00
                                </p>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Right Column - Results -->
            <div class="lg:col-span-1 space-y-6">
                
                <!-- Profit Summary Card -->
                <article class="bg-gradient-to-br from-primary to-secondary rounded-2xl shadow-xl p-6 text-white animate-fade-in">
                    <h2 class="text-2xl font-bold mb-6 flex items-center">
                        <i class="fas fa-chart-pie mr-3"></i>
                        Profit Summary
                    </h2>
                    
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm opacity-90 mb-1">Total Expenses</p>
                            <p class="text-2xl font-bold" id="totalExpenses">
                                <span class="currency-display">₹</span>0.00
                            </p>
                        </div>
                        
                        <div class="border-t border-white/30 pt-4">
                            <p class="text-sm opacity-90 mb-1">Profit Per Product</p>
                            <p class="text-3xl font-bold" id="profitPerProduct">
                                <span class="currency-display">₹</span>0.00
                            </p>
                        </div>
                        
                        <div class="border-t border-white/30 pt-4">
                            <p class="text-sm opacity-90 mb-1">Profit Margin</p>
                            <p class="text-4xl font-bold" id="profitMargin">0%</p>
                        </div>
                        
                        <div id="taxAmount" class="border-t border-white/30 pt-4 hidden">
                            <p class="text-sm opacity-90 mb-1">Tax Amount (GST/VAT)</p>
                            <p class="text-xl font-bold" id="taxValue">
                                <span class="currency-display">₹</span>0.00
                            </p>
                        </div>
                    </div>
                </article>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    <button id="exportPDF" class="w-full py-3 px-6 bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded-lg shadow-lg hover:shadow-xl transition-all flex items-center justify-center space-x-2 border border-gray-200 dark:border-gray-700">
                        <i class="fas fa-file-pdf text-red-500"></i>
                        <span>Export as PDF</span>
                    </button>
                    
                    <button id="printResults" class="w-full py-3 px-6 bg-white dark:bg-gray-800 text-gray-800 dark:text-white rounded-lg shadow-lg hover:shadow-xl transition-all flex items-center justify-center space-x-2 border border-gray-200 dark:border-gray-700">
                        <i class="fas fa-print text-blue-500"></i>
                        <span>Print Results</span>
                    </button>
                    
                    <button id="resetForm" class="w-full py-3 px-6 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-all flex items-center justify-center space-x-2">
                        <i class="fas fa-redo"></i>
                        <span>Reset Calculator</span>
                    </button>
                </div>

                <!-- Calculation History -->
                <article class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-6 animate-fade-in">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-4 flex items-center justify-between">
                        <span><i class="fas fa-history text-primary mr-2"></i>History</span>
                        <button id="clearHistory" class="text-xs text-red-500 hover:text-red-600">Clear</button>
                    </h3>
                    <div id="historyList" class="space-y-2 max-h-64 overflow-y-auto">
                        <p class="text-sm text-gray-500 dark:text-gray-400 text-center py-4">No calculations yet</p>
                    </div>
                </article>
            </div>
        </div>

        <!-- SEO Content Section -->
        <section class="mt-12 bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">How to Use the eCommerce Profit Calculator</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 dark:text-gray-300">
                <div>
                    <h3 class="text-xl font-semibold mb-3 text-primary">📊 Calculate Your Costs</h3>
                    <p class="mb-4">Enter all your product-related expenses including product cost, shipping, packaging, marketing spend, platform fees, and any additional costs. Our calculator will automatically sum up all expenses.</p>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-3 text-primary">💰 Set Your Selling Price</h3>
                    <p class="mb-4">Input your desired selling price and optionally enable tax calculation (GST/VAT) to see how taxes affect your profit margins in real-time.</p>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-3 text-primary">📈 Analyze Profitability</h3>
                    <p class="mb-4">View instant profit calculations showing total expenses, profit per product, and profit margin percentage. Make data-driven decisions for your business.</p>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-3 text-primary">🎯 Get Pricing Insights</h3>
                    <p class="mb-4">Discover your breakeven point and get smart pricing suggestions for 20%, 30%, and 50% profit margins to optimize your pricing strategy.</p>
                </div>
            </div>

            <div class="mt-8 p-6 bg-blue-50 dark:bg-blue-900/30 rounded-xl">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Why Use Our Profit Calculator?</h3>
                <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                        <span><strong>Real-time Calculations:</strong> Instant results as you type, no page refresh needed</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                        <span><strong>Multi-Currency Support:</strong> Calculate profits in ₹ INR, $ USD, € EUR, or £ GBP</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                        <span><strong>Tax Integration:</strong> Built-in GST/VAT calculator for accurate profit projections</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                        <span><strong>Export & Print:</strong> Save your calculations as PDF or print for records</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                        <span><strong>Dark Mode:</strong> Easy on the eyes with automatic dark mode support</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                        <span><strong>Mobile Friendly:</strong> Works perfectly on all devices - phone, tablet, or desktop</span>
                    </li>
                </ul>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="container mx-auto px-4 py-8 mt-12 text-center text-gray-600 dark:text-gray-400">
        <p>&copy; <?php echo date('Y'); ?> eCommerce Profit Calculator. All rights reserved.</p>
        <p class="mt-2 text-sm">Free tool for eCommerce entrepreneurs and online sellers</p>
    </footer>

    <!-- JavaScript Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="assets/js/darkmode.js"></script>
    <script src="assets/js/calculator.js"></script>
</body>
</html>
