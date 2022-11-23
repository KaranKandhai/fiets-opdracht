<?php
try {

    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root", "");

    if (isset($_POST['verzenden'])) {

        $merk = filter_input(

            INPUT_POST,

            "merk",

            FILTER_SANITIZE_STRING

        );

        $type = filter_input(

            INPUT_POST,

            "type",

            FILTER_SANITIZE_STRING

        );

        $prijs = filter_input(

            INPUT_POST,

            "prijs",

            FILTER_SANITIZE_STRING,

            FILTER_FLAG_ALLOW_FRACTION

        );

        $query = $db->prepare("INSERT INTO fietsen(merk, type, prijs)  

                            VALUES(:merk, :type, :prijs)");


        $query = $db->prepare("UPDATE fietsen SET merk = :merk, type = :type, prijs = :prijs WHERE id = :id");


        $query->bindParam("merk", $merk);

        $query->bindParam("type", $type);

        $query->bindParam("prijs", $prijs);


        if ($query->execute()) {

            echo "de nieuwe gegevens zijn toegevoegd";

        } else {

            echo "er is een fout opgetreden";

        }

        echo "<br>";

    }

} catch (PDOException $e) {

    die("Error!:" . $e->getMessage());

}

?>

<form action="" name="form" method="post">

    <input type="text" name="merk" id="" placeholder="merk">

    <br>

    <input type="text" name="type" id="" placeholder="type">

    <br>

    <input type="text" name="prijs" id="" placeholder="prijs">

    <br>

    <input type="submit" name="verzenden" id="">

</form>







