<?php
/**
 * deze functie laadt automatisch de classen die gebruikt gaan worden.
 */
function load_class($classname)
{
    // Bouw het pad op naar het bestand waar de class in zit.
    $pathToFile = '../classes/' . $classname . '.php';
    // Check of het bestand waar de class in zit bestaat.
    if (file_exists($pathToFile))
    {
        // Als het bestand met de class er in bestaat, laadt hem dan op in de pagina.
        require($pathToFile);
    } else{
        // Als het bestand niet bestaat geef dan de onderstaande melding.
        echo "Class is niet gevonden";
    }
}

spl_autoload_register('load_class');

?>