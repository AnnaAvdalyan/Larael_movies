@extends('layouts.admin-app')
@section('title') Добавить актера  @endsection
@section('admin-content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">@if(isset($actor))  Редактировать   @else Добавить @endif   актера </h3>
                                <div class="nk-block-des text-soft">
                                </div>
                            </div><!-- .nk-block-head-content -->

                        </div><!-- .nk-block-between -->

                        <div class="preview-block">
                            <div class="row gy-4">
                                <div class="w-65">
{{--                                    @dd($errors);--}}
                                    @if($errors->all())
                                        @foreach($errors->all() as $error)
                                            <div class="example-alert" style="margin: 15px 0;">
                                                <div class="alert alert-danger alert-icon alert-dismissible">
                                                    <em class="icon ni ni-cross-circle"></em> {{ $error }}
                                                    <button class="close" data-dismiss="alert"></button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    @if(Session::has('success'))
                                        <div class="example-alert" style="margin: 15px 0;">
                                            <div class="alert alert-success alert-icon">
                                                <em class="icon ni ni-check-circle"></em> <strong>Thanks for your
                                                    deposit</strong>.{{ Session::get('success') }} </div>
                                        </div>
                                    @endif
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <form
                                                action="@if(isset($actor)){{  "/admin/editActor/$actor->id/check" }}@else{{ route('addActorCheck') }}@endif"
                                                enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="row g-4">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name-1">Полная имя </label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" class="form-control @error('name') error @enderror" name="name"
                                                                        value="@if(isset($actor)){{  $actor->name }}@endif{{ old('name') }}" id="full-name-1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="outlined-date-picker">Дата
                                                                рождения</label>
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-right">
                                                                    <em class="icon ni ni-calendar-alt"></em>
                                                                </div>
                                                                <input type="text" class="form-control    date-picker @error('date_of_birth') error @enderror"
                                                                       value="@if(old('date_of_birth') == '') @if(isset($actor)){{  $actor->date_of_birth }}@endif @else{{  old('date_of_birth') }}@endif" name="date_of_birth" id="outlined-date-picker">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="phone-no-1">Место рождения</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" value="@if(old('place_of_birth') == '') @if(isset($actor)){{  $actor->place_of_birth }}@endif @else{{  old('place_of_birth') }}@endif" class="form-control @error('place_of_birth') error @enderror" id="phone-no-1" name="place_of_birth">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="pay-amount-1">
                                                                Образование</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" value="@if(old('education') == '') @if(isset($actor)){{  $actor->education }}@endif @else{{  old('education') }}@endif" class="form-control @error('education') error @enderror"
                                                                       id="pay-amount-1" name="education">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="phone-no-1">Дебют в кино</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text" value="@if(old('debut') == '') @if(isset($actor)){{  $actor->debut }}@endif @else{{  old('debut') }}@endif" class="form-control @error('debut') error @enderror" id="phone-no-1" name="debut">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="default-06">Главная фотография </label>
                                                            <div class="form-control-wrap">
                                                                <div class="custom-file">
                                                                    <input type="file"   name="img"  class="custom-file-input @error('img') error @enderror" id="default-06">
                                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                                </div>
                                                                @error('img') {{ $message }} @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6"></div>

                                                    <div class="col-12">
                                                        <div class="nk-block nk-block-lg">
                                                            <div class="nk-block-head">
                                                                <div class="nk-block-head-content">
                                                                    <h4 class="title nk-block-title">Семья </h4>
                                                                </div>
                                                            </div>
                                                                <div class="card-inner">
                                                                    <textarea class="form-control tinymce-basic @error('family') error @enderror" name="family">
                                                                        @if(old('family') == '') @if(isset($actor)){{  $actor->family }}@endif @else    {{  old('family') }} @endif
                                                                    </textarea>
                                                                </div>
                                                            @error('text') {{ $message }} @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="nk-block nk-block-lg">
                                                            <div class="nk-block-head">
                                                                <div class="nk-block-head-content">
                                                                    <h4 class="title nk-block-title">Биография</h4>
                                                                </div>
                                                            </div>
                                                                <div class="card-inner">
                                                                    <textarea class="form-control tinymce-basic @error('text') error @enderror" name="text">
                                                                     @if(old('text') == '') @if(isset($actor)){{  $actor->biography }}@endif @else    {{  old('text') }} @endif
                                                                    </textarea>
                                                                </div>
                                                            @error('text') {{ $message }} @enderror
                                                        </div>
                                                    </div> <div class="form-group">
                                                        <button type="submit" class="btn btn-lg btn-primary">Add</button>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>

                </div>
            </div><!-- .nk-block-head -->

        </div>
    </div>
    </div>
    </div>

@endsection
