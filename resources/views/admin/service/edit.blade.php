@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <div class="d-md-flex justify-content-between align-items-center mb-20">
                    <h4 class="card-title">{{ __('content.edit_service') }}</h4>
                    <div>
                        <a href="{{ url()->previous() }}"  class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
                    </div>
                </div>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                            <input type="text" name="title" class="form-control" id="title" value="{{ $service->title }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="summernote">{{ __('content.description') }}</label>
                                            <textarea type="text" name="desc" class="form-control" id="summernote">{{ $service->desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 height-card box-margin">
                                        <div id="accordion-">
                                            <div class="card mb-2">
                                                <div class="card-header bg-secondary">
                                                    <a class="collapsed text-white" data-toggle="collapse" href="#accordion-1" aria-expanded="false">
                                                        {{ __('content.seo_optimization') }}
                                                    </a>
                                                </div>

                                                <div id="accordion-1" class="collapse" data-parent="#accordion-" style="">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="meta_desc">{{ __('content.meta_desc') }} </label>
                                                                    <input id="title" name="meta_desc" type="text" class="form-control" value="{{ $service->meta_desc }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                                                    <textarea id="meta_keyword" name="meta_keyword" class="form-control">{{ $service->meta_keyword }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header bg-secondary">
                                                    <a class="text-white" data-toggle="collapse" href="#accordion-2" aria-expanded="true">
                                                        {{ __('content.breadcrumb_customization') }}
                                                    </a>
                                                </div>
                                                <div id="accordion-2" class="collapse" data-parent="#accordion-" style="">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="breadcrumb_status" class="col-form-label">{{ __('content.use_special_breadcrumb') }}</label>
                                                                    <select name="breadcrumb_status" class="form-control" id="breadcrumb_status">
                                                                        <option value="0" selected>{{ __('content.select_your_option') }}</option>
                                                                        <option value="1" {{ $service->breadcrumb_status == 1 ? 'selected' : '' }}>{{ __('content.yes') }}</option>
                                                                        <option value="0" {{ $service->breadcrumb_status == 0 ? 'selected' : '' }}>{{ __('content.no') }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="custom_breadcrumb_image">{{ __('content.custom_breadcrumb_image') }} ({{ __('content.size') }} 1920 x 350) (.svg, .jpg, .jpeg, .png)</label>
                                                                    <input type="file" name="custom_breadcrumb_image" class="form-control-file" id="custom_breadcrumb_image">
                                                                    <small id="custom_breadcrumb_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                                                </div>
                                                                <div class="height-card box-margin">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="avatar-area text-center">
                                                                                <div class="media">
                                                                                    @if (!empty($service->custom_breadcrumb_image))
                                                                                        <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                                            <img src="{{ asset('uploads/img/service/breadcrumb/'.$service->custom_breadcrumb_image) }}" alt="service image" class="rounded">
                                                                                        </a>
                                                                                    @else
                                                                                        <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                                        </a>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <!--end card-body-->
                                                                        </div>
                                                                    </div>
                                                                    <!--end card-->
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="short_desc">{{ __('content.short_desc') }}</label>
                                            <textarea id="short_desc" name="short_desc" class="form-control">{{ $service->short_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                            <div class="btn-group">
                                                <input type="hidden" name="icon" class="form-control" id="icon" value="{{ $service->icon }}">
                                                <button type="button" class="btn btn-primary  iconpicker-component"><i id="icon-value" class="{{ $service->icon }} iconpicker-component"></i></button>
                                                <button type="button" id="iconPickerBtn" class="icp icp-dd btn btn-primary dropdown-toggle iconpicker-component" data-selected="fa-car" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label for="image_status" class="col-form-label">{{ __('content.image_status') }} </label>
                                            <select class="form-control" name="image_status" id="image_status">
                                                <option value="enable" selected>{{ __('content.select_your_option') }}</option>
                                                <option value="enable" {{ $service->image_status == "enable" ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                                                <option value="disable" {{ $service->image_status == "disable" ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="service_image">{{ __('content.image') }} ({{ __('content.size') }} 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                            <input type="file" name="service_image" class="form-control-file" id="service_image">
                                            <small id="service_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                        </div>
                                        <div class="height-card box-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="avatar-area text-center">
                                                        <div class="media">
                                                            @if (!empty($service->service_image))
                                                                <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/service/'.$service->service_image) }}" alt="service image" class="rounded">
                                                                </a>
                                                            @else
                                                                <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!--end card-body-->
                                                </div>
                                            </div>
                                            <!--end card-->
                                        </div>
                                        <!--end col-->
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="order">{{ __('content.order') }}</label>
                                            <input type="number" name="order" class="form-control" id="order" value="{{ $service->order }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label for="status" class="col-form-label">{{ __('content.status') }} </label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                                <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>{{ __('content.published') }}</option>
                                                <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>{{ __('content.draft') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary col-12">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection