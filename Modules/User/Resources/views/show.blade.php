@extends('common::layouts.master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">مشاهده اطلاعات کاربر</h1>
        <a href="{{ route('users.index') }}" title="بازگشت" class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i
                class="fas fa-arrow-left text-white-50"></i></a>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">اطلاعات تکمیلی</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                             
                            <tbody>
                                <tr>
                                    <td>نام پدر</td>
                                    <td>{{ $user->father_name }}</td>
                                </tr>
                                <tr>
                                    <td>کد ملی</td>
                                    <td>{{ $user->national_code }}</td>
                                </tr>
                                <tr>
                                    <td>سمت شغلی</td>
                                    <td>{{ $user->position }}</td>
                                </tr>
                                <tr>
                                    <td>تاریخ تولد</td>
                                    <td>{{ $user->birthday_date }}</td>
                                </tr>
                                <tr>
                                    <td>آخرین مدرک تحصیلی</td>
                                    <td>{{ $user->lastـdegree }}</td>
                                </tr>
                                <tr>
                                    <td>معدل آخرین مدرک تحصیلی</td>
                                    <td>{{ $user->averageـofـtheـlastـdegree }}</td>
                                </tr>
                                <tr>
                                    <td>شماره پرسنلی</td>
                                    <td>{{ $user->id_number }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <img class="rounded m-auto d-block" src="{{ asset('storage/' . $user->image) }}" width="128" height="128">
                    </div>
                    {{--  <div class="mt-4 text-center small"></div>  --}}
                    <h5 class="text-center small font-weight-bold">{{ $user->name }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
@endpush
