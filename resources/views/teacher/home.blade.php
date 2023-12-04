@extends('layouts.dashboard-teacher')
@section('body')
    <a href='{{ route('teacher.classroom_add') }}'><button class="btn btn-primary mb-3">Add Classroom</button></a>
    <div class="row">
        @foreach ($classrooms as $classroom)
          <div class="col-4 mb-3">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $classroom->name }}</h5>
                  <h6 class="card-subtitle mb-5 text-body-secondary">Code : {{ $classroom->code }}</h6>
                  <a href="{{ route('detail.classroom', ['code' => $classroom->code]) }}" class="card-link"><button class="btn btn-dark">Enter</button></a>
                  <a onclick="return confirm('Are you sure ?');" href="{{ route('destroy.classroom', ['id' => $classroom->id]) }}"><button class="btn btn-danger">Delete</button></a>
                </div>
              </div>
          </div>
        @endforeach
    </div>
@endsection
