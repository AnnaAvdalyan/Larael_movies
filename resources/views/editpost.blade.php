@extends('layouts.app')
@section('title')
    Edit
@endsection

@section('main-content')
    <section id="form">
        <form action="{{ route('updatePost') }}" method="post">
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
            <h2>Edit Post</h2>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" required='required' name="name" value="{{$post->name}}">
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
                    <div class="inputBox">x
                        <input type="text" required='required' name="text" value="{{$post->content}}">
                        <span class="text">text*</span>
                        <span class="line"></span>
                    </div>
                    @error('text')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div style="text-align: center;">
                <input type="hidden" name="id" value="{{$post->id}}">
                <input type="submit" value="Add Post">

            </div>
        </form>
    </section>
@endsection
