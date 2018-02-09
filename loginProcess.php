<?php
$host = "ec2-54-197-253-122.compute-1.amazonaws.com";
$user = "kqmjsltnjetjsm";
$password = "295a4355254c3a0f52ff6dab6cf025908e2882b9903ecd94be29e214bdadce94";
$dbname = "d44bucms4s2ggq";
$port = "5432";

  //Set DSN data source name
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";
  //create a pdo instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



if (isset($_POST['Login'])) {
	echo "$_POST[emaillogin]\n";
	echo "$_POST[passwordlogin]\n";
 $sql="SELECT * FROM users WHERE 
 email='".$_POST[emaillogin]."' AND password='".$_POST[passwordlogin]."' LIMIT 1";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $rowCount = $stmt->rowCount();
  echo $rowCount;

  if ($rowCount==1) {
    echo "You have successfully logged in.";
 echo "<script> window.location.assign('selection.php'); </script>";
exit();

  }
  else{

    echo "Invalid login, try again";
exit();
  }
}



  ?>