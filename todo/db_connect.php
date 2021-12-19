<?php

function db(){
    global $link;
    $link = mysqli_connect("localhost", "root", "", "todolist") or die("I cant connect to the Database ;(");
    return $link;
}
