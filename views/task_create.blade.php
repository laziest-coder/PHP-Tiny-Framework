@extends('layout')

@section('content')
    <center>
        <h3>Create a task</h3>
    <form action="/task/create" method="post" enctype="multipart/form-data">
        <input type="text" name="e-mail" placeholder="E-mail"><br><br>
        <input type="text" name="username" placeholder="Username"><br><br>
        <textarea placeholder="Description of the task" name="text" rows="10"></textarea><br><br>
        <input type="file" name="image"><br><br>
        <input type="submit" value="Create">
    </form>
    </center>
@stop