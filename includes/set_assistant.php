<?php
require_once('../includes/database_queries.php');

list($qid, $aid)=query_permutation($_SESSION["position"],$_SESSION["user_perm_id"]);
$_SESSION["question_id"]=$qid;
$_SESSION["assistant_id"]=$aid;

list($question, $keyword)=query_question($qid);
$_SESSION["question_text"]=$question;
$_SESSION["question_keyword"]=$keyword;

list($ass_type, $needs_keyword)=query_assistant($aid);
$_SESSION["assistant_type"]=$ass_type;
$_SESSION["assistant_needs_keyword"]=$needs_keyword;
?>
