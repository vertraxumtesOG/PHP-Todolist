<?php

require_once 'db_connect.php';
if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];
    $description = $_POST['todoDescription'];

    function check($string){
        $string  = htmlspecialchars($string);
        $string = strip_tags($string);
        $string = trim($string);
        $string = stripslashes($string);
        return $string;
    }

    if(empty($title)){
        $error  = true;
        $titleErrorMsg = "Title cannot be empty!";
    }
    if(empty($description)){
        $error = true;
        $descriptionErrorMsg = "Description cannot be empty!";
    }

    db();
    global $link;
    $query = "INSERT INTO todo(todoTitle, todoDescription, date) VALUES ('$title', '$description', now() )";
    $insertTodo = mysqli_query($link, $query);
    if($insertTodo){
        echo "You added a new Todo!";
    }else{
        echo mysqli_error($link);
    }

}
?>

<html>
<head>
    <title>Create Todo list</title>
</head>
<body>
<h1>Create Todo List</h1>
<button type="submit"><a href="index.php">View all Todo</a></button>
<form method="post" action="create.php">
    <p>Todo title: </p>
    <input name="todoTitle" type="text">
    <p>Todo description: </p>
    <input name="todoDescription" type="text">
    <br>
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>

