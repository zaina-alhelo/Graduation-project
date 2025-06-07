@extends('landing.master')

@section('content')
    @include('landing.sections.banner')
    @include('landing.sections.service')
    @include('landing.sections.eye-health')
    @include('landing.sections.about-us')
    @include('landing.sections.ask-question')
    @include('landing.sections.team')
    @include('landing.sections.comments')

    @endsection
