<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script defer src="../js/script.js"></script>
    <title>Document</title>
</head>

<body>
    <?php

    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case 'emptyinputs':
                echo "<p class='error'>Please fill in all the inputs</p>";
                break;
            case 'invalidemail':
                echo "<p class='error'>Please fill in a valid email</p>";
                break;
            case 'invalidphone':
                echo "<p class='error'>Please fill in a valid phone number</p>";
                break;
            case 'invalidpassword':
                echo "<p class='error'>Password must be greater than 8 characters</p>";
                break;
            case 'emailexists':
                echo "<p class='error'>This email already exists</p>";
                break;
            case 'none':
                echo "<p class='error'>Signed up successfully</p>";
                break;
        }
    }

    ?>
    <section>


        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="container">
                <div class="form">
                    <h2>Sign Up</h2>
                    <form action="./auth/signup.php" method="POST">
                        <div class="inputBox">
                            <input type="text" placeholder="full name" name="fullname">
                            <p class="error"></p>
                        </div>
                        <div class="inputBox">
                            <input type="text" placeholder="email" name="email">
                            <p class="error"></p>
                        </div>
                        <div class="inputBox">
                            <input type="text" placeholder="phone number" name="phoneNumber">
                            <p class="error"></p>

                        </div>
                        <div class="inputBox">
                            <input type="password" placeholder="password" name="password">
                            <p class="error"></p>

                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Login" name="submit">
                        </div>
                        <p class="forget">Forgot Password ? <a href="#">Click Here</a></p>
                        <p class="forget">Don't have an account ? <a href="#">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>



</body>

</html>