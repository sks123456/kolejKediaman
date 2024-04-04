<!-- login_view.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (isset($error)) { ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php } ?>
    <form action="<?php echo base_url('CodeIgniterTraining/index.php/logincontroller/login'); ?>" method="post">
        No Matrik <input type="text" name="student_id"><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>