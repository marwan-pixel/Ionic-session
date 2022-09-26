<?php 
    include 'db.php';
   
    $nama = $decodedData['name'];
    $username = $decodedData['username'];
    $pass = md5($decodedData['pass']);
    $message = '';
   if($nama == "" || $username == "" || $pass== ""){
    $message = "You have to insert your register!";
} else {
    try {
        $SelectQuery = "SELECT * FROM tbl_user Where username = '$username' AND pass = '$pass' ";
        $Check = $conn->query($SelectQuery);
        if($Check->num_rows > 0){
            $message = "Account has been registered!";
        } else {
            $InsertQuery = "INSERT INTO tbl_user(nama,username,pass) VALUES('$nama','$username','$pass')";
            $R = $conn->query($InsertQuery);      
            if(!$R){
                $message = "Failed";
            } else {
                $message = 'success';
            } 
        }
        $conn->close();
    }
    catch (Exception $e){
        $message = $e->getMessage();
        die();
    }
    echo json_encode($message);
}
?>