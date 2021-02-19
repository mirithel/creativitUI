<?php
/*
$servername = "mysql5.die-webwerkstatt.de";
$username = "db305635_6";
$password = "n-tb5peAnqz2";
$dbname = "db305635_6";



*/
#echo "<pre>\n";
$pdo = new PDO('mysql:host=mysql5.die-webwerkstatt.de;port=3306;dbname=db305635_6', 'db305635_6', 'n-tb5peAnqz2'); //set up db connection
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //and be very talkative in case things blow up

$stmt = $pdo->query("SELECT * FROM experience");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    #print_r($row);
}
#echo "</pre>\n";

/*


$val1 = "5";
$val2 = "5";
$val3 = "5";



try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO experience (id, exp_answer_1, exp_answer_2)
  VALUES ($val1, $val2, $val3)";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

*/

?>


