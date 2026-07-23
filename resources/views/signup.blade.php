@extends('layout.app')

@section('title', 'Sign Up')
@section('content')
    <div class="box">
        <div class="header">
            <h1>Accounting Register</h1>
        </div>
        <form action="{{ route('signup') }}" method="post" class="register-form">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <input type="submit" value="Register" name="register" class="btn btn-primary">
            <a href="/login">Back</a>
        </form>
    </div>
</div>
@endsection