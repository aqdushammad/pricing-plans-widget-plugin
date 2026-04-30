<?php
/**
 * Plugin Name: Pricing Plans Widget
 * Plugin URI: https://www.facebook.com/aqdushammad
 * Description: A fully responsive pricing plans slider widget for WordPress with Elementor support. Display beautiful pricing cards with internet speeds, TV channels, and promotional offers.
 * Version: 2.1
 * Author: Aqdus Hammad
 * Author URI: https://www.facebook.com/aqdushammad
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: pricing-plans-widget
 * Domain Path: /languages
 * Requires at least: 5.0
 * Tested up to: 6.4
 * Requires PHP: 7.4
 * Elementor tested up to: 3.18
 * Elementor Pro tested up to: 3.18
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('PRICING_PLANS_WIDGET_VERSION', '2.1');
define('PRICING_PLANS_WIDGET_FILE', __FILE__);
define('PRICING_PLANS_WIDGET_PATH', plugin_dir_path(__FILE__));
define('PRICING_PLANS_WIDGET_URL', plugin_dir_url(__FILE__));
define('PRICING_PLANS_WIDGET_BASENAME', plugin_basename(__FILE__));

if (!defined('PRICING_PLANS_WIDGET_GITHUB_REPO')) {
    define('PRICING_PLANS_WIDGET_GITHUB_REPO', '');
}

if (!defined('PRICING_PLANS_WIDGET_GITHUB_TOKEN')) {
    define('PRICING_PLANS_WIDGET_GITHUB_TOKEN', '');
}

if (is_admin() && PRICING_PLANS_WIDGET_GITHUB_REPO !== '') {
    $puc_bootstrap = PRICING_PLANS_WIDGET_PATH . 'plugin-update-checker-master/plugin-update-checker.php';
    if (file_exists($puc_bootstrap)) {
        require_once $puc_bootstrap;

        $pricing_plans_widget_update_checker = \YahnisElsts\PluginUpdateChecker\v5p6\PucFactory::buildUpdateChecker(
            PRICING_PLANS_WIDGET_GITHUB_REPO,
            PRICING_PLANS_WIDGET_FILE,
            'pricing-plans-widget'
        );
        $pricing_plans_widget_update_checker->setBranch('main');
        $pricing_plans_widget_update_checker->getVcsApi()->enableReleaseAssets('/\.zip($|[?&#])/i');

        if (PRICING_PLANS_WIDGET_GITHUB_TOKEN !== '') {
            $pricing_plans_widget_update_checker->setAuthentication(PRICING_PLANS_WIDGET_GITHUB_TOKEN);
        }
    }
}

/**
 * Main Plugin Class
 */
class PricingPlansWidget {
    
    /**
     * Instance of this class
     */
    private static $instance = null;
    
    /**
     * Get instance
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     */
    private function __construct() {
        add_action('init', array($this, 'init'));
        add_action('plugins_loaded', array($this, 'load_textdomain'));
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
    }
    
    /**
     * Initialize plugin
     */
    public function init() {
        // Check if Elementor is active
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', array($this, 'admin_notice_missing_elementor'));
            return;
        }
        
        // Check Elementor version
        if (!version_compare(ELEMENTOR_VERSION, '3.0.0', '>=')) {
            add_action('admin_notices', array($this, 'admin_notice_minimum_elementor_version'));
            return;
        }
        
        // Check PHP version
        if (version_compare(PHP_VERSION, '7.4', '<')) {
            add_action('admin_notices', array($this, 'admin_notice_minimum_php_version'));
            return;
        }
        
        // Initialize Elementor widgets
        add_action('elementor/widgets/register', array($this, 'register_widgets'));
        add_action('elementor/frontend/after_enqueue_styles', array($this, 'enqueue_styles'));
        add_action('elementor/frontend/after_register_scripts', array($this, 'enqueue_scripts'));
        
        // Add widget categories
        add_action('elementor/elements/categories_registered', array($this, 'add_widget_categories'));
        
        // Add shortcode support
        add_shortcode('pricing_plans', array($this, 'pricing_plans_shortcode'));
        
        // Add admin menu
        add_action('admin_menu', array($this, 'add_admin_menu'));
        
