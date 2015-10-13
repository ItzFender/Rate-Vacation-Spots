<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <!-- the head section -->
    <head>
        <title>Vacation Spot Reviews</title>
        <link rel="stylesheet" type="text/css" href="css/main.css" />
    </head>

    <!-- the body section -->
    <body>
    <div id="page">
        <div id="header">
            <div id="title">
                <h1>Vacation Spot Reviews</h1>
            </div>
            <div id="log">
                
                    <?php if(isset($_SESSION['logged_in'])){ ?>
                        <form action="log_reg/index.php" method="POST">
                            <input type="hidden" name="action" value="logout" />
                            <input type="submit" value="Logout" />
                        </form>
                    <?php } else{ ?>
                        <form action="log_reg" method="post">
                            <input type="hidden" name="action" value="log_reg" />
                            <input type="submit" value="Sign In/Register" />
                        </form>
                    <?php } ?>
            
            </div>
        </div>
       	<div id="main">
       		<h1>Welcome to Vacation Spot Review</h1>
       		<h2>Click <a href="vacation_spots">here</a> to enter the site</h2>
       	</div>

<?php include('view/footer.php') ?>