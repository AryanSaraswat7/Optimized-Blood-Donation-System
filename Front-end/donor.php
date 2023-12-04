<?php

    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $aadhar_number = $_POST['aadhar_number'];
//connecting the database

$conn = new mysqli('localhost','root','','donor');
if($conn->connect_error){
   die('Connection has Failed:'.$conn->connect_error);
}
else{
$stmt = $conn->prepare("insert into donor_data(name,blood_group,age,email,aadhar_number)
     values(?,?,?,?,?)");
     $stmt->bind_param("ssiss",$name,$blood_group,$age,$email,$aadhar_number);
     $stmt->execute();
     echo "Your Registration as donor is successfull";
        require_once 'matching_algo.php';
     $stmt->close();
     $conn->close();
}


?>