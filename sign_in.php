<html>

    <head>
        <title>IDE - Test Page</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>

    <body>
        <?php session_start(); ?>
        <?php include "top_bar.php"; ?>
        
        <?php if ($_GET["username"] == NULL) {
            
                    echo "Enter your username!";
                    
              } elseif ($_GET["password"] == NULL) {
                  
                   echo "Enter your password!";
                   
              } else {
                  
                  include "mysql_connect.php";
                  mysql_login($_GET["username"], $_GET["password"]);
                  
              }
        ?>
    </body>
    
</html>