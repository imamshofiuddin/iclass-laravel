@extends('layouts.app');

@section('content')
    <div class="text-center">
        <h1>Login iclass</h1>
        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <input type="text" name="email" class="form-control" placeholder="Email" required><br>
            <input type="password" name="password" class="form-control" placeholder="Password" required><br>
            @include('components.submit-button', [$textButton = 'Login'])
        </form>
        <p>Dont have an account ? <a href="/register">Register</a> Now</p>
    </div>
@endsection
