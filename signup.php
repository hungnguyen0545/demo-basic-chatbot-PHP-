<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>

<body>
    <div class="signup-container">
        <form action="insertUsers.php" method="POST" id="signup-form">
            <h2>SIGN UP FORM </h2>
            <table>

                <tr>
                    <td>
                        <input type="text" name="UserName" placeholder="Enter your Name" require>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="email" name="UserEmail" placeholder="Enter your Email" require>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="UserPassword" placeholder="Enter your Password" require>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="SIGN UP">
                    </td>
                </tr>
                <?php
                if (isset($_GET['success'])) {
                ?>
                <tr>
                    <td>
                        <span> User Insert Successfully </span>
                    </td>
                </tr>
                <?php
                }?>
            </table>
        </form>
    </div>
</body>

</html>