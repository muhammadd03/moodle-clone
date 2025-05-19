// Testimonials Slider Implementation
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.testimonial-slider');
    const cards = document.querySelector('.testimonial-cards');
    const prevBtn = document.querySelector('.nav-arrow.prev');
    const nextBtn = document.querySelector('.nav-arrow.next');
    const dots = document.querySelectorAll('.testimonial-pagination .dot');

    let currentSlide = 0;
    const totalSlides = document.querySelectorAll('.testimonial-card').length;
    let slidesToShow = getSlidesToShow();

    // Initialize
    updateSlider();

    // Get number of slides to show based on screen width
    function getSlidesToShow() {
        if (window.innerWidth > 1024) return 3;
        if (window.innerWidth > 768) return 2;
        return 1;
    }

    // Calculate total possible positions
    function getTotalPositions() {
        return Math.max(0, totalSlides - slidesToShow);
    }

    // Calculate the width to move for each slide transition
    function calculateTestimonialMoveWidth() {
        const testimonialCards = document.querySelectorAll('.testimonial-card');
        if (testimonialCards.length === 0) return 0;

        // Get the width of a single card
        const card = testimonialCards[0];
        const cardWidth = card.offsetWidth; // Includes padding and border if any

        // Get the gap from the CSS of the .testimonial-cards flex container
        const computedStyle = window.getComputedStyle(cards);
        // Ensure gap is treated as a number (it's usually in px)
        const gap = parseFloat(computedStyle.gap);

        // The amount to move is the width of one card plus the gap
        // If gap is 'normal', parseFloat might return NaN. Handle this case.
        if (isNaN(gap)) {
             // Fallback or handle 'normal' gap if necessary, e.g., assume a default gap
             // For now, let's assume a default if computedStyle.gap is not a standard pixel value
             // A more robust solution might involve checking margin-right if gap is not used
             const cardStyle = window.getComputedStyle(card);
             const marginRight = parseFloat(cardStyle.marginRight);
             return cardWidth + (isNaN(marginRight) ? 0 : marginRight); // Use margin if gap is not numeric
        }

        return cardWidth + gap;
    }


    // Event Listeners
    prevBtn.addEventListener('click', () => {
        currentSlide = Math.max(currentSlide - 1, 0);
        updateSlider();
    });

    nextBtn.addEventListener('click', () => {
        // The check is already in updateSlider by disabling the button,
        // but this ensures the index doesn't go past the max.
        currentSlide = Math.min(currentSlide + 1, getTotalPositions());
        updateSlider();
    });

    dots.forEach((dot, index) => {
        // Only add click listeners to dots that represent valid positions
        // The number of dots should correspond to the number of possible slide positions + 1 (for the first position)
        // If totalSlides=7, slidesToShow=3, getTotalPositions=4. Dots should be 0, 1, 2, 3, 4 (5 dots).
        // The number of dots should be getTotalPositions() + 1.
        if (index <= getTotalPositions()) {
            dot.style.display = 'block';
            dot.addEventListener('click', () => {
                currentSlide = index;
                updateSlider();
            });
        } else {
            dot.style.display = 'none';
        }
    });


    // Update slider position and states
    function updateSlider() {
        // Calculate the pixel offset based on card width and gap
        const moveWidth = calculateTestimonialMoveWidth();
        const offset = -currentSlide * moveWidth;

        // Apply transform using pixels
        cards.style.transform = `translateX(${offset}px)`;

        // Update dots visibility and active state
        dots.forEach((dot, index) => {
             // The number of dots should be getTotalPositions() + 1
            if (index <= getTotalPositions()) {
                dot.classList.toggle('active', index === currentSlide);
                dot.style.display = 'block';
            } else {
                dot.style.display = 'none';
            }
        });

        // Update button states
        prevBtn.disabled = currentSlide === 0;
        nextBtn.disabled = currentSlide >= getTotalPositions();

        // Update button opacity
        prevBtn.style.opacity = currentSlide === 0 ? '0.5' : '1';
        nextBtn.style.opacity = currentSlide >= getTotalPositions() ? '0.5' : '1';
    }

    // Auto-advance slides every 5 seconds
    let autoSlideInterval = setInterval(autoAdvance, 5000);

    function autoAdvance() {
        if (currentSlide < getTotalPositions()) {
            currentSlide++;
        } else {
            currentSlide = 0; // Loop back to the start
        }
        updateSlider();
    }

    // Pause auto-advance on hover
    slider.addEventListener('mouseenter', () => {
        clearInterval(autoSlideInterval);
    });

    // Resume auto-advance when mouse leaves
    slider.addEventListener('mouseleave', () => {
        autoSlideInterval = setInterval(autoAdvance, 5000);
    });

    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            const newSlidesToShow = getSlidesToShow();
            // Only update if the number of slides shown changes
            if (newSlidesToShow !== slidesToShow) {
                slidesToShow = newSlidesToShow;
                 // Recalculate total positions based on new slidesToShow
                const newTotalPositions = getTotalPositions();
                // Ensure currentSlide is not beyond the new max position
                currentSlide = Math.min(currentSlide, newTotalPositions);
                updateSlider(); // Update slider with new settings
            } else {
                 // If slidesToShow didn't change, but width did, recalculate move width and update
                 updateSlider();
            }
        }, 250); // Debounce resize
    });
});

    const stats = [
        { id: 'userCount', target: 444000000, duration: 2000 },
        { id: 'courseCount', target: 3100000000, duration: 2500 }, // Using 3.1 Billion
        { id: 'languageCount', target: 50000000, duration: 1800 },
        { id: 'siteCount', target: 148000, duration: 1500 }
    ];

    function animateCount(id, target, duration) {
        const element = document.getElementById(id);
        if (!element) return;

        const start = 0;
        const increment = target / (duration / 10); // Calculate increment based on duration and update interval (10ms)
        let current = start;
        const plusSign = element.nextElementSibling; // Get the '+' span

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }

            // Format the number with commas and handle large numbers
            let formattedNumber;
            if (target >= 1000000000) { // Billions
                 formattedNumber = (current / 1000000000).toFixed(1) + ' Billion';
                 if (current === target) formattedNumber = (target / 1000000000) + ' Billion'; // Ensure exact target for billions
            } else if (target >= 1000000) { // Millions
                 formattedNumber = Math.round(current).toLocaleString();
            } else { // Thousands or less
                 formattedNumber = Math.round(current).toLocaleString();
            }


            element.textContent = formattedNumber;

            // Re-append the '+' sign if it was removed by textContent update
            if (plusSign && element.nextElementSibling !== plusSign) {
                 element.parentNode.appendChild(plusSign);
            }

        }, 10); // Update every 10ms
    }

    // Trigger animation when the section is visible (optional, but better performance)
    const statisticsSection = document.querySelector('.statistics-section');
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                stats.forEach(stat => {
                    animateCount(stat.id, stat.target, stat.duration);
                });
                observer.unobserve(entry.target); // Stop observing once animated
            }
        });
    }, { threshold: 0.5 }); // Trigger when 50% of the section is visible

    if (statisticsSection) {
        observer.observe(statisticsSection);
    } else {
        // Fallback: Run animation immediately if IntersectionObserver is not supported or section not found
        stats.forEach(stat => {
            animateCount(stat.id, stat.target, stat.duration);
        });
    }
