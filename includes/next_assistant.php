<?php
require('../includes/setup.php');
require_once('../includes/database_queries.php');

if(isset($_POST['submit'])) {

  $pos=$_POST['current_pos'];
  $user=$_POST["current_user"];
  $perm=$_POST["current_perm"];

  try {
    $stmt = $db->prepare(
      'UPDATE users SET position=:pos WHERE id=:user'
    ) ;
    $stmt->execute(array(
      ':pos' => $pos+1,
      ':user' => $user
    ));

// normal forward to next assistant or back to start
    if($pos<4) {
      // Makes sure search assistants have query attachment for google api
      list($next_qid, $next_aid)=query_permutation($pos+1,$perm);
      list($next_type, $next_keyword)=query_assistant($next_aid);
      if($next_aid==4 && $next_keyword==1){
        header('Location:../pages/question.php?q='.query_question($next_qid)[1]);
      } else {
        header('Location:../pages/question.php');
        // header('Location:../pages/question.php?qid='.$next_qid.'&aid='.$next_aid.'&type='.$next_type.'&kw='.$next_keyword);
      }
    } else {
      header('Location:../pages/survey1.php');
    }
    exit;

  } catch(PDOException $e) {
    echo $e->getMessage();
  }

}


?>
