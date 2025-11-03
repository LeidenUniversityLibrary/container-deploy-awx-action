@extends('errors::illustrated-layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: ''))

@section('image')
<div style="background-image: url('{{mix('img/ul_logo.png')}}'); background-size:contain" class="absolute pin bg-no-repeat md:bg-left lg:bg-center"></div>
@endsection
