<?php

include 'db.php';
$username =$decodedData['username'];
$pass = md5($decodedData['pass']);
$message = '';
$error = false;
$array;
try {
      $SelectQuery = "SELECT username, nama, pass FROM tbl_user Where username = '$username' AND pass = '$pass' ";
        $Check = $conn->query($SelectQuery);
        if($Check->num_rows > 0){
            $array = $Check->fetch_assoc();
            if($array['pass'] != $pass){
                $message = "You insert a wrong password";
                $error = true;
                $array = null;
            }
        } else {
            $message = "No account yet";
            $error = true;
            $array = null;
        }
        $conn->close();
} catch(Exception $e){
    $message = $e->getMessage();
    die();
}

$result = ['message' => $message, 'result' =>  $array ,'error' => $error];
echo  json_encode($result);
