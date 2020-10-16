@extends('master')

@section('main')

<!-- Masthead-->
<div class="container d-flex align-items-center flex-column">
    <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5 rounded-circle"  src="img/LevelUp.webp" alt="" />
    <div class="col"></div>
    <div class="col">

        {{ Form::open(array('url'=>'login')) }}
        <div class="form-group @if ($errors->has('description')) has-error @endif">
            {{ Form::label('user_code', 'Your Trainer Code:') }}
            {{ Form::text('user_code', null, array('class="form-control"', 'placeholder'=>'Enter Pokemon Go Trainer Code')) }}
            <br>
                {{ Form::submit('Login', array('class'=>'btn  btn-success btn-lg')) }}

        </div>
        {{ Form::close() }}
    </div>
    <div class="col"></div>

    <!-- Masthead Heading-->
    <h2 class="masthead-heading text-uppercase mb-0">{{ number_format($total_codes) }} Pokemon Go Friend Codes</h2>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div><h1>*</h1><div class="divider-custom-line"></div>
    </div>
    <!-- Masthead Subheading-->
    <p class="text-justify masthead-subheading font-weight-light mb-0">Log in to Share your Pokemon Go Code. 
        We help you keeping track of users you have befriended so you do not send duplicate invites out.
        Additionally, we only show you Trainer Codes of Pokemon Go Players who are most active in this website. 
        Our goal is to show you only Codes of Pokemon Go Trainers that are unique, active, and higly likely 
        to accept your friend request</p>

</div>
@stop {{-- End of section main --}}