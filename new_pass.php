<!DOCTYPE html>
<html lang="en">
<head>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SB Admin - New Password</title>

        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">

    </head>

<body class="bg-dark">
<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Enter new password</div>
        <div class="card-body">
<form class="login-form" action="new_password.php" method="post">
    <!-- form validation messages -->
    <?php include('message.php'); ?>
    <div class="form-group">
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-label-group">
                    <input type="text" id="password" class="form-control" placeholder="password" required="required" autofocus="autofocus" name="password">
                    <label for="password">First name</label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-label-group">
                <input type="text" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required" name="confirmPassword">
                <label for="confirmPassword">Confirm New password</label>
            </div>
        </div>
        <button class="btn btn-primary btn-block" type="submit" name="clicked">Change password</button>
        <!--              href="login.php"-->
        <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Login Page</a>
        </div>
</form>
    </div></div>
</body>
</html>