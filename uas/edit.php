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
    <title>Change Profile</title>
</head>
<body>
<div class="nav">
        <div class="logo">
                <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    <div class="box form-box">
        <?php 
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

                $id = $_SESSION['id'];

                $edit_query = mysqli_query($con,"UPDATE users SET username='$username', email='$email' WHERE id=$id") or die("error occured");

                if($edit_query){
                    echo "<div class='message'>
                        <p>Profile Update!</p>
                        </div> <br>";
                    echo "<a href='home.php'><button class='btn'>Go Home</button>";
                }
            }else{

                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT*FROM users WHERE id=$id ");

                while($result = mysqli_fetch_assoc($query)){
                    $res_uname = $result['username'];
                    $res_email = $result['email'];
                }
        ?>
        <header>Change Profile</header>
        <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_uname; ?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_email; ?>" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="update" value="Update" required>
                </div>
                <?php } ?>
    </div>
</body>
</html>