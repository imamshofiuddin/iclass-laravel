@extends('layouts.app');

@section('content')
    <div class="text-center">
        <h1>Register iclass</h1>
        <form action="{{ route('register.process') }}" method="POST">
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Name" required><br>
            <input type="text" name="email" class="form-control" placeholder="Email" required><br>
            <select name="role" class="form-control" id="">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select><br>
            <input type="password" name="password" class="form-control" placeholder="Password" required><br>
            @include('components.submit-button', [$textButton = 'Register'])
        </form>
        <p>Already have an account ? <a href="/">Login</a> Now</p>
    </div>
@endsection
