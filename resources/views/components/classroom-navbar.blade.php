@extends('layouts.app')
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
    <div class="container-fluid">
      @yield('link-home')
      <a class="navbar-brand" href="#">{{ session('classroom')->name }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="{{ route('detail.classroom', ['code' => session('classroom')->code]) }}">Classroom</a>
            <a class="nav-link" href="{{ route('classroom.material', ['classroom_id' => session('classroom')->id]) }}">Material</a>
            <a class="nav-link" href="{{ route('classroom.assignment', ['classroom_id' => session('classroom')->id]) }}">Assignment</a>
            <a class="nav-link" href="{{ route('classroom.announcement', ['classroom_id' => session('classroom')->id]) }}">Announcement</a>
        </div>
      </div>
    </div>
</nav>
