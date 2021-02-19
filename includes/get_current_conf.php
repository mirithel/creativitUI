<?php
//get current conf from database and put it into local storage
function query_conf()
{
    return $GLOBALS['db']->query(
        'SELECT current_perm
		FROM current_conf
    ORDER BY unique_id DESC
    LIMIT 1');
}

//query permutation order for a given perm id<,
function query_perm($perm_id)
{
    return $GLOBALS['db']->query(
        'SELECT permutation_id, assistant_id, question_id, position
		FROM permutations
    WHERE permutation_id=$perm_id
    ORDER BY position');
}


function get_conf(){
  try {
      $stmt = query_conf();

      while ($row = $stmt->fetch()) {
        $_SESSION["current_perm"]=$row['current_perm'];
      }
  } catch (PDOException $e) {
      echo $e->getMessage();
  }
}

// function get_perm(){
//   try {
//       $stmt = query_perm();
//
//       while ($row = $stmt->fetch()) {
//         $_SESSION["current_perm"]=$row['current_perm'];
//         $_SESSION["user_id"]=$row['user_id'];
//       }
//   } catch (PDOException $e) {
//       echo $e->getMessage();
//   }
// }

get_conf();

?>
