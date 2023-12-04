@extends('layouts.student-dashboard')
@section('body')
    <a href="{{ route('student.classroom_join') }}"><button class="btn btn-primary my-3">Join Classroom</button></a>
    <div class="row">
        @foreach ($classrooms as $classroom)
          <div class="col-4 mb-3">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $classroom->classroom->name }}</h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">Code : {{ $classroom->classroom->code }}</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{ route('detail.classroom', ['code' => $classroom->classroom->code]) }}" class="card-link"><button class="btn btn-dark">Enter</button></a>
                </div>
              </div>
          </div>
        @endforeach
    </div>
@endsection
