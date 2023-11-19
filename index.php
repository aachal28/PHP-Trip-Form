<?php
$insert= false;

if(isset($_POST['name'])){
    // conn variable
    $server ="localhost";
    $username = "root";
    $password= "";
//create conn
    $con = mysqli_connect($server, $username, $password );

    if(!$con){
        die("Connection failed" .
        mysqli_connect_error());
    }
    //echo " Success Conneting to db";

    $name = $_POST['name'];
    $gender= $_POST['gender']; 
    $age =  $_POST['age'];
    $email =$_POST['email'];
    $desc =$_POST['desc'];
    $phone =$_POST['phone'];
    
    $sql= " INSERT INTO `trip`.`user` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`)
    VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());
    " ;
     //echo $sql;

    //execute

    if($con->query($sql) == true){
        //echo "successfully inserted";
        $insert= true;

    }
    else{
        echo " ERROR : $sql <br> $con->error";
    }
    //close conn
    $con-> close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
  <img src="bg.jpeg" alt="bg" class="bg">
   <div class="container">
    <h1>Welcome To NIT Varangal Trip Form</h1>
    <p>Enter Your Details</p>
    <?php
    if ($insert == true){
    echo"<p class='submit-msg'> Thanks for submitting this form! </p>";
    }
    ?>
      <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Enter Your Name">
        <input type="number" name="age" placeholder="Enter Your age">
        <input type="text" name="gender" placeholder="Enter Gender">
        <input type="email" name="email" placeholder="Enter Your Email">
        <input type="phone" name="phone" placeholder="Enter Your Phone">
        <textarea name="desc" cols="30" rows="10" placeholder="Enter Other Info">
        </textarea>
        <button  class="btn" type="submit">Submit</button>
       
      </form>  
   </div> 
   <script src="index.js"></script>
   
</body>
</html>