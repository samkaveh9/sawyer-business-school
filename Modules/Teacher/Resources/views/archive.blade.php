@extends('common::layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">بایگانی</h1>
        <a href="{{ route('teachers.index') }}" title="بازگشت" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
                class="fas fa-arrow-left text-white-50"></i></a>
    </div>   

  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">برسنل</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>تصویر</th>
                          <th>شماره پرسنلی</th>
                          <th>نام</th>
                          <th>سمت اجرایی</th>
                          <th>تنظیمات</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($teachers as $teacher)
                      <tr>
                          <td><img src="{{ asset('storage/'. $teacher->image) }}" class="rounded" width="64" height="64"></td>
                        <td>{{ $teacher->id_number }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->position }}</td>
                        <td>
                                <a href="{{ route('teachers.restore', $teacher->id) }}" class="btn btn-warning" title="بازیابی اطلاعات"><i class="fa fa-undo"></i></a>
                                <a href="{{ route('teachers.delete', $teacher->id) }}" class="btn btn-danger" title="حذف کامل اطلاعات"><i class="fa fa-trash"></i></a>
                        </td>
                     </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection
