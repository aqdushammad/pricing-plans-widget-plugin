<?php
/**
 * Shortcode Template for Pricing Plans
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Default plans data
$default_plans = array(
    array(
        'plan_name' => 'Ultra Starter',
        'offer_badges' => 'Online offers, WiFi 7 router offered',
        'offers_count' => 3,
        'enable_commitment_toggle' => true,
        'promo_note' => 'Free Limited time Promo: 1Gbps',
        'plan_price' => '429',
        'plan_currency' => 'AED',
        'plan_period' => 'month',
        'internet_speed' => '500 Mbps',
        'speed_value' => 500,
        'max_speed' => 1000,
        'tv_channels' => '180+ Basic Channels',
        'commitment' => '24-month commitment',
        'tv_services' => 'Starzplay, Prime Video',
        'subscription_services' => 'Anghami, smiles, +2 more',
        'promotions_tab_content' => '<h4>Promotions</h4><p><strong>Smiles Points worth up to AED 450 on Ultra Starter Fibre Home Plan</strong></p><p><em>Online exclusive for new subscribers!</em></p><p>Earn 12,500 Smiles Points each month for the first 4 months of your subscription and collect a total of 50,000 Smiles Points worth up to AED 450!</p><p><strong>How to claim the offer?</strong></p><p>After you activate your plan, follow these simple steps to claim and activate the offer:</p><p><strong>Claiming Steps:</strong></p><ul><li>Download the e& UAE App: Ensure you have our app to access and manage your offers.</li><li>Log In: Use your home new landline account number to log in to the app.</li><li>Select the gifts banner from the home page: Once logged in, navigate to the home page and click on the ‘gifts banner’ to proceed.</li></ul><p><strong>Important to know:</strong> You must activate the offer within 1 month from the plan activation. After this period, you will no longer be eligible for selecting a gift.</p><div class=\"ppw-promo-cards\"><div class=\"ppw-promo-card\"><div class=\"ppw-promo-card-icon\"><svg viewBox=\"0 0 24 24\" width=\"22\" height=\"22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M13 2L3 14h7l-1 8 12-14h-7l-1-6z\" fill=\"#111827\"/></svg></div><div class=\"ppw-promo-card-title\">1Gbps speed boost</div><div class=\"ppw-promo-card-text\">Enjoy speed boost of 1Gbps for a limited time with eLife Ultra Starter plan</div></div><div class=\"ppw-promo-card\"><div class=\"ppw-promo-card-icon\"><svg viewBox=\"0 0 24 24\" width=\"22\" height=\"22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M3 7h11v10H3V7z\" stroke=\"#111827\" stroke-width=\"2\"/><path d=\"M14 10h4l3 3v4h-7v-7z\" stroke=\"#111827\" stroke-width=\"2\"/><path d=\"M7 19a2 2 0 1 0 0.001 0z\" fill=\"#111827\"/><path d=\"M18 19a2 2 0 1 0 0.001 0z\" fill=\"#111827\"/></svg></div><div class=\"ppw-promo-card-title\">FREE installation worth AED 199</div><div class=\"ppw-promo-card-text\">Buy online and save AED 199 with free installation exclusively</div></div></div>',
        'button_text' => 'Select plan',
        'button_link' => '#',
        'detailed_description' => '',
    ),
    array(
        'plan_name' => 'Neo Fusion 5G',
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
        'button_text' => 'Select plan',
        'button_link' => '#',
        'detailed_description' => '',
    ),
    array(
        'plan_name' => 'Neo Fusion 10G',
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
        'button_link' => '#',
        'detailed_description' => '',
    ),
    array(
        'plan_name' => 'Unlimited Starter',
        'offers_count' => 1,
        'enable_commitment_toggle' => true,
        'plan_price' => '389',
        'plan_currency' => 'AED',
        'plan_period' => 'month',
        'internet_speed' => '250 Mbps',
        'speed_value' => 250,
        'max_speed' => 1000,
        'tv_channels' => '180+ Basic Channels',
        'commitment' => '24-month commitment',
        'button_text' => 'Select plan',
        'button_link' => '#',
        'detailed_description' => '',
    ),
);

$slider_uid = uniqid();
$slider_id = 'pricing-slider-' . $slider_uid;
$autoplay_value = ($atts['autoplay'] === 'true') ? 'yes' : '';
?>

<div class="pricing-plans-slider-wrapper">
    <?php if ($atts['navigation'] === 'true') : ?>
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
    <?php endif; ?>
    
    <div class="pricing-plans-slider" 
         id="<?php echo esc_attr($slider_id); ?>"
         data-slides-desktop="<?php echo esc_attr($atts['slides_desktop']); ?>"
         data-slides-tablet="<?php echo esc_attr($atts['slides_tablet']); ?>"
         data-slides-mobile="<?php echo esc_attr($atts['slides_mobile']); ?>"
         data-autoplay-desktop="<?php echo esc_attr($autoplay_value); ?>"
         data-autoplay-tablet="<?php echo esc_attr($autoplay_value); ?>"
         data-autoplay-mobile="<?php echo esc_attr($autoplay_value); ?>"
         data-autoplay-speed="3000"
         data-pause-on-hover="yes">
        
        <div class="pricing-slider-track">
            <?php foreach ($default_plans as $index => $plan) : ?>
                <div class="pricing-plan-slide">
                    <div class="pricing-plan-card">
                        <?php
                        $offer_badges = !empty($plan['offer_badges']) ? array_filter(array_map('trim', explode(',', (string) $plan['offer_badges']))) : array();
                        $offers_count = isset($plan['offers_count']) ? intval($plan['offers_count']) : 0;
                        $promo_note = isset($plan['promo_note']) ? trim((string) $plan['promo_note']) : '';
                        $speed_value = !empty($plan['speed_value']) ? intval($plan['speed_value']) : 1000;
                        $max_speed = !empty($plan['max_speed']) ? intval($plan['max_speed']) : 1000;
                        $progress_percentage = ($max_speed > 0) ? min(100, ($speed_value / $max_speed) * 100) : 0;
                        ?>

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

                            <div class="ppw-commitment-row">
                                <div class="ppw-commitment-text"><?php echo esc_html($plan['commitment']); ?></div>
                                <?php if (!empty($plan['enable_commitment_toggle'])) : ?>
                                    <label class="ppw-switch">
                                        <input type="checkbox" checked>
                                        <span class="ppw-switch-slider"></span>
                                    </label>
                                <?php endif; ?>
                            </div>

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
                                    $tv_names_raw = !empty($plan['tv_services']) ? array_values(array_filter(array_map('trim', explode(',', (string) $plan['tv_services'])))) : array();
                                    $tv_more_inline = 0;
                                    $tv_names = array();
                                    foreach ($tv_names_raw as $n) {
                                        if (preg_match('/^\\+?\\s*(\\d+)\\s*more\\s*$/i', $n, $m)) {
                                            $tv_more_inline = max($tv_more_inline, intval($m[1]));
                                            continue;
                                        }
                                        $tv_names[] = $n;
                                    }
                                    $tv_total_items = count($tv_names);
                                    $tv_show = min(2, $tv_total_items);
                                    $tv_remaining = max(0, $tv_total_items - $tv_show);
                                    $tv_more_display = ($tv_more_inline > 0) ? $tv_more_inline : $tv_remaining;
                                    ?>
                                    <?php if ($tv_total_items > 0) : ?>
                                        <div class="ppw-icons-row">
                                            <?php for ($i = 0; $i < $tv_show; $i++) : ?>
                                                <span class="ppw-app-icon">
                                                    <span class="ppw-app-initials"><?php echo esc_html(strtoupper(substr($tv_names[$i], 0, 2))); ?></span>
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
                                $sub_names_raw = !empty($plan['subscription_services']) ? array_values(array_filter(array_map('trim', explode(',', (string) $plan['subscription_services'])))) : array();
                                $sub_more_inline = 0;
                                $sub_names = array();
                                foreach ($sub_names_raw as $n) {
                                    if (preg_match('/^\\+?\\s*(\\d+)\\s*more\\s*$/i', $n, $m)) {
                                        $sub_more_inline = max($sub_more_inline, intval($m[1]));
                                        continue;
                                    }
                                    $sub_names[] = $n;
                                }
                                $sub_total_items = count($sub_names);
                                $sub_show = min(2, $sub_total_items);
                                $sub_remaining = max(0, $sub_total_items - $sub_show);
                                $sub_more_display = ($sub_more_inline > 0) ? $sub_more_inline : $sub_remaining;
                                ?>
                                <?php if ($sub_total_items > 0) : ?>
                                    <div class="ppw-icons-row">
                                        <?php for ($i = 0; $i < $sub_show; $i++) : ?>
                                            <span class="ppw-app-icon">
                                                <span class="ppw-app-initials"><?php echo esc_html(strtoupper(substr($sub_names[$i], 0, 2))); ?></span>
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
                            <button type="button" class="ppw-more-details details-button" data-open-tab="tv" data-plan="<?php echo esc_attr($plan['plan_name']); ?>" data-index="<?php echo esc_attr($index); ?>">More Details</button>
                            <a href="<?php echo esc_url($plan['button_link']); ?>" class="plan-button"><?php echo esc_html($plan['button_text']); ?></a>
                        </div>

                        <div class="plan-details-content" style="display: none;" data-plan-index="<?php echo esc_attr($index); ?>">
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
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div id="pricing-plan-modal-<?php echo esc_attr($slider_uid); ?>" class="pricing-plan-modal" style="display: none;">
    <div class="pricing-plan-modal-overlay"></div>
    <div class="pricing-plan-modal-content">
        <div class="pricing-plan-modal-header">
            <h3 class="pricing-plan-modal-title"></h3>
            <button class="pricing-plan-modal-close">&times;</button>
        </div>
        <div class="pricing-plan-modal-body"></div>
    </div>
</div>
