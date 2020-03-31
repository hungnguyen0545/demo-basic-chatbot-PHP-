<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="signin-container">
        <form action="loginUser.php" id="login-form" method="POST">
            <table>
                <tr>
                    <td>
                        <input type="email" name="UserEmail" placeholder="Enter Your Email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="UserPassword" placeholder="Enter Your Email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="SIGN IN">
                    </td>
                </tr>
                <?php
                    if(isset($_GET['error'])) {
                ?>
                 <tr>
                    <td>
                       <span>Check your Email or Password</span>
                    </td>
                </tr>
                <?php
                 }
                ?>
            </table>
        </form>
    </div>
</body>

</html>