@extends('layouts.classroom')
@section('link-home')
    <a href='{{ route('student.home') }}' class="me-3">< Back</a>
@endsection
@section('body')
    <div class="text-center mx-auto">
        <h1>{{ session('classroom')->name }}</h1>
    </div>
@endsection
