<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Site Administration</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo ADMIN_THEME_URL; ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo ADMIN_THEME_URL; ?>css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo ADMIN_THEME_URL; ?>css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo ADMIN_THEME_URL; ?>css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo ADMIN_THEME_URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo ADMIN_THEME_URL; ?>css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">
<?php $this->load->view('siteadmin/flash_messages'); ?>
      <form class="login-form" action="<?php echo base_url(); ?>siteadmin/login/index" method="POST">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
               <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
            </div>
            <label class="checkbox">
<!--                <input type="checkbox" value="remember-me"> Remember me-->
<!--                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>-->
            </label>
            <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" id="submit" value="Sign in">
<!--            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>-->
<!--            <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>-->
        </div>
      </form>
    </div>
  </body>
</html>
