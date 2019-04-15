@extends('layouts.master')
@section('title')

Welcome
@endsection

@section('content')

    @include('includes.message-block')

<div class="row">
    <div class="col-6">
        <h3>Sign up</h3>
        <form action="{{route('signup')}}"method="post">
            <div class="form-group">
                <label for="first_name">Your first name</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Your Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">sign up</button>
            {{ csrf_field() }}

        </form>
    </div>

    <div class="col-6">
        <h3>Sign in</h3>
        <form action="{{route('signin')}}"method="post">
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Your Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">sign in</button>
            {{ csrf_field() }}
        </form>
    </div>

</div>

@endsection