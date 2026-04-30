# Pricing Plans Widget

A fully responsive WordPress plugin that creates beautiful pricing plan sliders with Elementor integration. Perfect for displaying internet packages, subscription plans, and service offerings.

## Features

- **100% Responsive Design** - Works perfectly on all devices
- **Elementor Integration** - Drag and drop widget with full customization
- **Shortcode Support** - Use `[pricing_plans]` anywhere
- **Progress Bars** - Visual speed indicators for internet plans
- **Service Icons** - Support for custom service icons
- **Promotional Banners** - Highlight special offers
- **Best Seller Badges** - Mark popular plans
- **Smooth Animations** - CSS3 transitions and hover effects
- **Touch/Swipe Support** - Mobile-friendly navigation
- **Auto-play Option** - Automatic sliding with pause on hover
- **Customizable Navigation** - Styleable arrow buttons

## Installation

1. Upload the plugin files to `/wp-content/plugins/pricing-plans-widget/`
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Make sure Elementor is installed and activated
4. Go to Settings → Pricing Plans to configure default options

## Usage

### Elementor Widget

1. Edit any page with Elementor
2. Search for "Pricing Plans Slider" in the widget panel
3. Drag and drop the widget to your page
4. Configure your pricing plans in the widget settings
5. Customize the appearance using the Style tab

### Shortcode

Use the shortcode in any post or page:

```
[pricing_plans]
```

With custom parameters:
```
[pricing_plans slides_desktop="4" slides_tablet="2" slides_mobile="1" autoplay="true" navigation="true"]
```

## Widget Configuration

### Plan Settings

- **Plan Name** - The title of your pricing plan
- **Price** - The cost (numbers only)
- **Currency** - Currency symbol (AED, USD, EUR, etc.)
- **Period** - Billing period (month, year, etc.)
- **Internet Speed** - Display speed (1Gbps, 500 Mbps, etc.)
- **Speed Value** - Numeric value for progress bar
- **TV Channels** - Channel description
- **Commitment** - Contract terms
- **Best Seller** - Toggle to show badge
- **Additional Services** - Comma-separated list
- **Service Icons** - Icon URLs or attachment IDs
- **Promotions** - Special offers
- **Button Text** - Call-to-action text
- **Button Link** - Destination URL

### Slider Settings

- **Desktop Slides** - Number of visible slides on desktop (1-8)
- **Tablet Slides** - Number of visible slides on tablet (1-4)
- **Mobile Slides** - Number of visible slides on mobile (1-2)
- **Navigation** - Show/hide arrow buttons
- **Autoplay** - Enable automatic sliding
- **Autoplay Speed** - Time between slides (milliseconds)

## Service Icons

You can add service icons using three methods:

### 1. Media Library Attachment IDs
Upload icons to your WordPress media library and use the attachment IDs:
```
123, 456, 789
```

### 2. Full URLs
Use complete URLs to your icons:
```
https://yoursite.com/images/prime-video.png, https://yoursite.com/images/netflix.png
```

### 3. Filenames
Upload icons to your uploads folder and use just the filename:
```
prime-video.png, netflix.png, starzplay.png
```

The plugin will automatically search in:
- `/wp-content/uploads/filename.png`
- `/wp-content/uploads/2024/MM/filename.png`
- `/wp-content/uploads/2025/MM/filename.png`
- Theme assets folder
- Plugin assets folder

## Responsive Breakpoints

- **Desktop**: 1200px and above - Shows 4 slides by default
- **Tablet**: 768px to 1199px - Shows 2 slides by default
- **Mobile**: Below 768px - Shows 1 slide by default

## Customization

### Custom CSS

Add custom styles through:
1. WordPress Admin → Settings → Pricing Plans → Custom CSS
2. Theme's style.css file
3. Elementor's custom CSS section

### Key CSS Classes

- `.pricing-plans-slider-wrapper` - Main container
- `.pricing-plan-card` - Individual plan card
- `.bestseller-badge` - Best seller badge
- `.plan-name` - Plan title
- `.speed-bar` - Progress bar
- `.service-icon` - Service icons
- `.promotions` - Promotional section
- `.plan-button` - Call-to-action button
- `.pricing-nav-btn` - Navigation arrows

## Browser Support

- Chrome 60+
- Firefox 55+
- Safari 12+
- Edge 79+
- Internet Explorer 11 (limited support)

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Elementor 3.0.0 or higher
- jQuery (included with WordPress)

## Changelog

### 1.0.0
- Initial release
- Elementor widget integration
- Shortcode support
- Responsive design
- Service icons support
- Progress bars for internet speeds
- Navigation arrows
- Autoplay functionality
- Admin settings page

## Support

For support and documentation, please visit our website or contact our support team.

## License

This plugin is licensed under the GPL v2 or later.

---

**Note**: This plugin requires Elementor to be installed and activated for the widget functionality. The shortcode will work independently.