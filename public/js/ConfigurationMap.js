// Initialize the map
const map = L.map('map').setView([-7.047736112975044, 107.58393418897262], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Add GeoJSON data to the map
function addGeoJsonToMap(faskesData) {
    L.geoJSON(faskesData, {
        onEachFeature: function (feature, layer) {
            if (feature.properties) {
                let popupContent = `
                    <h4>${feature.properties.alamat}</h4>
                    <p><strong>Kode Desa:</strong> ${feature.properties.kode_desa}</p>
                    <p><strong>No Telp:</strong> ${feature.properties.no_telp}</p>
                `;
                layer.bindPopup(popupContent);
            }
        }
    }).addTo(map);
}

// Update the Faskes data in the sidemenu
function updateFaskesData(faskesData) {
    const faskesContainer = document.getElementById('faskes-data');
    faskesContainer.innerHTML = '';

    if (faskesData.features && faskesData.features.length > 0) {
        const listGroup = document.createElement('div');
        listGroup.className = 'list-group point-list-view';
        listGroup.id = 'list-group-container';
        listGroup.style.maxHeight = '400px';
        listGroup.style.overflowY = 'auto';

        faskesData.features.forEach(faskes => {
            const listItem = document.createElement('a');
            listItem.href = '#';
            listItem.className = 'list-group-item point-item';

            const heading = document.createElement('h4');
            heading.className = 'list-group-item-heading';
            heading.textContent = faskes.properties.nama_faskes || 'Nama tidak tersedia';

            const coordinates = document.createElement('p');
            coordinates.className = 'list-group-item-text';
            coordinates.textContent = faskes.geometry.coordinates.join(', ');

            const address = document.createElement('p');
            address.className = 'list-group-item-text';
            address.textContent = faskes.properties.alamat || 'Alamat tidak tersedia';

            const phone = document.createElement('p');
            phone.className = 'list-group-item-text';
            phone.textContent = faskes.properties.no_telp || 'Telepon tidak tersedia';

            listItem.appendChild(heading);
            listItem.appendChild(coordinates);
            listItem.appendChild(address);
            listItem.appendChild(phone);

            listGroup.appendChild(listItem);
        });

        faskesContainer.appendChild(listGroup);

        // Add event listeners to the list items
        const items = listGroup.getElementsByClassName('list-group-item');
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
                    latlng = latlng.trim().replace(/\s+/g, '');
                    const latlngArray = latlng.split(',');
                    if (latlngArray.length >= 2) {
                        const longitude = parseFloat(latlngArray[0]);
                        const latitude = parseFloat(latlngArray[1]);
                        if (!isNaN(latitude) && !isNaN(longitude)) {
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
        faskesContainer.textContent = 'No data available.';
    }
}

// Fetch data from the server and add it to the map
function fetchDataAndAddToMap(kodeKategori = 'all') {
    let url = '/home?format=geojson';
    if (kodeKategori !== 'all') {
        url = `/home/filterByKodeKategori/${kodeKategori}?format=geojson`;
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Clear existing layers
            map.eachLayer(function (layer) {
                if (layer instanceof L.GeoJSON) {
                    map.removeLayer(layer);
                }
            });
            addGeoJsonToMap(data);
            updateFaskesData(data);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

document.addEventListener('DOMContentLoaded', function () {
    fetchDataAndAddToMap();

    // Add event listeners to filter buttons
    document.querySelectorAll('.filter-btn').forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const kodeKategori = this.getAttribute('data-kode-kategori');
            fetchDataAndAddToMap(kodeKategori);
        });
    });
});

// Fungsi untuk menyisipkan elemen ke dalam kontrol Leaflet
function injectCustomDiv() {
    // Cari elemen dengan kelas 'leaflet-top leaflet-left'
    var leafletTopLeft = document.querySelector('.leaflet-top.leaflet-left');

    const element = document.querySelector('.leaflet-control-zoom');
    if (element) {
        element.id = 'Myzoom';
    }
    if (leafletTopLeft) {
        var sidemenu = document.getElementById('sidemenu-container');
        var searchBox = document.getElementById('search-box');
        var zoomControl = document.getElementById('Myzoom');

        if (leafletTopLeft && sidemenu) {
            leafletTopLeft.appendChild(searchBox); // Sisipkan ke Leaflet control container
            leafletTopLeft.appendChild(zoomControl); // Sisipkan ke Leaflet control container
            leafletTopLeft.appendChild(sidemenu); // Sisipkan ke Leaflet control container
        }
    }
}

// Panggil fungsi setelah peta dimuat
map.whenReady(injectCustomDiv);