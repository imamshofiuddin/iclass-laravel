@extends('layouts.classroom')
@section('body')
    <div class="row">
        @foreach ($materials as $material)
          <div class="col-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">{{ $material->title }}</h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary">{{ $material->created_at }}</h6>
                  <p class="card-text">{{ $material->content }}</p>
                </div>
              </div>
          </div>
        @endforeach
    </div>
@endsection
