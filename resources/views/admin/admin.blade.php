@extends('layouts.app')

@section('content')

    <!-- SECTION content -->
    <h2>Admin homepage</h2>
    <label>This page is visible only to logged in users. Edit `resources/views/admin/admin.blade.php` to modify this view.</label>
    <hr>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('status'))
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <p>Sed tempor urna nec felis mollis sodales. Vivamus porttitor vestibulum ligula, eget iaculis nisl. Proin
        consectetur dolor accumsan dui euismod feugiat. Nunc et lectus non quam congue pharetra. Curabitur auctor
        posuere mi, id pellentesque leo accumsan eget. Nulla tincidunt placerat purus eget mollis. In hac habitasse
        platea dictumst. Proin auctor lorem vitae sapien pharetra, non porta justo molestie. Mauris ac augue sit amet
        ipsum faucibus dictum sed eu est. Quisque ex tortor, consectetur at mattis ac, fermentum et quam. Nunc felis
        magna, tincidunt et felis sed, viverra vulputate nibh.</p>
@endsection

@section('javascript')
@endsection
