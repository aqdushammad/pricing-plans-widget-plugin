jQuery(document).ready(function($) {
    'use strict';
    
    // Admin JavaScript for Pricing Plans Widget
    
    // Auto-dismiss notices after 5 seconds
    setTimeout(function() {
        $('.notice.is-dismissible').fadeOut();
    }, 5000);
    
    // Add syntax highlighting to custom CSS textarea (basic)
    $('#custom_css').on('input', function() {
        // Basic validation - check for common CSS syntax errors
        var css = $(this).val();
        var lines = css.split('\n');
        var errors = [];
        
        lines.forEach(function(line, index) {
            // Check for unclosed braces (basic check)
            var openBraces = (line.match(/\{/g) || []).length;
            var closeBraces = (line.match(/\}/g) || []).length;
            
            if (openBraces > closeBraces) {
                // This is a very basic check - in real scenarios you'd want a proper CSS parser
            }
        });
    });
    
    // Form validation
    $('form').on('submit', function(e) {
        var isValid = true;
        var errors = [];
        
        // Validate slide numbers
        var desktopSlides = parseInt($('#default_slides_desktop').val());
        var tabletSlides = parseInt($('#default_slides_tablet').val());
        var mobileSlides = parseInt($('#default_slides_mobile').val());
        
        if (desktopSlides < 1 || desktopSlides > 8) {
            errors.push('Desktop slides must be between 1 and 8');
            isValid = false;
        }
        
        if (tabletSlides < 1 || tabletSlides > 4) {
            errors.push('Tablet slides must be between 1 and 4');
            isValid = false;
        }
        
        if (mobileSlides < 1 || mobileSlides > 2) {
            errors.push('Mobile slides must be between 1 and 2');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            alert('Please fix the following errors:\n\n' + errors.join('\n'));
        }
    });
    
    // Add tooltips to form fields
    $('[data-tooltip]').each(function() {
        $(this).attr('title', $(this).data('tooltip'));
    });
    
    // Collapsible sections in sidebar
    $('.postbox h3').on('click', function() {
        $(this).next('.inside').slideToggle();
        $(this).toggleClass('closed');
    });
    
    // Copy shortcode to clipboard
    $(document).on('click', 'code', function() {
        var text = $(this).text();
        
        // Create temporary textarea to copy text
        var $temp = $('<textarea>');
        $('body').append($temp);
        $temp.val(text).select();
        document.execCommand('copy');
        $temp.remove();
        
        // Show feedback
        var $this = $(this);
        var originalBg = $this.css('background-color');
        $this.css('background-color', '#00a32a');
        
        setTimeout(function() {
            $this.css('background-color', originalBg);
        }, 200);
        
        // Show tooltip
        $this.attr('title', 'Copied to clipboard!');
        setTimeout(function() {
            $this.removeAttr('title');
        }, 2000);
    });
});