<?php

    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $aadhar_number = $_POST['aadhar_number'];
//connecting the database

$conn = new mysqli('localhost','root','','recipient');
if($conn->connect_error){
   die('Connection has Failed:'.$conn->connect_error);
}
else{
$stmt = $conn->prepare("insert into recipient_data(name,blood_group,age,email,aadhar_number)
     values(?,?,?,?,?)");
     $stmt->bind_param("ssisi",$name,$blood_group,$age,$email,$aadhar_number);
     $stmt->execute();
<<<<<<< HEAD
     echo "Your Registration is successful, wait while we find a potential Donor for you";
     require_once 'matching_algo.php';
=======
<<<<<<< HEAD
     echo "Your Registration as recipient is successfull";
     require_once 'matching_algo.php';
=======
     echo "Your Registration is successful, wait while we find a potential Donor for you";
>>>>>>> 5050328d8b2bc77909f52630e95a670b392c7696
>>>>>>> 3da0587fc3d60f8fd2313e7b393111d85868c515
     $stmt->close();
     $conn->close();
}

?>