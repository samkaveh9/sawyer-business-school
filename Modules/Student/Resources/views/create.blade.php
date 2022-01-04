@extends('common::layouts.master')
@section('content')
<div class="container-fluid text-right">

  <!-- Page Heading -->
  <div class="input-group mb-3 justify-content-between">
    <h3 class="h3">ثبت اطلاعات</h3>
    <a href="{{ route('students.index') }}" class="btn btn-secondary" type="button"><i class="fa fa-arrow-left"></i></a>
  </div>

  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>                
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
      </ul>
    </div>
    @endif
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">ثبت اطلاعات دانشجو</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
          @csrf


          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">نام و نام خانوادگی</label>
              <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="">
              <x-input-validation-error name="name" />
            </div>
            <div class="form-group col-md-6">
              <label for="father_name">نام پدر</label>
              <input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" id="father_name" value="{{ old('father_name') }}" placeholder="">
              <x-input-validation-error name="father_name" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="national_code">کد ملی</label>
              <input type="text" class="form-control @error('national_code') is-invalid  @enderror" name="national_code" id="national_code" value="{{ old('national_code') }}" placeholder="">
              <x-input-validation-error name="national_code" />            
            </div>
            <div class="form-group col-md-6">
              <label for="birthday_date">تاریخ تولد</label>
              <input type="text" class="form-control @error('birthday_date') is-invalid  @enderror" name="birthday_date" id="birthday_date" value="{{ old('birthday_date') }}" placeholder="">
              <x-input-validation-error name="birthday_date" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="lastـdegree">آخرین مدرک تحصیلی</label>
                <select class="form-control @error('lastـdegree') is-invalid  @enderror" name="lastـdegree" id="lastـdegree">
                  <option value="">انتخاب مدرک...</option>
                  <option value="MD">فوق دکتری</option>
                  <option value="PhD">دکتری</option>
                  <option value="Master(MSc/MA)">کارشناسی ارشد</option>
                  <option value="Bachelor(BSc/BA)">کارشناسی</option>
                  <option value="Associate">کاردانی</option>
                  <option value="Diploma">دیپلم</option>
                  <option value="Below Diploma">زیر دیپلم</option>
                </select>
                <x-input-validation-error name="lastـdegree" />
            </div>
            <div class="form-group col-md-6">
              <label for="averageـofـtheـlastـdegree">معدل آخرین مدرک تحصیلی</label>
              <input type="text" class="form-control @error('averageـofـtheـlastـdegree') is-invalid  @enderror" name="averageـofـtheـlastـdegree" id="averageـofـtheـlastـdegree" value="{{ old('averageـofـtheـlastـdegree') }}" placeholder="">
              <x-input-validation-error name="averageـofـtheـlastـdegree" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="gender">جنسیت</label>
              <select class="form-control @error('gender') is-invalid  @enderror" name="gender" id="gender">
                <option value="">انتخاب جنسیت...</option>
                <option value="male">مرد</option>
                <option value="female">زن</option>
                <x-input-validation-error name="gender" />
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="military_service_status">وضعیت سربازی</label>
              <select class="form-control @error('military_service_status') is-invalid  @enderror" name="military_service_status" id="military_service_status">
                <option value="">انتخاب وضعیت سربازی...</option>
                <option value="Completed">تکمیل شده</option>
                <option value="Still to do">در حال انجام (امریه)</option>
                <option value="Exempt">معافیت</option>
                <x-input-validation-error name="military_service_status" />
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="marital_status">وضعیت تاهل</label>
              <select class="form-control @error('marital_status') is-invalid  @enderror" name="marital_status" id="lastـdegree">
                <option value="">انتخاب وضعیت تاهل...</option>
                <option value="single">مجرد</option>
                <option value="married">متاهل</option>
                <x-input-validation-error name="marital_status" />
              </select>
            </div>            
            <div class="form-group col-md-6">
              <label for="phone_number">تلفن همراه</label>
              <input type="text" class="form-control @error('phone_number') is-invalid  @enderror" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" placeholder="">
              <x-input-validation-error name="phone_number" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tuition">(تومان)شهریه پرداختی هر ترم</label>
              <input type="text" class="form-control @error('tuition') is-invalid  @enderror" name="tuition" id="tuition" value="{{ old('tuition') }}">
              <x-input-validation-error name="tuition" />
            </div>
            <div class="form-group col-md-4">
              <label for="image">تصویر</label>
              <input type="file" class="form-control @error('image') is-invalid  @enderror" name="image" id="image" value="{{ old('image') }}" placeholder="">
              <x-input-validation-error name="image" />
            </div>            
          </div>
          <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
        </form>
      </div>
  </div>

</div>
@endsection

@push('styles')
	<link type="text/css" href="{{ asset('assets/Persian-DatePicker/css/persian-datepicker.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('assets/Persian-DatePicker/js/persian-datepicker.js') }}"></script>
<script type="text/javascript">
  $(function() {
      $('#birthday_date').datepicker({
          changeMonth: true,
          changeYear: true
      });
  });
</script>
@endpush