<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Shop</title>
</head>
<body>
    <div class="container my-5">
   <h2> Clients List </h1>
    <a class="btn btn-primary" href="create.php">Add clients</a>

    <table class="table">
    <thead>
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Created_at</th>
        <th>Option</th>
        </tr>
    </thead>
    <tbody>
  <?php

  include('config.php');

  $sqli = "SELECT *FROM clients";
  $result = $con->query($sqli);

  if(!$result){
      die("No data".$con->error);
  }

  while($row = $result->fetch_assoc()){

   echo"
   
   <tr>
   <td>$row[id]</td>
   <td>$row[name]</td>
   <td>$row[email]</td>
   <td>$row[phone]</td>
   <td>$row[address]</td>
   <td>$row[created_at]</td>
   <td>
   <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
   <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>

   </td>
 
</tr>
   
   ";
  }




  ?>




      
    </tbody>



     </table>



    </div>
</body>
</html>