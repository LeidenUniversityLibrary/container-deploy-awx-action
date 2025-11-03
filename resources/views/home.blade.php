@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center h4"><i class="bi bi-house-door-fill"></i>
                        Homepage</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="column h5 text-center">
                                This part of the page can be edited in resoruces/views/bome.blade.php
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio quam, pulvinar vitae risus in, tincidunt posuere neque. Donec sit amet pellentesque neque, id laoreet quam. Nunc id nisl mauris. Maecenas nec purus elit. Pellentesque nec hendrerit nibh. Nulla accumsan velit ac eros placerat efficitur. Morbi porttitor viverra orci, vitae dictum elit hendrerit quis. Donec maximus ornare libero, hendrerit convallis nisi fringilla vel. Nullam sit amet sollicitudin ligula, eu fringilla ligula. Etiam condimentum mollis molestie.
                            </p>
                        </div>
                        @guest
                            <div class="row mb-3">
                                <div class="column text-center">
                                    <a href="{{route('login')}}"
                                       class="btn-lg btn-primary" role="button">Login</a>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
