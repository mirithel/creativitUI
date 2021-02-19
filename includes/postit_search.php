<?php
require('../includes/setup.php');

  $page=$_POST['page'];
  $association_keyword=$_POST['association'];

if(isset($_POST['submit'])) {
  $user_id=$_SESSION['user_id'];
  $assistant_id=$_SESSION['assistant_id'];
  $idea_text=$_POST['idea_text'];

   try {
        $stmt = $db->prepare(
            'INSERT INTO ideas (
            user_id,idea_text,assistant_id)
            VALUES (:user_id, :idea_text, :assistant_id)') ;
        $stmt->execute(array(
            ':user_id' => $user_id,
            ':idea_text' => $idea_text,
            ':assistant_id' => $assistant_id
        ));

        header('Location:'.$page.'?action=addidea&q='.$association_keyword);
        // header('Location:'.$page.'?action=addidea&');
        exit;

    } catch(PDOException $e) {
        echo $e->getMessage();
    }

}

if(isset($_POST['save'])) {
      $idea_text=$_POST['idea_text'];
      $id=$_POST['id'];
      $_SESSION['association_keyword_edit']=$_POST['association_edit'];

       try {
            $stmt = $db->prepare(
                    'UPDATE ideas SET
     				idea_text = :idea_text
     				WHERE id = :id') ;
            $stmt->execute(array(

    				':idea_text' => $idea_text,
    				':id' => $id
            ));

            header('Location:'.$page.'?action=saveidea&debug='.$idea_text.'&q='.$_SESSION['association_keyword_edit']);

            // header('Location:'.$page.'?action=saveidea&debug='.$idea_text);
            exit;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
