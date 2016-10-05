<?
    
	session_start();
	
	include("connection.php");
	
	$query = "SELECT diary FROM users WHERE id='".$_SESSION['id']."' LIMIT 1";
	
	$result = mysqli_query($link,$query);
	
	$row = mysqli_fetch_array($result);
	
	$diary = $row['diary'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Secret Diary &rsquo; Logged In</title>

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
        </style>    
    </head>
    <body>

        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-header pull-left">
                <a href="" class="navbar-brand">Secret Diary</a>
            </div>
            <div class="pull-right">
                <ul class="navbar-nav nav">
                    <li><a href="signup.php?logout=1">Log Out</a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <h1>Secret Diary</h1>
            <div>
                <textarea class="form-control"><?php echo $diary; ?></textarea>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Error</h4>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script>
            $("textarea").css("height", $(window).height()-200);

            $("textarea").keyup(function(){
                
                var diaryText = $("textarea").val();

                $.ajax({
                  url: "updatediary.php",
                  type: 'POST',
                  data: { diary: diaryText },
                  dataType: "text"})
                .done(function() {
                    console.log(diaryText);
                })
                .fail(function() {
                    $('#myModal').find(".modal-body").html("Please contact the system administrator.");
                    $('#myModal').modal('show');
                });
            });
        </script>
        
    </body>
</html>