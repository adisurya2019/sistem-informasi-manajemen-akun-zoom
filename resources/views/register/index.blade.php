@extends('layouts.loginTemplate')

@section('title', 'Register')

@section('security')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    
                    <div class="card card-primary">
                    <div class="card-header"><h4>REGISTER</h4></div>

                    <div class="card-body">
                        <form action="/register" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control @error('name')
                                    is-invalid
                                    @enderror" name="name" autofocus value="{{old('name')}}" >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}} 
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <input id="level" type="text" class="form-control @error('level')
                                    is-invalid
                                    @enderror" name="level" autofocus value="{{old('level')}}" >
                                @error('level')
                                    <div class="invalid-feedback">
                                        {{$message}} 
                                    </div>
                                @enderror
                            </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email')
                                is-invalid
                            @enderror" name="email" value="{{old('email')}}">
                            @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}} 
                                    </div>
                                @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" class="form-control pwstrength @error('password')
                                is-invalid
                            @enderror" name="password" value="{{old('password')}}">
                            @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}} 
                                    </div>
                            @enderror
                            </div>
                            <div class="form-group col-6">
                            <label for="password2" class="d-block">Password Confirmation</label>
                            <input id="password2" type="password" class="form-control @error('password-confirm')
                                is-invalid
                            @enderror" name="password-confirm" >
                            @error('password-confirm')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                            @enderror
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="agree" class="custom-control-input @error('agree')
                                is-invalid
                            @enderror" id="agree">
                            <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Register
                            </button>
                        </div>
                        </form>
                    </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        have an account? <a href="/login" class="text-bold">Sign In</a>
                        </div>
                    <div class="simple-footer">
                    Copyright &copy; Stisla 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection