@extends('layouts.app-master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="text-right">
                 <h1 class="display-one text-right">اسم العميل:  {{ ($report->name) }}</h1>
                <p class="text-right">رقم التقرير: {{$report->id}}</p>  
                <p>رقم الهاتف: {{$report->phone}}</p> 
                <p>النوع: {{$report->stat}}</p>
                <p>التاريخ: {{$report->created_at}}</p>
                <p> بواسطة :{{$user->name}}</p>
                <p> عبر مكتب :  {{$office->name}}</p> 
                @if ($report->active==1)
                    <p>الحساب : غير مدفوع</p> 
                @else
                <p>الحساب :  مدفوع</p>
                @endif
                <hr> 
                </div>
                {{-- <h1 class="display-one text-right">اسم العميل:  {{ ($report->name) }}</h1>
                <p >رقم التقرير: {{$report->id}}</p>  
                <p>رقم الهاتف: {{$report->phone}}</p> 
                <p>النوع: {{$report->stat}}</p>
                <p>التاريخ: {{$report->created_at}}</p>
                <p> بواسطة :{{$user->name}}</p>
                <p> عبر مكتب :  {{$office->name}}</p> 
                @if ($report->active==1)
                    <p>الحساب : غير مدفوع</p> 
                @else
                <p>الحساب :  مدفوع</p>
                @endif
                <hr>  --}}
                <a class="btn btn-outline-primary" href="whatsapp://send?text=اسم العميل:  {{ ($report->name) }}%0a رقم التقرير: {{$report->id}},%0aرقم الهاتف: {{$report->phone}}%0aالنوع: {{$report->stat}}%0aالتاريخ: {{$report->created_at}}%0aبواسطة :{{$user->name}}%0aعبر مكتب :  {{$office->name}}" data-action="share/whatsapp/share">مشاركة الى واتساب</a> 
                @if (Auth::user()-> isAdministrator())
                <a href="/reports/{{ $report->id }}/edit" class="btn btn-outline-primary">تعديل</a>
                <a href="/reports/{{ $report->id }}/archive" class="btn btn-outline-primary">ارشفة</a>

                <br><br> 
                <form  id="delete-frm" method="PUT" class="d-inline" action="{{url('reports/archive/'.$report->id)}}">
                    @method('PUT')
                    @csrf
                    <button class="btn btn-outline-primary">ارشفة</button>
                </form>
                <form  id="delete-frm" class="d-inline" action="" method="POST">
                    @method('DELETE')
                    @csrf 
                    
                    <button class="btn btn-danger">حذف التقرير</button>
                </form> 
                @endif
            </div>
        </div>
    </div>
@endsection