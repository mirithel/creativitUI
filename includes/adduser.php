<?php
require_once('../includes/setup.php');
require_once('../includes/database_queries.php');

//$message = $_SESSION['user_code'];
//echo "<script type='text/javascript'>console.log('adduser.php: session user code: '+$message');</script>";

if(isset($_POST['submit'])) {

  $code=$_POST['code'];
  $perm=$_POST["perm_id"];

  try {
    $stmt = $db->prepare(
      'INSERT INTO users (code,perm_id,position) VALUES (:code,:perm,1) ON DUPLICATE KEY UPDATE perm_id=:perm, position=1'
      ) ;
      $stmt->execute(array(
        ':code' => $code,
        ':perm' => $perm
      ));

      
      $_SESSION['user_code']=$code;
      list($uid,$pid,$pos)=query_user($code);
      // as in next_assistant.php, but without pos+1
      list($next_qid, $next_aid)=query_permutation($pos,$perm);
      list($next_type, $next_keyword)=query_assistant($next_aid);
      if($next_aid==4 && $next_keyword==1){
        header('Location:../pages/question.php?q='.query_question($next_qid)[1]);
      } else {
        header('Location:../pages/question.php');
      }

      exit;
      

    } catch(PDOException $e) {
      echo $e->getMessage();
    }

  }


  ?>
