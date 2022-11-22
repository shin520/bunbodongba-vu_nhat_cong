@extends('be.layouts.app')
@section('content')
       <div class="card-body">


        @component('be.component.breadcrumb',['model'=>'branch'])
        @slot('li_1') Tổng quan @endslot
        @slot('title') Chi nhánh @endslot
        @slot('btn')@endslot
        @endcomponent

        <div class="row">
            <div class="col-md-12">
                <table class="table text-center" id="branch">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Chi nhánh</th>
                            <th scope="col">Dịc chỉ</th>
                            <th scope="col">Nổi bật</th>
                            <th scope="col">Ẩn hiện</th>
                            <th scope="col">Hành động</th>
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
                                <td>
                                    @include('be.component.show_address')
                                </td>
                                <td>
                                        @include('be.component.show_featured_checkbox')
                                </td>
                                <td>
                                        @include('be.component.show_hideshow_checkbox')
                                </td>
                                <td>
                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sửa"
                                        href="{{ route('be.branch.edit', $item->id) }}"><i class="fa fa-edit"></i></a>
                                    <form class="d-inline" method="POST" action="{{ route('be.branch.destroy',$item->id) }}">
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
    @include('be.component.js_model_featured',['model'=>'branch'])
    @include('be.component.js_model',['model'=>'branch'])
    @include('be.component.js_datatable',['model'=>'branch'])
@endpush

