@extends('common::layouts.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">همه رشته های تحصیلی</h1>
        <div class="">
        <a href="{{ route('fields.create') }}" title="افزودن رشته تحصیلی" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
            <i class="fa fa-plus text-white-50"></i></a>
        </div>
    </div>
    
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">رشته های تحصیلی</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>شماره رشته تحصیلی</th>
                          <th>عنوان رشته تحصیلی</th>
                          <th>تنظیمات</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($fields as $fiels)
                      <tr>
                        <td>{{ $fiels->id_number }}</td>
                        <td>{{ $fiels->title }}</td>
                        <td>
                            <form class="text-center" action="{{ route('fields.destroy', $fiels->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('fields.edit', $fiels->id) }}" class="btn btn-info" title="ویرایش"><i class="fa fa-pen-alt"></i></a>
                                <button class="btn btn-warning" type="submit" title="حذف"><i class="fa fa-trash-alt"></i></button>
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
