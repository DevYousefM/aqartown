@extends('layouts.admin')

@section('content')
    <div class="content-area">
        <div class="mr-breadcrumb">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="heading">{{ __('Add Role') }} <a class="add-btn" href="{{ route('admin-role-index') }}"><i
                                class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
                    <ul class="links">
                        <li>
                            <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('admin-role-index') }}">{{ __('Manage Roles') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin-role-create') }}">{{ __('Add Role') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="add-product-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-description">
                        <div class="body-area">
                            <div class="gocover"
                                style="background: url({{ asset(access_public() . 'assets/images/' . $gs->admin_loader) }}) no-repeat scroll center center rgba(45, 45, 45, 0.5);">
                            </div>
                            <form id="geniusform" action="{{ route('admin-role-create') }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @include('includes.admin.form-both')

                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="left-area">
                                            <h4 class="heading">{{ __('Name') }} *</h4>
                                            <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <input type="text" class="input-field" name="name"
                                            placeholder="{{ __('Name') }}" required="" value="">
                                    </div>
                                </div>

                                <hr>
                                <h5 class="text-center">{{ __('Permissions') }}</h5>
                                <hr>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Home Page Settings') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="home_page_settings">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Services') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="services">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('about us') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="about_us">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Gallery') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="gallery">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Blog') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="blog">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Reviews') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="reviews">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Contact Us Page') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="contact_us">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('General Settings') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="general_settings">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Language Settings') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="language_settings">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('SEO Tools') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="seo_tools">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Manage Staffs') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="manage_staffs">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Subscribers') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="subscribers">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Email Settings') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="emails_settings">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-4 d-flex justify-content-between">
                                        <label class="control-label">{{ __('Manage Role & Cache clear') }} *</label>
                                        <label class="switch">
                                            <input type="checkbox" name="section[]" value="super">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="left-area">

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button class="addProductSubmit-btn"
                                            type="submit">{{ __('Create Role') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
