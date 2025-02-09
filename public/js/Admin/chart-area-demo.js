// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Fetch data from the server and add it to the map
function fetchDataAndAddToMap(kodeKategori = 'all') {
  let url = '/home?format=geojson';
  if (kodeKategori !== 'all') {
      url = `/home/filterByKodeKategori/${kodeKategori}?format=geojson`;
  }

  fetch(url)
      .then(response => response.json())
      .then(data => {
          console.log('Data from the server:', data);
         
          createChart(data); // Create chart with the fetched data
         
      })
      .catch(error => {
          console.error('Error fetching data:', error);
      });
}

fetchDataAndAddToMap();

function createChart(faskesData){
  const labels = faskesData.features.map(faskes => faskes.properties.kode_kategori);
  const data = faskesData.features.map(faskes => faskes.properties.kode_desa); // Example data, modify as needed

console.log('Labels:', labels);
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: data,
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: labels,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
}