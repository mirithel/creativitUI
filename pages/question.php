<?php
require('../includes/setup.php');
require('../includes/set_user_id.php');
require('../includes/set_assistant.php');
require('../includes/assistant_set_up.php');
require(switching_assistants("../includes/get_postits.php","../includes/get_postits.php","../includes/get_postits.php","../includes/get_postits_search.php"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CreACTIVE</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
  <script src="../js/script.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="https://unpkg.com/vis-network/standalone/umd/vis-network.min.js"></script>
  <link rel="icon" type="image/png" href="../img/ideas2.png">
  <script data-main="scripts/main" src="../js/bundle.js"></script>
  <script src="../js/cluster.js"></script>
</head>
<body onload="
<?php
echo switching_assistants(
  "pictures_api_ideas();pictures_api();save_keyword();onEnterPicture();onEnterIdea();popupQuestionnaire();change_button();",
  "onEnterWhy();onEnterIdea();addChat();popupQuestionnaire();change_button();",
  "onEnterIdea();popupQuestionnaire();change_button();",
  "search_api();set_keyword();breadcrumbs();search_edit();onEnterIdea();popupQuestionnaire();change_button();"
  )
?>
set_question('<?php echo $_SESSION['question_text'] ?>');">
  <!-- <div>
    <?php
    // echo ", user_perm_id ".$_SESSION["user_perm_id"];
    // echo ", position ".$_SESSION["position"];
    // echo ", assistant ".$_SESSION["assistant_type"];
    // echo ", question_id ".$_SESSION["question_id"];
    // echo ", needs_key ".$_SESSION["assistant_needs_keyword"];
    // echo ", question_key ".$_SESSION["question_keyword"];
    ?>
  </div> -->

  <!-- The Modal Questionnaire -->
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal_flex">
        <img id='icon_idea_popup' src='../img/ideas2.png'>
        <p>Super, Sie können jetzt wieder zum Fragebogen wechseln!<br/>
          Lassen Sie diesen Tab dabei offen und wechseln Sie wieder in den Tab, wenn Sie zum nächsten Brainstorming aufgefordert werden.</p>
        <button class="button " id="popup_weiter_wait" onclick="closePopup();">Weiter</button>
      </div>
    </div>
  </div>

  <!-- The Modal Explanation -->
  <div id="myModal2" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal_flex">
        <div><img id='icon_idea_popup' src='../img/ideas2.png'></div>
        <div id="content_modal"></div>
        <div><button class="button is-info" id="popup_weiter" onclick="closePopup2();">Brainstorming starten</button></div>
      </div>
    </div>
  </div>

  <!-- Task -->
  <section class="title_box">
    <div class="level">
      <div class="title level-left problem_statement" id="question">
        <img id='icon_idea' src='../img/ideas2.png'>
      </div>
      <form action="../includes/next_assistant.php" method="POST" autocomplete="off">
        <input type="hidden" id="current_pos" name="current_pos" value=<?php echo $_SESSION["position"] ?>>
        <input type="hidden" id="current_user" name="current_user" value=<?php echo $_SESSION["user_id"] ?>>
        <input type="hidden" id="current_perm" name="current_perm" value=<?php echo $_SESSION["user_perm_id"] ?>>
        <input type="hidden" id="keyword" name="keyword" value=<?php echo $_SESSION["question_keyword"] ?>>
        <input type="hidden" id="assistant" name="assistant" value=<?php echo switching_assistants(0,1,2,3) ?>>
        <button name="submit" class="button is-warning is-inverted is-outlined button_weiter level-right" onclick="clearCache();" id="weiter">
          Fertig
        </button>
      </form>
    </div>
  </section>



  <!--  Post its control condition blank -->
    <?php echo switching_assistants('<div class="columns"><div class="column is-three-fifths">','<div class="columns"><div class="column is-three-fifths" id="post_chat">','<div class="columns"><div class="column is-full control_page">','<div class="columns"><div class="column is-three-fifths">');?>
      <section>
        <div class="post is-centered">
          <div class="input_field">
            <form action="<?php echo switching_assistants("../includes/postit.php","../includes/postit.php","../includes/postit.php","../includes/postit_search.php");?>" method="POST" autocomplete="off">
              <input type="hidden" id="page" name="page" value="../pages/question.php">
              <input type="hidden" id="association" name="association" value="" >
              <div class="field">
                <div class="control">
                  <textarea id="idea" class="input is-warning" type="text" placeholder="Idee beschreiben" name="idea_text"></textarea>
                </div>
              </div>
              <div class="fertig">
                <button name="submit" class="button is-warning is-inverted is-outlined button_fertig" id="send-button" onclick="save_keyword();savePost();">
                  Hinzufügen
                </button>
              </div>
            </form>
          </div>
        </div>
      </section>

      <section id="old_posts">
        <?php
        get_postits("../pages/question.php");
        ?>
      </section>
    <?php echo switching_assistants("</div>","</div>","</div>","</div>");?>
    <?php require(switching_assistants("../pages/pictures.php","../pages/chatbot.php","../pages/control.php","../pages/search.php"));?>
    <?php echo switching_assistants("</div>","</div>","</div>","</div>");?>
</body>
</html>
