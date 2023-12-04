@extends('layouts.classroom')
@section('body')
    <div class="text-center">
        <form action={{ route('store.assignment') }} method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" class="form-control" placeholder="Title"><br>
            <input type="text" name="description" class="form-control" placeholder="Description"><br>
            <input type="file" name="attachment" class="form-control" placeholder="Attachment">
            @include('components.submit-button', [$textButton = 'Add'])
        </form>
    </div>
@endsection
