@section('title')
    Add Posts
@endsection
@extends('layouts.app')


@section('main-content')
    <section id="form">
        <form action="/addPost/check" method="post" enctype="multipart/form-data">
            @csrf
            @if($errors->any())
                <div class="form-row">
                    <div class="form-group col-md-3"></div>
                    <div class="alert alert-danger col-6">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="form-group col-md-3"></div>
                </div>
            @endif
            <h2>Add Post</h2>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" required='required' name="name">
                        <span class="text">Name*</span>
                        <span class="line"></span>
                    </div>
                    @error('name')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <select name="cat_id" id="">
                            @foreach($cat as $c)
                                <option value="{{ $c->id }}"> {{$c->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('name')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="file" required='required' name="image">
                        <span class="text">Image*</span>
                        <span class="line"></span>
                    </div>
                    @error('text')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="number" required='required' name="year">
                        <span class="text">Year*</span>
                        <span class="line"></span>
                    </div>
                    @error('text')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" required='required' name="status">
                        <span class="text">Status*</span>
                        <span class="line"></span>
                    </div>
                    @error('text')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" required='required' name="content">
                        <span class="text">Content*</span>
                        <span class="line"></span>
                    </div>
                    @error('text')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div style="text-align: center;">
                <input type="submit" value="Add Post">

            </div>
        </form>
    </section>
@endsection
