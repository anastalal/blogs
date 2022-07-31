@extends('layouts.app-master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one">اسم العميل:  {{ ($report->name) }}</h1>
                <p>رقم التقرير: {{$report->id}}</p>  
                <p>رقم الهاتف: {{$report->phone}}</p> 
                <p>النوع: {{$report->stat}}</p>
                <p>التاريخ: {{$report->created_at}}</p>
                <p> بواسطة :{{$user->name}}</p>
                <p> عبر مكتب :  {{$office->name}}</p>
                <hr> 
                <a class="btn btn-outline-primary" href="whatsapp://send?text=
                رقم التقرير: {{$report->id}} 
                رقم الهاتف: {{$report->phone}}
                النوع: {{$report->stat}}
                التاريخ: {{$report->created_at}}
                بواسطة :{{$user->name}} 
                عبر مكتب :  {{$office->name}}" data-action="share/whatsapp/share">Share via Whatsapp</a>
                <a href="/reports/{{ $report->id }}/edit" class="btn btn-outline-primary">Edit Post</a>
                <br><br>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection