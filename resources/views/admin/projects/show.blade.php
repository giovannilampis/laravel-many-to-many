@extends('layouts.dashboard')

@section('content')

<div class="container">

    <div class="row justify-content-center flex-wrap text-center">

        <div class="col-6 mt-5">

            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h4 class="card-title"><span 
                    class="badge rounded-pill bg-primary">{{$project->category->name?? 'No Category' }}</span>
                  </h4>
                  <h5 class="card-title">{{ $project->title }}</h5>
                  <p class="card-text">{{ $project->description }}</p>
                  <a href="{{ route('admin.projects.index') }}" class="btn btn-info">INDEX</a>
                  <a href="{{ route('admin.projects.edit', ['project'=>$project]) }}" class="btn btn-primary">EDIT</a>
                  <form action="{{ route('admin.projects.destroy', ['project'=>$project]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">DELETE</button>
                  </form>
                </div>
              </div>

        </div>

    </div>
</div>

@endsection