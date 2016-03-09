<?php

    function mysql_con() {
    
        $servername = "localhost";
        $username = "tomasvi";
        $password = "";
        $dbname = "ide_test";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die ("Connection failed: " . $conn->connect_error);
        }
        
        //echo "<br>Connection to database successful!";
        
        return $conn;
    
    }
    
    function mysql_exists($conn, $col, $usr) {
        
        $sql = "SELECT $col FROM users WHERE username='$usr'";
        $exists = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $exists = true;
        } else {
            $exists = false;
        }
        
        return $exists;
        
    }
    
    function mysql_login($usr, $psw) {
        
        $conn = mysql_con();
        
        $exists = mysql_exists($conn, 'username', $usr);
        
        $exists2 = mysql_exists($conn, 'password', $psw);

        if ($exists == true) {
            
            /*if ($exists2 == true) {
                
                echo "Login succesful!";
                
            } else {
                
                echo "Password is incorrect! Try again!";
                
            }*/
            
        } else {
            
            echo "This username doesn't exist! Try again!";
            
        }
        
        $conn->close();
        
    }
    
    function mysql_reg($usr, $psw) {
        
        $conn = mysql_con();
        
        $exists = mysql_exists($conn, 'username', $usr);

        if ($exists == false) {
            
            $sql = "INSERT INTO users (username, password) VALUES ('$usr', '$psw')";
        
            if ($conn->query($sql) === TRUE) {
                echo "New user creation successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
        } else {
            
            echo "This username already exists! Try a new one!";
            
        }
        
        $conn->close();
        
    }

?>








