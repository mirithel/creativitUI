<?php

function switching_assistants($pathpic,$pathchat,$pathblank,$pathsearch) {
  //switch case between assistants

  switch ($_SESSION["assistant_id"]) {
    case AssistantTypes::blank:
    return $pathblank;
    break;
    case AssistantTypes::pic:
    return $pathpic;
    break;
    case AssistantTypes::search:
    return $pathsearch;
    break;
    case AssistantTypes::chat:
    return $pathchat;
    break;
    default:
    return "You don't have an assistant :(!";
  }
}

?>
