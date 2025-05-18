// // Smooth scroll for anchor links
// document.querySelectorAll('a[href^="#"]').forEach(anchor => {
//     anchor.addEventListener('click', function (e) {
//         e.preventDefault();
//         document.querySelector(this.getAttribute('href')).scrollIntoView({
//             behavior: 'smooth'
//         });
//     });
// });

// // Navbar scroll effect
// let lastScroll = 0;
// const navbar = document.querySelector('.navbar');

// window.addEventListener('scroll', () => {
//     const currentScroll = window.pageYOffset;
    
//     if (currentScroll > lastScroll && currentScroll > 100) {
//         navbar.style.transform = 'translateY(-100%)';
//     } else {
//         navbar.style.transform = 'translateY(0)';
//     }
    
//     lastScroll = currentScroll;
// });

// // Mobile menu toggle
// const menuIcon = document.querySelector('.menu-icon');
// const navLinks = document.querySelector('.nav-links');

// menuIcon.addEventListener('click', () => {
//     navLinks.classList.toggle('show');
// });

// // Add animation on scroll
// const observerOptions = {
//     threshold: 0.1
// };

// const observer = new IntersectionObserver((entries) => {
//     entries.forEach(entry => {
//         if (entry.isIntersecting) {
//             entry.target.classList.add('animate');
//             observer.unobserve(entry.target);
//         }
//     });
// }, observerOptions);

// document.querySelectorAll('.feature-card, .news-card').forEach(element => {
//     observer.observe(element);
// });

// // Dropdown hover effect enhancement
// document.querySelectorAll('.dropdown').forEach(dropdown => {
//     const dropdownContent = dropdown.querySelector('.dropdown-content');
//     let timeout;

//     dropdown.addEventListener('mouseenter', () => {
//         clearTimeout(timeout);
//         dropdownContent.style.display = 'block';
//         setTimeout(() => {
//             dropdownContent.style.opacity = '1';
//         }, 10);
//     });

//     dropdown.addEventListener('mouseleave', () => {
//         timeout = setTimeout(() => {
//             dropdownContent.style.opacity = '0';
//             setTimeout(() => {
//                 dropdownContent.style.display = 'none';
//             }, 200);
//         }, 200);
//     });
// });

// // Counter animation function
// function animateCounter(element, target, duration = 2000) {
//     let start = 0;
//     const increment = target / (duration / 16); // Update every 16ms (60fps)
//     const startTime = performance.now();

//     function update(currentTime) {
//         const elapsed = currentTime - startTime;
//         const progress = Math.min(elapsed / duration, 1);

//         start += increment;
//         const current = Math.min(Math.floor(start), target);
//         element.textContent = current.toLocaleString();

//         if (progress < 1) {
//             requestAnimationFrame(update);
//         }
//     }

//     requestAnimationFrame(update);
// }

// // Intersection Observer for counter animation
// // Use a single observer options object
// const unifiedObserverOptions = {
//     threshold: 0.5,
//     rootMargin: '0px'
// };

// // Use the same options for both observers
// const elementObserver = new IntersectionObserver((entries) => {
//     entries.forEach(entry => {
//         if (entry.isIntersecting) {
//             entry.target.classList.add('animate');
//             elementObserver.unobserve(entry.target);
//         }
//     });
// }, observerOptions);

// document.querySelectorAll('.feature-card, .news-card').forEach(element => {
//     elementObserver.observe(element);
// });

// const counterObserver = new IntersectionObserver((entries) => {
//     entries.forEach(entry => {
//         if (entry.isIntersecting) {
//             // Corrected values to match the screenshot
//             animateCounter(document.getElementById('userCount'), 444000000);
//             animateCounter(document.getElementById('courseCount'), 3100000000); // 3.1 Billion
//             animateCounter(document.getElementById('languageCount'), 50000000);
//             animateCounter(document.getElementById('siteCount'), 148000);
            
//             counterObserver.unobserve(entry.target);
//         }
//     });
// }, unifiedObserverOptions); // Use the unified options

