<?php 
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/c4252e24a8.js" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
                <p>Logo</p>
        </div>

        <div class="right-links">

            <?php 
            $id = $_SESSION['valid'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE id=$id");


            while($result = mysqli_fetch_assoc(query)){
                $res_uname = $result['username'];
                $res_email = $result['email'];
                $res_id = $result['id'];
            }


            echo "<a href='edit.php?id=$res_id'>Change Profile</a>"
            ?>

            <a href="logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="box">
                <p>Hello <b><?php echo $res_uname ?></b></p>
            </div>
            <div class="box">
                <p>Your Email is <b><?php echo $res_email ?></b></p>
            </div>
        </div>
    </main>
</body>
</html>