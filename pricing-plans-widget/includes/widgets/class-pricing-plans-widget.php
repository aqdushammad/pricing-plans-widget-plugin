<?php
/**
 * Pricing Plans Widget Class
 */

namespace PricingPlansWidget\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class PricingPlansWidget extends Widget_Base {

    /**
     * Get widget name
     */
    public function get_name() {
        return 'pricing-plans-slider';
    }

    /**
     * Get widget title
     */
    public function get_title() {
        return esc_html__('Pricing Plans Slider', 'pricing-plans-widget');
    }

    /**
     * Get widget icon
     */
    public function get_icon() {
        return 'eicon-price-table';
    }

    /**
     * Get widget categories
     */
    public function get_categories() {
        return array('pricing-plans-category');
    }

    /**
     * Get widget keywords
     */
    public function get_keywords() {
        return array('pricing', 'plans', 'slider', 'carousel', 'packages', 'internet', 'tv');
    }

    /**
     * Register widget controls
     */
    protected function register_controls() {
        
        // Content Section - Plans
        $this->start_controls_section(
            'content_section',
            array(
                'label' => esc_html__('Plans', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            )
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'plan_name',
            array(
                'label' => esc_html__('Plan Name', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Plan Name', 'pricing-plans-widget'),
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'offer_badges',
            array(
                'label' => esc_html__('Offer Badges (comma separated)', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'placeholder' => esc_html__('Online offers, WiFi 7 router offered', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'offers_count',
            array(
                'label' => esc_html__('Offers Count', 'pricing-plans-widget'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'step' => 1,
                'default' => 0,
            )
        );

        $repeater->add_control(
            'promo_note',
            array(
                'label' => esc_html__('Promo Note', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'is_featured',
            array(
                'label' => esc_html__('Featured (Red Border)', 'pricing-plans-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'pricing-plans-widget'),
                'label_off' => esc_html__('No', 'pricing-plans-widget'),
                'return_value' => 'yes',
                'default' => '',
            )
        );

        $repeater->add_control(
            'plan_price',
            array(
                'label' => esc_html__('Price', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => '399',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'enable_commitment_toggle',
            array(
                'label' => esc_html__('Enable Commitment Toggle', 'pricing-plans-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'pricing-plans-widget'),
                'label_off' => esc_html__('No', 'pricing-plans-widget'),
                'return_value' => 'yes',
                'default' => '',
            )
        );

        $repeater->add_control(
            'plan_price_alt',
            array(
                'label' => esc_html__('Alternate Price (Toggle)', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'commitment_alt',
            array(
                'label' => esc_html__('Alternate Commitment (Toggle)', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'plan_currency',
            array(
                'label' => esc_html__('Currency', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => 'AED',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'plan_period',
            array(
                'label' => esc_html__('Period', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => 'month',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'internet_speed',
            array(
                'label' => esc_html__('Internet Speed', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => '1Gbps',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'speed_value',
            array(
                'label' => esc_html__('Speed Value (for progress bar)', 'pricing-plans-widget'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1000,
                'description' => esc_html__('Enter speed in Mbps (1000 for 1Gbps, 500 for 500Mbps)', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'max_speed',
            array(
                'label' => esc_html__('Max Speed (for progress bar)', 'pricing-plans-widget'),
                'type' => Controls_Manager::NUMBER,
                'default' => 1000,
                'description' => esc_html__('Maximum speed for progress bar calculation', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'tv_channels',
            array(
                'label' => esc_html__('TV Channels', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => '200+ Basic Channels',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'commitment',
            array(
                'label' => esc_html__('Commitment', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => '12-month commitment',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'discount_text',
            array(
                'label' => esc_html__('Discount Text', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'original_price',
            array(
                'label' => esc_html__('Original Price (for discount)', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'is_bestseller',
            array(
                'label' => esc_html__('Best Seller', 'pricing-plans-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'pricing-plans-widget'),
                'label_off' => esc_html__('No', 'pricing-plans-widget'),
                'return_value' => 'yes',
                'default' => '',
            )
        );

        $repeater->add_control(
            'additional_services',
            array(
                'label' => esc_html__('Additional Services', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Prime Video, Starzplay, +2 more',
                'placeholder' => esc_html__('Enter services separated by commas', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'tv_services',
            array(
                'label' => esc_html__('TV Apps (comma separated)', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'placeholder' => esc_html__('Starzplay, Prime Video', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'tv_service_icons',
            array(
                'label' => esc_html__('TV App Icons (comma separated)', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'placeholder' => esc_html__('Enter icon URLs/IDs/filenames separated by commas', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'subscription_services',
            array(
                'label' => esc_html__('Subscription Apps (comma separated)', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'placeholder' => esc_html__('Anghami, smiles', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'subscription_icons',
            array(
                'label' => esc_html__('Subscription App Icons (comma separated)', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'placeholder' => esc_html__('Enter icon URLs/IDs/filenames separated by commas', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'service_icons',
            array(
                'label' => esc_html__('Service Icons', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'placeholder' => esc_html__('Enter icon URLs or filenames separated by commas (optional)', 'pricing-plans-widget'),
                'description' => esc_html__('You can use: 1) Full URLs, 2) Attachment IDs, 3) Filenames from uploads folder', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'promotions',
            array(
                'label' => esc_html__('Promotions', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '',
                'placeholder' => esc_html__('Enter promotions separated by commas', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'tv_tab_content',
            array(
                'label' => esc_html__('TV Tab Content', 'pricing-plans-widget'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => '',
            )
        );

        $repeater->add_control(
            'benefits_tab_content',
            array(
                'label' => esc_html__('Additional Benefits Tab Content', 'pricing-plans-widget'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => '',
            )
        );

        $repeater->add_control(
            'promotions_tab_content',
            array(
                'label' => esc_html__('Promotions Tab Content', 'pricing-plans-widget'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => '',
            )
        );

        $repeater->add_control(
            'button_text',
            array(
                'label' => esc_html__('Button Text', 'pricing-plans-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Select Plan',
                'label_block' => true,
            )
        );

        $repeater->add_control(
            'button_link',
            array(
                'label' => esc_html__('Button Link', 'pricing-plans-widget'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'pricing-plans-widget'),
                'show_external' => true,
                'default' => array(
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ),
            )
        );

        $repeater->add_control(
            'details_link',
            array(
                'label' => esc_html__('More Details Link', 'pricing-plans-widget'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-details-link.com', 'pricing-plans-widget'),
                'show_external' => true,
                'default' => array(
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ),
                'description' => esc_html__('Leave empty to show detailed information in a modal', 'pricing-plans-widget'),
            )
        );

        $repeater->add_control(
            'detailed_description',
            array(
                'label' => esc_html__('Detailed Description', 'pricing-plans-widget'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => '',
                'placeholder' => esc_html__('Enter detailed plan information that will show in the modal...', 'pricing-plans-widget'),
                'description' => esc_html__('This content will show in the modal when "More Details" is clicked (if no link is provided)', 'pricing-plans-widget'),
            )
        );

        $this->add_control(
            'pricing_plans',
            array(
                'label' => esc_html__('Pricing Plans', 'pricing-plans-widget'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => array(
                    array(
                        'plan_name' => esc_html__('Ultra Starter', 'pricing-plans-widget'),
                        'offer_badges' => 'Online offers, WiFi 7 router offered',
                        'offers_count' => 3,
                        'enable_commitment_toggle' => 'yes',
                        'plan_price' => '429',
                        'plan_currency' => 'AED',
                        'plan_period' => 'month',
                        'internet_speed' => '500 Mbps',
                        'speed_value' => 500,
                        'max_speed' => 1000,
                        'tv_channels' => '180+ Basic Channels',
                        'commitment' => '24-month commitment',
                        'promo_note' => 'Free Limited time Promo: 1Gbps',
                        'tv_services' => 'Starzplay, Prime Video',
                        'subscription_services' => 'Anghami, smiles',
                        'promotions_tab_content' => '<h4>Promotions</h4><p><strong>Smiles Points worth up to AED 450 on Ultra Starter Fibre Home Plan</strong></p><p><em>Online exclusive for new subscribers!</em></p><p>Earn 12,500 Smiles Points each month for the first 4 months of your subscription and collect a total of 50,000 Smiles Points worth up to AED 450!</p><p><strong>How to claim the offer?</strong></p><p>After you activate your plan, follow these simple steps to claim and activate the offer:</p><p><strong>Claiming Steps:</strong></p><ul><li>Download the e& UAE App: Ensure you have our app to access and manage your offers.</li><li>Log In: Use your home new landline account number to log in to the app.</li><li>Select the gifts banner from the home page: Once logged in, navigate to the home page and click on the ‘gifts banner’ to proceed.</li></ul><p><strong>Important to know:</strong> You must activate the offer within 1 month from the plan activation. After this period, you will no longer be eligible for selecting a gift.</p><div class=\"ppw-promo-cards\"><div class=\"ppw-promo-card\"><div class=\"ppw-promo-card-icon\"><svg viewBox=\"0 0 24 24\" width=\"22\" height=\"22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M13 2L3 14h7l-1 8 12-14h-7l-1-6z\" fill=\"#111827\"/></svg></div><div class=\"ppw-promo-card-title\">1Gbps speed boost</div><div class=\"ppw-promo-card-text\">Enjoy speed boost of 1Gbps for a limited time with eLife Ultra Starter plan</div></div><div class=\"ppw-promo-card\"><div class=\"ppw-promo-card-icon\"><svg viewBox=\"0 0 24 24\" width=\"22\" height=\"22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M3 7h11v10H3V7z\" stroke=\"#111827\" stroke-width=\"2\"/><path d=\"M14 10h4l3 3v4h-7v-7z\" stroke=\"#111827\" stroke-width=\"2\"/><path d=\"M7 19a2 2 0 1 0 0.001 0z\" fill=\"#111827\"/><path d=\"M18 19a2 2 0 1 0 0.001 0z\" fill=\"#111827\"/></svg></div><div class=\"ppw-promo-card-title\">FREE installation worth AED 199</div><div class=\"ppw-promo-card-text\">Buy online and save AED 199 with free installation exclusively</div></div></div>',
                        'button_text' => 'Select plan',
                    ),
                    array(
                        'plan_name' => esc_html__('Neo Fusion 5G', 'pricing-plans-widget'),
                        'plan_price' => '1,799',
                        'plan_currency' => 'AED',
                        'plan_period' => 'month',
                        'internet_speed' => '5 Gbps',
                        'speed_value' => 5000,
                        'max_speed' => 10000,
                        'tv_channels' => '300+ Premium Channels',
                        'commitment' => '24-month commitment',
                        'tv_services' => 'Starzplay, +2 more',
                        'subscription_services' => 'Arena, +4 more',
                        'is_featured' => 'yes',
                        'button_text' => 'Select plan',
                    ),
                    array(
                        'plan_name' => esc_html__('Neo Fusion 10G', 'pricing-plans-widget'),
                        'plan_price' => '2,699',
                        'plan_currency' => 'AED',
                        'plan_period' => 'month',
                        'internet_speed' => '10 Gbps',
                        'speed_value' => 10000,
                        'max_speed' => 10000,
                        'tv_channels' => '300+ Premium Channels',
                        'commitment' => '24-month commitment',
                        'tv_services' => 'Starzplay, +2 more',
                        'subscription_services' => 'Arena, +4 more',
                        'button_text' => 'Select plan',
                    ),
                    array(
                        'plan_name' => esc_html__('Unlimited Starter', 'pricing-plans-widget'),
                        'offers_count' => 1,
                        'enable_commitment_toggle' => 'yes',
                        'plan_price' => '389',
                        'plan_currency' => 'AED',
                        'plan_period' => 'month',
                        'internet_speed' => '250 Mbps',
                        'speed_value' => 250,
                        'max_speed' => 1000,
                        'tv_channels' => '180+ Basic Channels',
                        'commitment' => '24-month commitment',
                        'button_text' => 'Select plan',
                    ),
                ),
                'title_field' => '{{{ plan_name }}} - {{{ plan_currency }}} {{{ plan_price }}}',
            )
        );

        $this->end_controls_section();

        // Slider Settings Section
        $this->start_controls_section(
            'slider_settings',
            array(
                'label' => esc_html__('Slider Settings', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            )
        );

        $this->add_control(
            'slides_to_show_desktop',
            array(
                'label' => esc_html__('Slides to Show (Desktop)', 'pricing-plans-widget'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 8,
                'step' => 1,
                'default' => 4,
                'description' => esc_html__('Number of slides visible on desktop screens (1200px+)', 'pricing-plans-widget'),
            )
        );

        $this->add_control(
            'slides_to_show_tablet',
            array(
                'label' => esc_html__('Slides to Show (Tablet)', 'pricing-plans-widget'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 4,
                'step' => 1,
                'default' => 2,
            )
        );

        $this->add_control(
            'slides_to_show_mobile',
            array(
                'label' => esc_html__('Slides to Show (Mobile)', 'pricing-plans-widget'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 2,
                'step' => 1,
                'default' => 1,
            )
        );

        $this->add_responsive_control(
            'show_navigation',
            array(
                'label' => esc_html__('Show Navigation Arrows', 'pricing-plans-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'pricing-plans-widget'),
                'label_off' => esc_html__('Hide', 'pricing-plans-widget'),
                'return_value' => 'yes',
                'default' => 'yes',
                'devices' => array('desktop', 'tablet', 'mobile'),
                'desktop_default' => 'yes',
                'tablet_default' => 'yes',
                'mobile_default' => '',
                'description' => esc_html__('Control navigation arrows visibility per device', 'pricing-plans-widget'),
            )
        );

        $this->add_responsive_control(
            'autoplay',
            array(
                'label' => esc_html__('Autoplay', 'pricing-plans-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'pricing-plans-widget'),
                'label_off' => esc_html__('No', 'pricing-plans-widget'),
                'return_value' => 'yes',
                'default' => '',
                'devices' => array('desktop', 'tablet', 'mobile'),
                'desktop_default' => '',
                'tablet_default' => '',
                'mobile_default' => 'yes',
                'description' => esc_html__('Enable autoplay per device. Recommended for mobile.', 'pricing-plans-widget'),
            )
        );

        $this->add_control(
            'autoplay_speed',
            array(
                'label' => esc_html__('Autoplay Speed (ms)', 'pricing-plans-widget'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3000,
                'condition' => array(
                    'autoplay' => 'yes',
                ),
            )
        );

        $this->add_control(
            'pause_on_hover',
            array(
                'label' => esc_html__('Pause on Hover', 'pricing-plans-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'pricing-plans-widget'),
                'label_off' => esc_html__('No', 'pricing-plans-widget'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'autoplay' => 'yes',
                ),
            )
        );

        $this->add_control(
            'infinite_loop',
            array(
                'label' => esc_html__('Infinite Loop', 'pricing-plans-widget'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'pricing-plans-widget'),
                'label_off' => esc_html__('No', 'pricing-plans-widget'),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => esc_html__('Loop back to first slide after last slide', 'pricing-plans-widget'),
            )
        );

        $this->add_control(
            'slide_animation',
            array(
                'label' => esc_html__('Slide Animation', 'pricing-plans-widget'),
                'type' => Controls_Manager::SELECT,
                'default' => 'slide',
                'options' => array(
                    'slide' => esc_html__('Slide', 'pricing-plans-widget'),
                    'fade' => esc_html__('Fade', 'pricing-plans-widget'),
                ),
            )
        );

        $this->end_controls_section();

        // Style Section - Navigation
        $this->start_controls_section(
            'style_navigation',
            array(
                'label' => esc_html__('Navigation', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => array(
                    'show_navigation' => 'yes',
                ),
            )
        );

        $this->add_control(
            'nav_arrow_color',
            array(
                'label' => esc_html__('Arrow Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .pricing-nav-btn svg' => 'fill: {{VALUE}};',
                ),
                'default' => '#6b7280',
            )
        );

        $this->add_control(
            'nav_arrow_color_hover',
            array(
                'label' => esc_html__('Arrow Color (Hover)', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .pricing-nav-btn:hover svg' => 'fill: {{VALUE}};',
                ),
                'default' => '#3b82f6',
            )
        );

        $this->add_control(
            'nav_arrow_background',
            array(
                'label' => esc_html__('Arrow Background', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .pricing-nav-btn' => 'background-color: {{VALUE}};',
                ),
                'default' => 'rgba(255, 255, 255, 0.95)',
            )
        );

        $this->add_control(
            'nav_arrow_background_hover',
            array(
                'label' => esc_html__('Arrow Background (Hover)', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .pricing-nav-btn:hover' => 'background-color: {{VALUE}};',
                ),
                'default' => '#ffffff',
            )
        );

        $this->add_responsive_control(
            'nav_arrow_size',
            array(
                'label' => esc_html__('Arrow Size', 'pricing-plans-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array('px'),
                'range' => array(
                    'px' => array(
                        'min' => 20,
                        'max' => 80,
                    ),
                ),
                'default' => array(
                    'unit' => 'px',
                    'size' => 32,
                ),
                'selectors' => array(
                    '{{WRAPPER}} .pricing-nav-btn' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ),
            )
        );

        $this->add_control(
            'nav_arrow_border_color',
            array(
                'label' => esc_html__('Border Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .pricing-nav-btn' => 'border-color: {{VALUE}};',
                ),
                'default' => '#e5e7eb',
            )
        );

        $this->add_responsive_control(
            'nav_arrow_border_radius',
            array(
                'label' => esc_html__('Border Radius', 'pricing-plans-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array('px', '%'),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 50,
                    ),
                ),
                'default' => array(
                    'unit' => 'px',
                    'size' => 6,
                ),
                'selectors' => array(
                    '{{WRAPPER}} .pricing-nav-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                ),
            )
        );

        $this->end_controls_section();

        // Style Section - Cards
        $this->start_controls_section(
            'style_cards',
            array(
                'label' => esc_html__('Cards', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'card_background',
            array(
                'label' => esc_html__('Card Background', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .pricing-plan-card' => 'background-color: {{VALUE}};',
                ),
                'default' => '#ffffff',
            )
        );

        $this->add_control(
            'card_border_color',
            array(
                'label' => esc_html__('Card Border Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .pricing-plan-card' => 'border-color: {{VALUE}};',
                ),
                'default' => '#e5e7eb',
            )
        );

        $this->add_responsive_control(
            'card_border_radius',
            array(
                'label' => esc_html__('Card Border Radius', 'pricing-plans-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array('px', '%'),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 50,
                    ),
                ),
                'default' => array(
                    'unit' => 'px',
                    'size' => 16,
                ),
                'selectors' => array(
                    '{{WRAPPER}} .pricing-plan-card' => 'border-radius: {{SIZE}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'card_padding',
            array(
                'label' => esc_html__('Card Padding', 'pricing-plans-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array('px', 'em', '%'),
                'default' => array(
                    'top' => '24',
                    'right' => '24',
                    'bottom' => '24',
                    'left' => '24',
                    'unit' => 'px',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .pricing-plan-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'card_min_height',
            array(
                'label' => esc_html__('Card Min Height', 'pricing-plans-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array('px'),
                'range' => array(
                    'px' => array(
                        'min' => 300,
                        'max' => 800,
                    ),
                ),
                'default' => array(
                    'unit' => 'px',
                    'size' => 420,
                ),
                'selectors' => array(
                    '{{WRAPPER}} .pricing-plan-card' => 'min-height: {{SIZE}}{{UNIT}};',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            array(
                'name' => 'card_box_shadow',
                'label' => esc_html__('Card Box Shadow', 'pricing-plans-widget'),
                'selector' => '{{WRAPPER}} .pricing-plan-card',
                'fields_options' => array(
                    'box_shadow_type' => array(
                        'default' => 'yes',
                    ),
                    'box_shadow' => array(
                        'default' => array(
                            'horizontal' => 0,
                            'vertical' => 4,
                            'blur' => 20,
                            'spread' => 0,
                            'color' => 'rgba(0, 0, 0, 0.08)',
                        ),
                    ),
                ),
            )
        );

        $this->end_controls_section();

        // Style Section - Plan Names
        $this->start_controls_section(
            'style_plan_names',
            array(
                'label' => esc_html__('Plan Names', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'plan_name_color',
            array(
                'label' => esc_html__('Plan Name Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .plan-name' => 'color: {{VALUE}};',
                ),
                'default' => '#1f2937',
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name' => 'plan_name_typography',
                'label' => esc_html__('Plan Name Typography', 'pricing-plans-widget'),
                'selector' => '{{WRAPPER}} .plan-name',
                'fields_options' => array(
                    'typography' => array(
                        'default' => 'yes',
                    ),
                    'font_size' => array(
                        'default' => array(
                            'unit' => 'px',
                            'size' => 24,
                        ),
                    ),
                    'font_weight' => array(
                        'default' => '700',
                    ),
                ),
            )
        );

        $this->add_responsive_control(
            'plan_name_margin',
            array(
                'label' => esc_html__('Plan Name Margin', 'pricing-plans-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array('px', 'em', '%'),
                'default' => array(
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '20',
                    'left' => '0',
                    'unit' => 'px',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .plan-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->end_controls_section();

        // Style Section - Pricing
        $this->start_controls_section(
            'style_pricing',
            array(
                'label' => esc_html__('Pricing', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'price_color',
            array(
                'label' => esc_html__('Price Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .plan-price' => 'color: {{VALUE}};',
                ),
                'default' => '#1f2937',
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name' => 'price_typography',
                'label' => esc_html__('Price Typography', 'pricing-plans-widget'),
                'selector' => '{{WRAPPER}} .price-amount',
                'fields_options' => array(
                    'typography' => array(
                        'default' => 'yes',
                    ),
                    'font_size' => array(
                        'default' => array(
                            'unit' => 'px',
                            'size' => 36,
                        ),
                    ),
                    'font_weight' => array(
                        'default' => '800',
                    ),
                ),
            )
        );

        $this->add_control(
            'currency_color',
            array(
                'label' => esc_html__('Currency Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .plan-price' => 'color: {{VALUE}};',
                ),
                'default' => '#1f2937',
            )
        );

        $this->add_control(
            'commitment_color',
            array(
                'label' => esc_html__('Commitment Text Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .commitment' => 'color: {{VALUE}};',
                ),
                'default' => '#6b7280',
            )
        );

        $this->add_control(
            'vat_color',
            array(
                'label' => esc_html__('VAT Text Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .vat-info' => 'color: {{VALUE}};',
                ),
                'default' => '#6b7280',
            )
        );

        $this->end_controls_section();

        // Style Section - Features
        $this->start_controls_section(
            'style_features',
            array(
                'label' => esc_html__('Features', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'feature_label_color',
            array(
                'label' => esc_html__('Feature Label Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .feature-label' => 'color: {{VALUE}};',
                ),
                'default' => '#6b7280',
            )
        );

        $this->add_control(
            'feature_value_color',
            array(
                'label' => esc_html__('Feature Value Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .feature-value' => 'color: {{VALUE}};',
                ),
                'default' => '#1f2937',
            )
        );

        $this->add_control(
            'speed_bar_background',
            array(
                'label' => esc_html__('Speed Bar Background', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .speed-bar-container' => 'background-color: {{VALUE}};',
                ),
                'default' => '#e5e7eb',
            )
        );

        $this->add_control(
            'speed_bar_color',
            array(
                'label' => esc_html__('Speed Bar Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .speed-bar' => 'background: {{VALUE}};',
                ),
                'default' => 'linear-gradient(90deg, #10b981 0%, #3b82f6 50%, #f59e0b 100%)',
            )
        );

        $this->end_controls_section();

        // Style Section - Services
        $this->start_controls_section(
            'style_services',
            array(
                'label' => esc_html__('Additional Services', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'services_background',
            array(
                'label' => esc_html__('Services Background', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .additional-services' => 'background-color: {{VALUE}};',
                ),
                'default' => '#f8fafc',
            )
        );

        $this->add_control(
            'services_border_color',
            array(
                'label' => esc_html__('Services Border Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .additional-services' => 'border-color: {{VALUE}};',
                ),
                'default' => '#e2e8f0',
            )
        );

        $this->add_control(
            'service_icon_background',
            array(
                'label' => esc_html__('Service Icon Background', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .service-icon' => 'background-color: {{VALUE}};',
                ),
                'default' => '#dbeafe',
            )
        );

        $this->add_control(
            'service_icon_color',
            array(
                'label' => esc_html__('Service Icon Text Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .service-icon' => 'color: {{VALUE}};',
                ),
                'default' => '#1d4ed8',
            )
        );

        $this->end_controls_section();

        // Style Section - Buttons
        $this->start_controls_section(
            'style_buttons',
            array(
                'label' => esc_html__('Buttons', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'details_button_color',
            array(
                'label' => esc_html__('Details Button Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .details-button' => 'color: {{VALUE}};',
                ),
                'default' => '#374151',
            )
        );

        $this->add_control(
            'details_button_background',
            array(
                'label' => esc_html__('Details Button Background', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .details-button' => 'background-color: {{VALUE}};',
                ),
                'default' => 'transparent',
            )
        );

        $this->add_control(
            'details_button_border',
            array(
                'label' => esc_html__('Details Button Border', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .details-button' => 'border-color: {{VALUE}};',
                ),
                'default' => '#e5e7eb',
            )
        );

        $this->add_control(
            'plan_button_color',
            array(
                'label' => esc_html__('Plan Button Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .plan-button' => 'color: {{VALUE}};',
                ),
                'default' => '#ffffff',
            )
        );

        $this->add_control(
            'plan_button_background',
            array(
                'label' => esc_html__('Plan Button Background', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .plan-button' => 'background-color: {{VALUE}};',
                ),
                'default' => '#1f2937',
            )
        );

        $this->add_control(
            'plan_button_background_hover',
            array(
                'label' => esc_html__('Plan Button Background (Hover)', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .plan-button:hover' => 'background-color: {{VALUE}};',
                ),
                'default' => '#111827',
            )
        );

        $this->add_responsive_control(
            'button_border_radius',
            array(
                'label' => esc_html__('Button Border Radius', 'pricing-plans-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array('px', '%'),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 50,
                    ),
                ),
                'default' => array(
                    'unit' => 'px',
                    'size' => 8,
                ),
                'selectors' => array(
                    '{{WRAPPER}} .plan-button, {{WRAPPER}} .details-button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name' => 'details_button_typography',
                'label' => esc_html__('Details Button Typography', 'pricing-plans-widget'),
                'selector' => '{{WRAPPER}} .details-button',
                'fields_options' => array(
                    'typography' => array(
                        'default' => 'yes',
                    ),
                    'font_size' => array(
                        'default' => array(
                            'unit' => 'px',
                            'size' => 14,
                        ),
                    ),
                    'font_weight' => array(
                        'default' => '600',
                    ),
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name' => 'plan_button_typography',
                'label' => esc_html__('Plan Button Typography', 'pricing-plans-widget'),
                'selector' => '{{WRAPPER}} .plan-button',
                'fields_options' => array(
                    'typography' => array(
                        'default' => 'yes',
                    ),
                    'font_size' => array(
                        'default' => array(
                            'unit' => 'px',
                            'size' => 15,
                        ),
                    ),
                    'font_weight' => array(
                        'default' => '700',
                    ),
                ),
            )
        );

        $this->end_controls_section();

        // Style Section - Best Seller Badge
        $this->start_controls_section(
            'style_badge',
            array(
                'label' => esc_html__('Best Seller Badge', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'badge_background',
            array(
                'label' => esc_html__('Badge Background', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .bestseller-badge' => 'background-color: {{VALUE}};',
                ),
                'default' => '#ef4444',
            )
        );

        $this->add_control(
            'badge_color',
            array(
                'label' => esc_html__('Badge Text Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .bestseller-badge' => 'color: {{VALUE}};',
                ),
                'default' => '#ffffff',
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name' => 'badge_typography',
                'label' => esc_html__('Badge Typography', 'pricing-plans-widget'),
                'selector' => '{{WRAPPER}} .bestseller-badge',
                'fields_options' => array(
                    'typography' => array(
                        'default' => 'yes',
                    ),
                    'font_size' => array(
                        'default' => array(
                            'unit' => 'px',
                            'size' => 12,
                        ),
                    ),
                    'font_weight' => array(
                        'default' => '600',
                    ),
                ),
            )
        );

        $this->end_controls_section();

        // Style Section - Promotions
        $this->start_controls_section(
            'style_promotions',
            array(
                'label' => esc_html__('Promotions', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'promotions_background',
            array(
                'label' => esc_html__('Promotions Background', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .promotions' => 'background-color: {{VALUE}};',
                ),
                'default' => '#ef4444',
            )
        );

        $this->add_control(
            'promotions_color',
            array(
                'label' => esc_html__('Promotions Text Color', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .promotions' => 'color: {{VALUE}};',
                ),
                'default' => '#ffffff',
            )
        );

        $this->add_responsive_control(
            'promotions_border_radius',
            array(
                'label' => esc_html__('Promotions Border Radius', 'pricing-plans-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array('px', '%'),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 50,
                    ),
                ),
                'default' => array(
                    'unit' => 'px',
                    'size' => 10,
                ),
                'selectors' => array(
                    '{{WRAPPER}} .promotions' => 'border-radius: {{SIZE}}{{UNIT}};',
                ),
            )
        );

        $this->end_controls_section();

        // Style Section - Spacing & Layout
        $this->start_controls_section(
            'style_spacing',
            array(
                'label' => esc_html__('Spacing & Layout', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_responsive_control(
            'slide_padding',
            array(
                'label' => esc_html__('Slide Padding', 'pricing-plans-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array('px', 'em', '%'),
                'default' => array(
                    'top' => '15',
                    'right' => '15',
                    'bottom' => '15',
                    'left' => '15',
                    'unit' => 'px',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .pricing-plan-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'wrapper_padding',
            array(
                'label' => esc_html__('Wrapper Padding', 'pricing-plans-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array('px', 'em', '%'),
                'default' => array(
                    'top' => '0',
                    'right' => '50',
                    'bottom' => '0',
                    'left' => '50',
                    'unit' => 'px',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .pricing-plans-slider-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'feature_spacing',
            array(
                'label' => esc_html__('Feature Item Spacing', 'pricing-plans-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array('px'),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 50,
                    ),
                ),
                'default' => array(
                    'unit' => 'px',
                    'size' => 16,
                ),
                'selectors' => array(
                    '{{WRAPPER}} .feature-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'services_spacing',
            array(
                'label' => esc_html__('Services Section Spacing', 'pricing-plans-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array('px', 'em'),
                'default' => array(
                    'top' => '16',
                    'right' => '0',
                    'bottom' => '16',
                    'left' => '0',
                    'unit' => 'px',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .additional-services' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->add_responsive_control(
            'promotions_spacing',
            array(
                'label' => esc_html__('Promotions Section Spacing', 'pricing-plans-widget'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array('px', 'em'),
                'default' => array(
                    'top' => '16',
                    'right' => '0',
                    'bottom' => '16',
                    'left' => '0',
                    'unit' => 'px',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .promotions' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->end_controls_section();

        // Style Section - Advanced
        $this->start_controls_section(
            'style_advanced',
            array(
                'label' => esc_html__('Advanced', 'pricing-plans-widget'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'slider_background',
            array(
                'label' => esc_html__('Slider Background', 'pricing-plans-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .pricing-plans-slider-wrapper' => 'background-color: {{VALUE}};',
                ),
                'default' => 'transparent',
            )
        );

        $this->add_responsive_control(
            'slider_border_radius',
            array(
                'label' => esc_html__('Slider Border Radius', 'pricing-plans-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array('px', '%'),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 50,
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .pricing-plans-slider-wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
                ),
            )
        );

        $this->add_control(
            'custom_css',
            array(
                'label' => esc_html__('Custom CSS', 'pricing-plans-widget'),
                'type' => Controls_Manager::CODE,
                'language' => 'css',
                'rows' => 10,
                'placeholder' => esc_html__('/* Add your custom CSS here */', 'pricing-plans-widget'),
                'description' => esc_html__('Add custom CSS to override default styles. Use {{WRAPPER}} to target this specific widget.', 'pricing-plans-widget'),
            )
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        
        if (empty($settings['pricing_plans'])) {
            return;
        }

        $slider_id = 'pricing-slider-' . $this->get_id();
        
        // Add custom CSS if provided
        if (!empty($settings['custom_css'])) {
            echo '<style>';
            echo str_replace('{{WRAPPER}}', '.elementor-element-' . $this->get_id(), $settings['custom_css']);
            echo '</style>';
        }
        
        ?>
        <?php
        // Get responsive navigation settings
        $show_nav_desktop = !empty($settings['show_navigation']) ? 'yes' : '';
        $show_nav_tablet = !empty($settings['show_navigation_tablet']) ? 'yes' : '';
        $show_nav_mobile = !empty($settings['show_navigation_mobile']) ? 'yes' : '';
        
        // Get responsive autoplay settings
        $autoplay_desktop = !empty($settings['autoplay']) ? 'yes' : '';
        $autoplay_tablet = !empty($settings['autoplay_tablet']) ? 'yes' : '';
        $autoplay_mobile = !empty($settings['autoplay_mobile']) ? 'yes' : '';
        ?>
        
        <div class="pricing-plans-slider-wrapper" 
             data-nav-desktop="<?php echo esc_attr($show_nav_desktop); ?>"
             data-nav-tablet="<?php echo esc_attr($show_nav_tablet); ?>"
             data-nav-mobile="<?php echo esc_attr($show_nav_mobile); ?>">
            
            <button class="pricing-nav-btn pricing-nav-prev" data-target="<?php echo esc_attr($slider_id); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                </svg>
            </button>
            <button class="pricing-nav-btn pricing-nav-next" data-target="<?php echo esc_attr($slider_id); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                </svg>
            </button>
            
            <div class="pricing-plans-slider" 
                 id="<?php echo esc_attr($slider_id); ?>"
                 data-slides-desktop="<?php echo esc_attr($settings['slides_to_show_desktop']); ?>"
                 data-slides-tablet="<?php echo esc_attr($settings['slides_to_show_tablet']); ?>"
                 data-slides-mobile="<?php echo esc_attr($settings['slides_to_show_mobile']); ?>"
                 data-autoplay-desktop="<?php echo esc_attr($autoplay_desktop); ?>"
                 data-autoplay-tablet="<?php echo esc_attr($autoplay_tablet); ?>"
                 data-autoplay-mobile="<?php echo esc_attr($autoplay_mobile); ?>"
                 data-autoplay-speed="<?php echo esc_attr($settings['autoplay_speed']); ?>"
                 data-pause-on-hover="<?php echo esc_attr($settings['pause_on_hover']); ?>"
                 data-infinite-loop="<?php echo esc_attr($settings['infinite_loop']); ?>"
                 data-animation="<?php echo esc_attr($settings['slide_animation']); ?>">
                
                <div class="pricing-slider-track">
                    <?php foreach ($settings['pricing_plans'] as $index => $plan) : ?>
                        <div class="pricing-plan-slide">
                            <?php
                            $featured_class = (!empty($plan['is_featured']) && 'yes' === $plan['is_featured']) ? ' is-featured' : '';
                            $bestseller_class = (!empty($plan['is_bestseller']) && 'yes' === $plan['is_bestseller']) ? ' has-bestseller' : '';
                            $offer_badges = $this->split_list(isset($plan['offer_badges']) ? $plan['offer_badges'] : '');
                            $offers_count = isset($plan['offers_count']) ? intval($plan['offers_count']) : 0;
                            $promo_note = isset($plan['promo_note']) ? trim((string) $plan['promo_note']) : '';
                            $speed_value = !empty($plan['speed_value']) ? intval($plan['speed_value']) : 1000;
                            $max_speed = !empty($plan['max_speed']) ? intval($plan['max_speed']) : 1000;
                            $progress_percentage = ($max_speed > 0) ? min(100, ($speed_value / $max_speed) * 100) : 0;
                            $toggle_enabled = (!empty($plan['enable_commitment_toggle']) && 'yes' === $plan['enable_commitment_toggle']);
                            ?>
                            <div class="pricing-plan-card<?php echo esc_attr($featured_class . $bestseller_class); ?>"
                                 data-price-default="<?php echo esc_attr($plan['plan_price']); ?>"
                                 data-price-alt="<?php echo esc_attr(isset($plan['plan_price_alt']) ? $plan['plan_price_alt'] : ''); ?>"
                                 data-commitment-default="<?php echo esc_attr(isset($plan['commitment']) ? $plan['commitment'] : ''); ?>"
                                 data-commitment-alt="<?php echo esc_attr(isset($plan['commitment_alt']) ? $plan['commitment_alt'] : ''); ?>">
                                <div class="ppw-card-top">
                                    <?php if (!empty($offer_badges)) : ?>
                                        <div class="ppw-tags">
                                            <?php foreach ($offer_badges as $badge_text) : ?>
                                                <span class="ppw-tag"><?php echo esc_html($badge_text); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="ppw-plan-title"><?php echo esc_html($plan['plan_name']); ?></div>

                                    <div class="ppw-price-row">
                                        <div class="ppw-price-line">
                                            <span class="ppw-price-currency"><?php echo esc_html($plan['plan_currency']); ?></span>
                                            <span class="ppw-price-amount"><?php echo esc_html($plan['plan_price']); ?></span><span class="ppw-price-period">/<?php echo esc_html($plan['plan_period']); ?></span>
                                        </div>
                                        <div class="ppw-vat">+5% VAT</div>
                                    </div>

                                    <div class="ppw-divider"></div>

                                    <?php if (!empty($plan['commitment']) || $toggle_enabled) : ?>
                                        <div class="ppw-commitment-row">
                                            <div class="ppw-commitment-text"><?php echo esc_html($plan['commitment']); ?></div>
                                            <?php if ($toggle_enabled) : ?>
                                                <label class="ppw-switch">
                                                    <input type="checkbox" class="ppw-commitment-toggle" checked>
                                                    <span class="ppw-switch-slider"></span>
                                                </label>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($offers_count > 0) : ?>
                                        <button type="button" class="ppw-offers-row details-button" data-open-tab="promotions" data-plan="<?php echo esc_attr($plan['plan_name']); ?>" data-index="<?php echo esc_attr($index); ?>">
                                            <span class="ppw-offers-icon">%</span>
                                            <span class="ppw-offers-text"><?php echo esc_html($offers_count); ?> <?php echo esc_html($offers_count === 1 ? 'Offer available' : 'Offers available'); ?></span>
                                            <span class="ppw-offers-arrow"></span>
                                        </button>
                                    <?php else : ?>
                                        <div class="ppw-offers-row ppw-offers-row--disabled">
                                            <span class="ppw-offers-text"><?php echo esc_html__('No special offers available', 'pricing-plans-widget'); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="ppw-card-body">
                                    <div class="ppw-section">
                                        <div class="ppw-section-label">Internet</div>
                                        <div class="ppw-section-value"><?php echo esc_html($plan['internet_speed']); ?></div>
                                        <div class="ppw-meter">
                                            <div class="ppw-meter-fill" style="width: <?php echo esc_attr($progress_percentage); ?>%"></div>
                                        </div>
                                        <?php if (!empty($promo_note)) : ?>
                                            <div class="ppw-promo-note"><?php echo esc_html($promo_note); ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (!empty($plan['tv_channels'])) : ?>
                                        <div class="ppw-section">
                                            <div class="ppw-section-label">TV</div>
                                            <div class="ppw-section-value"><?php echo esc_html($plan['tv_channels']); ?></div>
                                            <?php
                                            $tv_split = $this->split_list_with_more(isset($plan['tv_services']) ? $plan['tv_services'] : '');
                                            $tv_names = isset($tv_split['items']) ? $tv_split['items'] : array();
                                            $tv_more_inline = isset($tv_split['more']) ? intval($tv_split['more']) : 0;
                                            $tv_icons = $this->split_list(isset($plan['tv_service_icons']) ? $plan['tv_service_icons'] : '');
                                            $tv_total_items = max(count($tv_names), count($tv_icons));
                                            $tv_show = min(2, $tv_total_items);
                                            $tv_remaining = max(0, $tv_total_items - $tv_show);
                                            $tv_more_display = ($tv_more_inline > 0) ? $tv_more_inline : $tv_remaining;
                                            ?>
                                            <?php if ($tv_total_items > 0) : ?>
                                                <div class="ppw-icons-row">
                                                    <?php for ($i = 0; $i < $tv_show; $i++) : ?>
                                                        <?php
                                                        $name = isset($tv_names[$i]) ? $tv_names[$i] : '';
                                                        $icon_filename = isset($tv_icons[$i]) ? $tv_icons[$i] : '';
                                                        $icon_url = !empty($icon_filename) ? $this->get_icon_url($icon_filename) : '';
                                                        ?>
                                                        <span class="ppw-app-icon">
                                                            <?php if (!empty($icon_url)) : ?>
                                                                <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($name); ?>" onerror="this.style.display='none'" />
                                                            <?php else : ?>
                                                                <span class="ppw-app-initials"><?php echo esc_html($this->get_initials($name)); ?></span>
                                                            <?php endif; ?>
                                                        </span>
                                                    <?php endfor; ?>
                                                    <?php if ($tv_more_display > 0) : ?>
                                                        <button type="button" class="ppw-more-count ppw-more-link details-button" data-open-tab="tv" data-plan="<?php echo esc_attr($plan['plan_name']); ?>" data-index="<?php echo esc_attr($index); ?>">+<?php echo esc_html($tv_more_display); ?> more</button>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="ppw-section">
                                        <div class="ppw-section-label">Subscription and more <span class="ppw-info-dot">i</span></div>
                                        <?php
                                        $sub_split = $this->split_list_with_more(isset($plan['subscription_services']) ? $plan['subscription_services'] : '');
                                        $sub_names = isset($sub_split['items']) ? $sub_split['items'] : array();
                                        $sub_more_inline = isset($sub_split['more']) ? intval($sub_split['more']) : 0;
                                        $sub_icons = $this->split_list(isset($plan['subscription_icons']) ? $plan['subscription_icons'] : '');
                                        $sub_total_items = max(count($sub_names), count($sub_icons));
                                        $sub_show = min(2, $sub_total_items);
                                        $sub_remaining = max(0, $sub_total_items - $sub_show);
                                        $sub_more_display = ($sub_more_inline > 0) ? $sub_more_inline : $sub_remaining;
                                        ?>
                                        <?php if ($sub_total_items > 0) : ?>
                                            <div class="ppw-icons-row">
                                                <?php for ($i = 0; $i < $sub_show; $i++) : ?>
                                                    <?php
                                                    $name = isset($sub_names[$i]) ? $sub_names[$i] : '';
                                                    $icon_filename = isset($sub_icons[$i]) ? $sub_icons[$i] : '';
                                                    $icon_url = !empty($icon_filename) ? $this->get_icon_url($icon_filename) : '';
                                                    ?>
                                                    <span class="ppw-app-icon">
                                                        <?php if (!empty($icon_url)) : ?>
                                                            <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($name); ?>" onerror="this.style.display='none'" />
                                                        <?php else : ?>
                                                            <span class="ppw-app-initials"><?php echo esc_html($this->get_initials($name)); ?></span>
                                                        <?php endif; ?>
                                                    </span>
                                                <?php endfor; ?>
                                                <?php if ($sub_more_display > 0) : ?>
                                                    <button type="button" class="ppw-more-count ppw-more-link details-button" data-open-tab="benefits" data-plan="<?php echo esc_attr($plan['plan_name']); ?>" data-index="<?php echo esc_attr($index); ?>">+<?php echo esc_html($sub_more_display); ?> more</button>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="ppw-footer">
                                    <?php
                                    $details_url = !empty($plan['details_link']['url']) ? $plan['details_link']['url'] : '';
                                    $details_target = !empty($plan['details_link']['is_external']) ? ' target="_blank"' : '';
                                    $details_nofollow = !empty($plan['details_link']['nofollow']) ? ' rel="nofollow"' : '';

                                    if (!empty($details_url)) {
                                        echo '<a href="' . esc_url($details_url) . '" class="ppw-more-details"' . $details_target . $details_nofollow . '>More Details</a>';
                                    } else {
                                        echo '<button type="button" class="ppw-more-details details-button" data-open-tab="tv" data-plan="' . esc_attr($plan['plan_name']) . '" data-index="' . esc_attr($index) . '">More Details</button>';
                                    }

                                    $target = !empty($plan['button_link']['is_external']) ? ' target="_blank"' : '';
                                    $nofollow = !empty($plan['button_link']['nofollow']) ? ' rel="nofollow"' : '';
                                    $button_url = !empty($plan['button_link']['url']) ? $plan['button_link']['url'] : '#';
                                    ?>
                                    <a href="<?php echo esc_url($button_url); ?>" class="plan-button"<?php echo $target . $nofollow; ?>>
                                        <?php echo esc_html($plan['button_text']); ?>
                                    </a>
                                </div>

                                <?php if (empty($plan['details_link']['url'])) : ?>
                                    <?php
                                    $tv_tab_html = isset($plan['tv_tab_content']) ? (string) $plan['tv_tab_content'] : '';
                                    $benefits_tab_html = isset($plan['benefits_tab_content']) ? (string) $plan['benefits_tab_content'] : '';
                                    $promotions_tab_html = isset($plan['promotions_tab_content']) ? (string) $plan['promotions_tab_content'] : '';

                                    if ($tv_tab_html === '' && !empty($plan['tv_channels'])) {
                                        $tv_tab_html = '<p><strong>' . esc_html($plan['tv_channels']) . '</strong></p>';
                                    }
                                    if ($benefits_tab_html === '' && !empty($plan['subscription_services'])) {
                                        $benefits_tab_html = '<p><strong>Included</strong></p><p>' . esc_html($plan['subscription_services']) . '</p>';
                                    }
                                    if ($promotions_tab_html === '' && !empty($plan['detailed_description'])) {
                                        $promotions_tab_html = (string) $plan['detailed_description'];
                                    }
                                    if ($promotions_tab_html === '') {
                                        $promotions_tab_html = '<p>No promotions available</p>';
                                    }
                                    ?>
                                    <div class="plan-details-content" style="display: none;" data-plan-index="<?php echo esc_attr($index); ?>">
                                        <div class="ppw-modal-tabs" role="tablist">
                                            <button type="button" class="ppw-modal-tab" data-tab="tv">TV</button>
                                            <button type="button" class="ppw-modal-tab" data-tab="benefits">Additional Benefits</button>
                                            <button type="button" class="ppw-modal-tab" data-tab="promotions">Promotions</button>
                                        </div>
                                        <div class="ppw-modal-panels">
                                            <div class="ppw-modal-panel" data-tab-panel="tv"><?php echo wp_kses_post($tv_tab_html); ?></div>
                                            <div class="ppw-modal-panel" data-tab-panel="benefits"><?php echo wp_kses_post($benefits_tab_html); ?></div>
                                            <div class="ppw-modal-panel" data-tab-panel="promotions"><?php echo wp_kses_post($promotions_tab_html); ?></div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <div id="pricing-plan-modal-<?php echo esc_attr($this->get_id()); ?>" class="pricing-plan-modal" style="display: none;">
            <div class="pricing-plan-modal-overlay"></div>
            <div class="pricing-plan-modal-content">
                <div class="pricing-plan-modal-header">
                    <h3 class="pricing-plan-modal-title"></h3>
                    <button class="pricing-plan-modal-close">&times;</button>
                </div>
                <div class="pricing-plan-modal-body">
                </div>
            </div>
        </div>
        <?php
    }
    
    /**
     * Get icon URL from various sources
     */
    private function get_icon_url($icon_filename) {
        $icon_url = '';
        
        // Try different methods to get the icon URL
        if (is_numeric($icon_filename)) {
            // If it's an attachment ID
            $icon_url = wp_get_attachment_image_url($icon_filename, 'thumbnail');
        } else {
            // Check if it's a full URL
            if (filter_var($icon_filename, FILTER_VALIDATE_URL)) {
                $icon_url = $icon_filename;
            } else {
                // Try different paths
                $upload_dir = wp_upload_dir();
                
                $possible_paths = array(
                    $upload_dir['baseurl'] . '/' . $icon_filename,
                    $upload_dir['baseurl'] . '/2024/' . date('m') . '/' . $icon_filename,
                    $upload_dir['baseurl'] . '/2025/' . date('m') . '/' . $icon_filename,
                    get_template_directory_uri() . '/assets/images/' . $icon_filename,
                    PRICING_PLANS_WIDGET_URL . 'assets/images/' . $icon_filename
                );
                
                foreach ($possible_paths as $path) {
                    $icon_url = $path;
                    break; // Use the first path for now
                }
            }
        }
        
        return $icon_url;
    }

    private function split_list($value) {
        $value = (string) $value;
        $parts = preg_split("/[,\r\n]+/", $value);
        if (!is_array($parts)) {
            $parts = array($value);
        }
        $parts = array_map('trim', $parts);
        $parts = array_filter($parts, function ($v) {
            return $v !== '';
        });
        return array_values($parts);
    }

    private function split_list_with_more($value) {
        $items = $this->split_list($value);
        $more = 0;

        $filtered = array();
        foreach ($items as $item) {
            if (preg_match('/^\+?\s*(\d+)\s*more\s*$/i', $item, $m)) {
                $more = max($more, intval($m[1]));
                continue;
            }
            $filtered[] = $item;
        }

        return array(
            'items' => array_values($filtered),
            'more' => $more,
        );
    }

    private function get_initials($text) {
        $text = trim((string) $text);
        if ($text === '') {
            return '';
        }
        $words = preg_split('/\s+/', $text);
        $letters = '';
        foreach ($words as $word) {
            if ($word === '') {
                continue;
            }
            if (function_exists('mb_substr')) {
                $letters .= strtoupper(mb_substr($word, 0, 1));
            } else {
                $letters .= strtoupper(substr($word, 0, 1));
            }
            if (strlen($letters) >= 2) {
                break;
            }
        }
        if ($letters === '') {
            if (function_exists('mb_substr')) {
                $letters = strtoupper(mb_substr($text, 0, 2));
            } else {
                $letters = strtoupper(substr($text, 0, 2));
            }
        }
        return $letters;
    }
}
