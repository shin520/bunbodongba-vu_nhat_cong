@extends('be.layouts.app')
@section('content')
    <div class="card-body">


        @component('be.component.breadcrumb',['model'=>'branch'])
        @slot('li_1') Chi nhánh @endslot
        @slot('title') Thêm mới @endslot
        @slot('btn')@endslot
        @endcomponent


        <form action="{{ route('be.branch.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row" id="create_form">
                <div class="col-md-3">
                    <div class="col-md-12 mb-3">
                        @include('be.component.name_add')
                    </div>
                    <div class="col-md-12 mb-3">
                      @include('be.component.featured_add')
                    </div>
                    <div class="col-md-12 mb-3">
                      @include('be.component.hideshow_add')
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12 mb-3">
                        @include('be.component.address_add')
                    </div>
                    <div class="col-md-12 mb-3">
                        @include('be.component.map_add')
                    </div>
                </div>
                @include('be.component.button_submit',['model'=>'branch'])
            </div>
        </form>
    </div>
@endsection
