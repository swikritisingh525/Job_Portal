<?php
$server = "localhost";
$username =  "root";
$password = "";
$database =  "dbjobs";

$conn = mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("Error" . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['phone_no'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `users`(`name`, `email`, `phone_no`, `password`) VALUES ('$name','$email','$number','$password')";
    if(mysqli_query($conn,$sql)){
        echo "Records inserted successfully.";
   }
   else{
    echo "ERROR:Could not able to execute $sql." . mysqli_error($conn);
   }
}

session_start();
if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(msqli_fetch_row($result)==1)
    {
        header("location:index.php");
    }
    else {
        $error="invalid email or password";
    }
}
if(isset($_POST['done'])){
    $cname=$_POST['cname'];
    $position=$_POST['position'];
    $jobdesc=$_POST['jobdesc'];
    $skills=$_POST['skills'];
    $CTC=$_POST['CTC'];
    $sql = "INSERT INTO `jobs`(`cname`, `position`, `jobdesc`, `skills`, `CTC`) VALUES ('$cname','$position','$jobdesc','$skills','$CTC')";
    if(mysqli_query($conn,$sql)){
        echo "New job posted";
    }
    else{
        echo "ERROR: Failed to post job $sql." . mysqli_error($conn); 
    }
}
if(isset($_POST['apply'])){
    $name=$_POST['name'];
    $apply=$_POST['apply'];
    $qual=$_POST['qual'];
    $year=$_POST['year'];
    $sql = "INSERT INTO `candidates`(`name`, `apply`, `qual`, `year`) VALUES ('$name','$apply','$qual','$year')";
    if(mysqli_query($conn,$sql)){
        echo "Applied successfully";
    }
    else{
        echo "ERROR: Failed to apply $sql." . mysqli_error($conn); 
    }
}
?>