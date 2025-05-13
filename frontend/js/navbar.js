// Navbar mobile menu toggle and dropdown

document.addEventListener('DOMContentLoaded', function() {
    const menuBtn = document.querySelector('.navbar-menu');
    const links = document.querySelector('.navbar-links');
    const actions = document.querySelector('.navbar-actions');
    const dropdown = document.querySelector('.navbar-dropdown');

    if (menuBtn && links) {
        menuBtn.addEventListener('click', function(e) {
            links.classList.toggle('active');
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
}); 