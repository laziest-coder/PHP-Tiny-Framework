<center>
    <h3>Create a task</h3>
<form action="/task/push" method="post" enctype="multipart/form-data">
    <input type="text" name="e-mail" placeholder="E-mail"><br><br>
    <textarea placeholder="Description of the task" name="text" rows="30"></textarea><br><br>
    <input type="file" name="image"><br><br>
    <input type="submit" value="Create">
</form>
</center>