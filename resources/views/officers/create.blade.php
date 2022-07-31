@extends('layouts.app-master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Create a New Post</h1>
                    <p>Fill and submit this form to create a post</p>

                    <hr>
                   
                    <form  method="POST" action="/officers">
                        @csrf 
                        <input type="hidden" value="1" name="id">
                        <div class="row"> 
                           
                            <div class="control-group col-12">
                                <label for="name">name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="Enter Post Title" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create Post
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection