<html>

    <head>
        <title>IDE - Test Page</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>

    <body>
        <div class="div1">
            <?php session_start(); ?>
            <?php if ($_GET["username"] == NULL) {
                        echo "Enter your username!";
                  } elseif ($_GET["password"] == NULL) {
                       echo "Enter your password!";
                  } else {
                      include "mysql_connect.php";
                      mysql_reg($_GET["username"], $_GET["password"]);
                  }
            ?>
            
        </div>
    </body>
    
</html>