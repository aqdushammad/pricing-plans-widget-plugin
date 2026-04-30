<?php
/**
 * Admin Page for Pricing Plans Widget
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Handle form submission
if (isset($_POST['submit']) && wp_verify_nonce($_POST['pricing_plans_nonce'], 'pricing_plans_settings')) {
    $options = array(
        'default_slides_desktop' => intval($_POST['default_slides_desktop']),
        'default_slides_tablet' => intval($_POST['default_slides_tablet']),
        'default_slides_mobile' => intval($_POST['default_slides_mobile']),
        'enable_shortcode' => isset($_POST['enable_shortcode']) ? 1 : 0,
        'custom_css' => sanitize_textarea_field($_POST['custom_css']),
    );
    
    update_option('pricing_plans_widget_settings', $options);
    echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__('Settings saved successfully!', 'pricing-plans-widget') . '</p></div>';
}

// Get current settings
$settings = get_option('pricing_plans_widget_settings', array(
    'default_slides_desktop' => 4,
    'default_slides_tablet' => 2,
    'default_slides_mobile' => 1,
    'enable_shortcode' => 1,
    'custom_css' => '',
));
?>

<div class="wrap">
    <h1><?php echo esc_html__('Pricing Plans Widget Settings', 'pricing-plans-widget'); ?></h1>
    
    <div class="pricing-plans-admin-container">
        <div class="pricing-plans-admin-main">
            <form method="post" action="">
                <?php wp_nonce_field('pricing_plans_settings', 'pricing_plans_nonce'); ?>
                
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="default_slides_desktop"><?php esc_html_e('Default Slides (Desktop)', 'pricing-plans-widget'); ?></label>
                        </th>
                        <td>
                            <input type="number" id="default_slides_desktop" name="default_slides_desktop" 
                                   value="<?php echo esc_attr($settings['default_slides_desktop']); ?>" 
                                   min="1" max="8" class="small-text" />
                            <p class="description"><?php esc_html_e('Number of slides to show on desktop screens (1200px+)', 'pricing-plans-widget'); ?></p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="default_slides_tablet"><?php esc_html_e('Default Slides (Tablet)', 'pricing-plans-widget'); ?></label>
                        </th>
                        <td>
                            <input type="number" id="default_slides_tablet" name="default_slides_tablet" 
                                   value="<?php echo esc_attr($settings['default_slides_tablet']); ?>" 
                                   min="1" max="4" class="small-text" />
                            <p class="description"><?php esc_html_e('Number of slides to show on tablet screens (768px - 1199px)', 'pricing-plans-widget'); ?></p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="default_slides_mobile"><?php esc_html_e('Default Slides (Mobile)', 'pricing-plans-widget'); ?></label>
                        </th>
                        <td>
                            <input type="number" id="default_slides_mobile" name="default_slides_mobile" 
                                   value="<?php echo esc_attr($settings['default_slides_mobile']); ?>" 
                                   min="1" max="2" class="small-text" />
                            <p class="description"><?php esc_html_e('Number of slides to show on mobile screens (below 768px)', 'pricing-plans-widget'); ?></p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="enable_shortcode"><?php esc_html_e('Enable Shortcode', 'pricing-plans-widget'); ?></label>
                        </th>
                        <td>
                            <input type="checkbox" id="enable_shortcode" name="enable_shortcode" value="1" 
                                   <?php checked($settings['enable_shortcode'], 1); ?> />
                            <label for="enable_shortcode"><?php esc_html_e('Enable [pricing_plans] shortcode support', 'pricing-plans-widget'); ?></label>
                            <p class="description"><?php esc_html_e('Allow using the widget via shortcode in posts and pages', 'pricing-plans-widget'); ?></p>
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                            <label for="custom_css"><?php esc_html_e('Custom CSS', 'pricing-plans-widget'); ?></label>
                        </th>
                        <td>
                            <textarea id="custom_css" name="custom_css" rows="10" cols="50" class="large-text code"><?php echo esc_textarea($settings['custom_css']); ?></textarea>
                            <p class="description"><?php esc_html_e('Add custom CSS to override default styles', 'pricing-plans-widget'); ?></p>
                        </td>
                    </tr>
                </table>
                
                <?php submit_button(); ?>
            </form>
        </div>
        
        <div class="pricing-plans-admin-sidebar">
            <div class="postbox">
                <h3 class="hndle"><?php esc_html_e('How to Use', 'pricing-plans-widget'); ?></h3>
                <div class="inside">
                    <h4><?php esc_html_e('Elementor Widget', 'pricing-plans-widget'); ?></h4>
                    <p><?php esc_html_e('1. Edit any page with Elementor', 'pricing-plans-widget'); ?></p>
                    <p><?php esc_html_e('2. Search for "Pricing Plans Slider"', 'pricing-plans-widget'); ?></p>
                    <p><?php esc_html_e('3. Drag and drop the widget', 'pricing-plans-widget'); ?></p>
                    <p><?php esc_html_e('4. Configure your pricing plans', 'pricing-plans-widget'); ?></p>
                    
                    <h4><?php esc_html_e('Shortcode', 'pricing-plans-widget'); ?></h4>
                    <p><?php esc_html_e('Use this shortcode in posts or pages:', 'pricing-plans-widget'); ?></p>
                    <code>[pricing_plans]</code>
                    
                    <h4><?php esc_html_e('Shortcode Parameters', 'pricing-plans-widget'); ?></h4>
                    <ul>
                        <li><code>slides_desktop="4"</code></li>
                        <li><code>slides_tablet="2"</code></li>
                        <li><code>slides_mobile="1"</code></li>
                        <li><code>autoplay="true"</code></li>
                        <li><code>navigation="true"</code></li>
                    </ul>
                </div>
            </div>
            
            <div class="postbox">
                <h3 class="hndle"><?php esc_html_e('Icon Support', 'pricing-plans-widget'); ?></h3>
                <div class="inside">
                    <p><?php esc_html_e('You can add service icons using:', 'pricing-plans-widget'); ?></p>
                    <ul>
                        <li><strong><?php esc_html_e('Attachment IDs:', 'pricing-plans-widget'); ?></strong> 123, 456, 789</li>
                        <li><strong><?php esc_html_e('Full URLs:', 'pricing-plans-widget'); ?></strong> https://site.com/icon.png</li>
                        <li><strong><?php esc_html_e('Filenames:', 'pricing-plans-widget'); ?></strong> icon1.png, icon2.png</li>
                    </ul>
                </div>
            </div>
            
            <div class="postbox">
                <h3 class="hndle"><?php esc_html_e('Support', 'pricing-plans-widget'); ?></h3>
                <div class="inside">
                    <p><?php esc_html_e('Plugin Version:', 'pricing-plans-widget'); ?> <strong><?php echo PRICING_PLANS_WIDGET_VERSION; ?></strong></p>
                    <p><?php esc_html_e('For support and documentation, visit our website.', 'pricing-plans-widget'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.pricing-plans-admin-container {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.pricing-plans-admin-main {
    flex: 2;
}

.pricing-plans-admin-sidebar {
    flex: 1;
}

.pricing-plans-admin-sidebar .postbox {
    margin-bottom: 20px;
}

.pricing-plans-admin-sidebar .postbox h3 {
    padding: 12px;
    margin: 0;
    background: #f1f1f1;
    border-bottom: 1px solid #ddd;
}

.pricing-plans-admin-sidebar .postbox .inside {
    padding: 12px;
}

.pricing-plans-admin-sidebar .postbox ul {
    margin-left: 20px;
}

.pricing-plans-admin-sidebar .postbox code {
    background: #f9f9f9;
    padding: 2px 6px;
    border-radius: 3px;
    font-family: monospace;
}
</style>