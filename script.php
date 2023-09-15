<?php

if(isset($_POST['submit'])){
 
    $new_message = array(
        "name" => $_POST['name'],
        "email" => $_POST['email'],
        "subject" => $_POST['subject'],
        "message" => $_POST['message']
    );
    
    if(filesize("messages.json") == 0){
       $first_record = array($new_message);
       $data_to_save = $first_record;
    }else{
       $old_records = json_decode(file_get_contents("messages.json"));
       array_push($old_records, $new_message);
       $data_to_save = $old_records;
    }
   
    $encoded_data = json_encode($data_to_save, JSON_PRETTY_PRINT);
   
    if(!file_put_contents("messages.json", $encoded_data, LOCK_EX)){
       $error = "Error storing message, please try again";
    }else{
       $success =  "Message is stored successfully";
    }



   $mysqli = mysqli_connect('localhost', 'iva123', 'iva123', 'elab_kurs_za_saradnike');
    if($mysqli->connect_errno != 0){
        echo $mysqli->connect_error;
        exit();
    }

    $json_data = file_get_contents("messages.json");
    $potencijalni_klijenti = json_decode($json_data, JSON_OBJECT_AS_ARRAY);

    $stmt = $mysqli->prepare("
    INSERT INTO potencijalni_klijenti(name, email, subject, message) 
    VALUES(?,?,?,?)");

    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    
    $name = end($potencijalni_klijenti)["name"];
    $email = end($potencijalni_klijenti)["email"];
    $subject = end($potencijalni_klijenti)["subject"];
    $message = end($potencijalni_klijenti)["message"];
    
   $stmt->execute();

}
?>