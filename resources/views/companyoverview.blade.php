@extends('layouts.app')

@section('content')
<div class="container">
    @if (isset( $company->company_photo ))
        <img src="{{ $company->company_photo }}" alt="banner-photo" class="banner-photo">
    @else
        <!--<img src="{{ asset('img/banner/GE-Banner.jpg') }}" alt="banner-photo" class="banner-photo">-->
        <img src="https://s3.amazonaws.com/download.retrospect.com/site/products/cloud.jpg" alt="banner-photo" class="banner-photo">
    @endif
    
    
    
    <div class="panel panel-body ">
            <div class="col-md-12">
            @include('common.errors')

            <div class="col-md-2">
                <div class="company-logo">
                            <img src="{{$company->company_logo}}" alt="company-logo" class="">
                </div>
            </div>
            <div class="col-md-8">
                        <h3>{{$company->company_name}}</h3>
                        <p>☆☆☆☆☆</p>
            </div>
            <div class="col-md-2">
                <form action="{{ url('reviewform/'.$company->id)}}" method="POST">
                    <!--<form action="{{ url('reviewform')}}" method="GET">-->
                    <!-- id値を送信 -->
                    <input type="hidden" name="id" value="{{$company->id}}" />
                    <!--/ id値を送信 -->
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-lg">
                        Write a review
                    </button>
                </form>
            </div>
            </div>
            <div class="col-md-12">
            <h3 class="company-overview-title" id="company_overview">Company overview</h3>
                <div class="col-md-6">
                    <dl class="overview-list">
                        <dt class="list-title">Employees</dt>
                        <dd class="list-content">{{ $company->size }}</dd>
                        <dt class="list-title">Company type</dt>
                        <dd class="list-content">{{ $company->companyType }}</dd>
                        <dt class="list-title">Revenue</dt>
                        <dd class="list-content">{{ $company->revenue }}</dd>
                    </dl>
                </div>
                <div class="col-md-6">
                    <dl class="overview-list">
                        <dt class="list-title">Headquarters</dt>
                        <dd class="list-content">{{ $company->hqAddress }}</dd>
                        <dt class="list-title">Founded</dt>
                        <dd class="list-content">{{ $company->foundedYear }}</dd>
                        <dt class="list-title">Industry</dt>
                        <dd class="list-content">{{ $company->industry }}</dd>
                    </dl>
                </div>
                <div class="col-md-12">
                        <p class="company-description-paragraph">{{ $company->description }}</p>
                </div>
                <div class="col-md-6">
                        <dl class="overview-list">
                            <dt class="overview-list-margin">Non-Japanese ratio</dt>
                            <dd class="overview-list-content-margin">{{ $company->internationalWorkersPercentage }}</dd>
                            <dt class="overview-list-margin">Non-Japanese hiring result</dt>
                            <dd class="overview-list-content-margin">{{ $company->pyHiringResult }}</dd>
                            <dt class="overview-list-margin">Men and women ratio</dt>
                            <dd class="overview-list-content-margin">{{ $company->menWomenRatio }}</dd>
                        </dl>
                </div> 
                <div class="col-md-12">
                    
                        <h4>Required Japanese level</h4>
                        <p>{{ $company->japaneselevel }}</p>
                        <h4>
                            Why does <b> {{ $company->company_name }} </b>want to hire non-Japanese talents?
                        </h4>
                        <p class="company-description-paragraph">{{ $company->hiringReason }}</p>
                </div>
            <!--</div>-->
        </div>
    </div>
    
    @if (count($reviews) > 0)
    @foreach ($reviews as $review)
    <div class="panel panel-body ">
        <div class="review-wrapper">
            <h3 class="review-title">XXX</h3>
            <div style="justify-content:space-between">
                <div class="average-stars">
                    @for($i=0; $i<$review->work_env_rate; $i++)
                        ★
                        @endfor
                        @for($i=$review->work_env_rate; $i<5; $i++)
                        ☆
                    @endfor
                </div>
                <div class="written-in">
                    <p>Written in {{$review->created_at}}</p>
                </div>
                <p class="review-comments">{{$review->work_env}}</p>
            </div>

 
        </div>
    </div>
    @endforeach
    @endif

 
    <!--Panel-->
    <div class="panel panel-body text-center">
        <h3>Write your review to unlock everything on Abroad</h3>
        <p>Abroad is a career community that depends on everyone being able to share an inside look at a company they know.</p>
        <p>It's anonymous and will only take a minute.</p>
        <form action="{{ url('reviewform/'.$company->id)}}" method="GET">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary btn-lg btn-center">Write a review</button>
        </form>
    </div>
    <!--EndPanel-->

    
    
</div>
@endsection