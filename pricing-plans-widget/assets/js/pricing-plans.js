(function ($) {
    'use strict';

    function setActiveTab(modal, tabKey) {
        const $modal = $(modal);
        const $tabs = $modal.find('.ppw-modal-tab');
        const $panels = $modal.find('.ppw-modal-panel');

        let resolvedTab = tabKey;
        if (!resolvedTab || $tabs.filter(`[data-tab="${resolvedTab}"]`).length === 0) {
            const firstTab = $tabs.first().attr('data-tab');
            resolvedTab = firstTab || 'tv';
        }

        $tabs.removeClass('is-active');
        $tabs.filter(`[data-tab="${resolvedTab}"]`).addClass('is-active');

        $panels.removeClass('is-active');
        $panels.filter(`[data-tab-panel="${resolvedTab}"]`).addClass('is-active');
    }

    class PricingPlansSlider {
        constructor(element) {
            this.slider = element;
            this.$slider = $(element);
            this.track = this.slider.querySelector('.pricing-slider-track');
            this.$track = $(this.track);
            this.slides = this.track.querySelectorAll('.pricing-plan-slide');
            this.slideCount = this.slides.length;

            // Get settings from data attributes
            this.settings = {
                slidesToShowDesktop: parseInt(this.slider.dataset.slidesDesktop) || 4,
                slidesToShowTablet: parseInt(this.slider.dataset.slidesTablet) || 2,
                slidesToShowMobile: parseInt(this.slider.dataset.slidesMobile) || 1,
                autoplayDesktop: this.slider.dataset.autoplayDesktop === 'yes',
                autoplayTablet: this.slider.dataset.autoplayTablet === 'yes',
                autoplayMobile: this.slider.dataset.autoplayMobile === 'yes',
                autoplaySpeed: parseInt(this.slider.dataset.autoplaySpeed) || 3000,
                pauseOnHover: this.slider.dataset.pauseOnHover !== 'no'
            };

            this.currentSlide = 0;
            this.slidesToShow = this.getSlidesToShow();
            this.maxSlide = Math.max(0, this.slideCount - this.slidesToShow);
            this.autoplayTimer = null;
            this.isTransitioning = false;
            this.slideWidth = 0;
            this.resizeEventNamespace = this.slider.id ? `.pricingSlider.${this.slider.id}` : `.pricingSlider.${Math.random().toString(36).slice(2)}`;

            this.init();
        }

        init() {
            this.setupSlides();
            this.setupNavigation();
            this.setupDots();
            this.setupAutoplay();
            this.setupTouchEvents();
            this.handleResize();
            this.animateProgressBars();
            this.updateSlider();
        }

        getSlidesToShow() {
            const width = window.innerWidth;
            if (width >= 1200) {
                return Math.min(this.settings.slidesToShowDesktop, this.slideCount);
            } else if (width >= 768) {
                return Math.min(this.settings.slidesToShowTablet, this.slideCount);
            } else {
                return Math.min(this.settings.slidesToShowMobile, this.slideCount);
            }
        }

        setupSlides() {
            this.applySlideSizing();
        }

        applySlideSizing() {
            const containerWidth = this.slider.getBoundingClientRect().width;
            this.slidesToShow = this.getSlidesToShow();
            this.maxSlide = Math.max(0, this.slideCount - this.slidesToShow);

            if (!containerWidth || this.slidesToShow <= 0) {
                return;
            }

            const slideWidth = containerWidth / this.slidesToShow;
            this.slideWidth = slideWidth;

            this.slides.forEach(slide => {
                slide.style.flex = `0 0 ${slideWidth}px`;
                slide.style.width = `${slideWidth}px`;
            });
        }

        setupNavigation() {
            const wrapper = this.slider.closest('.pricing-plans-slider-wrapper');
            if (!wrapper) return;

            const prevBtn = wrapper.querySelector('.pricing-nav-prev');
            const nextBtn = wrapper.querySelector('.pricing-nav-next');

            if (prevBtn) {
                prevBtn.addEventListener('click', () => this.prevSlide());
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', () => this.nextSlide());
            }

            this.prevBtn = prevBtn;
            this.nextBtn = nextBtn;
        }

        setupDots() {
            const wrapper = this.slider.closest('.pricing-plans-slider-wrapper');
            if (!wrapper) return;
            
            const dotsContainer = wrapper.querySelector('.pricing-dots-indicator');
            if (dotsContainer) {
                const dots = dotsContainer.querySelectorAll('.pricing-dot');
                
                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        if (this.isTransitioning) return;
                        
                        this.currentSlide = index;
                        this.updateSlider();
                        this.updateDots();
                        this.updateCount();
                        
                        // Stop autoplay temporarily when user clicks dot
                        this.stopAutoplay();
                        setTimeout(() => {
                            if (this.shouldAutoplay() && this.slideCount > this.slidesToShow) {
                                this.startAutoplay();
                            }
                        }, 2000);
                    });
                });
                
                this.dots = dots;
                this.dotsContainer = dotsContainer;
            }
            
            // Setup count indicator
            const countContainer = wrapper.querySelector('.pricing-count-indicator');
            if (countContainer) {
                this.countContainer = countContainer;
                this.countCurrent = countContainer.querySelector('.pricing-count-current');
                this.countTotal = countContainer.querySelector('.pricing-count-total');
            }
        }

        setupTouchEvents() {
            let startX = 0;
            let startY = 0;
            let endX = 0;
            let endY = 0;
            let isDragging = false;
            let startTime = 0;

            this.slider.addEventListener('touchstart', (e) => {
                if (this.isTransitioning) return;
                
                startX = e.touches[0].clientX;
                startY = e.touches[0].clientY;
                startTime = Date.now();
                isDragging = false;

                // Stop autoplay during touch
                this.stopAutoplay();
            }, { passive: true });

            this.slider.addEventListener('touchmove', (e) => {
                if (this.isTransitioning) return;
                
                if (!isDragging) {
                    const currentX = e.touches[0].clientX;
                    const currentY = e.touches[0].clientY;
                    const deltaX = Math.abs(currentX - startX);
                    const deltaY = Math.abs(currentY - startY);

                    // Only start dragging if horizontal movement is greater
                    if (deltaX > deltaY && deltaX > 10) {
                        isDragging = true;
                        e.preventDefault(); // Prevent scrolling
                    }
                }
            }, { passive: false });

            this.slider.addEventListener('touchend', (e) => {
                if (this.isTransitioning) return;
                
                endX = e.changedTouches[0].clientX;
                endY = e.changedTouches[0].clientY;

                const deltaX = startX - endX;
                const deltaY = startY - endY;
                const deltaTime = Date.now() - startTime;
                const velocity = Math.abs(deltaX) / deltaTime;

                // Only handle horizontal swipes with sufficient distance or velocity
                if (Math.abs(deltaX) > Math.abs(deltaY) && 
                    (Math.abs(deltaX) > 50 || velocity > 0.2) && 
                    deltaTime < 800) {

                    if (deltaX > 0) {
                        // Swipe left - go to next slide (only if not at last)
                        if (this.currentSlide < this.maxSlide) {
                            this.currentSlide++;
                            this.updateSlider();
                        }
                    } else if (deltaX < 0) {
                        // Swipe right - go to previous slide (only if not at first)
                        if (this.currentSlide > 0) {
                            this.currentSlide--;
                            this.updateSlider();
                        }
                    }
                }

                // Restart autoplay after touch ends
                setTimeout(() => {
                    if (this.shouldAutoplay() && this.slideCount > this.slidesToShow) {
                        this.startAutoplay();
                    }
                }, 1500);

                isDragging = false;
            }, { passive: true });
        }

        setupAutoplay() {
            const shouldAutoplay = this.shouldAutoplay();

            if (shouldAutoplay && this.slideCount > this.slidesToShow) {
                this.startAutoplay();

                // Pause on hover (only if enabled)
                if (this.settings.pauseOnHover) {
                    this.$slider.on('mouseenter', () => this.stopAutoplay());
                    this.$slider.on('mouseleave', () => this.startAutoplay());
                }
            }
        }

        shouldAutoplay() {
            const width = window.innerWidth;
            if (width >= 1200) {
                return this.settings.autoplayDesktop;
            } else if (width >= 768) {
                return this.settings.autoplayTablet;
            } else {
                return this.settings.autoplayMobile;
            }
        }

        startAutoplay() {
            this.stopAutoplay();
            this.autoplayTimer = setInterval(() => {
                this.nextSlide(true);
            }, this.settings.autoplaySpeed);
        }

        stopAutoplay() {
            if (this.autoplayTimer) {
                clearInterval(this.autoplayTimer);
                this.autoplayTimer = null;
            }
        }

        handleResize() {
            $(window).on(`resize${this.resizeEventNamespace}`, debounce(() => {
                const newSlidesToShow = this.getSlidesToShow();
                const shouldAutoplay = this.shouldAutoplay();

                if (newSlidesToShow !== this.slidesToShow) {
                    this.slidesToShow = newSlidesToShow;
                    this.maxSlide = Math.max(0, this.slideCount - this.slidesToShow);
                    this.currentSlide = Math.min(this.currentSlide, this.maxSlide);
                    this.applySlideSizing();
                    this.updateSlider(true);
                } else {
                    this.applySlideSizing();
                    this.updateSlider(true);
                }

                // Handle autoplay changes on resize
                if (shouldAutoplay && this.slideCount > this.slidesToShow && !this.autoplayTimer) {
                    this.startAutoplay();
                } else if (!shouldAutoplay && this.autoplayTimer) {
                    this.stopAutoplay();
                }
            }, 250));
        }

        prevSlide() {
            if (this.isTransitioning || this.slideCount <= this.slidesToShow) return;
            if (this.currentSlide > 0) {
                this.currentSlide--;
            }
            this.updateSlider();
        }

        nextSlide(loop = false) {
            if (this.isTransitioning || this.slideCount <= this.slidesToShow) return;
            if (this.currentSlide < this.maxSlide) {
                this.currentSlide++;
            } else if (loop) {
                this.currentSlide = 0;
            }
            this.updateSlider();
        }

        updateSlider(skipTransition = false) {
            this.applySlideSizing();

            if (this.slideCount <= this.slidesToShow) {
                // No need to slide if all items fit
                this.track.style.transform = 'translate3d(0px, 0px, 0px)';
                this.updateNavButtons();
                this.updateDots();
                this.updateCount();
                return;
            }

            const translateX = -(this.currentSlide * this.slideWidth);

            if (skipTransition) {
                const previousTransition = this.track.style.transition;
                this.track.style.transition = 'none';
                this.track.style.transform = `translate3d(${translateX}px, 0px, 0px)`;
                this.track.getBoundingClientRect();
                this.track.style.transition = previousTransition;
                this.isTransitioning = false;
            } else {
                this.isTransitioning = true;
                this.track.style.transform = `translate3d(${translateX}px, 0px, 0px)`;
                setTimeout(() => {
                    this.isTransitioning = false;
                }, 500);
            }

            this.updateNavButtons();
            this.updateDots();
            this.updateCount();
        }

        updateNavButtons() {
            if (this.prevBtn) {
                this.prevBtn.disabled = this.slideCount <= this.slidesToShow || this.currentSlide === 0;
                this.prevBtn.style.opacity = this.prevBtn.disabled ? '0.4' : '1';
            }

            if (this.nextBtn) {
                this.nextBtn.disabled = this.slideCount <= this.slidesToShow || this.currentSlide >= this.maxSlide;
                this.nextBtn.style.opacity = this.nextBtn.disabled ? '0.4' : '1';
            }
        }

        updateDots() {
            if (!this.dots) return;
            
            this.dots.forEach((dot, index) => {
                if (index === this.currentSlide) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }
        
        updateCount() {
            if (!this.countCurrent) return;
            
            // Update current slide number (1-based)
            this.countCurrent.textContent = this.currentSlide + 1;
        }

        animateProgressBars() {
            setTimeout(() => {
                const meters = this.slider.querySelectorAll('.ppw-meter-fill');
                meters.forEach(meter => {
                    const width = meter.style.width;
                    meter.style.width = '0%';
                    meter.getBoundingClientRect();
                    meter.style.width = width;
                });
            }, 250);
        }

        destroy() {
            this.stopAutoplay();
            $(window).off(`resize${this.resizeEventNamespace}`);
            this.$slider.off('mouseenter mouseleave');
        }
    }

    // Debounce function
    function debounce(func, wait, immediate) {
        let timeout;
        return function executedFunction() {
            const context = this;
            const args = arguments;
            const later = function () {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    }

    // Initialize sliders
    function initPricingSliders() {
        const sliders = document.querySelectorAll('.pricing-plans-slider');
        sliders.forEach(slider => {
            if (!slider.pricingSliderInstance) {
                slider.pricingSliderInstance = new PricingPlansSlider(slider);
            }
        });
    }

    // Initialize on document ready
    $(document).ready(function () {
        initPricingSliders();
    });

    // Initialize for Elementor editor
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/pricing-plans-slider.default', function ($scope) {
            const slider = $scope.find('.pricing-plans-slider')[0];
            if (slider && !slider.pricingSliderInstance) {
                slider.pricingSliderInstance = new PricingPlansSlider(slider);
            }
        });
    });

    // Handle details button clicks
    $(document).on('click', '.details-button', function (e) {
        e.preventDefault();

        // Check if this is a button (modal) or link (external)
        if ($(this).is('button')) {
            const planIndex = $(this).data('index');
            const planName = $(this).data('plan');
            const openTab = $(this).data('open-tab');
            const slider = $(this).closest('.pricing-plans-slider-wrapper');
            const modalId = slider.find('.pricing-plans-slider').attr('id').replace('pricing-slider-', 'pricing-plan-modal-');
            const modal = $('#' + modalId);

            if (modal.length) {
                // Find the detailed content
                const detailsContent = slider.find(`[data-plan-index="${planIndex}"]`);

                if (detailsContent.length) {
                    // Set modal title
                    modal.find('.pricing-plan-modal-title').text(planName);

                    // Set modal content
                    modal.find('.pricing-plan-modal-body').html(detailsContent.html());
                    setActiveTab(modal, openTab);

                    // Show modal
                    modal.fadeIn(300);
                    $('body').addClass('modal-open');
                } else {
                    // Fallback: show basic plan info
                    const card = $(this).closest('.pricing-plan-card');
                    const planName = card.find('.ppw-plan-title').text() || card.find('.plan-name').text();
                    const internetSpeed = card.find('.ppw-section').first().find('.ppw-section-value').first().text() || card.find('.feature-value strong').first().text();
                    const tvChannels = card.find('.ppw-section').eq(1).find('.ppw-section-value').first().text() || card.find('.feature-value').eq(1).text();
                    const price = card.find('.ppw-price-row').text() || card.find('.plan-price').text();

                    const basicInfo = `
                        <div class="plan-details-summary">
                            <h4>Plan Summary:</h4>
                            <ul>
                                <li><strong>Internet:</strong> <span>${internetSpeed}</span></li>
                                <li><strong>TV:</strong> <span>${tvChannels}</span></li>
                                <li><strong>Price:</strong> <span>${price}</span></li>
                            </ul>
                        </div>
                    `;

                    modal.find('.pricing-plan-modal-title').text(planName);
                    modal.find('.pricing-plan-modal-body').html(basicInfo);
                    modal.fadeIn(300);
                    $('body').addClass('modal-open');
                }
            }
        }
    });

    $(document).on('click', '.ppw-modal-tab', function (e) {
        e.preventDefault();
        const tabKey = $(this).data('tab');
        const modal = $(this).closest('.pricing-plan-modal');
        if (modal.length) {
            setActiveTab(modal, tabKey);
        }
    });

    // Handle modal close
    $(document).on('click', '.pricing-plan-modal-close, .pricing-plan-modal-overlay', function (e) {
        e.preventDefault();
        const modal = $(this).closest('.pricing-plan-modal');
        modal.fadeOut(300);
        $('body').removeClass('modal-open');
    });

    // Close modal on escape key
    $(document).on('keydown', function (e) {
        if (e.keyCode === 27) { // Escape key
            $('.pricing-plan-modal:visible').fadeOut(300);
            $('body').removeClass('modal-open');
        }
    });

})(jQuery);
