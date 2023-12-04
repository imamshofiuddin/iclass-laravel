@extends('layouts.classroom')
@section('body')
    <div class="text-center">
        <form action={{ route('store.announcement') }} method="post">
            @csrf
            <input type="text" name="announcement" class="form-control" placeholder="Announcement Text">
            @include('components.submit-button', [$textButton = 'Add'])
        </form>
    </div>
@endsection
