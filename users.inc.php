<?php


function setUserSignup() {
   if(isset($_POST['userSubmit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordMatch = $_POST['passwordMatch'];
    $date = $_POST['date']; 
    $level = $_POST['level'];

    if(!isset($_POST['checkbox_termsAndConditions'])){
        $checkbox_termsAndConditions = false;
    }else {
        
        $checkbox_termsAndConditions = true;
    }

    /*salt and hash*/
    $salt = hash('sha3-256', rand());
    $saltedpass = $password.$salt;
    $passhash = hash('sha3-256', $saltedpass);

    /*validate form on server side*/
    $validationbool = false;
    if (trim($username) === '' || trim($username) === null ) {
        echo "Username can not be blank";
    }  elseif(checkIfUsernameExists($username)){
        echo "This username already exists";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
      }elseif(checkIfEmailExists($email)){
        echo "This email already exists";
    } elseif (strlen(trim($password)) < 8) {
        echo "Password needs to be 8 characters or longer";
        } elseif(!($password === $passwordMatch)){
            echo "Passwords does not match";
        }elseif($checkbox_termsAndConditions == false){
            echo "Please agree to terms and conditions";
        }else{
            $validationbool = true;
        }


        if($validationbool === false) {
        
        } else { 
        addUserToDb($username,$email,$passhash,$salt,$date,$level,$checkbox_termsAndConditions);
        echo "Sign Up Successful!";
        header('location: login.php');
        }
    } 
      
}

function checkIfUsernameExists($username) {
    $db = new SQLite3('../db/databas.db');
    $sql = "SELECT * FROM users WHERE username=:username";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_TEXT);
    
    if($row['username']===$username){
        return true;
    }else{
        return false;
    } 
}

function checkIfEmailExists($email) {

    $db = new SQLite3('../db/databas.db');
    $sql = "SELECT * FROM users WHERE email=:email";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':email', $email, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_TEXT);
    
    if($row['email']===$email){
        return true;
    }else return false;

}

function addUserToDb($username,$email,$passhash,$salt,$date,$level,$checkbox_termsAndConditions){

    $db = new SQLite3('../db/databas.db');
    
    $sql = "INSERT INTO 'users' ('username','email','password','salt','date','level','termsAndConditions') VALUES (:username,:email,:password,:salt,:date,:level,:termsAndConditions)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username,SQLITE3_TEXT);
    $stmt->bindParam(':email',$email,SQLITE3_TEXT);
    $stmt->bindParam(':password',$passhash,SQLITE3_TEXT);
    $stmt->bindParam(':salt',$salt,SQLITE3_TEXT);
    $stmt->bindParam(':date',$date,SQLITE3_TEXT);
    $stmt->bindParam(':level',$level,SQLITE3_TEXT);
    $stmt->bindParam(':termsAndConditions', $checkbox_termsAndConditions,SQLITE3_TEXT);
    
    
   if($stmt->execute())
    {
        $db->close();
        return true; 
    }
    else
    { 
        $db->close();
        return false;
    }
}


function getUserLogin(){ 

        if(isset($_POST['userLogin'])) {
            $username = $_POST['username'];
            $loginpassword = $_POST['password'];

            $db = new SQLite3('../db/databas.db');

            $sql = "SELECT * FROM users WHERE username=:username";

            if(!$stmt = $db->prepare($sql)){
                echo "SQL statement failed";
            }else{
                $stmt->bindParam(':username', $username, SQLITE3_TEXT);

                $result=$stmt->execute();

                $row = $result -> fetchArray(SQLITE3_TEXT);

                if($row == '' || $row == null){
                    
                    header('Location:../views/login.php?usr_ntfnd');
                    $db->close();
                }else{
                    $salt = $row['salt'];

                    $hashedloginpassword = hash('sha3-256', $loginpassword.$salt);
                    echo "<br><br>";
                    $db->close();
    
                    if(!($hashedloginpassword == $row['password'])){
                        echo "Incorrect password";
                    } else {
                        echo "Login Successfull!";
                        $_SESSION['uid'] = $row['uid'];
                        if($row['level'] == 'admin'){
                            $_SESSION['admin'] = true;
                        }else{
                            $_SESSION['admin'] = false;
                        }
                        
                        header("Location:../views/homepage.php");
                        exit();
                    }
                }   
        }            
    }

}



