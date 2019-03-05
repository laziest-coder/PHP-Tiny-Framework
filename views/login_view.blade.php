@extends('layout')

@section('content')
        <center>
        <form action="/login/auth" method="post">
            <h3>Login page</h3>
            <br>
            <input type="text" name="username" placeholder="Username"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="submit" value="Login">
        </form>
        </center>
@stop