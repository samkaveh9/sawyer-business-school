@extends('common::layouts.master')
@section('content')
<div class="container-fluid text-right">

  <!-- Page Heading -->
  <div class="input-group mb-3 justify-content-between">
    <h3 class="h3">ثبت اطلاعات</h3>
    <a href="{{ route('lessons.index') }}" class="btn btn-secondary" type="button"><i class="fa fa-arrow-left"></i></a>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">ثبت اطلاعات درس</h6>
      </div>

      @if ($errors->any())
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
           @foreach ($errors->all() as $error)
           <strong>{{ $error }}</strong> 
           @endforeach
         </div>
         
         <script>
           $(".alert").alert();
         </script>
      @endif

      <div class="card-body">
        <form action="{{ route('lessons.store') }}" method="POST">
          @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="title">عنوان درس</label>
                <input type="text" class="form-control @error('title') is-invalid  @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="">
                <x-input-validation-error name="title" />
              </div>
              <div class="form-group col-md-6">
                <label for="grade">مقطع تحصیلی</label>
                  <select class="form-control @error('grade') is-invalid  @enderror" name="grade" id="grade">
                    <option value="">انتخاب مقطع...</option>
                    <option value="MD">فوق دکتری</option>
                    <option value="PhD">دکتری</option>
                    <option value="Master(MSc/MA)">کارشناسی ارشد</option>
                    <option value="Bachelor(BSc/BA)">کارشناسی</option>
                    <option value="Associate">کاردانی</option>
                  </select>
                  <x-input-validation-error name="grade" />
              </div>              
            </div>
            <div class="form-row">             
              <div class="form-group col-md-6">
                <label for="theoretic_unit">واحد نظری</label>
                <input type="text" class="form-control @error('theoretic_unit') is-invalid @enderror" name="theoretic_unit" id="theoretic_unit" value="{{ old('theoretic_unit') }}" placeholder="">
                <x-input-validation-error name="theoretic_unit" />
              </div>
              <div class="form-group col-md-6">
                <label for="practical_unit">واحد عملی</label>
                <input type="text" class="form-control @error('practical_unit') is-invalid  @enderror" name="practical_unit" id="practical_unit" value="{{ old('practical_unit') }}" placeholder="">
                <x-input-validation-error name="practical_unit" />
              </div>
            </div>
            <div class="form-row">            
              <div class="form-group col-md-6">
                <label for="prerequisites">پیش نیاز</label>
                <select class="form-control @error('prerequisites') is-invalid  @enderror" name="prerequisites" id="prerequisites">
                  <option value="does not have">ندارد</option>
                  @foreach ($lessons as $lesson)                      
                  <option value="have">{{ $lesson->title }}</option>
                  @endforeach
                </select>
                <x-input-validation-error name="prerequisites" />
              </div>
              <div class="form-group col-md-6">
                <label for="need">هم نیاز</label>
                 <select class="form-control @error('need') is-invalid  @enderror" name="need" id="need">
                  <option value="does not have">ندارد</option>
                  <option value="have">دارد</option>
                </select>
                <x-input-validation-error name="need" />            
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="teacher_id">استاد</label>
                <select class="form-control @error('teacher_id') is-invalid  @enderror" name="teacher_id" id="teacher_id">
                  <option value="">انتخاب استاد...</option>
                  @foreach ($teachers as $teacher)
                  <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                  @endforeach
                </select>
                <x-input-validation-error name="teacher_id" />            
              </div>
              <div class="form-group col-md-6">
                <label for="exam_date">تاریخ امتحان</label>
                <input type="text" class="form-control @error('exam_date') is-invalid  @enderror" name="exam_date" id="exam_date" value="{{ old('exam_date') }}" placeholder="">
                <x-input-validation-error name="exam_date" />
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
      $('#exam_date').datepicker({
          changeMonth: true,
          changeYear: true
      });
  });
</script>
@endpush
