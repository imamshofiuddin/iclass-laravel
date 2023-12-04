@extends('layouts.classroom')
@section('body')
    <div class="row">
        @foreach ($announcements as $announcement)
          <div class="col-12 mb-3">
              <div class="card">
                <div class="card-body">
                  <h6 class="card-subtitle mb-2 text-body-secondary">{{ $announcement->announcement }}</h6>
                  <p class="card-text">{{ $announcement->created_at }}</p>
                </div>
              </div>
          </div>
        @endforeach
    </div>
@endsection
