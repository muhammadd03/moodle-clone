// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded and parsed'); // Check if this logs

    // Dropdown functionality
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('mouseenter', function() {
            this.classList.add('active');
        });
        dropdown.addEventListener('mouseleave', function() {
            this.classList.remove('active');
        });
    });

    // Search functionality - Added a check if searchBtn exists
    const searchBtn = document.querySelector('.search-btn');
    if (searchBtn) { // <-- Added this check
        console.log('Search button found'); // Added for debugging
        let searchOpen = false;
        searchBtn.addEventListener('click', function() {
            if (!searchOpen) {
                const searchInput = document.createElement('input');
                searchInput.type = 'text';
                searchInput.className = 'search-input';
                searchInput.placeholder = 'Search...';
                this.parentNode.insertBefore(searchInput, this);
                searchOpen = true;
            } else {
                const searchInput = document.querySelector('.search-input');
                if (searchInput) {
                    searchInput.remove();
                    searchOpen = false;
                }
            }
        });
    } else {
        console.log('Search button not found on this page, skipping search functionality setup.'); // Added for debugging
    } // <-- Added this closing brace

    // Mobile menu functionality - Added a check if elements exist
    const menuBtn = document.querySelector('.menu-btn');
    const navLinks = document.querySelector('.nav-links');
    if (menuBtn && navLinks) { // <-- Added this check
        console.log('Mobile menu elements found'); // Added for debugging
        menuBtn.addEventListener('click', function() {
            navLinks.classList.toggle('show-mobile');
        });
    } else {
        console.log('Mobile menu elements not found on this page, skipping mobile menu setup.'); // Added for debugging
    }

    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Statistics animation
    const stats = document.querySelectorAll('.stat-number');
    const animateStats = () => {
        stats.forEach(stat => {
            const target = parseInt(stat.textContent.replace(/,/g, ''));
            let current = 0;
            const increment = target / 100;
            const duration = 2000; // 2 seconds
            const steps = 100;
            const stepTime = duration / steps;

            const counter = setInterval(() => {
                current += increment;
                if (current >= target) {
                    stat.textContent = target.toLocaleString();
                    clearInterval(counter);
                } else {
                    stat.textContent = Math.floor(current).toLocaleString();
                }
            }, stepTime);
        });
    };

    // Intersection Observer for statistics animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                // Trigger animation when visible
                animateStats();
            } else {
                entry.target.classList.remove('visible');
            }
        });
    }, {
        threshold: 0.1
    });
    
    const statsSection = document.querySelector('.statistics');
    if (statsSection) {
        observer.observe(statsSection);
    }

    // Add hover effect to value items
    const valueItems = document.querySelectorAll('.value-item');
    valueItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.transition = 'transform 0.3s ease';
        });
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // --- Consolidated JS for Scrolling Text on Page Scroll ---
    const scrollingTextElement = document.querySelector('.aboutus-page .scrolling-text p');

    if (scrollingTextElement) {
        console.log('Scrolling text element found:', scrollingTextElement); // Check if element is found

        function updateScrollingText() {
            // Get current vertical scroll position
            const scrollPosition = window.scrollY;

            // Calculate horizontal offset.
            // The '-0.5' factor determines the speed relative to vertical scroll.
            // Adjust this factor (-0.2, -1, etc.) to make the text scroll faster or slower.
            const horizontalOffset = scrollPosition * -0.5; // Example factor

            // Apply the transform
            scrollingTextElement.style.transform = 'translateX(' + horizontalOffset + 'px)';
             console.log('Scroll position:', scrollPosition, 'Calculated offset:', horizontalOffset, 'Applied transform:', scrollingTextElement.style.transform); // Check values on scroll
        }

        // Add the scroll event listener
        window.addEventListener('scroll', updateScrollingText);
        console.log('Scroll event listener added'); // Check if listener is added

        // Also call it once on load to set initial position
        updateScrollingText();
    } else {
        console.error('Scrolling text element NOT found!'); // Check if element selection failed
    }
    // --- End of Consolidated JS for Scrolling Text ---
});