<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/style.css" rel="stylesheet">     
    <style>
   body {
    background-image: url(images/bg.jpg); 
    border-image-width:  100%;
   }
  </style> 
</head>
<body>
   <div class="reg" align="center">
    <form target="registration.php" method="post">
               <p>Регистрация:</p>
                <a href="login.php" >Авторизоваться</a>
                <div>
                  <span class="input-group-addon"></span>
                  <input class="form-control" name="email" id="email" type="text" placeholder="Email address">
                </div>
                <div class="input-group margin-bottom-sm">
                  <span class="input-group-addon"></span>
                  <input class="form-control" name="username" id="username"  type="text" placeholder="Login">
                </div>
                <div class="input-group">
                  <span class="input-group-addon"></span>
                  <input class="form-control" name="password" id="password" type="password" placeholder="Password">
                </div>
                <div class="input-group">
                  <span class="input-group-addon"></span>
                  <input class="form-control" name="checkpassword" id="checkpassword" type="password" placeholder="Confirm Password">
                </div>                
                <div>
                    <button type="reset">
                         Reset</button>
                    <button type="submit" onclick="checkForm()">
                        Submit</button>
                </div>
    </form> 
    </div> 
    <script src="js/check.js"></script>
</body>
</html>
<?php
      if (isset($_POST["username"])&&isset($_POST["email"])){
          if (isset($_POST["password"])&&isset($_POST["checkpassword"]))
          {        
              $username = $_POST["username"];
              $email = $_POST["email"];
              $password = $_POST["password"];
              $checkpassword = $_POST["checkpassword"];
              $err = 0;  
              
              if($password != $checkpassword){
                      $err++;
              }
              
              if(preg_match("/^[0-9a-z_\.]+@[0-9a-z_^\.]+\.[a-z]{2,6}$/i", $email) == 0){
                      $err++;
              }
              
              if(preg_match("/[a-z]{1,10}/i", $username) == 0){
                      $err++;
              }
              if(preg_match("/[a-z1-9]{4,10}/i", $password) == 0){
                      $err++;
              }
              
              
              if(($username != '')&&($email != '')&&($password != '')&&($checkpassword != '')&&($err==0)){
                    
                  try{
                      $pdo = new PDO('mysql:host=127.0.0.1;dbname=mydb', 'root', '');
                      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  } catch(PDOException $e){
                      exit('Что-то пошло не так! '. $e->getMessage());
                  }
                  
                  foreach($pdo->query('SELECT name, email from user') as $row) {       
                      if ($email==$row[1])
                          $err++;
                      }
                      if ($username==$row[0]){
                          $err++;
                      }
                  }
                  
                  if($err == 0){
                      try{
                          $pdo->exec("INSERT INTO user(name, email, password) VALUES ('".$username."','".$email."','".$password."')");
                          echo("Регистрация прошла успешно, теперь вы можете авторизоваться");
                      } catch(PDOEXCEPTION $e){
                          echo("Что-то пошло не так");
                      }
                  }
                  
              }        
          }      
?>