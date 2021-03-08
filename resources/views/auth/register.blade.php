@extends('layouts.app')

@section('main-content')

    <section id="form">
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            <h2>Registration</h2>
            @csrf
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" required='required' name="fname" value="{{ old('fname') }}">
                        <span class="text">{{ __('First Name') }}*</span>
                        <span class="line"></span>
                    </div>
                    @error('name')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <div class="inputBox">
                        <input type="text" required='required' name="lname" value="{{ old('lname') }}">
                        <span class="text">{{ __('Last Name') }}*</span>
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
                        <input type="email" required='required' name="email" value="{{ old('email') }}">
                        <span class="text">{{ __('Email') }}*</span>
                        <span class="line"></span>
                    </div>
                    @error('email')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" required='required' name="password" value="{{ old('password') }}">
                        <span class="text">{{ __('Password') }}*</span>
                        <span class="line"></span>
                    </div>
                    @error('password')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row100">
                <div class="col">
                    <div class="inputBox">
                        <input type="text" required='required' name="password_confirmation">
                        <span class="text">{{ __('Confirm Password') }}*</span>
                        <span class="line"></span>
                    </div>
                    @error('password_confirmation')
                    <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div style="text-align: center;">
                <input type="submit" value="{{ __('Register') }}">

            </div>
        </form>
    </section>

@endsection
