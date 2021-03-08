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

                                    <form action="{{ route('addMovieCheck')  }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-01">Имя </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text"
                                                               class="form-control  @error('name') error @enderror"
                                                               id="default-01"
                                                               name="name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-02"> Возрастной
                                                        рейтинг</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text"
                                                               class="form-control @error('age_rating') error @enderror"
                                                               id="default-02"
                                                               name="age_rating">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-03">Год </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text"
                                                               class="form-control @error('year') error @enderror"
                                                               id="default-03"
                                                               name="year">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-04">Страна</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text"
                                                               class="form-control @error('country') error @enderror"
                                                               id="default-04"
                                                               name="country">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-05">Слоган </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text"
                                                               class="form-control @error('tagline') error @enderror"
                                                               id="default-05"
                                                               name="tagline">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-10">Режиссер</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text"
                                                               class="form-control @error('producer') error @enderror"
                                                               id="default-10"
                                                               name="producer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-11">Время </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text"
                                                               class="form-control @error('time') error @enderror"
                                                               id="default-11"
                                                               name="time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-12">Жанр</label>
                                                    <div class="form-control-wrap">

                                                        <select class="form-select  @error('genre_id') error @enderror"
                                                                id="default-12" multiple="multiple"
                                                                data-placeholder="Жанр" name="genre_id[]">
                                                            @foreach($categories as $category )
                                                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-13">Актеры </label>
                                                    <div class="form-control-wrap">
                                                        <select
                                                            class="form-select  @error('starring_id') error @enderror"
                                                            id="default-13" multiple="multiple"
                                                            data-placeholder="Актеры" name="starring_id[]">
                                                            @foreach($actors as $actor )
                                                                <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-06">Изображение</label>
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file" name="img"
                                                                   class="custom-file-input @error('img') error @enderror"
                                                                   id="default-06">
                                                            <label class="custom-file-label" for="default-06">Choose
                                                                file</label>
                                                        </div>
                                                        @error('img') {{ $message }} @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-06">Фильм</label>
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file" name="video"
                                                                   class="custom-file-input @error('video') error @enderror"
                                                                   id="default-07">
                                                            <label class="custom-file-label" for="default-07">Choose
                                                                file</label>
                                                        </div>
                                                        @error('video') {{ $message }} @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="default-08">Трейлер</label>
                                                    <div class="form-control-wrap">
                                                        <div class="custom-file">
                                                            <input type="file" name="trailer"
                                                                   class="custom-file-input @error('trailer') error @enderror"
                                                                   id="default-06">
                                                            <label class="custom-file-label" for="default-08">Choose
                                                                file</label>
                                                        </div>
                                                        @error('img') {{ $message }} @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="nk-block nk-block-lg">
                                                    <div class="nk-block-head">
                                                        <div class="nk-block-head-content">
                                                            <h4 class="title nk-block-title">Информация </h4>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner">
                                                                    <textarea
                                                                        class="form-control tinymce-basic @error('text') error @enderror"
                                                                        name="text">
                                                                    </textarea>
                                                    </div>
                                                    @error('text') {{ $message }} @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Add</button>
                                                </div>
                                            </div>
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
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div><!-- .nk-block-head -->

                </div>
            </div>
        </div>
    </div>

@endsection
