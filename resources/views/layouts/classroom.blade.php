@extends('layouts.app')
@section('content')
    @include('components.classroom-navbar')
    @section('link-home')
       <a href="{{ (session('user_role') == 'teacher') ? route('teacher.home') : route('student.home') }}">
        < Back
       </a>
    @endsection
    @yield('body')
@endsection
