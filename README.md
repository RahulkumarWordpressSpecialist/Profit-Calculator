# 💰 eCommerce Product Profit Calculator

A modern, responsive, and SEO-friendly web application for calculating product profitability in eCommerce businesses. Built with PHP, Tailwind CSS, and vanilla JavaScript for real-time calculations.

## 🚀 Features

### Core Functionality
- **Comprehensive Cost Breakdown**
  - Product Cost
  - Shipping Cost
  - Packaging Cost
  - Marketing/Ad Spend
  - Platform Fees (percentage-based)
  - Additional Costs

- **Real-Time Profit Calculation**
  - Total Expenses
  - Profit Per Product
  - Profit Margin Percentage
  - Color-coded profit indicators

- **Tax & Fees Calculator**
  - GST/VAT toggle option
  - Real-time tax calculations
  - Tax-inclusive pricing support

- **Breakeven Analysis**
  - Calculate number of sales needed to cover costs
  - Smart pricing suggestions for 20%, 30%, and 50% profit margins
  - Visual pricing recommendations

### User Experience
- **Modern, Responsive Design**
  - Mobile-first approach with Tailwind CSS
  - Beautiful gradient UI with glass-morphism effects
  - Smooth animations and transitions
  - Works on all devices (phone, tablet, desktop)

- **Dark Mode Support**
  - Toggle between light and dark themes
  - Persistent theme preference (localStorage)
  - Respects system color scheme preferences

- **Multi-Currency Support**
  - ₹ INR (Indian Rupee)
  - $ USD (US Dollar)
  - € EUR (Euro)
  - £ GBP (British Pound)

- **Export & Print**
  - Export calculations as PDF
  - Print-friendly results
  - Professional calculation reports

- **Calculation History**
  - Stores last 10 calculations in browser
  - Quick access to previous calculations
  - Clear history option

### SEO Optimization
- **Search Engine Friendly**
  - Semantic HTML5 structure
  - Meta tags for description, keywords, and author
  - Open Graph tags for social media sharing
  - Twitter Card support
  - Structured Data (JSON-LD) for rich snippets
  - Fast loading performance
  - Mobile-optimized

## 🛠️ Technology Stack

- **Backend**: PHP 8.2
- **Frontend**: 
  - HTML5
  - Tailwind CSS (via CDN)
  - Vanilla JavaScript (ES6+)
- **Libraries**:
  - Font Awesome 6.4 (icons)
  - jsPDF (PDF export)
- **Storage**: Browser localStorage for history and preferences

## 📦 Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd profit-calculator
   ```

2. **Ensure PHP is installed**
   ```bash
   php -v
   ```
   Required: PHP 8.0 or higher

3. **Run the development server**
   ```bash
   php -S 0.0.0.0:5000 -t .
   ```

4. **Open in browser**
   ```
   http://localhost:5000
   ```

## 📁 Project Structure

```
profit-calculator/
├── index.php              # Main application file
├── assets/
│   ├── css/              # Custom styles (using Tailwind CDN)
│   ├── js/
│   │   ├── calculator.js  # Calculation logic
│   │   └── darkmode.js    # Dark mode functionality
│   └── images/           # Image assets
├── README.md             # Documentation
└── .gitignore           # Git ignore rules
```

## 🎯 How to Use

### 1. Enter Cost Breakdown
- Input all your product-related expenses
- Product cost (required)
- Shipping, packaging, marketing costs
- Platform fees (as percentage)
- Any additional costs

### 2. Set Selling Price
- Enter your desired selling price
- Optionally enable GST/VAT calculation
- Choose appropriate tax rate

### 3. View Results
- See instant profit calculations
- Total expenses summary
- Profit per product
- Profit margin percentage
- Tax breakdown (if enabled)

### 4. Analyze Breakeven
- View number of sales needed to cover costs
- Get pricing suggestions for target profit margins
- 20%, 30%, and 50% profit recommendations

### 5. Export or Print
- Download results as PDF
- Print calculation report
- Save to calculation history

## 💡 Key Features Explained

### Real-Time Calculations
All calculations happen instantly as you type - no need to click "Calculate" or refresh the page.

### Smart Pricing Suggestions
The calculator automatically suggests optimal pricing for different profit margins:
- **20% Profit**: Conservative pricing for competitive markets
- **30% Profit**: Standard profit margin for most products
- **50% Profit**: Premium pricing strategy

### Breakeven Analysis
Understand exactly how many units you need to sell to:
- Cover all your costs
- Start making profit
- Achieve your revenue goals

### Tax Integration
- Toggle GST/VAT on/off
- Works with any tax rate
- Calculates net profit after tax
- Shows tax amount separately

### Multi-Currency Support
Switch between major currencies:
- Automatically updates all currency symbols
- Maintains calculation accuracy
- Ideal for international sellers

## 🔒 Privacy & Data

- **No server-side storage**: All calculations happen in your browser
- **Local storage only**: History and preferences stored locally
- **No data collection**: Your business data stays private
- **Offline capable**: Works without internet (after initial load)

## 🎨 Customization

### Changing Colors
Edit the Tailwind config in `index.php`:
```javascript
tailwind.config = {
    theme: {
        extend: {
            colors: {
                primary: '#3b82f6',    // Change primary color
                secondary: '#8b5cf6',  // Change secondary color
            }
        }
    }
}
```

### Adding Custom Styles
Add custom CSS in the `<style>` section of `index.php` or create a new CSS file.

### Modifying Calculations
Edit calculation logic in `assets/js/calculator.js`:
- Modify profit formulas
- Add new expense categories
- Change breakeven logic

## 🚀 Deployment

### For Production Use:

1. **Install Tailwind CSS locally** (recommended)
   ```bash
   npm install -D tailwindcss
   npx tailwindcss init
   ```

2. **Configure web server** (Apache/Nginx)
   - Set up virtual host
   - Configure SSL certificate
   - Enable gzip compression

3. **Optimize Performance**
   - Minify JavaScript files
   - Compress CSS
   - Enable browser caching
   - Use production Tailwind build

4. **SEO Enhancements**
   - Add Google Analytics
   - Submit sitemap to search engines
   - Set up Google Search Console
   - Add schema markup for rich snippets

## 🐛 Troubleshooting

### Calculator not updating
- Clear browser cache
- Check browser console for errors
- Ensure JavaScript is enabled

### Dark mode not saving
- Check localStorage is enabled
- Clear browser data and try again

### PDF export not working
- Ensure jsPDF library is loaded
- Check browser console for errors
- Try a different browser

## 📱 Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## 🤝 Contributing

Contributions are welcome! Please:
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## 📄 License

This project is open source and available under the MIT License.

## 👨‍💻 Author

Created for eCommerce entrepreneurs and online sellers to make better pricing decisions.

## 🙏 Acknowledgments

- Tailwind CSS for the amazing utility-first framework
- Font Awesome for beautiful icons
- jsPDF for PDF generation
- The open-source community

## 📞 Support

For issues, questions, or suggestions:
- Open an issue on GitHub
- Contact via email
- Check the documentation

---

**Happy Selling! 💰**

Calculate smarter, price better, profit more!
