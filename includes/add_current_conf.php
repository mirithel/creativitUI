<?php
require('../includes/setup.php');

if(isset($_POST['submit'])) {

  $current_perm=$_POST['current_perm'];

   try {
        $stmt = $db->prepare(
            'INSERT INTO current_conf (current_perm) VALUES (:current_perm)'
        ) ;
        $stmt->execute(array(
            ':current_perm' => $current_perm
        ));

        $_SESSION['current_perm']=$current_perm;
        header('Location:../pages/admin.php');
        exit;

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
}

?>
