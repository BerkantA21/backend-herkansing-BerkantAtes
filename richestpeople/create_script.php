<?php
require("../classes/functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    // Maak het post-array schoon
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

    try{
    // Maak
    $db = new Database();

    $db->query("INSERT INTO `richestpeople` (`id`,
                                       `name`,
                                       `networth`,
                                       `age`,
                                       `compagny`)
                VALUES                 (:id,
                                        :'name',
                                        :networth,
                                        :age,
                                        :compagny)");

    $db->bind(':id', NULL, PDO::PARAM_INT);
    $db->bind(':name', $_POST['name'], PDO::PARAM_STR);
    $db->bind(':networth', $_POST['networth'], PDO::PARAM_STR);
    $db->bind(':age', $_POST['age'], PDO::PARAM_INT);
    $db->bind(':compagny', $_POST['compagny'], PDO::PARAM_INT);

    $db->execute();
    header("Location: ./index.php");
    } catch(PDOException $e){
        var_dump($e);exit();
    }
} else {
    echo "dit is een array niet in behandeling genomen";
}
?>