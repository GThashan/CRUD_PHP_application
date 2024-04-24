<?php

include("config.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM clients WHERE id=$id";
    $result = $con->query($sql);
}

header('location:index.php');
exit;



?>