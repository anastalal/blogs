@extends('layouts.app-master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">WELLCOM TO LARA Blog!</h1>
                        <p>Enjoy reading our posts. Click on a post to read!</p>
                    </div>
                    <div class="col-4">
                        <p>Create new Post</p>
                        <a href="/blog/create/post" class="btn btn-primary btn-sm">Add Post</a>
                    </div>
                </div>                
                @forelse($posts as $post)
                    <div class="card" style="width: 18rem;">
                    <img src="images{{ ('/'.$post->img_path) }}"  alt="{{$post->title}}"> 
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($post->title) }}</h5>
                        <p class="card-text"> {{$post->body}}</p>
                        <a href="./blog/{{ $post->id }}" class="btn btn-primary">Read more</a>
                    </div>
                    </div>
                @empty
                    <p class="text-warning">No blog Posts available</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection