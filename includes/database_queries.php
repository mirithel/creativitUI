<?php
function query_postit($custom_filter)
{
    return $GLOBALS['db']->query(
        'SELECT id,
        user_id,
        idea_text
		FROM ideas ' . $custom_filter);
}

function query_assistant($assistant_id)
{
    $stmt=$GLOBALS['db']->query(
        'SELECT type,needs_keyword FROM assistants WHERE type='.$assistant_id);

    $result = $stmt->fetch();
    return array($result['type'],$result['needs_keyword']);
}

function query_permutation($position,$perm)
{
    $stmt=$GLOBALS['db']->query(
        'SELECT question_id, assistant_id FROM permutations WHERE permutation_id='.$perm.' AND position='.$position);

    $result = $stmt->fetch();
    return array($result['question_id'],$result['assistant_id']);
}

function query_question($question_id)
{
    $stmt=$GLOBALS['db']->query('SELECT question,keyword FROM questions WHERE id='.$question_id);

    $result = $stmt->fetch();
    return array($result['question'],$result['keyword']);
}

function query_user($code)
{
    $stmt=$GLOBALS['db']->query(
        'SELECT id,perm_id,position FROM users WHERE code="'.$code.'"');

    $user = $stmt->fetch();
    return array($user['id'],$user['perm_id'],$user['position']);
}

?>
