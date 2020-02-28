@extends('layouts.app')
@section('title', 'layanan kesehatan')
@section('content')
<!-- Navigation area starts -->
    <div class="menu-area navbar-fixed-top">
        <div class="container">
            <div class="row">

                <!-- Navigation starts -->
                <div class="col-md-12">
                    <div class="mainmenu">
                        <div class="navbar navbar-nobg">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="">
                                    <img src="{{ asset('img/logo.png') }}" style="max-height: 50px; margin-top: -10px;">
                                </a>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse">
                                <nav>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a  href="{{url('/#slider')}}">HOME</a></li> 
                                        <li><a  href="{{url('/#service')}}">LAYANAN</a></li>
                                        <li><a   href="{{url('/#testimonial')}}">GALERI</a></li>
                                        <li><a   href="{{url('/#contact')}}">KONSULTASI</a></li>
                                        <li><a  href="{{route('login')}}">LOGIN</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation ends -->

            </div>
        </div>
    </div>
    <!-- Navigation area ends --> 
<section style="background: #eee;"> 
<div class="container" >
    <div class="row">
        <div class="col-md-6">
            <br>
            <img src="http://klinikpantiswasti.com/assets/images/WhatsApp Image 2019-08-13 at 21.50.56.jpeg" class="img img-responsive" style="width: 100%;">
        </div>
        <div class="col-md-6">
             <br>
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                <p>
                                <a class="btn-link" href="{{ route('password.request') }}">
                                    Lupa Password ?
                                </a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
             
        </div>

    </div>
</div>
</section>
@endsection
