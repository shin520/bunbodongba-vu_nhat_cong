@extends('be.layouts.app')
@section('content')
       <div class="card-body">


        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">KHÓA HỌC
                        <a href="{{ route('be.course.add') }}" class="btn btn-primary new-custom"><i class="fa fa-plus"></i> Thêm</a>
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                            <li class="breadcrumb-item active"  aria-current="page">Khóa Học</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table text-center" id="course">
                    <thead>
                        <tr>
                            <th width="10%" scope="col">STT</th>
                            <th width="20%" scope="col">Tên</th>
                            <th width="20%" scope="col">Danh mục</th>
                            <th width="20%" scope="col">Ẩn hiện</th>
                            <th width="20%" scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">
                                   @include('be.component.show_number')
                                </th>
                                <td>
                                    @include('be.component.show_name')
                                </td>
                                <td>{{ $item->parent->name ?? '' }}</td>
                                <td>
                                        @include('be.component.show_hideshow_checkbox')
                                </td>
                                <td>
                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa"
                                        href="{{ route('be.course.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                    <form class="d-inline" method="POST" action="{{ route('be.course.destroy',$item->id) }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger del-confirm" data-toggle="tooltip" data-placement="top"
                                            title="Xoá"><i class="fa fa-trash"></i></button>
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
@push('script')
    @include('be.component.js_model',['model'=>'course'])
    @include('be.component.js_datatable',['model'=>'course'])
@endpush

