<?php require("script.php")?>

<!DOCTYPE HTML>  
<html lang = "en">

<head>
    <meta charset= "UTF-8">
    <meta name= "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Coding IT</title>
    <link rel= "stylesheet" href="style.css">
<style>
.error {color: #FF0000;}
</style>
</head>

<body>
<div class="box">
<form action="" method="post">
   <h3>Contact us</h3>
   <br> <br>
   <label>Enter your name</label>
   <br> <br>
   <input type="text" name="name" value="">
   <br> <br>
 
   <label>Enter your email</label>
   <br> <br>
   <input type="email" name="email" value="">
   <br> <br>

   <label>Enter a subject</label>
   <br> <br>
   <input type="text" name="subject" value="">
   <br> <br>
 
   <label>Enter your message</label>
   <br> <br>
   <textarea name="message"> </textarea>
   <br> <br>
   <br> <br>
   <input type="submit" name="submit" value="Send message">
 
   <p class="error"><?php echo @$error; ?></p>
   <p class="success"><?php echo @$success; ?></p>
</form>
</div>
</body>
</html>