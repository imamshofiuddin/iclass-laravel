@extends('layouts.student-dashboard')
@section('body')
    <div class="text-center">
        <form action={{ route('classroom.join-process') }} method="post">
            @csrf
            <input type="text" name="code" class="form-control" placeholder="Enter Class Code">
            @include('components.submit-button', [$textButton = 'Submit'])
        </form>
    </div>
@endsection
