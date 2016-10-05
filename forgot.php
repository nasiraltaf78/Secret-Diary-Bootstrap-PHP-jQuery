<?php include("resetpassword.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Secret Diary &rsquo; Reset Password</title>

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

            </div>
        </div>

        <div class="container">

            <h1>Reset Password</h1>
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
                    <input type="email" name="forgotemail" id="email" value="<?php if($resetField) { echo $existingEmailId; } ?>" class="form-control" placeholder="Enter email" />
                    <?php
                        if($resetField) {
                            echo $resetField;
                        }
                    ?>
                    <input type="submit" name="submit" value="<?php if(!$resetField){ echo 'Send'; } else { echo 'Reset'; } ?>" class="btn btn-primary" />
                </div>
            </form>

        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>