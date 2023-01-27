@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.homepage_versions') }}</h4>
                    <form action="{{ route('homepage-version.update', $homepage_version->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_version" value="0" {{ ($homepage_version->choose_version == 0)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/img/dummy/demo-1.jpg') }}" alt="version image">
                                    </label>
                                    <span>{{ __('Static') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_version" value="1" {{ ($homepage_version->choose_version == 1)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/img/dummy/demo-2.jpg') }}" alt="light image">
                                    </label>
                                    <span>{{ __('Particles') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_version" value="2" {{ ($homepage_version->choose_version == 2)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/img/dummy/demo-3.jpg') }}" alt="version image">
                                    </label>
                                    <span>{{ __('Slider') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="hiddenradio">
                                    <label>
                                        <input type="radio" name="choose_version" value="3" {{ ($homepage_version->choose_version == 3)? "checked" : "" }}>
                                        <img class="img-fluid shadow" src="{{ asset('uploads/img/dummy/demo-4.jpg') }}" alt="light image">
                                    </label>
                                    <span>{{ __('Video') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 mt-20">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.choose_version') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection