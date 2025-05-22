document.addEventListener('DOMContentLoaded', function() {
    const storyContent = document.querySelector('.story-content');
    const onThisPageList = document.querySelector('.on-this-page ul');

    if (!storyContent || !onThisPageList) {
        return; // Exit if containers are not found
    }

    // Clear existing static list items
    onThisPageList.innerHTML = '';

    // Find headings (h2, h3, etc.) in the story content
    const headings = storyContent.querySelectorAll('h2, h3, h4, h5, h6');

    headings.forEach((heading, index) => {
        // Generate a unique ID for the heading
        const id = 'section-' + index + '-' + heading.textContent.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
        heading.id = id; // Add the ID to the heading

        // Create a list item and link for the "On this page" section
        const listItem = document.createElement('li');
        const link = document.createElement('a');
        link.href = '#' + id;
        link.textContent = heading.textContent;

        // Add smooth scroll behavior to the link
        link.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default jump
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start' // Scroll to the top of the element
                });
            }
        });

        listItem.appendChild(link);
        onThisPageList.appendChild(listItem);
    });
});