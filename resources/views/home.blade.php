@extends('layouts.roxtone')

@section('roxtone_content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background: #2F3032; color: #FEB800; text-shadow: 1px 1px #ffffff; text-align: center; font-weight: bolder; font-size:30px;">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
@if (Auth::check())
{{ __('You are logged in!') }}
@else 
<div>You need to login to accesss this page <br/>
    Please <a href="{{ route('login')}}">Login</a> or <a href="{{route('register')}}">Register</a> first</div>
@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
