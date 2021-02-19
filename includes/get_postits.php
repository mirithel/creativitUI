<?php
require('../classes/class.Postit.php');
require_once('../includes/database_queries.php');

function get_postits($page_path){
  try {
      $postid = 1;
      $posts = array();
      $stmt = query_postit("WHERE user_id=".$_SESSION['user_id']." AND assistant_id=".$_SESSION['assistant_id']);

      while ($row = $stmt->fetch()) {
          array_push($posts, new Postit($row));
          $posts[$postid - 1]->render("../",$page_path);
          $postid += 1;
      }
  } catch (PDOException $e) {
      echo $e->getMessage();
  }
}
?>
