@extends('layouts.classroom')
@section('body')
    <a href='{{ route('teacher.add.material') }}'><button class="btn btn-primary mb-3">Add Material</button></a>
    <div class="row">
        @foreach ($materials as $material)
          <div class="col-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $material->title }}</h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">{{ $material->created_at }}</h6>
                  <p class="card-text">{{ $material->content }}</p>
                  <a onclick="return confirm('Are you sure ?');" href="{{ route('destroy.material', ['id' => $material->id]) }}"><button class="btn btn-danger">Delete</button></a>
                </div>
              </div>
          </div>
        @endforeach
    </div>
@endsection
