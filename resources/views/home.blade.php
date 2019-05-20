@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>

<!-- 現在 企業 -->
@if (count($companies) > 0)
<div class="container">
    <h3>Recent Reviews</h3>
    <div class="row">
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
                            $reviews_sum_work_env_rate = $company->reviews_sum_work_env_rate/$company->reviews_count;
                            $reviews_sum_promotion_rate = $company->reviews_sum_promotion_rate/$company->reviews_count;
                            $reviews_sum_work_life_balance_rate = $company->reviews_sum_work_life_balance_rate/$company->reviews_count;
                            $reviews_sum_growth_rate = $company->reviews_sum_growth_rate/$company->reviews_count;
                            $reviews_sum_c_and_b_rate = $company->reviews_sum_c_and_b_rate/$company->reviews_count;
                            $reviews_sum_gender_equality_rate = $company->reviews_sum_gender_equality_rate/$company->reviews_count;
                            
                            $score = ($reviews_sum_work_env_rate 
                            +$reviews_sum_promotion_rate
                            +$reviews_sum_work_life_balance_rate
                            +$reviews_sum_growth_rate
                            +$reviews_sum_c_and_b_rate
                            +$reviews_sum_gender_equality_rate)/6.0;
                        }else{
                            $reviews_sum_work_env_rate = null;
                            $reviews_sum_promotion_rate = null;
                            $reviews_sum_work_life_balance_rate = null;
                            $reviews_sum_growth_rate = null;
                            $reviews_sum_c_and_b_rate = null;;
                            $reviews_sum_gender_equality_rate = null;
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
                        <p>{{$company->reviews_counts}} Reviews</p>
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
			    {{$reviews_sum_work_env_rate}},
			    {{$reviews_sum_promotion_rate}},
			    {{$reviews_sum_work_life_balance_rate}},
			    {{$reviews_sum_growth_rate}},
			    {{$reviews_sum_c_and_b_rate}},
			    {{$reviews_sum_gender_equality_rate}},
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
			},

		}
	}
};


var myRadar = new Chart($("#chart{{$company->id}}"), config);
</script>
 
         @endforeach

    </div>
</div>
@endif

@endsection
