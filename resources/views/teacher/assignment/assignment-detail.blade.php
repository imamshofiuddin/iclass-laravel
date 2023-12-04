@extends('layouts.classroom')
@section('body')
    <p>Title : {{ $assignment->title }}</p>
    <p>Description : {{ $assignment->description }}</p>
    <p>published at : {{ $assignment->created_at }}</p>
    <p>Attachment : <a target="_blank" href="{{ asset('upload/attachment/'.$assignment->attachment) }}">{{ $assignment->attachment }}</a></p>
    <h3>Submitted Assignment</h3>
    <table class="table table-striped" aria-describedby="">
        <thead>
            <th>Student ID</th>
            <th>Notes</th>
            <th>Attachment</th>
        </thead>
        <tbody>
            @foreach ($studentAssignments as $studentAssignment)
                <tr>
                    <td>{{ $studentAssignment->id }}</td>
                    <td>{{ $studentAssignment->notes }}</td>
                    <td><a target="_blank" href="{{ asset('upload/attachment/'.$studentAssignment->attachment) }}">{{ $studentAssignment->attachment }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
