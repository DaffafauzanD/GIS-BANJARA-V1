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
        const dataCor= listGroupContainer.getElementsByClassName('list-group-text');

        for (let item of items) {
            item.addEventListener('click', function(event) {
                event.preventDefault(); 
                // Remove the active class from all items
                for (let i of items) {
                    i.classList.remove('active');
                }
                // Add the active class to the clicked item
                item.classList.add('active');

                const pElement = item.querySelector('p');

                if (pElement) {
                    let latlng = pElement.textContent;

                    // Membersihkan spasi ekstra
                    latlng = latlng.trim().replace(/\s+/g, '');

                    // Pisahkan latitude dan longitude
                    const latlngArray = latlng.split(',');

                    if (latlngArray.length >= 2) {
                        // Konversi ke tipe data Number
                        const longitude = parseFloat(latlngArray[0]);
                        const latitude = parseFloat(latlngArray[1]);

                        if (!isNaN(latitude) && !isNaN(longitude)) {
                            console.log(`Latitude: ${latitude}, Longitude: ${longitude}`);

                            map.setView([latitude, longitude], 40);
                        } else {
                            console.error('Latitude atau Longitude tidak valid.');
                        }
                    } else {
                        console.error('Format latlng tidak valid.');
                    }
                } else {
                    console.log('Elemen <p> tidak ditemukan di dalam item.');
                }
            });
        }
    } else {
        console.error('Element dengan ID "list-group-container" tidak ditemukan.');
    }
});