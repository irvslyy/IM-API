var Bandung = new Array([0]);
var Malang = new Array([0]);
var Medan = new Array([0]);
var Surabaya = new Array([0]);
var Semarang = new Array([0])

$(document).ready(function() {
  $.get(url_malang, function (response) {
    response.forEach(function(data) {
     Bandung.push(data.januari);
       Malang.push(data.febuari);
       Malang.push(data.maret);
       Malang.push(data.april);
       Malang.push(data.mei);
       Malang.push(data.juni);
       Malang.push(data.juli);
       Malang.push(data.agustus);
       Malang.push(data.september);
       Malang.push(data.oktober);
       Malang.push(data.november);
       Malang.push(data.desember);
    });

  })
})
$(document).ready(function() {
 $.get(url_medan, function (response) {
   response.forEach(function(data) {
    Medan.push(data.januari);
      Medan.push(data.febuari);
      Medan.push(data.maret);
      Medan.push(data.april);
      Medan.push(data.mei);
      Medan.push(data.juni);
      Medan.push(data.juli);
      Medan.push(data.agustus);
      Medan.push(data.september);
      Medan.push(data.oktober);
      Medan.push(data.november);
      Medan.push(data.desember);
   });

 })
})

$(document).ready(function() {
 $.get(url_surabaya, function (response) {
   response.forEach(function(data) {
      Surabaya.push(data.januari);
      Surabaya.push(data.febuari);
      Surabaya.push(data.maret);
      Surabaya.push(data.april);
      Surabaya.push(data.mei);
      Surabaya.push(data.juni);
      Surabaya.push(data.juli);
      Surabaya.push(data.agustus);
      Surabaya.push(data.september);
      Surabaya.push(data.oktober);
      Surabaya.push(data.november);
      Surabaya.push(data.desember);
   });

 })
})

$(document).ready(function() {
 $.get(url_semarang, function (response) {
   response.forEach(function(data) {
      Semarang.push(data.januari);
      Semarang.push(data.febuari);
      Semarang.push(data.maret);
      Semarang.push(data.april);
      Semarang.push(data.mei);
      Semarang.push(data.juni);
      Semarang.push(data.juli);
      Semarang.push(data.agustus);
      Semarang.push(data.september);
      Semarang.push(data.oktober);
      Semarang.push(data.november);
      Semarang.push(data.desember);
   });

 })
})

 $(document).ready(function(){
   $.get(url_regional, function(response){
     response.forEach(function(data){
       Bandung.push(data.januari);
       Bandung.push(data.febuari);
       Bandung.push(data.maret);
       Bandung.push(data.april);
       Bandung.push(data.mei);
       Bandung.push(data.juni);
       Bandung.push(data.juli);
       Bandung.push(data.agustus);
       Bandung.push(data.september);
       Bandung.push(data.oktober);
       Bandung.push(data.november);
       Bandung.push(data.desember);
     });

     var ctx = document.getElementById("canvas-regional").getContext('2d');
         var myChart = new Chart(ctx, {
           type: 'line',
           data: {
               labels:  ['0','januari', 'febuari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'],
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
                 label: 'jabodetabek',
                 fill: false,
                 data: [0,0,0,0,0,0,0,0,0,0,0,0,0],
                 backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                 borderColor: ['rgba(255, 99, 132, 1)'],
                 borderWidth: 3
               },
               {
                 label: 'bandung',
                 fill: false,
                 data: Bandung,
                 backgroundColor: ['rgba(38, 171, 116, 0.2)'],
                 borderColor: ['rgba(38, 171, 116, 1)'],
                 borderWidth: 3
               },
               {
                 label: 'malang',
                 fill: false,
                 data: Malang,
                 backgroundColor: ['rgba(31, 97, 178, 0.2)'],
                 borderColor: ['rgba(31, 97, 178, 1)'],
                 borderWidth: 3,
               },
               {
                 label: 'medan',
                 fill: false,
                 data: Medan,
                 backgroundColor: ['rgba(136, 14, 79, 0.2)'],
                 borderColor: ['rgba(136, 14, 79, 1)'],
                 borderWidth: 3,
               },
               {
                 label: 'surabaya',
                 fill: false,
                 data: Surabaya,
                 backgroundColor: ['rgba(0, 77, 64, 0.2)'],
                 borderColor: ['rgba(0, 77, 64, 1)'],
                 borderWidth: 3,
               },
               {
                 label: 'semarang',
                 fill: false,
                 data: Semarang,
                 backgroundColor: ['rgba(244, 81, 30, 0.2)'],
                 borderColor: ['rgba(244, 81, 30, 1)'],
                 borderWidth: 3,
               },
               {
                 label: 'Trashold',
                 fill: false,
                 borderColor: ['rgba(255, 99, 132, 1)',],
                 borderDash: [5, 5],
                 data: [30,30,30,30,30,30,30,30,30,30,30,30,30],
                 borderWidth: 1
               }
           ]
           },

           options: {
             responsive: true,
               scales: { 

                   yAxes: [{
                       ticks: {
                        min: 0,
                        max: 100,
                        callback: function(value){return value+ "%"}
                       }
                   }]

               }
           }
       });
   });
 });





