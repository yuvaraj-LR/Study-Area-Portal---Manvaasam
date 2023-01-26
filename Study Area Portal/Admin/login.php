<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manvaasam Admin Login</title> 
    <style>

        body {
            background-color: lavenderblush;
        }

        .container {
            margin: 8% auto 15% auto;
            padding: auto;
            text-align: center;
        }

        .content {
            border: 5px double black;
            margin: 0 40%;
            padding: 15px;
            width: 350px;
        }

        .image {
            margin: 6% 0 2% 0;
        }

        input {
            border-style: none;
            border-bottom: 2px solid black;
        }

        input.text{
            border-style: none;
        }

        input[type="text" i],
        input[type="password" i] {
            font-size: 20px;
            border: 0;
            outline: 0;
            background: transparent;
            border-bottom: 1px solid black;
        }

        .btn {
            background: #58e8ba;
            background-image: -webkit-linear-gradient(top, #58e8ba, #39b82b);
            background-image: -moz-linear-gradient(top, #58e8ba, #39b82b);
            background-image: -ms-linear-gradient(top, #58e8ba, #39b82b);
            background-image: -o-linear-gradient(top, #58e8ba, #39b82b);
            background-image: linear-gradient(to bottom, #58e8ba, #39b82b);
            -webkit-border-radius: 28;
            -moz-border-radius: 28;
            border-radius: 28px;
            font-family: Georgia;
            color: #000;
            font-size: 20px;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
            }

        .btn:hover {
            background: #39b82b;
            background-image: -webkit-linear-gradient(top, #39b82b, #58e8ba);
            background-image: -moz-linear-gradient(top, #39b82b, #58e8ba);
            background-image: -ms-linear-gradient(top, #39b82b, #58e8ba);
            background-image: -o-linear-gradient(top, #39b82b, #58e8ba);
            background-image: linear-gradient(to bottom, #39b82b, #58e8ba);
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="image">
            <img src="../img/logo.png" alt="logo">
        </div>
        <div class="content">
            <div class="title">
                <u><h1 class="title-heading">Admin Portal</h1></u>
            </div>
            <div class="username-password">
                <form name="f1" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
                    <h2>User Name</h2>
                    <input type="text" name="user" placeholder="User Name" autocomplete="off" required=""> <br>
                    <h2>Password</h2>
                    <input type="password" name="pass" placeholder="Password" autocomplete="off" required="" > <br> <br>

                    <input type="submit" name="Login" value="Login" class="btn">
                </form>
            </div>
        </div>
    </div>

<?php      
    
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "Manvaasam";  
    
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }
    $username = $_POST['user'];  
    $password = $_POST['pass'];
    
    if (isset($username) && isset($password)) {
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
        
        $sql = "select * from Login where uname = '$username' and pass = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        
        if($count == 1){  
            // echo "<script>alert('Login Successfully!!!')</script> ";  

            echo "<script> location.href='includes/home.php'; </script>";
        }  
        else{  
            echo "<script>alert('Invalid Login! Check UserName and Password')</script> ";
        } 
    }
           
     
?>  
</body>
</html>

