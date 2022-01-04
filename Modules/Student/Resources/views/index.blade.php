@extends('common::layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">همه دانشجویان</h1>
        <div class="">
        <a href="{{ route('students.create') }}" title="افزودن دانشجو" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            <i class="fa fa-plus text-white-50"></i></a>
            <a href="{{ route('students.archive') }}" title="بایگانی" class="d-none d-sm-inline-block btn btn-warning shadow-sm">
                <i class="fa fa-archive text-white-50"></i></a>
        </div>
    </div>
    
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">دانشجویان</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>تصویر</th>
                          <th>شماره دانشجویی</th>
                          <th>نام</th>
                          <th>تنظیمات</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($students as $student)
                      <tr>
                          <td><img src="{{ asset('storage/'. $student->image) }}" class="rounded" width="64" height="64"></td>
                        <td>{{ $student->id_number }}</td>
                        <td>{{ $student->name }}</td>
                        <td>
                            <form class="text-center" action="{{ route('students.destroy', $student->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('students.show', $student->id) }}" class="btn btn-success" title="نمایش اطلاعات دانشجو"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info" title="ویرایش اطلاعات دانشجو"><i class="fa fa-pen-alt"></i></a>
                                <button class="btn btn-warning" type="submit" title="انتقال به بایگانی"><i class="fa fa-trash-alt"></i></button>
                            </form>
                        </td>
                     </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection
