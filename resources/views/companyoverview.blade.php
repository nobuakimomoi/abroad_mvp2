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
                        <p>
                        
                        @if (count($reviews) > 0)
                        <?php
                                $score = 0;
                                $count = 0;
                        ?>
                        @foreach ($reviews as $review)
                        <?php
                                $score += $review->work_env_rate;
                                $count ++;
                        ?>
                            
                        @endforeach
                        <?php
                            $score = $score/$count;
                            echo 'Score'.round($score,2).'　';
                        ?>
                        
                        @for($i=0; $i<(int)$score; $i++)
                        ★
                        @endfor
                        @for($i=(int)$score; $i<5; $i++)
                        ☆
                        @endfor
                        @endif
                        
          
                        </p>
                        
            </div>
            <div class="col-md-2">
                <form action="{{ url('reviewform/'.$company->id)}}" method="POST">
                    <!--<form action="{{ url('reviewform')}}" method="GET">-->
                    <!-- id値を送信 -->
                    <input type="hidden" name="id" value="{{$company->id}}" />
                    <!--/ id値を送信 -->
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-lg" taget=blank>
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
    <!---->
    @if ($review->work_env != null)
    <div class="panel panel-body ">
        <div class="review-wrapper">
            <div class="row">
                <h3 class="review-title col-sm-8">Work environment for non-Japanese employees</h3>
                <div class="relative">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSf77-D9Q5XKlw2Fv4L9Sw7IlNWRKNtOhAtAfJ7XUs9Gtt6gOg/viewform" target=blank class="chat_btn col-sm-3">Ask questions to this reviewer
                    <i class="far fa-comments menu-icon"></i>
                    </a>
                </div>
            </div>
            <div style="justify-content:space-between">
                    reviewid:{{$review->id}}<br>
                    work_env_rate:{{$review->work_env_rate}}<br>
                <div class="written-in">
                    <p>Written in {{$review->created_at}}</p>
                </div>
                <p class="review-comments">{{$review->work_env}}</p>
            </div>
        </div>
    </div>
    @endif
    <!---->
    @if ($review->growth != null)
        <div class="panel panel-body ">
        <div class="review-wrapper">
            <div class="row">
                <h3 class="review-title col-sm-8">Employee growth opportuntiy / environment</h3>
                <div class="relative">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSf77-D9Q5XKlw2Fv4L9Sw7IlNWRKNtOhAtAfJ7XUs9Gtt6gOg/viewform" target=blank class="chat_btn col-sm-3">Ask questions to this reviewer
                    <i class="far fa-comments menu-icon"></i>
                    </a>
                </div>
            </div>
            <div style="justify-content:space-between">
                    reviewid:{{$review->id}}<br>
                    growth_rate:{{$review->growth_rate}}
                <div class="written-in">
                    <p>Written in {{$review->created_at}}</p>
                </div>
                <p class="review-comments">{{$review->growth}}</p>
            </div>
        </div>
    </div>
    @endif
    <!---->
    @if ($review->gender_equality != null)
            <div class="panel panel-body ">
        <div class="review-wrapper">
            <div class="row">
                <h3 class="review-title col-sm-8">Gender equality</h3>
                <div class="relative">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSf77-D9Q5XKlw2Fv4L9Sw7IlNWRKNtOhAtAfJ7XUs9Gtt6gOg/viewform" target=blank class="chat_btn col-sm-3">Ask questions to this reviewer
                    <i class="far fa-comments menu-icon"></i>
                    </a>
                </div>
            </div>
            <div style="justify-content:space-between">
                    reviewid:{{$review->id}}<br>
                    gender_equality_rate:{{$review->gender_equality_rate}}<br>
                <div class="written-in">
                    <p>Written in {{$review->created_at}}</p>
                </div>
                <p class="review-comments">{{$review->gender_equality}}</p>
            </div>
        </div>
    </div>
    @endif
    <!---->
    @if ($review->c_and_b != null)
    <div class="panel panel-body ">
        <div class="review-wrapper">
            <div class="row">
                <h3 class="review-title col-sm-8">Compensation and benefits</h3>
                <div class="relative">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSf77-D9Q5XKlw2Fv4L9Sw7IlNWRKNtOhAtAfJ7XUs9Gtt6gOg/viewform" target=blank class="chat_btn col-sm-3">Ask questions to this reviewer
                    <i class="far fa-comments menu-icon"></i>
                    </a>
                </div>
            </div>
            <div style="justify-content:space-between">
                    reviewid:{{$review->id}}<br>
                    c_and_b_rate:{{$review->c_and_b_rate}}<br>
                <div class="written-in">
                    <p>Written in {{$review->created_at}}</p>
                </div>
                <p class="review-comments">{{$review->c_and_b}}</p>
            </div>
        </div>
    </div>
    @endif
    <!---->
    @if ($review->screening != null)
    <div class="panel panel-body ">
        <div class="review-wrapper">
            <div class="row">
                <h3 class="review-title col-sm-8">Screening of non-Japanese candidates</h3>
                <div class="relative">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSf77-D9Q5XKlw2Fv4L9Sw7IlNWRKNtOhAtAfJ7XUs9Gtt6gOg/viewform" target=blank class="chat_btn col-sm-3">Ask questions to this reviewer
                    <i class="far fa-comments menu-icon"></i>
                    </a>
                </div>
            </div>
            <div style="justify-content:space-between">
                    reviewid:{{$review->id}}<br>
                    promotion_rate:{{$review->promotion_rate}}<br>
                <div class="written-in">
                    <p>Written in {{$review->created_at}}</p>
                </div>
                <p class="review-comments">{{$review->screening}}</p>
            </div>
        </div>
    </div>
    @endif
    <!---->
    @if ($review->promotion != null)
        <div class="panel panel-body ">
        <div class="review-wrapper">
            <div class="row">
                <h3 class="review-title col-sm-8">Promotion of non-Japanese employees</h3>
                <div class="relative">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSf77-D9Q5XKlw2Fv4L9Sw7IlNWRKNtOhAtAfJ7XUs9Gtt6gOg/viewform" target=blank class="chat_btn col-sm-3">Ask questions to this reviewer
                    <i class="far fa-comments menu-icon"></i>
                    </a>
                </div>
            </div>
            <div style="justify-content:space-between">
                    reviewid:{{$review->id}}<br>
                    promotion_rate:{{$review->promotion_rate}}<br>
                <div class="written-in">
                    <p>Written in {{$review->created_at}}</p>
                </div>
                <p class="review-comments">{{$review->promotion}}</p>
            </div>
        </div>
    </div>
    @endif

    @endforeach
    @endif

 
    <!--Panel-->
    <div class="panel panel-body text-center">
        <h3>Write your review to unlock everything on Abroad</h3>
        <p>Abroad is a career community that depends on everyone being able to share an inside look at a company they know.</p>
        <p>It's anonymous and will only take a minute.</p>
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSfsSt4kKco9jKh98IdL-74_q47adv-LuKmZ9kPr8lU-1MMJxw/viewform" target=blank>
            <button class="btn btn-primary btn-lg btn-center">Write a review</button>
        </a>
    </div>
    <!--EndPanel-->

    
    
</div>
@endsection