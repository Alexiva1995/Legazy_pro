<div id="chart"></div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
                   
        var options = {
          series: [{
            name: "Numero de ventas",
            data: [10, 41, 35, 51, 49, 62, 69, 91, 148, 148, 148, 148]
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: true,
        },
        
        colors: ['#D6A83E'],

        stroke: {
          curve: 'straight'
        },
        title: {
          text: '',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#1B1B1B', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
    </script>