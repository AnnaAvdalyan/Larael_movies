@extends('layouts.admin-app')

@section('admin-content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Add Category</h3>
                                <div class="nk-block-des text-soft">
                                </div>
                            </div><!-- .nk-block-head-content -->

                        </div><!-- .nk-block-between -->
                        <div class="preview-block">
                            <div class="row gy-4">
                                <div class="col-sm-6">

                                    <form
                                        action="@if(isset($editCategory))  {{ '/admin/addCategory/edit/'. $editCategory->id .'/check' }}    @else  {{ route('addCategoryCheck') }}   @endif "
                                        method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">
                                                @if(isset($editCategory))
                                                   Edit
                                                @else
                                                    Add New
                                                @endif

                                                Category</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="default-01"
                                                       placeholder="Category" name="name"
                                                       @if(isset($editCategory)) value="{{ $editCategory->cat_name }}" @endif>
                                                @if(isset($editCategory))
                                                    <input type="hidden" name="id" value="{{ $editCategory->id }}">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Add</button>
                                        </div>
                                    </form>
                                    @if($errors->any())
                                        @foreach($errors->all() as $error)
                                            <div class="example-alert" style="margin-top: 15px;">
                                                <div class="alert alert-danger alert-icon alert-dismissible">
                                                    <em class="icon ni ni-cross-circle"></em> {{ $error }}
                                                    <button class="close" data-dismiss="alert"></button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if(Session::has('success'))
                                        <div class="example-alert" style="margin-top: 15px;">
                                            <div class="alert alert-success alert-icon">
                                                <em class="icon ni ni-check-circle"></em> <strong>Thanks for your
                                                    deposit</strong>.{{ Session::get('success') }} </div>
                                        </div>
                                        {{--                                        <div class="alert alert-success">--}}
                                        {{--                                            {{ Session::get('successful_message') }}--}}
                                        {{--                                        </div>--}}
                                    @endif


                                </div>
                                <div class="col-md-6 col-xxl-4">
                                    <div class="card card-bordered card-full">
                                        <div class="card-inner border-bottom">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">All Categories</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="nk-activity">
                                            @foreach($categories as $category)
                                                <li class="nk-activity-item"
                                                    style="display: flex; justify-content: space-between">
                                                    <div style="display: flex">
                                                        <div
                                                            class="nk-activity-media user-avatar"> {{ substr( $category->cat_name, 0, 1) }}</div>
                                                        <div class="nk-activity-data">
                                                            <div class="label">{{ $category->cat_name }}</div>
                                                            <span class="time">{{ $category->created_at }}</span>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <a href="/admin/addCategory/edit/{{ $category->id }}"
                                                           class="btn btn-round btn-icon btn-rg btn-primary"><em
                                                                class="icon ni ni-edit"></em></a>
                                                        <a href="/admin/addCategory/delete/{{ $category->id }}"
                                                           class="btn btn-round btn-icon btn-rg btn-primary"><em class="icon ni ni-trash-alt"></em></a>
                                                    </div>
                                                </li>

                                            @endforeach


                                        </ul>

                                    </div><!-- .card -->
                                </div><!-- .col -->
                            </div>

                        </div>
                    </div><!-- .nk-block-head -->

                </div>
            </div>
        </div>
    </div>

@endsection
