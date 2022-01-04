@extends('common::layouts.master')
@section('content')
<div class="container-fluid text-right">

  <!-- Page Heading -->
  <div class="input-group mb-3 justify-content-between">
    <h3 class="h3">ویرایش اطلاعات</h3>
    <a href="{{ route('fields.index') }}" class="btn btn-secondary" type="button"><i class="fa fa-arrow-left"></i></a>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">ویرایش اطلاعات رشته تحصیلی</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('fields.update',$field->id) }}" method="POST">
          @csrf
          @method('PUT')

            <div class="form-group col-md-12">
              <label for="title">عنوان رشته تحصیلی</label>
              <input type="text" class="form-control @error('title') is-invalid  @enderror" name="title" id="title" value="{{ $field->title }}" placeholder="">
              <x-input-validation-error name="title" />
            </div>
          <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
        </form>
      </div>
  </div>

</div>
@endsection
