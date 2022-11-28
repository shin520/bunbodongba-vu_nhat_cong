@extends('index.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
                <nav aria-label="breadcrumb" style="margin-top: 10px">
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" title="feedback"><i
                                    class="ti-home"></i>{{ __('Trang chủ') }}</a></li>
                        <li class="breadcrumb-item">{{ __('Phản hồi') }}</li>
                    </ol>
                </nav>
                <div class="main-title text-center mb-5">
                    <h1 class="title font-weight-bold">{{ __('Phản hồi') }}</h1>
                </div>
                <div class="row justify-content-center">
                    @foreach ($items as $item)
                        <div class="col-md-8 mb-4 col-6">
                            <figure class="user_feedback__list">
                                <div class="user_feedback__image">
                                    <img style="width: 56px; height: 56px" src="/storage/uploads/{{ $item->img }}" class="img-fluid"
                                        alt="{{ $item->title }}" title="{{ $item->title }}">
                                </div>
                                <figcaption>
                                    <div class="user_feedback__info">
                                        <div class="user_feedback__name">
                                            <h3> <b>{{ $item->name }}</b> </h3>
                                        </div>
                                        <div class="user_feedback__description">
                                            {!! $item->description !!}
                                        </div>
                                    </div>
                                    <div class="user_feedback__video">
                                        {!! $item->url !!}
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
                <nav class="mb-5">
                    <ul class="pagination justify-content-center mb-4">
                        {{ $items->links('pagination::bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
