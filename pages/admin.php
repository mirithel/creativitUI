<?php
require('../includes/setup.php');
require('../includes/get_postits.php');
require('../includes/get_current_conf.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CreACTIVE</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script src="../js/script.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <link rel="icon" type="image/png" href="../img/ideas2.png">
</head>
<body>

<!-- Task -->
<section class="title_box">
    <div class="level">
            <h2 class="title level-left problem_statement">Studie: Kreativitätstools und virtuelle Assistenten</h2>
            <button name="submit" class="button is-warning is-inverted is-outlined button_weiter level-right" id="no_button">

            </button>
            </a>
    </div>
</section>
<section>
    <div id="instruction">

    <form action="../includes/add_current_conf.php" method="POST" autocomplete="off">
    <input class="field is-centered" type="hidden" id="page" name="page" value="../pages/admin.php">
        <div class="control">
            <p>Perm:</p><input id="current_perm" class="input" type="number" min=1 placeholder="Code eingeben" name="current_perm" value="<?php echo $_SESSION["current_perm"]?>">
        </div>
        <div >
            <button name="submit" class="button is-centered" id="start" >
              Start
            </button>
        </div>
    </form>
  </div>

</section>

</body>
</html>
