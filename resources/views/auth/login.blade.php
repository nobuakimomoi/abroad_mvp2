@extends('layouts.app')
@section('content')


<div class="photo_filter">
<img src="{{url('img/login_photo.jpg')}}"alt="" class="opacity index_img">

<div class="form-box">
    <h2 class="text-center">Find the job you love</h2>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <!--row1-->
        <div class="row">
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-xs-2 col-xs-offset-2 control-label">E-Mail Address</label>

            <div class="col-xs-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!--row1 ends-->
        </div>
        <div class="row">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class="col-xs-2 col-xs-offset-2 control-label">Password</label>

            <div class="col-xs-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!--row2 ends-->
        </div>
        <div class="row">
        <div class="form-group">
            <div class="col-xs-6 col-xs-offset-4">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-8 col-xs-offset-4">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>
        <!--row3 ends-->
        </div>
    </form>
</div>
</div>

<div class="benefits_wrapper">
    <div class="container">
        <div class="row">
            <h2 class="benefit-title text-center">How Abroad works for you</h2>
            <div class="benefit-container">
                <div class="col-md-4 benefit-item">
                    <i class="far fa-comment-alt benefit-icon"></i>
                    <p class="normal-font">Company reviews by non-Japanese professionals in the companies in Japan</p>
                </div>
                <div class="col-md-4 benefit-item">
                    <i class="far fa-comments benefit-icon"></i>
                    <p class="normal-font">Communicate with non-Japanese professionals working in Japan and learn about their companies</p>
                </div>
                <div class="col-md-4 benefit-item">   
                    <i class="fas fa-search benefit-icon"></i>
                    <p class="normal-font">Find the companies that actively hire the people with international background</p>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!--container-->






<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="col-md-8 col-md-offset-2">-->
<!--            <div class="panel panel-default">-->
<!--                <div class="panel-body">-->
<!--                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">-->
<!--                        {{ csrf_field() }}-->

<!--                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">-->
<!--                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>-->

<!--                                @if ($errors->has('email'))-->
<!--                                    <span class="help-block">-->
<!--                                        <strong>{{ $errors->first('email') }}</strong>-->
<!--                                    </span>-->
<!--                                @endif-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">-->
<!--                            <label for="password" class="col-md-4 control-label">Password</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="password" type="password" class="form-control" name="password" required>-->

<!--                                @if ($errors->has('password'))-->
<!--                                    <span class="help-block">-->
<!--                                        <strong>{{ $errors->first('password') }}</strong>-->
<!--                                    </span>-->
<!--                                @endif-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group">-->
<!--                            <div class="col-md-6 col-md-offset-4">-->
<!--                                <div class="checkbox">-->
<!--                                    <label>-->
<!--                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group">-->
<!--                            <div class="col-md-8 col-md-offset-4">-->
<!--                                <button type="submit" class="btn btn-primary">-->
<!--                                    Login-->
<!--                                </button>-->

<!--                                <a class="btn btn-link" href="{{ route('password.request') }}">-->
<!--                                    Forgot Your Password?-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
@endsection