        // Enqueue admin styles
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
    }
    
    /**
     * Load text domain
     */
    public function load_textdomain() {
        load_plugin_textdomain('pricing-plans-widget', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }
    
    /**
     * Plugin activation
     */
    public function activate() {
        // Create default options
        $default_options = array(
            'version' => PRICING_PLANS_WIDGET_VERSION,
            'installed_date' => current_time('mysql'),
        );
        add_option('pricing_plans_widget_options', $default_options);
        
        // Flush rewrite rules
        flush_rewrite_rules();
    }
    
    /**
     * Plugin deactivation
     */
    public function deactivate() {
        // Flush rewrite rules
        flush_rewrite_rules();
    }
    
    /**
     * Admin notice - Missing Elementor
     */
    public function admin_notice_missing_elementor() {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
        
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'pricing-plans-widget'),
            '<strong>' . esc_html__('Pricing Plans Widget', 'pricing-plans-widget') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'pricing-plans-widget') . '</strong>'
        );
        
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
    
    /**
     * Admin notice - Minimum Elementor version
     */
    public function admin_notice_minimum_elementor_version() {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
        
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'pricing-plans-widget'),
            '<strong>' . esc_html__('Pricing Plans Widget', 'pricing-plans-widget') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'pricing-plans-widget') . '</strong>',
            '3.0.0'
        );
        
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
    
    /**
     * Admin notice - Minimum PHP version
     */
    public function admin_notice_minimum_php_version() {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
        
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'pricing-plans-widget'),
            '<strong>' . esc_html__('Pricing Plans Widget', 'pricing-plans-widget') . '</strong>',
            '<strong>' . esc_html__('PHP', 'pricing-plans-widget') . '</strong>',
            '7.4'
        );
        
        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
    
    /**
     * Register widgets
     */
    public function register_widgets($widgets_manager) {
        require_once PRICING_PLANS_WIDGET_PATH . 'includes/widgets/class-pricing-plans-widget.php';
        $widgets_manager->register(new \PricingPlansWidget\Widgets\PricingPlansWidget());
    }
    
    /**
     * Enqueue styles
     */
    public function enqueue_styles() {
        wp_enqueue_style(
            'pricing-plans-widget-style',
            PRICING_PLANS_WIDGET_URL . 'assets/css/pricing-plans.css',
            array(),
            PRICING_PLANS_WIDGET_VERSION
        );
    }
    
    /**
     * Enqueue scripts
     */
    public function enqueue_scripts() {
        wp_enqueue_script(
            'pricing-plans-widget-script',
            PRICING_PLANS_WIDGET_URL . 'assets/js/pricing-plans.js',
            array('jquery'),
            PRICING_PLANS_WIDGET_VERSION,
            true
        );
    }
    
    /**
     * Add widget categories
     */
    public function add_widget_categories($elements_manager) {
        $elements_manager->add_category(
            'pricing-plans-category',
            array(
                'title' => esc_html__('Pricing Plans', 'pricing-plans-widget'),
                'icon' => 'fa fa-plug',
            )
        );
    }
    
    /**
     * Pricing plans shortcode
     */
    public function pricing_plans_shortcode($atts) {
        $atts = shortcode_atts(array(
            'slides_desktop' => 4,
            'slides_tablet' => 2,
            'slides_mobile' => 1,
            'autoplay' => 'false',
            'navigation' => 'true',
        ), $atts, 'pricing_plans');
        
        // Enqueue styles and scripts
        $this->enqueue_styles();
        $this->enqueue_scripts();
        
        ob_start();
        include PRICING_PLANS_WIDGET_PATH . 'templates/shortcode-template.php';
        return ob_get_clean();
    }
    
    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        add_options_page(
            esc_html__('Pricing Plans Widget', 'pricing-plans-widget'),
            esc_html__('Pricing Plans', 'pricing-plans-widget'),
            'manage_options',
            'pricing-plans-widget',
            array($this, 'admin_page')
        );
    }
    
    /**
     * Admin page
     */
    public function admin_page() {
        include PRICING_PLANS_WIDGET_PATH . 'includes/admin/admin-page.php';
    }
    
    /**
     * Admin enqueue scripts
     */
    public function admin_enqueue_scripts($hook) {
        if ('settings_page_pricing-plans-widget' !== $hook) {
            return;
        }
        
        wp_enqueue_style(
            'pricing-plans-widget-admin',
            PRICING_PLANS_WIDGET_URL . 'assets/css/admin.css',
            array(),
            PRICING_PLANS_WIDGET_VERSION
        );
        
        wp_enqueue_script(
            'pricing-plans-widget-admin',
            PRICING_PLANS_WIDGET_URL . 'assets/js/admin.js',
            array('jquery'),
            PRICING_PLANS_WIDGET_VERSION,
            true
        );
    }
}

// Initialize the plugin
PricingPlansWidget::get_instance();
