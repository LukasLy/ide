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
        
        return $conn;
    
    }
    
    function mysql_exists($conn, $usr) {
        
        $sql = "SELECT * FROM users WHERE Username='$usr'";
        $result = $conn->query($sql);
        
        $numrows = $result->num_rows;
        
        if ($numrows > 0) {
            $exists = true;
        } else {
            $exists = false;
        }
        
        return $exists;
        
    }
    
    function mysql_exists2($conn, $usr, $psw) {
        
        $sql = "SELECT * FROM users WHERE Username='$usr' AND Password='$psw'";
        $result = $conn->query($sql);
        
        $numrows = $result->num_rows;
        
        if ($numrows > 0) {
            $exists = true;
        } else {
            $exists = false;
        }
        
        return $exists;
        
    }
    
    function mysql_login($usr, $psw) {
        
        $conn = mysql_con();
        
        $exists = mysql_exists($conn, $usr);
        $exists2 = mysql_exists2($conn, $usr, $psw);

        if ($exists == true) {
            
            if ($exists2 == true) {
                
                echo "Login succesful!";
                
                if (!session_id()) {
                        session_start();
                }
                
                
                $_SESSION["user"] = $usr;
                
                header('location:index.php');
                
            } else {
                
                echo "Password is incorrect! Try again!";
                
            }
            
        } else {
            
            echo "This username doesn't exist! Try again!";
            
        }
        
        $conn->close();
        
    }
    
    function mysql_reg($usr, $psw) {
        
        $conn = mysql_con();
        
        $exists = mysql_exists($conn, $usr);

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








