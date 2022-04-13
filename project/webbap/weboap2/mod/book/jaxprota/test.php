<?
/*
    * 08/08/2006 00:34am
    * ajax/verifierPseudoScriptaculous.php
    * test ajax file, no connection to bdd to preserve my bandwidth ;-)
*/
$tPseudo = array("nicoweb","nicoweb.fr","bertelle nicolas","saved","ganjaman","feliz");
$retour = "";

if ($_GET['pseudo'] != "")
{
    $pseudo = $_GET['pseudo'];
    if (in_array($pseudo,$tPseudo)) { $retour = ""; echo $retour; }
    else { $retour = "succes"; echo $retour; }
}
else { $retour = ""; echo $retour; }

?>