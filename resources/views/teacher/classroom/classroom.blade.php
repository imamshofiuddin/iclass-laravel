@extends('layouts.classroom')
@section('link-home')
    <a href='{{ route('teacher.home') }}' class="me-3">< Back</a>
@endsection
@section('body')
    <div class="text-center">
        <h1>{{ session('classroom')->name }}</h1>
    </div>
@endsection
