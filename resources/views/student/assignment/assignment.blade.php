@extends('layouts.classroom')
@section('body')
    <div class="row">
        @foreach ($assignments as $assignment)
          <div class="col-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $assignment->title }}</h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">{{ $assignment->created_at }}</h6>
                  <p class="card-text">{{ $assignment->description }}</p>
                  <a href="{{ route('classroom.assignment.detail', ['id' => $assignment->id]) }}" class="card-link"><button class="btn btn-dark">Show</button></a>
                </div>
              </div>
          </div>
        @endforeach
    </div>
@endsection
