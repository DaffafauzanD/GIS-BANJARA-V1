jQuery(window).resize(function() {
    var h = jQuery('#sidemenu').height(), offsetTop = 120;
    // Calculate the top offset
    jQuery('.point-list-view').css('height', (h - offsetTop));
}).resize();

jQuery(document).ready(function(){
    jQuery('.point-list-view').resize();
});

document.addEventListener('DOMContentLoaded', function() {
    const filterBy = document.getElementById('filter-by');
    const filterButton = document.getElementById('filter-button');
    filterBy.style.display = 'none';

    filterButton.addEventListener('click', function() {
        if (filterBy.style.display == 'none'){
            filterBy.style.display = 'block'
        }else{
            filterBy.style.display = 'none'
        }
    });
});