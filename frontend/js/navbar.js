// Navbar mobile menu toggle and dropdown

document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.querySelector('.navbar-menu');
    const links = document.querySelector('.navbar-links');
    const actions = document.querySelector('.navbar-actions');
    const dropdown = document.querySelector('.navbar-dropdown');

    if (menuBtn && links) {
        menuBtn.addEventListener('click', function(e) {
            links.classList.toggle('active');
            menuBtn.classList.toggle('active');
            document.body.classList.toggle('menu-open');
            // Toggle dropdown for menu icon
            if (dropdown) {
                actions.classList.toggle('show-dropdown');
            }
            e.stopPropagation();
        });
    }

    // Also show dropdown on lang or search click
    document.querySelectorAll('.navbar-lang, .navbar-search').forEach(el => {
        el.addEventListener('click', function(e) {
            if (dropdown) {
                actions.classList.toggle('show-dropdown');
            }
            e.stopPropagation();
        });
    });

    // Hide dropdown when clicking outside
    document.addEventListener('click', function(e) {
        if (actions) {
            actions.classList.remove('show-dropdown');
        }
    });

    // Prevent dropdown from closing when clicking inside
    if (dropdown) {
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }

    // Get all About Us dropdowns (in case you have more than one)
    document.querySelectorAll('.navbar-dropdown-parent').forEach(function(parent) {
        const aboutUsDropdown = parent.querySelector('.aboutus-dropdown');
        const aboutUsTrigger = parent.querySelector('.aboutus-trigger');
        const moreAboutUs = parent.querySelector('.more-aboutus');

        if (aboutUsDropdown && aboutUsTrigger && moreAboutUs) {
            // Show More About Us when hovering About Us in the list
            aboutUsTrigger.addEventListener('mouseenter', function() {
                moreAboutUs.classList.add('show');
            });
            aboutUsTrigger.addEventListener('mouseleave', function() {
                // Use a timeout to allow moving to the right column
                setTimeout(function() {
                    if (!moreAboutUs.matches(':hover')) {
                        moreAboutUs.classList.remove('show');
                    }
                }, 100);
            });
            moreAboutUs.addEventListener('mouseenter', function() {
                moreAboutUs.classList.add('show');
            });
            moreAboutUs.addEventListener('mouseleave', function() {
                moreAboutUs.classList.remove('show');
            });
        }
    });
});