@extends('layouts.app')


@section('content')
  <div class="container">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="mt-5">
      @csrf()
      @method($method)

      <div class="mb-3">
        <label for="title" class="form-label">Titolo:</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project?->title) }}">
        @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Descrizione:</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $project?->description) }}</textarea>
        @error('description')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="thumb" class="form-label">Immagine:</label>
        <input type="file" class="form-control @error('thumb') is-invalid @enderror" name="thumb" accept="image/*">
        @error('thumb')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="type" class="form-label">Tipo:</label>
        <select name="type_id" id="type" class="form-select @error('type_id') is-invalid @enderror">
          <option hidden>Seleziona il tipo di progetto</option>
          @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->type }}</option>
          @endforeach
        </select>
        @error('type_id')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="type" class="form-label">Tecnologia:</label>
          @foreach($technologies as $technology)
            {{-- <input type="checkbox" class="btn-check @error('technologies') is-invalid @enderror" name="technologies[]" value="{{ $technology->id }}" {{ $project?->technologies->contains($technology) ? 'checked' : '' }}>
            <label class="btn btn-outline-secondary" for="btncheck1"><i class="fa-brands {{ $technology->name }}"></i></label> --}}
            <input type="checkbox" class="@error('technologies') is-invalid @enderror" name="technologies[]" value="{{ $technology->id }}" {{ $project?->technologies->contains($technology) ? 'checked' : '' }}>
            <label for=""><i class="fa-brands {{ $technology->name }}"></i></label>
          @endforeach
          @error('technologies')
            <div class="invalid_feedback">{{ $message }}</div>
          @enderror
      </div>

      <div class="mb-3">
        <label for="creation_date" class="form-label">Data:</label>
        <input type="date" name="creation_date" class="form-control @error('creation_date') is-invalid @enderror" value="{{ old('creation_date', $project?->creation_date) }}">
        @error('creation_date')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="link" class="form-label">Link:</label>
        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $project?->link) }}">
        @error('link')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mt-4">
        <a class="btn btn-secondary" href="{{ route("admin.projects.index") }}">Indietro</a>
        <button type="submit" class="btn btn-primary">Invia</button>
      </div>
    </form>
  </div>
@endsection