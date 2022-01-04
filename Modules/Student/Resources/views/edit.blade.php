@extends('common::layouts.master')
@section('content')
<div class="container-fluid text-right">

  <!-- Page Heading -->
  <div class="input-group mb-3 justify-content-between">
    <h3 class="">ویرایش اطلاعات {{ $student->name }}</h3>
    <a href="{{ route('students.index') }}" class="btn btn-secondary" type="button"><i class="fa fa-arrow-left"></i></a>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">ویرایش اطلاعات دانشجو</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

         <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">نام و نام خانوادگی</label>
              <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" id="name" value="{{ $student->name }}" placeholder="">
              <x-input-validation-error name="name" />
            </div>
            <div class="form-group col-md-6">
              <label for="father_name">نام پدر</label>
              <input type="text" class="form-control @error('father_name') is-invalid  @enderror" name="father_name" id="father_name" value="{{ $student->father_name }}" placeholder="">
              <x-input-validation-error name="father_name" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="national_code">کد ملی</label>
              <input type="text" class="form-control @error('national_code') is-invalid  @enderror" name="national_code" id="national_code" value="{{ $student->national_code }}" placeholder="">
              <x-input-validation-error name="national_code" />
            </div>
            <div class="form-group col-md-6">
              <label for="birthday_date">تاریخ تولد</label>
              <input type="text" class="form-control @error('birthday_date') is-invalid  @enderror" name="birthday_date" id="birthday_date" value="{{ $student->birthday_date }}" placeholder="">
              <x-input-validation-error name="birthday_date" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="lastـdegree">آخرین مدرک تحصیلی</label>
              <select class="form-control @error('lastـdegree') is-invalid  @enderror" name="lastـdegree" id="lastـdegree">
                  <option value="">انتخاب مدرک...</option>
                  <option {{ $student->lastـdegree == "MD" ? 'selected' : '' }} value="MD">فوق دکتری</option>
                  <option {{ $student->lastـdegree == "PhD" ? 'selected' : '' }} value="PhD">دکتری</option>
                  <option {{ $student->lastـdegree == "Master(MSc/MA)" ? 'selected' : '' }} value="Master(MSc/MA)">کارشناسی ارشد</option>
                  <option {{ $student->lastـdegree == "Bachelor(BSc/BA)" ? 'selected' : '' }} value="Bachelor(BSc/BA)">کارشناسی</option>
                  <option {{ $student->lastـdegree == "Associate" ? 'selected' : '' }} value="Associate">کاردانی</option>
                  <option {{ $student->lastـdegree == "Diploma" ? 'selected' : '' }} value="Diploma">دیپلم</option>
                  <option {{ $student->lastـdegree == "Below Diploma" ? 'selected' : '' }} value="Below Diploma">زیر دیپلم</option>
                </select>
                <x-input-validation-error name="lastـdegree" />
            </div>
            <div class="form-group col-md-6">
              <label for="averageـofـtheـlastـdegree">معدل آخرین مدرک تحصیلی</label>
              <input type="text" class="form-control @error('lastـdegree') is-invalid  @enderror" name="averageـofـtheـlastـdegree" id="averageـofـtheـlastـdegree" value="{{ $student->averageـofـtheـlastـdegree }}" placeholder="">
              <x-input-validation-error name="lastـdegree" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="gender">جنسیت</label>
              <select class="form-control @error('gender') is-invalid  @enderror" name="gender" id="gender">
                <option value="">انتخاب جنسیت...</option>
                <option {{ $student->gender == "male" ? 'selected' : '' }} value="male">مرد</option>
                <option {{ $student->gender == "female" ? 'selected' : '' }} value="female">زن</option>
              </select>
              <x-input-validation-error name="gender" />
            </div>
            <div class="form-group col-md-6">
              <label for="military_service_status">وضعیت سربازی</label>
              <select class="form-control @error('') is-invalid  @enderror" name="military_service_status" id="military_service_status">
                <option value="">انتخاب وضعیت سربازی...</option>
                <option {{ $student->military_service_status == "completed" ? 'selected' : '' }} value="completed">تکمیل شده</option>
                <option {{ $student->military_service_status == "still to do" ? 'selected' : '' }} value="still to do">در حال انجام (امریه)</option>
                <option {{ $student->military_service_status == "exempt" ? 'selected' : '' }} value="exempt">معافیت</option>
              </select>
              <x-input-validation-error name="military_service_status" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="marital_status">وضعیت تاهل</label>
              <select class="form-control @error('marital_status') is-invalid  @enderror" name="marital_status" id="lastـdegree">
                <option value="">انتخاب وضعیت تاهل...</option>
                <option {{ $student->marital_status == "single" ? 'selected' : '' }} value="single">مجرد</option>
                <option {{ $student->marital_status == "married" ? 'selected' : '' }} value="married">متاهل</option>
              </select>
              <x-input-validation-error name="marital_status" />
            </div>            
            <div class="form-group col-md-6">
              <label for="phone_number">تلفن همراه</label>
              <input type="text" class="form-control @error('phone_number') is-invalid  @enderror" name="phone_number" id="phone_number" value="{{ $student->phone_number }}" placeholder="">
              <x-input-validation-error name="phone_number" />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tuition">(تومان) شهریه پرداختی هر ترم</label>
              <input type="text" class="form-control" name="tuition @error('tuition') is-invalid  @enderror" id="tuition" value="{{ $student->tuition }}">
              <x-input-validation-error name="tuition" />
            </div>
            <div class="form-group col-md-6">
              <label for="image">تصویر</label>
              <input type="file" class="form-control @error('image') is-invalid  @enderror" name="image" id="image" placeholder="">
              <x-input-validation-error name="image" />
              <img src="{{ asset('storage/'. $student->image) }}" class="rounded" width="128" height="128">
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