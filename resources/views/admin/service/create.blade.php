@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.add_service') }}</h4>
            @if ($demo_mode == "on")
                <!-- Include Alert Blade -->
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @endif

                        <div class="row">
                          <div class="col-md-8">
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                          <input id="title" name="title" type="text" class="form-control" required>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for="summernote">{{ __('content.description') }}</label>
                                          <textarea id="summernote" name="desc" class="form-control"></textarea>
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
                                                                  <input id="title" name="meta_desc" type="text" class="form-control">
                                                              </div>
                                                          </div>
                                                          <div class="col-md-12">
                                                              <div class="form-group">
                                                                  <label for="meta_keyword">{{ __('content.meta_keyword') }} ({{ __('content.separate_with_commas') }})</label>
                                                                  <textarea id="meta_keyword" name="meta_keyword" class="form-control"></textarea>
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
                                                                  <label for="breadcrumb_status" class="col-form-label">{{ __('Do you want to use special breadcrumb for the page?') }}</label>
                                                                  <select name="breadcrumb_status" class="form-control" id="breadcrumb_status">
                                                                      <option value="0" selected>{{ __('content.select_your_option') }}</option>
                                                                      <option value="1">{{ __('content.yes') }}</option>
                                                                      <option value="0">{{ __('content.no') }}</option>
                                                                  </select>
                                                              </div>
                                                          </div>
                                                          <div class="col-md-12">
                                                              <div class="form-group">
                                                                  <label for="custom_breadcrumb_image">{{ __('content.custom_breadcrumb_image') }} ({{ __('content.size') }} 1920 x 350) (.svg, .jpg, .jpeg, .png)</label>
                                                                  <input type="file" name="custom_breadcrumb_image" class="form-control-file" id="custom_breadcrumb_image">
                                                                  <small id="custom_breadcrumb_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                                              </div>
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
                                            <textarea id="short_desc" name="short_desc" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="d-block">{{ __('content.icon') }}</label>
                                            <div class="btn-group">
                                                <input type="hidden" name="icon" class="form-control" id="icon">
                                                <button type="button" class="btn btn-primary iconpicker-component"><i id="icon-value" class="iconpicker-component"></i></button>
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
                                                <option value="enable">{{ __('content.enable') }}</option>
                                                <option value="disable">{{ __('content.disable') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="service_image">{{ __('content.image') }} ({{ __('content.size') }} 800 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                            <input type="file" name="service_image" class="form-control-file" id="service_image">
                                            <small id="service_image" class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="order">{{ __('content.order') }}</label>
                                            <input type="number" name="order" class="form-control" id="order" value="0">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <label for="status" class="col-form-label">{{ __('content.status') }} </label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="1" selected>{{ __('content.select_your_option') }}</option>
                                                <option value="1">{{ __('content.published') }}</option>
                                                <option value="0">{{ __('content.draft') }}</option>
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