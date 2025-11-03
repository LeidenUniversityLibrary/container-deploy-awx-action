@extends('errors::illustrated-layout')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message', __(''))

@section('image')
<div style="background-image: url('{{mix('img/ul_logo.png')}}'); background-size:contain" class="absolute pin bg-no-repeat md:bg-left lg:bg-center"></div>
@endsection
