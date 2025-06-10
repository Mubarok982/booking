<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #eee;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center" style="margin-top: 80px;">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default" style="padding: 30px; background-color: #f1f1f1; border-radius: 8px;">

                <h3 class="text-center">Silahkan login</h3>
                <hr>

                <?php if($this->session->flashdata('message')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo site_url('auth/login'); ?>">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Load Bootstrap JS (optional) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
