@extends('layouts.classroom')
@section('body')
    <p>Title : {{ $assignment->title }}</p>
    <p>Description : {{ $assignment->description }}</p>
    <p>published at : {{ $assignment->created_at }}</p>
    <p>Attachment : <a target="_blank" href="{{ asset('upload/attachment/'.$assignment->attachment) }}">{{ $assignment->attachment }}</a></p>
    @if ($studentSubmittedAssignment)
        <h2 class="text-success">You Already Submitted!</h2>
    @else
        <h3>Submission :</h3>
        <form action="{{ route('student.submit.assignment', ['id' => $assignment->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $id }}" name="assignment_id">
            <textarea name="notes" class="form-control" id="" cols="30" rows="3" placeholder="notes"></textarea>
            <input type="file" class="form-control" name="attachment" id="" required>
            @include('components.submit-button', [$textButton = 'Submit'])
        </form>
    @endif
@endsection
