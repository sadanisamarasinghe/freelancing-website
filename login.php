<?php include('../config/constraints.php');?>
<?php
    if(isset($_POST['submit']))
    {
        //get the data from login form
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //check whether the user with username and password exists or not in sql
        $sql="SELECT *from user where username='$username' AND password='$password' ";

        //execute the query
        $res=mysqli_query($conn,$sql);

        //count rows to check whether the user exists or not
        $count=mysqli_num_rows($res);

        if($count==1)
        {
            //user available and login success
            $_SESSION['login']="Login successfully";
            $_SESSION['user']=$username;

            header('location:'.SITEURL.'../html/usertype.html');
        }
        else
        {
            //user not available and login failed
            $_SESSION['login']="Failed to Login ";
            header('location:'.SITEURL.'../html/login.html');
        }
    }
?>
