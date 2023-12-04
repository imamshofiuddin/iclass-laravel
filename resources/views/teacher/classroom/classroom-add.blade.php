@extends('layouts.dashboard-teacher')
@section('body')
    <div class="text-center">
        <form action={{ route('classroom.add-process') }} method="post">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Class Name">
            @include('components.submit-button', [$textButton = 'Submit'])
        </form>
    </div>
@endsection
