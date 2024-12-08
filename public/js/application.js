jQuery(window).resize(function() {
	var h = jQuery('#sidemenu').height(), offsetTop = 120;
	// Calculate the top offset
	jQuery('.point-list-view').css('height', (h - offsetTop));
}).resize();


jQuery(document).ready(function(){
	jQuery('.point-list-view').resize();


});

document.addEventListener('DOMContentLoaded', function() {
    const listGroupContainer = document.getElementById('list-group-container');
    if (listGroupContainer) {
        const items = listGroupContainer.getElementsByClassName('list-group-item');

        for (let item of items) {
            item.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent the default anchor behavior
                // Remove the active class from all items
                for (let i of items) {
                    i.classList.remove('active');
                }
                // Add the active class to the clicked item
                item.classList.add('active');
            });
        }
    } else {
        console.error('Element with ID "list-group-container" not found.');
    }
});