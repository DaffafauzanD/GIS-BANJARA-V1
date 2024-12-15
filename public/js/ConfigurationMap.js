var map = L.map('map').setView([-7.047736112975044, 107.58393418897262], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// L.marker([-7.047736112975044,107.58393418897262]).addTo(map)
//     .bindPopup('A pretty CSS popup.<br> Easily customizable.')
//     .openPopup();


// URL endpoint API
const apiUrl = '/api/faskes';

// Mengambil data GeoJSON dan menambahkannya ke peta Leaflet
fetch(apiUrl)
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(geojsonData => {
        // Menambahkan GeoJSON ke peta
        L.geoJSON(geojsonData, {
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
    })
    .catch(error => {
        console.error('Error fetching GeoJSON:', error);
    });
