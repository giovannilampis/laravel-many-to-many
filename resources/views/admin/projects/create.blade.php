@extends('layouts.dashboard')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <p class="text-center fs-2 my-5 text-uppercase">add a project to this collection</p>
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype=”multipart/form-data”>
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Subtitle</label>
            <input name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror">
            @error('subtitle')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input name="description" type="text" class="form-control @error('description') is-invalid @enderror">
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- INPUT FILE --}}

        <div class="mb-3">
          <label for="project-cover-image" class="form-label">Project Image</label>
          <input type="file" class="form-control" name="cover_image" id="project-cover-image" placeholder="" aria-describedby="fileHelpId">
          <div id="fileHelpId" class="form-text">Help text</div>
        </div>

        {{-- ciclo delle categories --}}

        <div class="mb-3">
            <label for="project-categories" class="form-label">Categories</label>
            <select class="form-select form-select-lg" name="category_id" id="project-categories">
                <option value="">Scegli una categoria di progetti</option>
                @foreach ($categories as $elem)

                    <option value="{{$elem->id}}">{{ $elem->name }}</option>

                @endforeach
               
            </select>
        </div>

        {{-- ciclo delle technologies --}}

        <div class="form-group">

            @foreach ($technologies as $elem)
                {{-- singola checkbox bootstrap --}}
                <div class="form-check">
                <input class="form-check-input" 
                    type="checkbox" 
                    name="technologies[]"
                    value="{{$elem->id}}" 
                    id="project-chechbox-{{$elem->id}}">
                <label class="form-check-label" for="project-chechbox-{{$elem->id}}">
                    {{ $elem->name }}
                </label>
                </div>
            @endforeach
        </div>

      

        <button type="submit" class="btn btn-primary">CREATE</button>
    
      </form>
</div>

@endsection
