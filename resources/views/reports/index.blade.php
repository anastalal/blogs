@extends('layouts.app-master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-12">
                        <h1 class="display-one">ستظهر هنا قائمة التقارير التي قمت ببيعها</h1>
                    </div>
                    
                </div>  
                <div class="row mt-5">
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
                </div>              
                
            </div>
        </div>
    </div>
@endsection