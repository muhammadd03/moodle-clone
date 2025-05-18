document.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth <= 576) {
        const footerCols = document.querySelectorAll('.footer-col');
        
        footerCols.forEach(col => {
            const heading = col.querySelector('h4');
            
            heading.addEventListener('click', () => {
                const isActive = col.classList.contains('active');
                
                // Close all other columns
                footerCols.forEach(otherCol => {
                    otherCol.classList.remove('active');
                });
                
                // Toggle current column
                if (!isActive) {
                    col.classList.add('active');
                }
            });
        });
    }
});