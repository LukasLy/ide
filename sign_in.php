<html>

    <head>
        <title>IDE - Test Page</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>

    <body>
        <div class="div1">
            
            <?php if ($_GET["username"] == NULL) {
                        echo "Enter your username!";
                  } elseif ($_GET["password"] == NULL) {
                       echo "Enter your password!";
                  } else {
                      echo "Welcome, " . $_GET["username"] . ".";
                  }
            ?>
            
        </div>
    </body>
    
</html>