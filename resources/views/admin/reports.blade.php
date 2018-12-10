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
<canvas id="myChart" width="400" height="400"></canvas>

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script>

    var labelData = [];
    $.ajax({type:'get', url:'/admin/ajaxReports', success:(data)=>{
        console.log(data);
       data.forEach((element)=>{
           labelData.push(element.name);
       })
    }
    });


    console.log(labelData);
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labelData,
        datasets: [{
            label: 'Average Price Per Genre',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>
@endsection