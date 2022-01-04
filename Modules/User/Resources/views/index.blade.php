@extends('common::layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">همه پرسنل</h1>
        <div class="">
        <a href="{{ route('users.create') }}" title="افزودن پرسنل" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            <i class="fa fa-plus text-white-50"></i></a>
            <a href="{{ route('users.archive') }}" title="بایگانی" class="d-none d-sm-inline-block btn btn-warning shadow-sm">
                <i class="fa fa-archive text-white-50"></i></a>
        </div>
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
                      @foreach ($users as $user)
                      <tr>
                          <td><img src="{{ asset('storage/'. $user->image) }}" class="rounded" width="64" height="64"></td>
                        <td>{{ $user->id_number }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->position }}</td>
                        <td>
                            <form class="text-center" action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-success" title="نمایش اطلاعات پرسنل"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info" title="ویرایش اطلاعات پرسنل"><i class="fa fa-pen-alt"></i></a>
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
