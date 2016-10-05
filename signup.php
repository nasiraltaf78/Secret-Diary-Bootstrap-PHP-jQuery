<? include("login.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Secret Diary &rsquo; Sign Up or Log In</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            h1 { margin-top: 70px;}
            #nav-btn { margin-right:20px; }
            @media (max-width: 768px) { 
                .form-control { margin-bottom: 10px; }
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-header">
                <a href="" class="navbar-brand">Secret Diary</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <form method="post" class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="email" name="loginemail" id="loginemail" value="<?php echo addslashes($_POST['loginemail']); ?>" class="form-control" placeholder="Enter email" />
                        <input type="password" name="loginpwd" value="<?php echo addslashes($_POST['loginpwd']); ?>" class="form-control" placeholder="Password" />
                        <input type="submit" name="submit" value="Log In" class="btn btn-primary" id="nav-btn" />
                    </div>
                </form>
            </div>
        </div>

        <div class="container">

            <h1>Secret Diary</h1>
            <?php
                // Display errors
                if($error) {
                    echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
                }

                // Logged out message
                if($message) {
                    echo '<div class="alert alert-success">'.addslashes($message).'</div>';
                }
            ?>
            <form method="post" class="form-inline">
                <div class="form-group">
                    <input type="text" name="fname" value="<?php echo addslashes($_POST['fname']); ?>" class="form-control" placeholder="Enter first name" />
                    <input type="email" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>" class="form-control" placeholder="Enter email" />
                    <input type="password" name="pwd" value="<?php echo addslashes($_POST['pwd']); ?>" class="form-control" placeholder="Password" />
                    <input type="submit" name="submit" value="Sign Up" class="btn btn-primary" />
                </div>
            </form>

        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>