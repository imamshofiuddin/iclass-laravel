@extends('layouts.classroom')
@section('body')
    <a href='{{ route('add.announcement') }}'><button class="btn btn-primary mb-3">Add Announcement</button></a>
    <div class="row">
        @foreach ($announcements as $announcement)
          <div class="col-12 mb-3">
              <div class="card">
                <div class="card-body">
                  <h6 class="card-subtitle mb-2 text-body-secondary">{{ $announcement->announcement }}</h6>
                  <p class="card-text">{{ $announcement->created_at }}</p>
                  <a onclick="return confirm('Are you sure ?');" href="{{ route('destroy.announcement', ['id' => $announcement->id]) }}"><button class="btn btn-danger">Delete</button></a>
                </div>
              </div>
          </div>
        @endforeach
    </div>
@endsection
