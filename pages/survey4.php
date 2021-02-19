<style>
table { table-layout: fixed; left: 0; width: 80%}
th { width: 12%; height: 30px; vertical-align: middle !important; padding-bottom: 10pt !important;}
td { width: 12%; height: 30px; text-align: center !important;  vertical-align: middle !important; padding-bottom: 10pt !important;}
</style>

<?php
$message = $_SESSION['user_code'];
echo "<script type='text/javascript'>console.log('$message');</script>";

require_once "../includes/pdo.php";
if ( isset($_POST['id']) && isset($_POST['exp_answer_1']) && isset($_POST['exp_answer_2'])) {
        $sql = "INSERT INTO experience (id, exp_answer_1, exp_answer_2) VALUES (:id, :exp_answer_1, :exp_answer_2)";
        echo("<pre>\n".$sql."\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':id' => $_POST['id'],
            ':exp_answer_1' => $_POST['exp_answer_1'],
            ':exp_answer_2' => $_POST['exp_answer_2']));
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CreativitUI</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Josefin+Slab&family=Oswald&family=Pacifico&display=swap" rel="stylesheet"> 
    <script src="../js/script.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <link rel="icon" type="image/png" href="../img/ideas2.png">


</head>
<body>

<!-- Task -->
<section class="title_box" style="width: 100%; position: fixed;z-index=3;">
    <div class="level">
        <img src="../img/wg_klein.svg" alt="CreativitUI" style="height: 46px;">
        <h2 class="title level-left problem_statement">Fragebogen (4/4) Persönlichkeit</h2>
        <img src="../img/TUM.svg" alt="Technische Universität München" style="height: 70px; margin-right:0;">
    </div>
</section>

<!-- Überschrift als Grafik + Inhalt als Text -->
<section>
<div style="height: 100vh; margin-top: 46px; margin-left: 6%; overflow-y: scroll;"> <!--optional: overflow-y: scroll; margin-top muss gleich hoch sein wie die höhe der task bar: 46px-->

        <div class="welcomebox" style=" width: 80%; margin-left: 10%;">




        <form method="post" action="danke.php">

                <p></br></br></br></br>ID (bleibt leer, autoincrement)<input type="text" id="id" name="id" size="40"></p> <!-- @TODO: Code des aktuellen Teilnehmers einfügen, alternativ in type="number" ändern und 
                das in der Datenbank mit SWL "autoincrement". Dann testen ob es zu Problemen kommt bei gleichzeitiger Teilnahme -->
                </br>
                </br>

                <!--Frage 1-->
                <p> <strong> Wie schätzt du deine Kenntnisse in der Disziplin Human Factors Engineering ein?</strong></p>
                </br>

                <!--Tabelle mit (Zeile 1) Antwortmöglichkeiten und (Zeile2) Radiobuttons Frage 1-->
                <table>
                    <tr>
                    <td>Ich weiß nichts darüber</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Ich beherrsche wichtige HFE-Designtheorien, -Methoden und -Tools </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="radio" name="exp_answer_1" value="1">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_1" value="2">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_1" value="3">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_1" value="4">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_1" value="5">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_1" value="6">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_1" value="7">
                        </td>
                    </tr>
                </table>

                <!-- Ende Frage 1 -->
                </br>
                </br>
                </br>
                </br>

                <!--Frage 2-->
                <p><strong>Wie schätzen deine Mitmenschen deine Kenntnisse in der Disziplin Human-Factors-Engineering ein?</strong></p>
                </br>

                <!--Tabelle mit (Zeile 1) Antwortmöglichkeiten und (Zeile2) Radiobuttons Frage 2-->
                <table style="width=100%">
                <tr>
                    <td>Ich weiß nichts darüber</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Ich beherrsche wichtige HFE-Designtheorien, -Methoden und -Tools </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                    </tr>
                    <tr>
                    <td>
                            <input type="radio" name="exp_answer_2" value="1">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_2" value="2">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_2" value="3">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_2" value="4">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_2" value="5">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_2" value="6">
                        </td>
                        <td>
                            <input type="radio" name="exp_answer_2" value="7">
                        </td>
                    </tr>
                </table>

                <p><input type="submit" value="weiter" class="button" style="position: fixed; right: 5%; bottom: 5%;margin-right:30px; background-color: #454678; color: white; width: 200px;"/></p>
                </br>
                </br>
                </br>
                </br>
                </br>

                </form>










        </div>
</div>
</section>

<!-- schwebende floating action butten -->
<section style="width: 100%; z-index: 8;">
<!--<a href="informedconsent.php" class="button" style="position: fixed; right: 5%; bottom: 5%;margin-right:30px; background-color: #454678; color: white; width: 200px;">weiter</a> -->
</section>


</body>
</html>
