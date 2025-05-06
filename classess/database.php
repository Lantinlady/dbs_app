<?php
 
class database{
 
    function opencon(): PDO{
 
return new PDO(
 
    dsn: 'mysql:host=localhost;
    dbname=dbs_app',
    username: 'root',
    password: '');
 
    }
    function signupUSER($firstname, $lastname, $username, $password){
        $con = $this->opencon ();
        try {
        $con->beginTransaction();
        $stmt = $con->prepare("Insert INTO Admin (admin_FN, admin_LN, admin_username, admin_password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$firstname, $lastname, $username, $password]);
        $userID = $con->lastInsertID();
        $con->commit();
        return $userID;
        } catch (PDOException $e) {
            $con->rollBack();
            return false;
        }
        
        
}

}


 
?>