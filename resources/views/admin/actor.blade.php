@extends('layouts.admin-app')
@section('title') {{ $actor->name }}  @endsection

@section('admin-content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="content-page wide-md m-auto">
                        <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                            <div class="nk-block-head-content text-center">
                                <h2 class="nk-block-title fw-normal">{{ $actor->name }}</h2>
                            </div>
                        </div><!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="card card-bordered">
                                <div class="card-inner card-inner-xl">
                                    <article class="entry">
                                        <div class="row mb-5">
                                            <div class="col-lg-3"><img src="{{ asset($actor->img) }}" alt=""></div>
                                            <div class="col-lg-9">
                                                <p><b> Дата рождения</b>: {{  $actor->date_of_birth }} </p>
                                                <p><b> Место рождения</b>: {{  $actor->place_of_birth }}</p>
                                                <p><b> Образование</b>: {{  $actor->education }}</p>
                                                <p><b> Дебют в кино</b>: {{  $actor->debut }}</p>
                                                {!! $actor->family  !!}
                                            </div>
                                        </div>
                                        {!! $actor->biography  !!}

                                        <div>
                                            <a href="#">Gallery</a>
                                            <a href="/admin/actor/edit/{{ $actor->id }}">Edit</a>
                                            <a href="/admin/actor/delete/{{ $actor->id }}">Delete</a>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .content-page -->
                </div>
            </div>
        </div>
    </div>

@endsection