//});

// Logo Slider Implementation
document.addEventListener('DOMContentLoaded', function() {
    const logoSliderContainer = document.querySelector('.logo-slider-container');
    const logoSlider = document.querySelector('.logo-slider');
    const logoSlides = document.querySelectorAll('.logo-slide');
    const logoPrevBtn = document.querySelector('.logo-slider-container .slider-nav.prev');
    const logoNextBtn = document.querySelector('.logo-slider-container .slider-nav.next');

    if (logoSlider && logoSlides.length > 0 && logoPrevBtn && logoNextBtn) {
        let currentLogoIndex = 0;
        const logosToShow = 4; // Number of logos to show at once
        const totalLogos = logoSlides.length;
        // maxLogoIndex is the index of the first logo in the last possible view
        let maxLogoIndex = totalLogos - logosToShow;

        // Calculate the width of a single slide including the gap
        // This function needs to be called on load and resize
        function calculateSlideMoveWidth() {
             if (logoSlides.length === 0) return 0;
             // Get the width of the first slide (which includes its flex-basis and padding)
             const slideWidth = logoSlides[0].offsetWidth;
             // Get the gap from the CSS (assuming it's consistent)
             // A reliable way is to get the computed style of the gap
             const computedStyle = window.getComputedStyle(logoSlider);
             const gap = parseFloat(computedStyle.gap); // gap is in px
             // The amount to move is the width of one slide plus the gap
             return slideWidth + gap;
        }

        let slideMoveWidth = 0; // Initialize slideMoveWidth

        function updateLogoSlider() {
            // Recalculate slideMoveWidth and maxLogoIndex on update
            slideMoveWidth = calculateSlideMoveWidth();
            // Recalculate maxLogoIndex based on current logosToShow
            // We need to determine logosToShow dynamically based on screen size, similar to the testimonial slider
            const currentLogosToShow = getLogosToShow(); // Implement this function
            maxLogoIndex = totalLogos - currentLogosToShow;
             // Ensure currentLogoIndex doesn't exceed the new maxLogoIndex after resize
            currentLogoIndex = Math.min(currentLogoIndex, maxLogoIndex);


            const offset = -currentLogoIndex * slideMoveWidth;
            logoSlider.style.transform = `translateX(${offset}px)`;

            // Update button states
            logoPrevBtn.disabled = currentLogoIndex <= 0; // Disable at the very start
            logoNextBtn.disabled = currentLogoIndex >= maxLogoIndex; // Disable at the very end

            // Update button opacity (optional, based on CSS)
            logoPrevBtn.style.opacity = currentLogoIndex <= 0 ? '0.5' : '1';
            logoNextBtn.style.opacity = currentLogoIndex >= maxLogoIndex ? '0.5' : '1';
        }

        // Implement getLogosToShow function based on screen width
        function getLogosToShow() {
             if (window.innerWidth > 1024) return 4; // Show 4 on large screens
             if (window.innerWidth > 768) return 3; // Show 3 on medium screens
             if (window.innerWidth > 640) return 2; // Show 2 on small screens
             return 1; // Show 1 on extra small screens
        }


        // Initial setup
        updateLogoSlider();

        // Event Listeners
        logoPrevBtn.addEventListener('click', () => {
            currentLogoIndex = Math.max(currentLogoIndex - 1, 0);
            updateLogoSlider();
        });

        logoNextBtn.addEventListener('click', () => {
            currentLogoIndex = Math.min(currentLogoIndex + 1, maxLogoIndex);
            updateLogoSlider();
        });

        // Handle window resize for logo slider
        let logoResizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(logoResizeTimer);
            logoResizeTimer = setTimeout(() => {
                // Recalculate and update on resize
                updateLogoSlider();
            }, 250); // Debounce resize
        });

        // Optional: Auto-advance for logo slider (similar to testimonials)
        // let autoLogoSlideInterval = setInterval(autoAdvanceLogo, 5000);

        function autoAdvanceLogo() {
            if (currentLogoIndex < maxLogoIndex) {
                currentLogoIndex++;
            } else {
                currentLogoIndex = 0;
            }
            updateLogoSlider();
        }

        // Pause auto-advance on hover
        logoSliderContainer.addEventListener('mouseenter', () => {
            clearInterval(autoLogoSlideInterval);
        });

        // Resume auto-advance when mouse leaves
        logoSliderContainer.addEventListener('mouseleave', () => {
            autoLogoSlideInterval = setInterval(autoAdvanceLogo, 5000);
        });

    } else {
        console.error("Logo slider elements not found.");
    }
});