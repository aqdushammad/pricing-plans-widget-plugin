# Pricing Plans Widget - Installation Guide

## Quick Installation

### Method 1: WordPress Admin (Recommended)

1. **Download the Plugin**
   - Download the `pricing-plans-widget-plugin.php` file and all associated folders
   - Create a ZIP file containing all plugin files

2. **Upload via WordPress Admin**
   - Go to WordPress Admin → Plugins → Add New
   - Click "Upload Plugin"
   - Choose your ZIP file and click "Install Now"
   - Click "Activate Plugin"

### Method 2: FTP Upload

1. **Upload Files**
   - Upload all plugin files to `/wp-content/plugins/pricing-plans-widget/`
   - Ensure the folder structure is maintained

2. **Activate Plugin**
   - Go to WordPress Admin → Plugins
   - Find "Pricing Plans Widget" and click "Activate"

## File Structure

Your plugin folder should look like this:

```
pricing-plans-widget/
├── pricing-plans-widget-plugin.php (main plugin file)
├── README.md
├── INSTALLATION.md
├── assets/
│   ├── css/
│   │   ├── pricing-plans.css
│   │   └── admin.css
│   └── js/
│       ├── pricing-plans.js
│       └── admin.js
├── includes/
│   ├── admin/
│   │   └── admin-page.php
│   └── widgets/
│       └── class-pricing-plans-widget.php
└── templates/
    └── shortcode-template.php
```

## Requirements Check

Before installation, ensure you have:

- ✅ WordPress 5.0 or higher
- ✅ PHP 7.4 or higher  
- ✅ Elementor 3.0.0 or higher (for widget functionality)
- ✅ jQuery (included with WordPress)

## Post-Installation Setup

### 1. Verify Installation

After activation, you should see:
- "Pricing Plans Widget" in your plugins list
- New menu item: Settings → Pricing Plans
- New Elementor widget: "Pricing Plans Slider" (in Pricing Plans category)

### 2. Configure Settings

1. Go to **Settings → Pricing Plans**
2. Configure default settings:
   - Desktop slides: 4 (recommended)
   - Tablet slides: 2 (recommended)
   - Mobile slides: 1 (recommended)
   - Enable shortcode: ✅ (recommended)
3. Click "Save Changes"

### 3. Test the Widget

#### Using Elementor:
1. Edit any page with Elementor
2. Search for "Pricing Plans Slider"
3. Drag the widget to your page
4. Configure your pricing plans
5. Preview and publish

#### Using Shortcode:
1. Add `[pricing_plans]` to any post or page
2. Preview the page
3. The widget should display with default plans

## Troubleshooting

### Plugin Not Appearing

**Problem**: Plugin doesn't show in WordPress admin
**Solution**: 
- Check file permissions (folders: 755, files: 644)
- Ensure main plugin file is named correctly
- Check for PHP syntax errors in error logs

### Elementor Widget Missing

**Problem**: Widget doesn't appear in Elementor
**Solution**:
- Ensure Elementor is installed and activated
- Check Elementor version (minimum 3.0.0 required)
- Clear Elementor cache: Elementor → Tools → Regenerate CSS

### Styles Not Loading

**Problem**: Widget appears but styling is broken
**Solution**:
- Clear all caches (WordPress, Elementor, hosting)
- Check if CSS file is accessible: `yoursite.com/wp-content/plugins/pricing-plans-widget/assets/css/pricing-plans.css`
- Verify file permissions

### JavaScript Not Working

**Problem**: Slider doesn't slide, buttons don't work
**Solution**:
- Check browser console for JavaScript errors
- Ensure jQuery is loaded
- Clear caches
- Check if JS file is accessible

### Icons Not Displaying

**Problem**: Service icons don't show
**Solution**:
- Use full URLs for icons
- Check file permissions on uploaded images
- Verify attachment IDs are correct
- Use browser developer tools to check image URLs

## Advanced Configuration

### Custom CSS

Add custom styles in **Settings → Pricing Plans → Custom CSS**:

```css
/* Example: Change button color */
.plan-button {
    background: #your-color !important;
}

/* Example: Modify card spacing */
.pricing-plan-slide {
    padding: 20px !important;
}
```

### Custom Icons

1. **Upload to Media Library**:
   - Go to Media → Add New
   - Upload your icons (PNG/JPG recommended)
   - Note the attachment ID from the URL

2. **Use in Widget**:
   - Enter attachment IDs: `123, 456, 789`
   - Or use filenames: `icon1.png, icon2.png`
   - Or use full URLs: `https://yoursite.com/icon.png`

### Shortcode Parameters

Customize shortcode behavior:

```
[pricing_plans slides_desktop="3" slides_tablet="2" slides_mobile="1" autoplay="true" navigation="false"]
```

Available parameters:
- `slides_desktop` (1-8)
- `slides_tablet` (1-4) 
- `slides_mobile` (1-2)
- `autoplay` (true/false)
- `navigation` (true/false)

## Performance Optimization

### 1. Image Optimization
- Use optimized images for service icons
- Recommended size: 40x40px or 60x60px
- Use WebP format when possible

### 2. Caching
- Use a caching plugin (WP Rocket, W3 Total Cache)
- Enable browser caching
- Use a CDN for better performance

### 3. CSS/JS Optimization
- Minify CSS and JavaScript files
- Combine files when possible
- Load scripts in footer

## Uninstallation

To completely remove the plugin:

1. **Deactivate Plugin**
   - Go to Plugins → Installed Plugins
   - Click "Deactivate" under Pricing Plans Widget

2. **Delete Plugin**
   - Click "Delete" after deactivation
   - Confirm deletion

3. **Clean Database** (Optional)
   - Plugin options are automatically removed
   - No manual database cleanup needed

## Support

If you encounter issues:

1. **Check Requirements**: Ensure all requirements are met
2. **Clear Caches**: Clear all caches (WordPress, Elementor, hosting)
3. **Check Error Logs**: Look for PHP errors in your hosting control panel
4. **Test Conflicts**: Deactivate other plugins to test for conflicts
5. **Contact Support**: Reach out with specific error messages and site details

## Updates

The plugin will notify you of updates through WordPress admin. Always:
- Backup your site before updating
- Test updates on staging site first
- Clear caches after updating

---

**Need Help?** Contact our support team with your WordPress version, Elementor version, and any error messages you're seeing.