<?php
require_once('includes/setup.php');
require('includes/get_current_conf.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CreativitUI</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
  <script src="js/script.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
  <link rel="icon" type="image" href="img/Glühbirne_blau_1.svg">
</head>
<body>

  <!-- Task -->
  <section class="title_box">
    <div class="level">
      <h2 class="title level-left problem_statement">Studie: Kreativitätstools und virtuelle Assistenten</h2>
      <a href="pages/question.php">
        <button name="submit" class="button is-warning is-inverted is-outlined button_weiter level-right" id="no_button">

        </button>
      </a>
    </div>
  </section>
  <section>
    <div id="instruction">
      <div id="text_instruction">
        <p>Bitte erstelle zunächst deinen persönlichen Code. </br> <br/>Der Code besteht aus <strong>6 Zeichen</strong>:</p>
        <br/>
        <ul >
          <li class="bullets">Den beiden Tagesziffern des Geburtstages deiner Mutter, z.B. <strong>06</strong>.02.96</li>
          <li class="bullets">Die ersten beiden Buchstaben des Vornamens deines Vaters, z.B. <strong>MA</strong>XIMILIAN</li>
          <li class="bullets">Die letzten beiden Buchstaben des Mädchennamens deiner Mutter, z.B. MÜLL<strong>ER</strong></li>
        </ul>
      </div>

      <form action="includes/adduser.php" method="POST" autocomplete="off">
        <input class="field is-centered" type="hidden" id="page" name="page" value="index.php">
        <div class="control">
          <input type="hidden" id="perm_id" name="perm_id" value="<?php echo $_SESSION["current_perm"]?>">
          <input id="code" class="input" type="text" placeholder="Code eingeben" name="code" maxlength="6">
        </div>
        <div >
          <button name="submit" class="button is-centered" id="start" onclick="clearCache();" >
            Start
          </button>
        </div>
      </form>
    </div>


  </section>
</body>
<script>
  localStorage.setItem('position', 1);
</script>
</html>
