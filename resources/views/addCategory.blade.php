@extends('layout')
@section('title')
    Add Category
@endsection

@section('main-content')

    <section id="section-2">
        <div class="canteiner">
            <div class="section-2">
                <div class="trends">
                    <div class="title">
                        <h1>Category</h1>
                    </div>
                    <div class="cat">
                        @foreach($cat as $c)
                            <a href="#">{{ $c->cat_name }}</a>

                        @endforeach
                        <a href="#">Adventure</a>
                        <a href="#" class='active'>Action</a>
                        <a href="#">Animation</a>
                        <a href="#">Biography</a>
                        <a href="#">Crime</a>
                        <a href="#" class='active'>Comedy</a>
                        <a href="#">Drama</a>
                        <a href="#">Documentary</a>
                        <a href="#">Adventure</a>
                        <a href="#" class='active'>Action</a>
                        <a href="#">Animation</a>
                        <a href="#">Biography</a>
                        <a href="#">Crime</a>
                        <a href="#" class='active'>Comedy</a>
                        <a href="#">Drama</a>
                        <a href="#">Documentary</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="form">
        <form action="{{ route('addCategory') }}" method="post">
            @csrf
            @if($errors->any())
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="alert alert-danger col-6">
                        <ul>
{{--                           @dd($errors)--}}
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="form-group col-md-3"></div>
                </div>
            @endif
            <h1>   $success </h1>
            <h2>Add Category</h2>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" required='required' name="name">
                        <span class="text">Category*</span>
                        <span class="line"></span>
                    </div>
                    @error('name')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div style="text-align: center;">
                <input type="hidden" name="parent" value="-1">
                <input type="hidden" name="status" value="active">
                <input type="submit" value="Add Category">

            </div>
        </form>
    </section>
@endsection
