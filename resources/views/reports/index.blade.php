@extends('layouts.app-master')
@section('content')
@php
use Carbon\Carbon;
$date =  Carbon::now()->format('d-m-Y');
@endphp
<div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-12">
                        <h1 class="display-one">ستظهر هنا قائمة التقارير التي قمت ببيعها</h1>
                    </div>
                    
                </div>  
                <div class="row mt-5">
                    {{-- @forelse ($reports as $report)  --}}
                    @if (Auth::check())
                    @if ( Auth::user()-> isAdministrator()== 0) 
                    @forelse ($reports as $report)
                    <div class="col-sm-12 col-md-6 mb-5 mx-auto"> 
                            
                        <div class="card " style="width: 18rem;">
                 
                            <div class="card-body">
                                <h5 class="card-title">{{ ucfirst($report->name) }}</h5>
                                <p class="card-text mb-0">رقم التقرير: {{$report->id}}</p> 
                                <small class="card-text mb-2 d-block">التاريخ: {{$report->created_at}}</small>
                                <small class="card-text mb-2 d-block">النوع: {{$report->stat}}</small>
                                <a href="reports/show/{{ $report->id }}" class="btn btn-primary">التفاصيل</a>
                            </div>
                            </div>
                    </div> 
                    @empty
                    <p class="text-warning">ليس لديك تقارير بعد</p>
                    @endforelse
                    @else 
                    <div class="">
                        <form action="" > 
                            {{-- @csrf  --}}
                            {{-- <input type="hidden" value="{{$users->id}}" name="id"> --}}
                            <div class="form-check form-check-inline">
                                @if ($stat=='الكل')
                                <input class="form-check-input" checked type="radio" id="all"  value="الكل" name="stat">
                                @endif
                                <input class="form-check-input" type="radio" id="all"  value="الكل" name="stat">
                                <label class="form-check-label" for="all">الكل</label>  
                               
                              </div>
                            <div class="form-check form-check-inline"> 
                            @if ($stat=='اجل')
                            <input class="form-check-input" checked type="radio" id="later" value="اجل" name="stat">
                            @endif 
                            <input class="form-check-input" type="radio" id="later" value="اجل" name="stat">
                                <label class="form-check-label" for="later">اجل</label>  
                              </div>
                              <div class="form-check form-check-inline">
                            @if ($stat=='نقد')
                            <input class="form-check-input" type="radio" checked id="cash" value="نقد" name="stat">
                            @endif
                                <input class="form-check-input" type="radio" id="cash" value="نقد" name="stat">
                                <label class="form-check-label" for="cash">نقد</label>
                              </div>
                              <div class="form-group">
                                <label class="form-label" for="date">التاريخ</label>
                                <input type="date" class="form-control" name="date"  id="date"> 
                                <script>
                                    document.getElementById('date').value = new Date().toISOString().substring(0, 10);
                                    </script>
                              </div> 
                              <button type="submit" class="btn btn-primary mt-4">عرض</button>
                        </form>
                    </div>
                        <div class="">
                            <table class="table">
                                <thead> 
                                    
                                  <tr>
                                    <th scope="col">الرقم</th>
                                    <th scope="col">اسم العميل</th>
                                    <th scope="col">النوع</th>
                                    <th scope="col">السعر</th>
                                    <th scope="col">الموظف</th>
                                    <th scope="col">التاريخ</th>
                                    <th scope="col">المكتب</th>
                                  </tr>
                                </thead> 
                                {{-- @forelse ($reports as $report) --}}
                                <tbody>
                                    @forelse ($reports as $report)
                                  <tr> 
                                    
                                    <th scope="row"><a href="reports/show/{{$report->id}}" class="btn btn-outline-primary">{{$report->id}}</a></th>
                                    <td>{{$report->name}}</td>
                                    <td>{{$report->stat}}</td>
                                    <td>{{$report->price}}</td>
                                    <td>{{$report->user->name}}</td>
                                    <td>{{$report->created_at->format('Y-m-d')}}</td>
                                    <td>{{$report->office->name}}</td>
                                  </tr> 
                                  @empty
                                    <p class="text-warning">ليس لديك تقارير بعد</p>
                                    @endforelse
                                 
                                </tbody>
                              </table> 
                        </div> 
                        @endif 
                        @else
                        <p class="display-one">
                          لم تقوم بتسجيل الدخول بعد. قم بتسجيل الدخول او انشاء حساب جديد
                        </p> 
                        <div class="mt-3 d-flex align-items-center justify-content-center">
                          <a href="{{ route('login.perform') }}" class="btn btn-outline-primary me-2 mx-2">تسجيل الدخول</a>
                        <a href="{{ route('register.perform') }}" class="btn btn-outline-primary mx-2">انشاء حساب</a>
                        </div>
                        
                        @endif
                      
                </div>              
                
            </div>
        </div>
    </div>
@endsection 
