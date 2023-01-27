@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.service_paginate') }}</h4>
                @if (isset($service_paginate))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('service-paginate.update_paginate', $service_paginate->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="homepage_item">{{ __('content.homepage_item') }} <span class="text-red">*</span></label>
                                    <input type="number" name="homepage_item" class="form-control" id="homepage_item" value="{{ $service_paginate->homepage_item }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="paginate">{{ __('content.paginate') }} <span class="text-red">*</span></label>
                                    <input type="number" name="paginate" class="form-control" id="paginate" value="{{ $service_paginate->paginate }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @else
                                @if ($demo_mode == "on")
                                <!-- Include Alert Blade -->
                                    @include('admin.demo_mode.demo-mode')
                                @else
                                    <form action="{{ route('service-paginate.store_paginate') }}" method="POST">
                                        @csrf
                                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="homepage_item">{{ __('content.homepage_item') }} <span class="text-red">*</span></label>
                                    <input type="number" name="homepage_item" class="form-control" id="homepage_item" value="6" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="paginate">{{ __('content.paginate') }} <span class="text-red">*</span></label>
                                    <input type="number" name="paginate" class="form-control" id="paginate" value="9" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection