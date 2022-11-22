@extends('index.layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" title="home"><i
                                class="ti-home"></i>{{ __('Trang chủ') }}</a></li>

                    <li class="breadcrumb-item">{{ __('GIỚI THIỆU') }}</li>

                </ol>
            </nav>
            <div class="main-title text-center mb-2">
                <h1 class="title font-weight-bold">{{ __('giới thiệu') }}</h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-9">
        <article class="card post mb-5">
            <div style="overflow: hidden" class="post-content" id="post_content">
                {!! $data->content !!}

            </div>
        </article>
      </div>
    </div>
</div>
@endsection