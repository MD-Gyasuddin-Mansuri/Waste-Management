<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Login</title>
</head>
<body>
    <section class="container">
        <div class="box form-box">

        <?php
        include("php/config.php");
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);

            $result = mysqli_query($con, "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'") or die("Error Occurred");
            $row = mysqli_fetch_assoc($result);

            if(is_array($row) && !empty($row)){
                $_SESSION['valid'] = $row['Email'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['age'] = $row['Age'];
                $_SESSION['id'] = $row['ID'];
                // header("Location: index.php");
        }else{
            echo "<div class='message'>
            <p>Invalid Email or Password</p>
            </div>";
            echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
        }
        if(isset($_SESSION['valid'])){
            header("Location: SignIndex.php");
        }
    }else{
        ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="text">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" name="submit" class="btn" value="Login" required>
                </div>
                <div class="links">
                    Don't have an account? <a href="signup.php">Signup</a>
                </div>
            </form>
        </div>
        <?php
        } ?>
    </section>
</body>
</html>