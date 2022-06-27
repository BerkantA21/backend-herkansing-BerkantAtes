<?php

require('../classes/database.php');


$db = new Database();

$db->query("SELECT id, 'name', networth, age, compagny FROM richestpeople ORDER BY networth DESC");

$richestpeople = $db->selectAll();

$tbody = "";
foreach($richestpeople as $key => $value)
{
    $tbody .= "<tr>
                    <td>" . $value->name . "</td>
                    <td>" . $value->networth . "</td>
                    <td>" . $value->age . "</td>
                    <td>" . $value->compagny . "</td>
              </tr>";
}
?>

<h1>De vijf rijkste mensen ter wereld</h1>
<a href="./create.php">Nieuw record</a>
<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>Vermogen</th>
            <th>Leeftijd</th>
            <th>Bedrijf</th>
        </tr>
    </thead>
    <tbody>
        
    <?php echo $tbody; ?>
    </tbody>
</table>