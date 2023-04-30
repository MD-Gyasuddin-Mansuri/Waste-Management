<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>SignUp</title>
</head>
<body>
    <section class="container">
        <div class="box form-box">

        <?php
        include("php/config.php");
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

           $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email = '$email'");

              if(mysqli_num_rows($verify_query) != 0){
                echo "<div class='message'>
                <p>This Email is already in use, Please try another one</p>
                </div>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
              }else{
                mysqli_query($con, "INSERT INTO users (Username, Email, Age, Password) VALUES ('$username', '$email', '$age', '$password')") or die("Error Occurred");
                echo "<div class = 'message'>
                <p> Registration successful!</p>
                </div>";
                echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
              }
            }else{
        ?>

            <header>Sign Up</header>

            <form action="" method="post">

                <div class="field input">
                    <label for="text">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="field input">
                    <label for="email">Age</label>
                    <input type="number" name="age" id="age" required>
                </div>

                <div class="field input">
                    <label for="text">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="field">
                    <input type="submit" name="submit" class="btn" value="Sign Up" required>
                </div>

                <div class="links">
                   Already a member? <a href="login.php">Login</a>
                </div>

            </form>

        </div>
        <?php } ?>
    </section>
</body>
</html>