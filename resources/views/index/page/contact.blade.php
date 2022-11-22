@extends('index.layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4 main-content">
                <nav aria-label="breadcrumb" style="margin-top: 10px">
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" title="contaact"><i
                                    class="ti-home"></i>{{ __('Trang chủ') }}</a></li>
                        <li class="breadcrumb-item">{{ __('LIÊN HỆ') }}</li>
                    </ol>
                </nav>
                <div class="main-title text-center mb-2">
                    <h1 class="title font-weight-bold">{{ __('LIÊN HỆ') }}</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="office" role="tabpanel" aria-labelledby="office-1">
                        {!!$content->content!!}
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="post-content">
                    <form class="phoenix_" action="" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div id="error_contact" class="alert alert-danger" style="display: none">
                                <ul style="padding-left: 0px;">
                                    @foreach ($errors->all() as $error)
                                        <li style="line-height: 32px;">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <input type="hidden" name="recaptcha" id="recaptcha">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form_control_ct" value="{{ old('name') }}" name="name" placeholder="{{ __('Tên') }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form_control_ct" value="{{ old('email') }}"
                                        name="email" placeholder="{{ __('Email') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form_control_ct" value="{{ old('phone') }}"
                                            name="phone" placeholder="{{ __('Số điện thoại') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form_control_ct" name="contactcontent" rows="5" placeholder="{{ __('Nội dung') }}">{{ old('contactcontent') }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 align-self-center">
                                <button type="submit" id="submit" class="btn_submit_form_contact"> Gửi </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            
            </div>


        </div>
        <div class="container">
            <iframe class="col-lg-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1457.5985328676384!2d106.69714170002997!3d10.771513671237969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3edc2eaaab%3A0x3243b7be6b5a1eb7!2zS2jDoWNoIFPhuqFuIEFsdW5hIELhur9uIFRow6BuaA!5e0!3m2!1svi!2s!4v1669014894946!5m2!1svi!2s" style="width: 100%; height:450px;display: block;border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    @endsection
    @push('style')
        <style>
            iframe {
                width: 100%;
            }

            .error {
                color: black !important;
            }
        </style>
    @endpush
