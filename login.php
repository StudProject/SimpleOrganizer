<?php

try{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=mydb', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    exit('Что-то пошло не так! '. $e->getMessage());
}


if (isset($_POST["username"])){
	if (isset($_POST["password"]))
	{
		$username = $_POST["username"];
		$password = $_POST["password"];
    
        
        foreach($pdo->query('SELECT name, password from user') as $row) {       
		  if ($username==$row[0] && $password==$row[1])
		  {
		      header('Location: index.php');
		      setcookie("username",$username);
              exit;
		  }
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/grid.css">
    <style>
        body {
            background-image: url(images/bg.jpg); 
            border-image-width:  100%;
            }
  </style> 
</head>
<body>
   <div class="reg" align = 'center'>
    <form target="login.php" method="post">
               <p>Войти:</p>
               <a href="registration.php" > Зарегестрироваться</a>
                <div>
                  <span class="input-group-addon"></span>
                  <input class="form-control" name="username" type="text" placeholder="Email address">
                </div>
                <div class="input-group">
                  <span class="input-group-addon"></span>
                  <input class="form-control" name="password" type="password" placeholder="Password">
                </div>
                <div>
                    <button  type="reset">
                         Reset</button>
                    <button  type="submit">
                        Submit</button>
      </div>         
       </div>
    </form>
</body>
</html>