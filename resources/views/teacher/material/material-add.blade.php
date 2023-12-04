@extends('layouts.classroom')
@section('body')
    <div class="text-center">
    <form action={{ route('material.add-process') }} method="post">
        @csrf
        <input type="text" name="title" class="form-control" placeholder="Title"><br>
        <input type="text" name="content" class="form-control" placeholder="Links Material">
        @include('components.submit-button', [$textButton = 'Add'])
    </form>
    </div>
@endsection
