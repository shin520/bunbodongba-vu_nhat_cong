@extends('be.layouts.app')
@section('content')
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">CẬP NHẬT GIỚI THIỆU
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Tổng Quan</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('be.about.index') }}">Giới thiệu</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <form action="{{ route('be.about.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3">
                    <div class="col-md-12 mb-3">
                        @include('be.component.name_edit')
                    </div>
                    <div class="col-md-12 mb-3">
                        @include('be.component.image_edit')
                    </div>
                    <div class="col-md-12 mb-3">
                        @include('be.component.hideshow_edit')
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            @include('be.component.description_edit')
                        </div>
                        <div class="col-md-12 mb-3">
                            @include('be.component.content_edit')
                        </div>
                    </div>
                </div>
                @include('be.component.seo-edit')
                @include('be.component.button_submit',['model'=>'about'])
            </div>
        </form>
    </div>
@endsection
