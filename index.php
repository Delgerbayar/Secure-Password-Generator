<?php
error_reporting(E_ERROR | E_PARSE);
function generate($length) {

        if(isset($_POST['uppercase']))
                $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        else
                $uppercase = "";

        if(isset($_POST['lowercase']))
                $lowercase = "abcdefghijklmnopqrstuvwxyz";
        else
                $lowercase = "";

        if(isset($_POST['numbers']))
                $numbers = "1234567890";
        else
                $numbers = "";

        if(isset($_POST['specialchars']))
                $specialchars = "!@#$%^&*(){}[];:,./";
        else
                $specialchars = "";

        $allchars = "$uppercase$lowercase$numbers$specialchars";
        $randompass = "";

        for($i=0; $i<$length; $i++) {
                $rand = rand(0, strlen($allchars) - 1);
                $randompass .= substr($allchars, $rand, 1);
        }
        return $randompass;
        }

?>

<html>
<head>
        <title>
        Secure Password generator
        </title>
</head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<h1>Secure Password Generator</h1>
<body>
        <form action="index.php" method="POST">
                <input type="checkbox" name="uppercase" value="uppercase" <?php if(isset($_POST['uppercase'])) echo("checked='checked'"); ?>>Uppercase<br>
                <input type="checkbox" name="lowercase" value="lowercase" <?php if(isset($_POST['lowercase'])) echo("checked='checked'"); ?>>Lowercase<br>
                <input type="checkbox" name="numbers" value="numbers" <?php if(isset($_POST['numbers'])) echo("checked='checked'"); ?>>Numbers<br>
                <input type="checkbox" name="specialchars" value="specialchars" <?php if(isset($_POST['specialchars'])) echo("checked='checked'"); ?>>Special chars<br>

                <select name="length">
                <?php
                for($i=6; $i<=20; $i++) {
                        echo('<option name="$i"');
                        if($_POST['length']=="$i") {
                                echo('selected="selected"');
                        }
                        echo(">$i</option>");
                }
                ?>

                </select>
                Length
                <br>
                <input type="submit" name="Generate" value="Generate">
                <input type="text" value="<?php echo(generate($_POST['length']))?>"><br><br>


        </form>
</body>
</html>
