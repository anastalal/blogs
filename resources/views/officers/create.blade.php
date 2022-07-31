@extends('layouts.app-master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4 text-center">اضافة مكتب جديد</h1>
                   

                    <hr>
                   
                    <form  method="POST" action="/officers">
                        @csrf 
                        <input type="hidden" value="1" name="id">
                        <div class="row"> 
                           
                            <div class="control-group col-12">
                                <label for="name">اسم المكتب</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="اسم المكتب" required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    اضافة مكتب
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection