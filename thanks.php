<?php

var_dump($_POST);

echo "Merci " . $_POST['first_name'] . " " . $_POST['user_name'] . " de nous avoir contacté à propos de " . $_POST['sujet'] . "." . "\n" . "Un de nos conseillers vous contactera soit à l'adresse " . $_POST['user_email'] . " ou par téléphone au " . $_POST['tel'] . " dans les plus brefs délais pour traiter votre demande :" . "\n" . $_POST['user_message'];

?>