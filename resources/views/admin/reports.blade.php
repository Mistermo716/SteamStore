@extends('layouts.admin')

@section('content')

<div style="margin: 0; float:right; margin-bottom:10px" class="card text-center col-4">
        <img class="card-img-top" style="margin:auto; padding:10px" src="https://i.ibb.co/nBbGLv8/58aefddbc869e092af51ee70.png" alt="Card image cap">
        <div class="card-body">
          <h6 class="card-title">Number of Games</h6>
          <p class="card-text">{{$gameCount}}</p>
        </div>
      </div>
      <div style="margin: 0; float:right; margin-bottom:10px" class="card text-center col-4">
            <img class="card-img-top" style="margin:auto; padding:10px" src="https://i.ibb.co/nBbGLv8/58aefddbc869e092af51ee70.png" alt="Card image cap">
            <div class="card-body">
              <h6 class="card-title">Average Price</h6>
              <p class="card-text">{{currency($gamePrice)}}</p>
            </div>
          </div>
          <div style="margin: 0; float:right; margin-bottom:10px" class="card text-center col-4">
                <img class="card-img-top" style="margin:auto; padding:10px" src="https://i.ibb.co/nBbGLv8/58aefddbc869e092af51ee70.png" alt="Card image cap">
                <div class="card-body">
                  <h6 class="card-title">Number of Genres</h6>
                  <p class="card-text">{{$genreCount}}</p>
                </div>
              </div>
<canvas id="myChart"></canvas>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script>

    var labelData = [];
    var labelPrice = [];

    $.ajax({type:'get', url:'/admin/ajaxReports', success:(data)=>{
       data.forEach((element)=>{
           labelData.push(element.genre.name);
           labelPrice.push(element.averagePrice);
       })
    }
    });

//only way to render chart with data everytime is to use timeout function
//otherwise chart initially loads with blank data until interacted with
setTimeout(function(){
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labelData,
        datasets: [{
            label: 'Average Price Per Genre',
            data: labelPrice,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 255, 255, 0.2)',
                'rgba(245, 111, 211, .2)',
                'rgba(59,252,75,.2)',
                'rgba(248,252,59,.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(245, 111, 211, 1)',
                'rgba(59,252,75,1)',
                'rgba(248,252,59,1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
}, 1000);



</script>
@endsection