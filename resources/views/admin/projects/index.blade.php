@extends('layouts.app')


@section('content')
  <div class="container">
    <div class="row row-cols-6 mt-4 gy-4">
      @foreach ($projects as $project)
        <a class="text-decoration-none" href="{{ route('admin.projects.show', $project->slug) }}">
          <div class="card">
            <img src="{{ asset('storage/' . $project->thumb) }}" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">{{ $project->title }}</h5>
              <span class="badge bg-secondary">{{ $project->type->type }}</span>
              @foreach ($project->technologies as $technology)
                <p class="badge" style="background-color: rgb({{ $technology->color }})">
                  <i class="fa-brands {{ $technology->name }}"></i>
                </p>
              @endforeach
            </div>
          </div>
        </a>
      @endforeach
    </div>
    <a class="btn btn-primary mt-4" href="{{route('admin.projects.create') }}">Nuovo Progetto</a>
  </div>
@endsection