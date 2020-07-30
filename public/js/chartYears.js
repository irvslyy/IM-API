var Bulan = new Array([0]);
var Zero = new Array([0]);

      $(document).ready(function(){
        $.get(url, function(response){
          response.forEach(function(data){
         
              Bulan.push(data.januari);
              Bulan.push(data.febuari);
              Bulan.push(data.maret);
              Bulan.push(data.april);
              Bulan.push(data.mei);
              Bulan.push(data.juni);
              Bulan.push(data.juli);
              Bulan.push(data.agustus);
              Bulan.push(data.september);
              Bulan.push(data.oktober);
              Bulan.push(data.november);
              Bulan.push(data.desember)
          });
          var ctx = document.getElementById("canvas").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels:  ['0','Jan', 'Feb', 'Mar', 'April', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'],
                    fill: false,

                    datasets: [
                      {
                        label: 'Trashold',
                        fill: false,
                        borderColor: ['rgba(255, 99, 132, 1)',],
                        borderDash: [5, 5],
                        data: [80,80,80,80,80,80,80,80,80,80,80,80,80],
                        borderWidth: 1
                      },
                    {
                      label: 'all',
                      data: Bulan,
                      //Bulan
                      // [0,30,22,10,45,10,22,80,50,20,40,33,20,10],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                      ],
                      borderColor: [
                          'rgba(255, 99, 132, 1)',
                      ],
                      borderWidth: 3
                    },
                    {
                      label: 'Trashold',
                      fill: false,
                      borderColor: ['rgba(255, 99, 132, 1)',],
                      borderDash: [5, 5],
                      data: [30,30,30,30,30,30,30,30,30,30,30,30,30],
                      borderWidth: 1
                    }]
                },

                options: {
                  responsive: true,
                    scales: { 

                        yAxes: [{
                            ticks: {
                             min: 0,
                             max: 100,
                             callback: function(value){
                               return value + "%"
                               
                              }
                            }
                        }]

                    }
                }
            });
        });
      });



