@extends('layouts.app')

@section('content')
<!--<div class="container hero-background">-->
<!--    <div class="search-wrapper text-center">-->
        
<!--            <div class="search-title">Search company reviews and hiring positions</div>-->
<!--                @if (session('status'))-->
<!--                    <div class="alert alert-success">-->
<!--                        {{ session('status') }}-->
<!--                    </div>-->
<!--                @endif-->
                
<!--            <div class="col-md-12">-->
<!--            <div class="col-md-9">-->
<!--            <form action="#" method="GET">-->
<!--            <input type="search" name="search" class="form-control" placeholder="Type company name here">-->
<!--            </div>-->
<!--            <div class="col-md-3">-->
<!--            <button type="submit" class="btn btn-wred btn-md">Search</button>-->
<!--            </form>-->
<!--            </div>-->
<!--            </div>-->
<!--            <p class="text-mini-ad">Are you hirering? Post Jobs for free!</p>-->

<!--    </div>-->
<!--</div>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

<!-- 現在 企業 -->
@if (count($companies) > 0)
<div class="container">
    <h3>Recent Reviews</h3>
    <div class="row">
        <?php $arrayid=0;?>
        @foreach ($companies as $company)
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-5">
                        <div class="company-logo">
                            <img src="{{$company->company_logo}}" alt="company-logo" class="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h4><a href="{{action('CompaniesController@overview', $company->id) }}">{{ $company->company_name }}</a></h4>
                        <p>{{ $company->hq_adress }}</p>
                        <p>
                        <?php
                        if($company->reviews_count>0){
                            $score = $company->reviews_sum_rate/$company->reviews_count;
                        }else{
                            $score = null;
                        }
                        ?>
                        @for($i=0; $i<(int)$score; $i++)
                        ★
                        @endfor
                        @for($i=$score; $i<5; $i++)
                        ☆
                        @endfor
                        </p>
                        <p>{{$company->reviews_count}} Reviews</p>
                    </div>
                        <div class="chart">
                            <div id="app{{$company->id}}"><canvas id="chart{{$company->id}}"></canvas></div>
                        </div>
                </div>
            </div>
        </div>

<script>
var color = Chart.helpers.color;
var config = {
	type: 'radar',
	data: {
		labels: [
      'Work environment for non-Japanese',
      'Employee growth environment',
      'Promotion of non-Japanese', 
      'Work-life balance',
      'Compensation and benefits',
      'Gender equality'],
		datasets: [{
			backgroundColor: color('#3097d1').alpha(0.5).rgbString(),
			borderColor: '#3097d1',
			pointBackgroundColor: '#3097d1',
			lineTension: 0.2,
			borderWidth:0.1,
			pointRadius:0,
			data: [
			    {{$score}},
			    {{$score}},
			    {{$score}},
			    {{$score}},
			    {{$score}},
			    {{$score}},
			 //   Math.round(Math.random() * 100/20),
			 //   Math.round(Math.random() * 100/20),
			 //   Math.round(Math.random() * 100/20),
			 //   Math.round(Math.random() * 100/20),
			 //   Math.round(Math.random() * 100/20),
			 //   Math.round(Math.random() * 100/20)
			    ]
		},]
	},
	options: {
		animation:false,
		showTooltips: false,
		legend: {
            display: false
         },
		scale: {
			display: true,
			legend: {
                display: false
            },
			ticks: {
				min: 0,
				max: 5,
				beginAtZero: true
			},
			pointLabels: {
				fontSize:8,
				// fontColor: colorSet.yellow
			},

		}
	}
};

<?php $arrayid++;?>


// var c=document.getElementById("#chart{{$company->id}}");
// c.width=window.innerWidth*0.1;
// c.height=window.innerHeight*0.1;

var myRadar = new Chart($("#chart{{$company->id}}"), config);
</script>
 
         @endforeach

    </div>
</div>
@endif

@endsection
