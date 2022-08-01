@extends('layouts.app-master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h3 class="display-4 text-center">اضافة تقرير جديد</h3>
                    <p class="text-center">قم بتعبئة بيانات التقرير</p>

                    <hr>
                   
                    <form  method="POST" action="/reports">
                        @csrf 
                        <input type="hidden" value="1" name="id">
                        <div class="row d-flex align-items-center justify-content-center"> 
                            <div class="control-group col-8 mx-3 col-md-8 mt-2">  
                                <label for="office_id">office</label>
                                <select class="form-select" name="office_id" id="office_id" required> 
                                    @forelse ($officers as $office)
                                    <option value="{{$office->id}}">{{$office->name}}</option> 
                                    @empty
                                    <option value="null">لايوجد اي مكتب</option>
                                    @endforelse
                                  </select>
                                
                            </div>
                            <div class="control-group col-8 mx-3 col-md-8 mt-2">
                                <label for="name">name</label>
                                <input type="text" id="name" class="form-control" name="name"
                                       placeholder="ادخل اسم العميل" required>
                            </div>
                            <div class="control-group col-8 mx-3 col-md-8 mt-2">
                                <label for="price">price</label>
                                <input type="number" id="price" class="form-control" name="price" placeholder="ادخل سعر التقرير"
                                          required>
                            </div> 
                            <div class="control-group col-8 mx-3 col-md-8 mt-2">
                                <label for="phone">phone</label>
                                <input type="number" id="phone" class="form-control" name="phone" placeholder="رقم الهاتف "
                                          >
                            </div> 
                            <div class="col-8 mx-3 col-md-8 mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="later" value="اجل" name="stat">
                                    <label class="form-check-label" for="later">اجل</label>  
                                   
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="cash" value="نقد" name="stat">
                                    <label class="form-check-label" for="cash">نقد</label>
                                  </div>
                            </div>
                            <div class="control-group col-8 mx-3 col-md-8 mt-2 d-none">
                                <label for="active">active</label>
                                <input type="text" id="active" class="form-control" name="active" value="1" placeholder="Enter stat Body"
                                          required>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    حفظ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
  <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
  </script>
@endsection