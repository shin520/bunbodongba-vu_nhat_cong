@extends('be.layouts.app')
@section('content')
    <div class="card-body">
        @component('be.component.breadcrumb',['model'=>'branch'])
        @slot('li_1') Cập nhật @endslot
        @slot('title') Chi nhánh @endslot
        @slot('btn')@endslot
        @endcomponent

        <form action="{{ route('be.branch.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 mb-3">
                       @include('be.component.name_edit')
                    </div>
                    <div class="col-md-12 mb-3">
                       @include('be.component.address_edit')
                    </div>
                    <div class="col-md-12 mb-3">
                       @include('be.component.map_edit')
                    </div>
                    <div class="col-md-12 mb-3">
                       @include('be.component.hideshow_edit')
                    </div>
                </div>
                @include('be.component.button_submit',['model'=>'branch'])
            </div>
        </form>
    </div>
@endsection
