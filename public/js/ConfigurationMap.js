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

// Fetch data from the embedded JavaScript variable and add it to the map
document.addEventListener('DOMContentLoaded', function () {
    if (typeof faskesData !== 'undefined') {
        addGeoJsonToMap(faskesData);
    } else {
        console.error('faskesData is not defined');
    }
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