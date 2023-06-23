@extends('layouts.dashboard')

@section('content')
    <h1 class="text-uppercase text-center">Projects Page</h1>
    <div class="container">
        <div class="row">

            @foreach($projects as $project)

            <div class="col-3">
                <div class="card" style=>
                    <img src="{{ $project->img_url }}" class="card-img-top" alt=""{{ $project->title }}"">
                    <div class="card-body">
                        <h4 class="card-title"><span 
                        class="badge rounded-pill bg-primary">{{$project->category->name?? 'No Category' }}</span>
                        </h4>
                      <h5 class="card-title">"{{ $project->title }}"</h5>
                      <h5 class="card-title">"{{ $project->subtitle }}"</h5>
                      <p class="card-text">"{{ $project->description }}"</p>
                      <a href="{{ $project->url }}" class="btn btn-primary">VISIT WEBSITE</a>
                      <a href="{{ route('admin.projects.show', ['project'=>$project]) }}" class="btn btn-info">SHOW</a>
                      <form action="{{ route('admin.projects.destroy', ['project'=>$project]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                      </form>
                      

                    </div>  
                </div>
            </div>


            @endforeach
        </div>
    </div>
@endsection