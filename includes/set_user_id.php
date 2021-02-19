<?php
require_once('../includes/database_queries.php');

list($uid,$pid,$pos)=query_user($_SESSION["user_code"]);

$_SESSION["user_id"]=$uid;
$_SESSION["user_perm_id"]=$pid;
$_SESSION["position"]=$pos;

if(isset($uid)){
}else{
  header('Location:../index.php');
  exit;
}

?>
