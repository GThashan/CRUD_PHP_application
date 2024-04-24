<?php
include('config.php');
$id ="";
$name ="";
$email ="";
$phone ="";
$address ="";

$error_f = "";
$sucess_f="";


if($_SERVER['REQUEST_METHOD'] == 'GET')
{
   if(!isset($_GET['id'])){
       header('location:index.php');
       exit;
   }
   $id = $_GET['id'];
   $sql = "SELECT *FROM clients WHERE id=$id";
   $result = $con->query($sql);
   $row = $result->fetch_assoc();

   if(!$row){
       header('location:index.php');
       exit;
   }
   $name =$row["name"];
   $email =$row["email"];
   $phone =$row["phone"];
   $address =$row["address"];



}else{
    $id=$_POST['id'];
    $name =$_POST["name"];
    $email =$_POST["email"];
    $phone =$_POST["phone"];
    $address =$_POST["address"];

   do{
    if( empty($id)|| empty($name) || empty($email) || empty($phone) || empty($address)){
        $error_f="All feild are required";
        break;
    }

    $sql = "UPDATE clients SET name='$name', email='$email', phone='$phone', address='$address' WHERE id='$id'";
    $result = $con->query($sql);
    if(!$result){
        die("Can't update details" . $con->error);
    }

    header('location:index.php');
    exit;
}while(false);


}





?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>create</title>
</head>
<body>

<div class="container my-5">
    <h2>Add New Client</h2>
    <?php

    if( !empty ($error_f) ){
        echo "
        <div class='alert alert-warning alert-dismissible fade-show' role='alert' >
        <strong>$error_f</strong>
        <button type='button' class='btn btn-close ' data-bs-dismiss='alert' area-label='close'></button>
        </div>
        
        ";
    }
    ?>
    <form action="" method="POST">
        <input type="hidden" name='id' value="<?php echo $id;  ?>">
        <div class="row mb-3">
            <label class="col-form-label col-sm-3">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name;    ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-form-label col-sm-3">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="email" value="<?php echo $email;    ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-form-label col-sm-3">Phone Number</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone;    ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-form-label col-sm-3">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?php echo $address;    ?>">
            </div>
        </div>
        <?php

if( !empty ($sucess_f) ){
    echo "
    <div class='row mb-3'>
    <div class='alert alert-sucess alert-dismissible fade-show' role='alert' >
    <strong>$sucess_f</strong>
    <button type='button' class='btn btn-close ' data-bs-dismiss='alert' area-label='close'></button>
    </div>
    </div>
    
    ";
}
?>




        <div class="row mb-3">
            <div class="col-sm-3 d-grid offset-sm-3">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
           
            <div class="col-sm-3">
                <a href="" class="btn btn-outline-primary" role="button">Cancel</a>
            </div>
        </div>

    </form>
</div>
    
</body>
</html>