// // Start observing the statistics section
// const statsSection = document.querySelector('.statistics-section');
// if (statsSection) {
//     counterObserver.observe(statsSection);
// }

// // Logo Slider
// const slider = document.querySelector('.logo-slider');
// const slides = document.querySelectorAll('.logo-slide');
// const prevBtn = document.querySelector('.slider-nav.prev');
// const nextBtn = document.querySelector('.slider-nav.next');

// let currentIndex = 0;
// const slidesToShow = 4;
// const slideWidth = 100 / slidesToShow;

// // Clone slides for infinite loop
// slides.forEach(slide => {
//     const clone = slide.cloneNode(true);
//     slider.appendChild(clone);
// });

// function moveSlides() {
//     slider.style.transform = `translateX(-${currentIndex * slideWidth}%)`;
// }

// function nextSlide() {
//     currentIndex++;
//     moveSlides();
    
//     if (currentIndex >= slides.length) {
//         setTimeout(() => {
//             slider.style.transition = 'none';
//             currentIndex = 0;
//             moveSlides();
//             setTimeout(() => {
//                 slider.style.transition = 'transform 0.5s ease';
//             }, 50);
//         }, 500);
//     }
// }

// // Testimonials Slider
// const testimonialsSlider = document.querySelector('.testimonials-slider');
// const testimonialCards = document.querySelectorAll('.testimonial-card');
// const dots = document.querySelectorAll('.dot');
// const prevButton = document.querySelector('.slider-prev');
// const nextButton = document.querySelector('.slider-next');

// let currentTestimonial = 0;
// const totalTestimonials = testimonialCards.length;

// function showTestimonial(index) {
//     testimonialsSlider.style.transform = `translateX(-${index * 100}%)`;
//     dots.forEach(dot => dot.classList.remove('active'));
//     dots[index].classList.add('active');
// }

// function nextTestimonial() {
//     currentTestimonial = (currentTestimonial + 1) % totalTestimonials;
//     showTestimonial(currentTestimonial);
// }

// function prevTestimonial() {
//     currentTestimonial = (currentTestimonial - 1 + totalTestimonials) % totalTestimonials;
//     showTestimonial(currentTestimonial);
// }

// // Auto slide every 2 seconds
// setInterval(nextTestimonial, 2000);

// // Event listeners for manual navigation
// prevButton.addEventListener('click', prevTestimonial);
// nextButton.addEventListener('click', nextTestimonial);

// dots.forEach((dot, index) => {
//     dot.addEventListener('click', () => {
//         currentTestimonial = index;
//         showTestimonial(currentTestimonial);
//     });
// });

// // Manual navigation
// prevBtn.addEventListener('click', () => {
//     if (currentIndex > 0) {
//         currentIndex--;
//         moveSlides();
//     }
// });

// nextBtn.addEventListener('click', nextSlide);
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
    
    // Event Listeners
    prevBtn.addEventListener('click', () => {
        currentSlide = Math.max(currentSlide - 1, 0);
        updateSlider();
    });
    
    nextBtn.addEventListener('click', () => {
        currentSlide = Math.min(currentSlide + 1, getTotalPositions());
        updateSlider();
    });
    
    dots.forEach((dot, index) => {
        // Only add click listeners to dots that represent valid positions
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
        // Calculate the exact width needed for each slide including gap
        const gap = 2; // 2rem gap as defined in CSS
        const slideWidth = 100 / slidesToShow;
        const offset = -currentSlide * (slideWidth + (gap * (slidesToShow - 1) / slidesToShow));
        
        // Apply transform with adjusted calculation
        cards.style.transform = `translateX(${offset}%)`;
        
        // Update dots
        dots.forEach((dot, index) => {
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
            currentSlide = 0;
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
            if (newSlidesToShow !== slidesToShow) {
                slidesToShow = newSlidesToShow;
                currentSlide = Math.min(currentSlide, getTotalPositions());
                updateSlider();
            }
        }, 250);
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