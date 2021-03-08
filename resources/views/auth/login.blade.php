@extends('layouts.app')
@section('title', 'Login')
@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <section id="form">
                            <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                                <h2>Log In</h2>

                                @csrf
                                <div class="row100">
                                    <div class="col">
                                        <div class="inputBox">
                                            <input type="text" required='required' name="email">
                                            <span class="text">{{ __('E-Mail Address') }}*</span>
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
                                            <input type="text" name="password" required autocomplete="current-password">
                                            <span class="text">{{ __('Password') }}*</span>
                                            <span class="line"></span>
                                        </div>
                                        @error('password')
                                        <div class="form-error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                {{--                                <button type="submit" class="btn btn-primary">--}}
                                {{--                                    --}}
                                {{--                                </button>--}}
                                <div style="text-align: center;">
                                    <input type="submit" value="{{ __('Login') }}">

                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
