@extends('layout.app')

@section('title', 'Login page')
    @section('content')
     <div class="container">
        <div class="cart">
            <div class="content">
                <div class="heading">
                    <h1>Login</h1>
                    <p class="caption">Welcome guys! Please login to your account.</p>
                </div>
                
                <form method="POST" action="{{ route('auth') }}">
                    @csrf
                     
                    <label for="">email <span>*</span></label><br>
                    <input type="text" name="email" placeholder="email" id="email" class="email   @error('email') is-invalid @enderror" value="{{ old('email') }}" ><br>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                     @enderror
                    <label for="">Password <span>*</span></label><br>
                    <div class="password_container">
                        <input type="password" name="password" id="password" placeholder="Password" class="password">
                        <img src="close.png" alt="" onclick="pass()" class="eye_icon" id="eye_icon">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Login</button>
                    
                </form>
                <form action="{{ route('signup')}}" method="GET">
                    <button type="submit" class="btn btn-danger mt-3" >Sign Up</button>
                </form>
                    
                
            </div>
        </div>       
    </div>
    <script src="index.js"></script>

@endsection