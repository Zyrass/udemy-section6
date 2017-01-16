<?php 
    // Déclaration du type à saisir obligatoirement lors d'une saisi.
    declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Cours php</h1>

    <h2>1 Configuration d'un serveur appache</h2>
    <p>Il faut un serveur appache pour faire interpréter le PHP. Il en existe beaucoup (wamp, xamp, laragon...) j'utiliserai laragon. En gros on peut spécifier un port qui par défaut est sur 80. Si vous changez le port, localhost ne suffira pas.
    Exemple : On modifie le port 80 par 8090. Ce qui veux dire que pour acceder à la page demandé il faudra taper dans sa barre d'adresse : localhost:8090/ qui permettra d'acceder localement à ces fichier comme si ils étaient en lign sur internet.</p>

    <h2>Syntaxe de php</h2>
    <dl>
        <dt>Quelle extenssion de fichier doit-on utiliser ?</dt>
            <dd>l'extention à utiliser est le : <mark>.php</mark></dd>
        <dt>Quelle balise utiliser pour écrire du php ?</dt>
            <dd>La balise d'ouverture : <mark>&lt;?php</mark></dd>
            <dd>La balise de fermeture : <mark>?&gt;</mark></dd>
        <dt>Comment afficher du texte à l'écran ?</dt>
            <dd>on utilise <mark>echo</mark> suivi d'une <mark>chaine de caractère</mark></dd>
            <dd>
                <mark>
                    <?php echo "Cette ligne est écrite directement en php, soit :"; ?>
                </mark>
            
                <pre>
&lt;?php
    echo "Cette ligne est écrite directement en php, soit :";
?&gt;
                </pre>
            </dd>
    </dl>

    <h2>Les commentaires</h2>
    <h3>Commentaire sur une ligne</h3>
    <pre>
        // les 2 slaches permettent la saisi d'un commentaire sur une seule ligne.
    </pre>
    <h3>Commentaire sur plusieurs lignes</h3>
    <pre>
        /*
            Le slash + l'astérix permettent à eux deux de commenter
            sur plusieurs lignes.
        */
    </pre>
    <h3>Une autre façon de commenter mais très peu utiliser</h3>
    <pre>
        # Ceci est également un commentaire.
    </pre>

    <h2>Les variables</h2>

    <dl>
        <dt>Par quoi commence une variable ?</dt>
            <dd>Une variable en php commence toujours avec un : <mark>$</mark></dd>
        <dt>Qu'es-ce qui suit notre $ ?</dt>
            <dd>Juste après le $, on peut mettre un : <mark>underscore ( _ )</mark></dd>
            <dd>Egalement, on peut mettre aussi un : <mark>caractère alpha (minuscule ou majuscule)</mark></dd>
        <dt>Après notre $ peut-on inscrire un nombre ?</dt>
            <dd><mark>non</mark></dd>
        <dt>Ou peut-on créer une variable ?</dt>
            <dd>Il n'y a pas d'endroit spécifique, on peut inscrire notre variable n'importe ou.</dd>
        <dt>Restriction des guillemets simple pour une chaine de caractère</dt>
            <dd>il est possible de saisir du texte avec des guillemets simple dans une variable. <mark>Mais lorsqu'on affiche avec echo notre résultat, il ne sera pas possible d'éxécuter une variable qui aura été appelé dans ces guillemet simple.</mark></dd>
            <dd>
            exemple : $version = 7; echo 'Php version $version'; affichera à l'écran..
            <mark>Php version $version</mark>
            Alors que si on aurait saisie des guillemets double soit : 
            echo "Php version $version"; on aurait affiché : 
            <mark>Php version 7</mark><br />
            Il est tout de même possible dans notre exemple de saisir des guillemets simple en concaténant notre chaîne de caractère et la variable. 
            <mark>echo 'Php version ' . $version</mark> qui aurait dans ce cas affiché également :
            <mark>Php version 7</mark>
            </dd>
    </dl>

    <h3>Exemple d'affichage d'un calcul entre 2 nombre qui sont stocker chacune dans une variable.</h3>
    <p>la première variable contiendra le nombre : <mark>72</mark>. Le second contiendra le nombre <mark>386</mark>. Je défini juste après une variable qui sera le résultat des 2 nombres précédent.</p>
    <?php 
        $nombreOne = 72;
        $nombreTwo = 386;
        $resultat = $nombreOne + $nombreTwo;
        echo $resultat;
    ?>
    voici le code php utilisé :
    <pre>
        &lt;?php
            $nombreOne = 72;
            $nombreTwo = 386;
            $resultat = $nombreOne + $nombreTwo;
            echo $resultat;
        ?&gt;
    </pre>

<h2>Les scopes</h2>
<h3>Scope Globale</h3>
<p>Une variable global peut être lu sur toute la page mais pas dans une fonction.</p>
<p>Exemple : (Variable global)</p>
<pre>
&lt;?php 
    $variableGlobal1 = "&lt;mark&gt;Je suis une variable global&lt;/mark&gt;";
    echo $variableGlobal1;
?&gt;
</pre>
soit : 
<?php 
    $variableGlobal1 = "<mark>Je suis une variable global</mark>";
    echo $variableGlobal1;
?>
<p>Exemple 2 : Utilisation d'une variable global dans une fonction causera irrémédiablement une erreur avec cette syntaxe.</p>
<pre>
&lt;?php 
    $variableGlobal2 = "&lt;mark&gt;Je suis une variable global dans un scope local&lt;/mark&gt;";
    function testGlobal(){
        echo $variableGlobal2;
    }
    testGlobal();
?&gt;
</pre>
soit : 
<?php 
    $variableGlobal2 = "<mark>Je suis une variable global dans un scope local</mark>";
    function testGlobal(){
        echo $variableGlobal2;
    }
    testGlobal();
?>
<h3>Scope Locale</h3>
<p>Une variable local est accessible uniquement dans une fonction.</p>
<p>Exemple 3 : Faire tout de même fonctionner notre 2ème variable dans un scope local.</p>
<pre>
&lt;?php 
    $variableGlobal3 = "&lt;mark&gt;Je suis une variable global dans un scope local&lt;/mark&gt;";
    function testGlobalInLocal(){
        global $variableGlobal3;
        echo $variableGlobal3;
    }
    testGlobalInLocal();
?&gt;
</pre>
soit :
<?php 
    $variableGlobal3 = "<mark>Je suis une variable global dans un scope local</mark>";
    function testGlobalInLocal(){
        global $variableGlobal3;
        echo $variableGlobal3;
    }
    testGlobalInLocal();
?>
<p>Utilisation d'une super global ($GLOBALS[])</p>
<pre>
&lt;?php 
    $variableGlobal4 = "&lt;mark&gt;Je suis une SUPER GLOBAL dans un scope local&lt;/mark&gt;";
    function testSuperGlobal(){
        echo $GLOBALS['variableGlobal4'];
    }
    testSuperGlobal();
?&gt;
</pre>
soit : 
<?php 
    $variableGlobal4 = "<mark>Je suis une SUPER GLOBAL dans un scope local</mark>";
    function testSuperGlobal(){
        echo $GLOBALS['variableGlobal4'];
    }
    testSuperGlobal();
?>
<h3>Scope Statique</h3>
<p>le scope static permet de garder en mémoire un résultat et de repartir de ce même résultat pour un afficher un autre.</p>
<p>Exemple : dans un scope local on définit une variable à 10 et à chaque fois on lui ajoute 1. En ajoutant static on gardera en mémoire le résultat final soit 11 et en réutilisant cette même fonction, on obtiendra comme second résultat : 12. puis 13,14 15etc... </p>
<pre>
&lt;?php 
    function essaiVariableStatic() {
        $nombre1 = 10;
        $nombre1++;
        echo $nombre1;
    }

    essaiVariableStatic();
    echo "&lt;br&gt;";
    essaiVariableStatic();
    echo "&lt;br&gt;";
    essaiVariableStatic();
    echo "&lt;br&gt;";
    essaiVariableStatic();

?&gt;
</pre>
soit : 
<?php 
    function essaiVariableStatic() {
        $nombre1 = 10;
        $nombre1++;
        echo $nombre1;
    }

    essaiVariableStatic();
    echo "<br>";
    essaiVariableStatic();
    echo "<br>";
    essaiVariableStatic();
    echo "<br>";
    essaiVariableStatic();

?>

<h2>Type de variables</h2>
<ul>
    <li>String (Chaîne de caractères)</li>
        <ul>
            <li>$stringDoubleCote = "Je suis une chaîne de caractères avec des doubles côte";</li>
            <li>$stringSimpleCote = 'Je suis une chaîne de caractères avec de simple côte';</li>
            <li>$stringHTML = "&lt;blockquote&gt;Je suis une chaîne de caractères avec du html&lt;/blockquote&gt;";</li>
        </ul>
    <li>integer (Nombre entier)</li>
        <ul>
            <li>$integer = 10;</li>
        </ul>
    <li>float (Nombre décimaux)</li>
        <ul>
            <li>$float = 19.5;</li>
            <li><mark>Attention ce n'est pas une virgule mais belle et bien un point pour inscrir un nombre décimal</mark></li>
        </ul>
    <li>boolean (vrai ou faux)</li>
        <ul>
            <li>$boolean1 = true; (vrai)</li>
            <li>$boolean2 = false; (faux)</li>
        </ul>
    <li>array (tableau)</li>
        <ul>
            <li>$jourDeLaSemaine = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","dimanche");</li>
            <li>A savoir qu'on ne peux pas afficher un array en appelant uniquement la variable.</li>
            <li> Avec un var_dump() ça fonctionne :
            <pre>
&lt;?php
    $jourDeLaSemaine = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","dimanche");
    var_dump($jourDeLaSemaine);
?&gt;
            </pre>
            <?php
                $jourDeLaSemaine = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","dimanche");
            var_dump($jourDeLaSemaine);
            ?>
            </li>
            
        </ul>
    <li>objet (objet)</li>
        <ul>
            <li>
                <pre>
class Objet {
    function __construct(){
        $this->couleur = "Bleu";
    }
}

$objetOne = new Objet();
var_dump($objetOne);
                </pre>
                ce qui affichera :<mark>
                <?php
                    class Objet {
                    function __construct(){
                        $this->couleur = "Bleu";
                    }
                }
                $objetOne = new Objet();
                var_dump($objetOne);
                ?></mark>
            </li>
        </ul>
    <li>null (null pas de valeur)</li>
        <ul>
            <li>
            $null = null;
            var_dump($null);
            </li>
            <li>soit :
            <pre>
&lt;?php
    $null = null;
    var_dump($null);
?&gt;
            </pre>
            <mark>
            <?php
                $null = null;
                var_dump($null);
            ?>
            </mark>
            </li>

        </ul>
</ul>

<h2>var_dump() en php est l'équivalent d'un console.log() en javascripts</h2>
<p>En javascript nous utilisions le console.log() pour afficher dans la console un résultat, ici en php le var_dump affichera directement sur la page ce qu'on a spécifier entre parenthèse.</p>
<p>Exemple de 2 var_dump(). Le premier concernera une string et le second un nombr entier.</p>
<pre>
    &lt;?php 
        $myString = "J'adore le code informatique";
        var_dump($myString);
    ?&gt;
</pre>
soit : 
<mark><?php 
    $myString = "J'adore le code informatique";
    var_dump($myString);
?> </mark>(28 correspond au nombre de caractères).
<pre>
    &lt;?php 
        $myInteger = 3;
        var_dump($myInteger);
    ?&gt;
</pre>
soit : 
<mark><?php 
    $myInteger = 3;
    var_dump($myInteger);
?> </mark>(3 correspond au nombre définit dans la variable).

<h2>Quelques fonctions pour les chaines de caractères...</h2>
<h3>Longeur d'une string.</h3>
<pre>
    &lt;?php
        $functionString1 = "Utilisation de la fonction <strong>strlen()</strong> qui permet d'obtenir la longueur d'une chaine de caractère";
        echo 'ma variable : $functionString1 dispose de ' . strlen($functionString1) . ' caractères.';
    ?&gt;
</pre>
affichera : 
<?php
        $functionString1 = "Utilisation de la fonction <strong>strlen()</strong> qui permet d'obtenir la longueur d'une chaine de caractère";
        echo 'ma variable : $functionString1 contient ' . strlen($functionString1) . ' caractères.';
    ?>
<h3>Comptez le nombre de mots</h3>
<pre>
    &lt;?php
        $functionString2 = "Utilisation de la fonction <strong>str_word_count()</strong> qui permet de compter le nombre de mots dans un texte.";
        echo 'ma variable $functionString2 contient ' . str_word_count($functionString2) . ' mots.';
    ?&gt;
</pre>
    <?php
        $functionString2 = "Utilisation de la fonction <strong>str_word_count()</strong> qui permet de compter le nombre de mots dans un texte.";
        echo 'ma variable $functionString2 contient ' . str_word_count($functionString2) . ' mots.';
    ?>
<h3>Mettre à l'envers une phrase</h3>
<pre>
    &lt;?php
        $functionString3 = "Utilisation de la fonction <strong>strrev()</strong> qui permet d'inscrire une phrase completement a l'envers. Allez et si on parlait le verlant";

        echo '- Ma variable $functionString3 affiche en verlant cette phrase : &lt;br /&gt;' . strrev($functionString3) . '&lt;br /&gt;';
        echo "- La phrase d'origine pour la même fonction : &lt;br /&gt;" . $functionString3;
    ?&gt;
</pre>
    <?php
        $functionString3 = "Utilisation de la fonction <strong>strrev()</strong> qui permet d'inscrire une phrase completement a l'envers. Allez et si on parlait le verlant";

        echo '- Ma variable $functionString3 affiche en verlant cette phrase : <br />' . strrev($functionString3) . '<br />';
        echo "- La phrase d'origine pour la même fonction : <br />" . $functionString3;
    ?>
<h3>Trouver la position d'un mot précis</h3>
<p>A savoir que la function qui va suivre est comprise comme un boolean. Si le résultat est vrai alors il affichera le résultat. En revanche, si le résultat n'existe pas, à l'écran rien ne sera affiché hormis si on utilise un var_dump() de la fonction qui affichera belle et bien le false à l'écran.</p>
<pre>
    &lt;?php
        $functionString4 = "Utilisation de la fonction <strong>strpos(arg1, arg2)</strong> qui prends comme premier argument la variable à rechercher. LE second argument quand à lui correspond au mot clé à chercher.";

        echo 'Dans ma variable $functionString4, je recherche le mot "variable". Le chiffre indiqué après correspond à la position du premier caractère du mot clé soit le "v". Donc le résultat est : &lt;br /&gt;' . strpos($functionString4, "variable");
    ?&gt;
</pre>
<?php
    $functionString4 = "Utilisation de la fonction <strong>strpos(arg1, arg2)</strong> qui prends comme premier argument la variable à rechercher. LE second argument quand à lui correspond au mot clé à chercher.";

    echo 'Dans ma variable $functionString4, je recherche le mot "variable". Le chiffre indiqué après correspond à la position du premier caractère du mot clé soit le "v". Donc le résultat est : <br />' . strpos($functionString4, "variable");
?>
<h3>Remplacer un mot</h3>
<p>Syntaxe : <strong>str_replace(arg1, arg2, arg3);</strong> <br/>
arg1 = Mot à chercher.<br />
arg2 = Mot à remplacer.<br />
arg3 = Ou ? Dans quelle chaine de caractère ?
</p>
<pre>
    &lt;?php
        $functionString2a = 'ancien-mot';
        $functionString2b = 'nouveau-mot';
        $functionString2c = 'Dans cette phrase on a remplacer ma variable $functionString2a par $functionString2b qui contient : <strong>ancien-mot</strong> qui était elle-même dans la $functionString2c';

        echo str_replace($functionString2a, $functionString2b, $functionString2c);
    ?&gt;
</pre>
<?php
    $functionString2a = 'ancien-mot';
    $functionString2b = 'nouveau-mot';
    $functionString2c = 'Dans cette phrase on a remplacer ma variable $functionString2a par $functionString2b qui contient : <strong>ancien-mot</strong> qui était elle-même dans la $functionString2c';

    echo str_replace($functionString2a, $functionString2b, $functionString2c);
?>
<h2>Les constantes</h2>
<p>Une constante, c'est la définition d'un terme bien précis qui ne changera jamais. A savoir aussi qu'une constante est accessible de partout que ce soit dans un scope global, locale peu importe.</p>
<pre>
    &lt;?php
        define("MY_URL", "http://alain-guillon.fr");
        echo "l'adresse de mon site web se trouve à cette adresse " . MY_URL;
    ?&gt;
</pre>
<?php
    define("MY_URL", "http://alain-guillon.fr");
    echo "l'adresse de mon site web se trouve à cette adresse " . MY_URL;
?>
<h2>Les opérateurs</h2>
<h3>Opérateurs arithmétique</h3>
<h4>addition</h4>
<p>Pour additionner on utilise le symbole + soit ma première variable contient le nombre 32 ma seconde 72 en additionnant le tout on obtient :</p>
<?php
    $addition1 = 32;
    $addition2 = 72;
    $resultAddition = $addition1 + $addition2;

    echo $resultAddition;
?>
<h4>soustraction</h4>
<p>Pour soustraire on utilise le symbole - soit ma première variable contient le nombre 41 ma seconde 19 en soustrant le tout on obtient :</p>
<?php
    $soustraction1 = 41;
    $soustraction2 = 19;
    $resultSoustraction = $soustraction1 - $soustraction2;

    echo $resultSoustraction;
?>
<h4>multiplication</h4>
<p>Pour multiplier le tout on utilise le symbole * soit ma première variable contient le nombre 14 ma seconde 65 en multipliant le tout on obtient :</p>
<?php
    $multiplication1 = 14;
    $multiplication2 = 65;
    $resultMultiplication = $multiplication1 * $multiplication2;

    echo $resultMultiplication;
?>
<h4>division</h4>
<p>Pour diviser on utilise le symbole / soit ma première variable contient le nombre 88 ma seconde 10 en divisant le tout on obtient :</p>
<?php
    $division1 = 88;
    $division2 = 10;
    $resultDivision = $division1 / $division2;

    echo $resultDivision;
?>
<h4>modulo</h4>
<p>Pour trouver le reste d'une division, on utilise le symbole % soit ma première variable contient le nombre 46 ma seconde 11 Donc le reste de ma division est de :</p>
<?php
    $modulo1 = 46;
    $modulo2 = 11;
    $resultModulo = $modulo1 % $modulo2;

    echo $resultModulo;
?>
<h4>Les puissances</h4>
<p>on utilise le symbole ** pour les puissances. Soit ma première variable contient 12 ma seconde contient 3 le résultat est de :</p>
<?php 
    $puissance1 = 12;
    $puissance2 = 3;
    $resultPuissance = $puissance1 ** $puissance2;

    echo $resultPuissance;
?>
<h3>Opérateurs de comparaison</h3>
<p>Avec le double égale soit "==" on valide le contenu si ce dernier est identique quelque soit le type saisi</p>
<?php
    $nombreString = "32";
    $nombreInt = 32;

    echo "Ci dessous le nombre 32 écrit dans une chaine de caractère soit le type string <br />";
    var_dump($nombreString);
    echo "<br />Ci dessous le même nombre mais avec le type integer <br />";
    var_dump($nombreInt);
    echo "<br />Voici le résultat afficher dans un var_dump() soit vrai<br />";
    var_dump($nombreInt == $nombreString);
?>
<p>Avec le triple égale soit : "===" on <strong>NE VALIDE PAS LE CONTENU VU QUE LE TYPE NE CORRESPOND PAS</strong></p>
<?php
    $nombreString = "32";
    $nombreInt = 32;

    echo "Ci dessous à nouveau le nombre 32 écrit dans une chaine de caractère soit le type string <br />";
    var_dump($nombreString);
    echo "<br />Ci dessous de nouveau le même nombre mais avec le type integer <br />";
    var_dump($nombreInt);
    echo "<br />Voici le résultat afficher dans un var_dump() soit cette fois-ci FAUX<br />";
    var_dump($nombreInt === $nombreString);
?>
<h3>différent de</h3>
<p>Pour voir si un nombre est différent, on utilise le != qui permettra de poser la question si 2 variables sont identique ou non.</p>
<pre>
&lt;?php
    $different1 = 69;
    $different2 = 42;

    var_dump($different1 != $different2);
    echo 'Ici $different1 est bien différent de $different2 donc le boulean affiche bien true';
?&gt;
</pre>
<?php
    $different1 = 69;
    $different2 = 42;

    var_dump($different1 != $different2);
    echo 'Ici $different1 est bien différent de $different2 donc le boulean affiche bien true';
?>
<pre>
&lt;?php
    $different1 = 69;
    $different2 = 69;

    var_dump($different1 != $different2);
    echo 'ici $different1 est bien égale à $different2 et donc le boolean renvoi bien false.';
?&gt;

</pre>
<?php
    $different1 = 69;
    $different2 = 69;

    var_dump($different1 != $different2);
    echo 'ici $different1 est bien égale à $different2 et donc le boolean renvoi bien false.';
?>
<p>On a aussi la possibilité de vérifier le type tout en les différenciant soit avec le !==</p>
<pre>
&lt;?php
    $different1 = 69;
    $different2 = "69";

    var_dump($different1 !== $different2);
    echo 'ici $different1 n\'est plus égale à $different2 vu qu\' on a deux types différent donc le boolean renvoi bien true.';
?&gt;
</pre>
<?php
    $different1 = 69;
    $different2 = "69";

    var_dump($different1 !== $different2);
    echo 'ici $different1 n\'est plus égale à $different2 vu qu\' on a deux types différent donc le boolean renvoi bien true.';
?>
<h3>Supérieur</h3>
<p>on utilise le caractère > pour vérifier si un nombr est supérieur à un autre.</p>
<pre>
&lt;?php
    $superieur1 = 32;
    $superieur2 = 10;
    $resultSuperieur = $superieur1 > $superieur2;

    var_dump($resultSuperieur);
    echo 'On affiche bien que la la variable $superieur1 est belle et bien supérieur à la variable $superieur2 soit true.';
?&gt;
</pre>
<?php
    $superieur1 = 32;
    $superieur2 = 10;
    $resultSuperieur = $superieur1 > $superieur2;

    var_dump($resultSuperieur);
    echo 'On affiche bien que la la variable $superieur1 est belle et bien supérieur à la variable $superieur2 soit true.';
?>
<h3>Supérieur ou égale</h3>
<p>on utilise les caractères >= pour vérifier si un nombre est supérieur ou égale à un autre nombre.</p>
<pre>
&lt;?php
    $superieurEgale1 = 69;
    $superieurEgale2 = 79;
    $superieurEgale3 = 38;
    $superieurEgale4 = 65;
    $superieurEgale5 = 69;
    $resultSuperieurEgale1 = $superieurEgale1 >= $superieurEgale2;
    $resultSuperieurEgale2 = $superieurEgale1 >= $superieurEgale3;
    $resultSuperieurEgale3 = $superieurEgale1 >= $superieurEgale4;
    $resultSuperieurEgale4 = $superieurEgale1 >= $superieurEgale5;

    var_dump($resultSuperieurEgale1);
    echo 'On affiche false vu que la variable $superieurEgale1 est belle et bien inferieur à la variable $superieurEgale2.&lt;br /&gt;';
    var_dump($resultSuperieurEgale2);
    echo 'On affiche bien true vu que la la variable $superieurEgale1 est belle et bien supérieur à la variable $superieurEgale3.&lt;br /&gt;';
    var_dump($resultSuperieurEgale3);
    echo 'On affiche false que la la variable $superieurEgale1 est de nouveau bien inférieur à la variable $superieurEgale4.&lt;br /&gt;';
    var_dump($resultSuperieurEgale4);
    echo 'On affiche bien true vue que la la variable $superieurEgale1 est belle et bien EGALE à la variable $superieurEgale5.';
?&gt;
</pre>
<?php
    $superieurEgale1 = 69;
    $superieurEgale2 = 79;
    $superieurEgale3 = 38;
    $superieurEgale4 = 65;
    $superieurEgale5 = 69;
    $resultSuperieurEgale1 = $superieurEgale1 >= $superieurEgale2;
    $resultSuperieurEgale2 = $superieurEgale1 >= $superieurEgale3;
    $resultSuperieurEgale3 = $superieurEgale1 >= $superieurEgale4;
    $resultSuperieurEgale4 = $superieurEgale1 >= $superieurEgale5;

    var_dump($resultSuperieurEgale1);
    echo 'On affiche false vu que la variable $superieurEgale1 est belle et bien inferieur à la variable $superieurEgale2.<br />';
    var_dump($resultSuperieurEgale2);
    echo 'On affiche bien true vu que la la variable $superieurEgale1 est belle et bien supérieur à la variable $superieurEgale3.<br />';
    var_dump($resultSuperieurEgale3);
    echo 'On affiche false que la la variable $superieurEgale1 est de nouveau bien inférieur à la variable $superieurEgale4.<br />';
    var_dump($resultSuperieurEgale4);
    echo 'On affiche bien true vue que la la variable $superieurEgale1 est belle et bien EGALE à la variable $superieurEgale5.';
?>
<h3>inférieur</h3>
<p>On utilise le caractère < pour vérifier si un nombre est bien inférieur à un autre.</p>
<pre>
&lt;?php
    $inferieur1 = 100;
    $inferieur2 = 150;
    $resultInferieur = $inferieur1 < $inferieur2;

    var_dump($resultInferieur);
    echo 'On affiche bien que la la variable $inferieur1 est belle et bien supérieur à la variable $inferieur2 soit true.';
?&gt;
</pre>
<?php
    $inferieur1 = 100;
    $inferieur2 = 150;
    $resultInferieur = $inferieur1 < $inferieur2;

    var_dump($resultInferieur);
    echo 'On affiche bien que la la variable $inferieur1 est belle et bien inférieur à la variable $inferieur2 soit true.';
?>
<h3>inférieur ou égale</h3>
<p>On utilise les caractères <= pour vérifier si un nombre est bien inférieur ou égale à un autre.</p>
<pre>
&lt;?php
    $inferieurEgale1 = 90;
    $inferieurEgale2 = 32;
    $inferieurEgale3 = 150;
    $inferieurEgale4 = 90;
    $inferieurEgale5 = 91;
    $resultInferieurEgale1 = $inferieurEgale1 <= $inferieurEgale2;
    $resultInferieurEgale2 = $inferieurEgale1 <= $inferieurEgale3;
    $resultInferieurEgale3 = $inferieurEgale1 <= $inferieurEgale4;
    $resultInferieurEgale4 = $inferieurEgale1 <= $inferieurEgale5;

    var_dump($resultInferieurEgale1);
    echo 'On affiche false vu que la variable $inferieurEgale1 n\'est pas inferieur à la variable $inferieurEgale2.&lt;br &gt;>';
    var_dump($resultInferieurEgale2);
    echo 'On affiche bien true vu que la la variable $inferieurEgale1 est belle et bien inférieur à la variable $inferieurEgale3.&lt;br /&gt;';
    var_dump($resultInferieurEgale3);
    echo 'On affiche true vu que la la variable $inferieurEgale1 est de égale à la variable $inferieurEgale4.&lt;br /&gt;';
    var_dump($resultInferieurEgale4);
    echo 'On affiche bien true vue que la la variable $inferieurEgale1 est belle et bien inferieur à la variable $inferieurEgale4.';
?&gt;
</pre>
<?php
    $inferieurEgale1 = 90;
    $inferieurEgale2 = 32;
    $inferieurEgale3 = 150;
    $inferieurEgale4 = 90;
    $inferieurEgale5 = 91;
    $resultInferieurEgale1 = $inferieurEgale1 <= $inferieurEgale2;
    $resultInferieurEgale2 = $inferieurEgale1 <= $inferieurEgale3;
    $resultInferieurEgale3 = $inferieurEgale1 <= $inferieurEgale4;
    $resultInferieurEgale4 = $inferieurEgale1 <= $inferieurEgale5;

    var_dump($resultInferieurEgale1);
    echo 'On affiche false vu que la variable $inferieurEgale1 n\'est pas inferieur à la variable $inferieurEgale2.<br />';
    var_dump($resultInferieurEgale2);
    echo 'On affiche bien true vu que la la variable $inferieurEgale1 est belle et bien inférieur à la variable $inferieurEgale3.<br />';
    var_dump($resultInferieurEgale3);
    echo 'On affiche true vu que la la variable $inferieurEgale1 est de égale à la variable $inferieurEgale4.<br />';
    var_dump($resultInferieurEgale4);
    echo 'On affiche bien true vue que la la variable $inferieurEgale1 est belle et bien inferieur à la variable $inferieurEgale4.';
?>
<h3>Opérateur SI en une LIGNE</h3>
<p>syntaxe avec un exemple.</p>
<ul>
    <li>$age = 32;</li>
    <li>$boisson = ($age >= 18)? "Si vrai alors on affiche ce message" : "Si faux on affiche celui-ci";</li>
    <li>Dans notre cas on affichera bien : <mark>Si vrai alors on affiche ce message</mark></li>
</ul>
<p>Ci dessous un autre exemple détaillé.</p>
<pre>
&lt;?php
    $note1 = 8;
    $resultatNote1 = ($note1 <= 12)? "Il faut que tu sois un peu plus rigoureux dans ton travail... allez accroche toi !" : "C'est bien tu es dans la moyenne. Encore un effort tu peux mieux faire !";

    echo "&lt;mark&gt;" . $resultatNote1 . "&lt;/mark&gt;";
?&gt;
</pre>
<?php
    $note1 = 8;
    $resultatNote1 = ($note1 <= 12)? "Il faut que tu sois un peu plus rigoureux dans ton travail... allez accroche toi !" : "C'est bien tu es dans la moyenne. Encore un effort tu peux mieux faire !";
    
    echo "<mark>" . $resultatNote1 . "</mark>";
?>
<p>Ci dessous le même exemple que précédemment mais avec un toute autre résultat.</p>
<pre>
&lt;?php
    $note2 = 18;
    $resultatNote2 = ($note12 <= 12)? "Il faut que tu sois un peu plus rigoureux dans ton travail... allez accroche toi !" : "C'est bien tu es dans la moyenne. Encore un effort tu peux mieux faire !";
    
    echo "&lt;mark&gt;" . $resultatNote2 . "&lt;/mark&gt;";
?&gt;
</pre>
<?php
    $note2 = 18;
    $resultatNote2 = ($note2 <= 12)? "Il faut que tu sois un peu plus rigoureux dans ton travail... allez accroche toi !" : "C'est bien tu es dans la moyenne. Encore un effort tu peux mieux faire !";

    echo "<mark>" . $resultatNote2 . "</mark>";
?>
<h3>Nouveauté de PHP 7</h3>
<h4>Coalsing</h4>
<p>Le coalsing permet de vérifier un certain nombre de valeur sans devoir inscrire une multitude de condition.</p>
<p>Exemple d'une question sur la couleur d'un crayon. Ici je ne définit rien et donc le résultat sera le dernier élément saisie.</p>
<pre>
    &lt;?php
        $couleurCrayon = $bleu ?? $rouge ?? $vert ?? $noir ?? "Je n'ai plus de stylo..";
        echo $couleurCrayon;
    ?&gt;
</pre>
    <?php
        $couleurCrayon = $bleu ?? $rouge ?? $vert ?? $noir ?? "Je n'ai plus de stylo..";
        echo "<mark>" . $couleurCrayon . "</mark>";
    ?>
<p>Même exemple avec la définition d'une couleur avant. Ici je spécifie une couleur rouge et donc il va rechercher si une variable existe et si oui il affichera le message adéquat.</p>
<pre>
    &lt;?php
        $rouge = "Je n'ai plus de stylo rouge...";
        $couleurCrayon = $bleu ?? $rouge ?? $vert ?? $noir ?? "Je n'ai plus de stylo..";
        echo $couleurCrayon;
    ?&gt;
</pre>
    <?php
        $rouge = "Je n'ai plus de stylo rouge...";
        $couleurCrayon = $bleu ?? $rouge ?? $vert ?? $noir ?? "Je n'ai plus de stylo..";
        echo "<mark>" . $couleurCrayon . "</mark>";
    ?>
<h3>nouveau comparateur en php 7</h3>
<p>Space Chip est le nouveau nom de ce comparateur. Il permet de vérifier 3 choses en une opération. 1 si il est égale et donc il affichera 0. Si il est supérieur il affichera 1 et si il est inférieur il affichera -1</p>
<h4>Exemple 1 - 2 nombres égaux.</h4>
<pre>
&lt;?php 
    $spacechip1 = 69;
    $spacechip2 = 69;
    $resultSpacechip1 = $spacechip1 <=> $spacechip2;

    echo "&lt;mark&gt;" . $resultSpacechip1 ."&lt;/mark&gt;";
?&gt;
</pre>
<?php 
    $spacechip1 = 69;
    $spacechip2 = 69;
    $resultSpacechip1 = $spacechip1 <=> $spacechip2;

    echo "<mark>" . $resultSpacechip1 ."</mark>";
?>
<h4>Exemple 2 - le premier nombre est supérieur</h4>
<pre>
&lt;?php 
    $spacechip3 = 69;
    $spacechip4 = 39;
    $resultSpacechip2 = $spacechip3 <=> $spacechip4;

    echo "&lt;mark&gt;" . $resultSpacechip2 ."&lt;/mark&gt;";
?&gt;
</pre>
<?php 
    $spacechip3 = 69;
    $spacechip4 = 39;
    $resultSpacechip2 = $spacechip3 <=> $spacechip4;

    echo "<mark>" . $resultSpacechip2 ."</mark>";
?>
<h4>Exemple 3 - le premier nombre est inférieur</h4>
<pre>
&lt;?php 
    $spacechip5 = 69;
    $spacechip6 = 99;
    $resultSpacechip3 = $spacechip5 <=> $spacechip6;

    echo "&lt;mark&gt;" . $resultSpacechip3 ."&lt;/mark&gt;";
?&gt;
</pre>
<?php 
    $spacechip5 = 69;
    $spacechip6 = 99;
    $resultSpacechip3 = $spacechip5 <=> $spacechip6;

    echo "<mark>" . $resultSpacechip3 ."</mark>";
?>
<h2>Operateur d'incrémentation</h2>
<p>Sous ce nom barbare, l'incrémentation permet tout simplement d'ajouter +1 et donc si on incrémente 68 de +1 on obtiendra 69.</p>
<h3>version longue</h3>
<p>Ici on définit 1 comme valeur de départ. On incrémente ce dernier pour obtenir le résultat de 2 </p>
<pre>
    &lt;?php
        $incrementation1 = 1;
        echo "&lt;mark&gt;" . $incrementation1 . "&lt;/mark&gt; &lt;br /&gt;";
        $incrementation1 = $incrementation1 + $incrementation1;
        echo "&lt;mark&gt;" . $incrementation1 . "&lt;/mark&gt;";
    ?&gt;
</pre>
<?php
    $incrementation1 = 1;
    echo "<mark>" . $incrementation1 . "</mark> <br />";
    $incrementation1 = $incrementation1 + $incrementation1;
    echo "<mark>" . $incrementation1 . "</mark>";
?>
<h3>version courte</h3>
<p>Même exemple avec une version raccourçis du code..</p>
<pre>
    &lt;?php
        $incrementation1 = 1;
        echo "&lt;mark&gt;" . $incrementation1 . "&lt;/mark&gt; &lt;br /&gt;";
        $incrementation1++;
        echo "&lt;mark&gt;" . $incrementation1 . "&lt;/mark&gt;";
    ?&gt;
</pre>
<?php
    $incrementation1 = 1;
    echo "<mark>" . $incrementation1 . "</mark> <br />";
    $incrementation1++;
    echo "<mark>" . $incrementation1 . "</mark>";
?>
<h2>Operateur de décrémentation</h2>
<p>Même chose que l'incrémentation mais en sens inverse. Donc vous l'aurez compris il s'agit tout simplement de retirer -1 à une donnée. Soit 32 -1 = 31...</p>
<h3>version longue</h3>
<p>Ici on définit 10 comme valeur de départ. On décrémente ce dernier pour obtenir le résultat de 0 soit 10 - 10 = 0 </p>
<pre>
    &lt;?php
        $decrementation = 10;
        echo "&lt;mark&gt;" . $decrementation . "&lt;/mark&gt; &lt;br /&gt;";
        $decrementation = $decrementation - $decrementation;
        echo "&lt;mark&gt;" . $decrementation . "&lt;/mark&gt;";
    ?&gt;
</pre>
<?php
    $decrementation = 10;
    echo "<mark>" . $decrementation . "</mark> <br />";
    $decrementation = $decrementation - $decrementation;
    echo "<mark>" . $decrementation . "</mark>";
?>
<h3>version courte</h3>
<p>Même exemple avec une version raccourçis du code.. le résultat sera lui différent.</p>
<pre>
    &lt;?php
        $decrementation = 10;
        echo "&lt;mark&gt;" . $decrementation . "&lt;/mark&gt; &lt;br /&gt;";
        $decrementation--;
        echo "&lt;mark&gt;" . $decrementation . "&lt;/mark&gt;";
    ?&gt;
</pre>
<?php
    $decrementation = 10;
    echo "<mark>" . $decrementation . "</mark> <br />";
    $decrementation--;
    echo "<mark>" . $decrementation . "</mark>";
?>
<h2>Operateur logique</h2>
<h3>L'opérateur "ET" </h3>
<p>Pour écrire ET on utilise le mot clé "and" ou bien "&&" aussi appelé esperluette.</p>
<h4>Exemple 1 - avec and</h4>
<pre>
&lt;?php
    $et1 = 18;
    $et2 = 20;
    
    var_dump( $et1 > 12 and $et2 < 21 );
    echo "&lt;mark&gt; Le résultat sera true vu que les opérations sont toutes les 2 vrais.&lt;/mark&gt;";
?&gt;
</pre>
<?php
    $et1 = 18;
    $et2 = 20;
    
    var_dump( $et1 > 12 and $et2 < 21 );
    echo "<mark> Le résultat sera true vu que les opérations sont toutes les 2 vrais.</mark>";
?>
<h4>Exemple 2 - avec &&</h4>
<pre>
&lt;?php
    $et3 = 18;
    $et4 = 20;
    
    var_dump( $et3 > 12 && $et4 < 21 );
    echo "&lt;mark&gt; Le résultat sera true vu que les opérations sont toutes les 2 vrais.&lt;/mark&gt;";
?&gt;
</pre>
<?php
    $et3 = 18;
    $et4 = 20;
    
    var_dump( $et3 > 12 && $et4 < 21 );
    echo "<mark> Le résultat sera true vu que les opérations sont toutes les 2 vrais.</mark>";
?>


<h4>Exemple 3 - même exemple avec une seule condition vrai AVEC and</h4>
<pre>
&lt;?php
    $et1 = 5;
    $et2 = 30;
    
    var_dump( $et1 > 12 and $et2 < 50 );
    echo "&lt;mark&gt; Le résultat sera false vu que la premier opération est fausse.&lt;/mark&gt;";
?&gt;
</pre>
<?php
    $et1 = 5;
    $et2 = 30;
    
    var_dump( $et1 > 12 and $et2 < 50 );
    echo "<mark> Le résultat sera false vu que la premier opération est fausse.</mark>";
?>

<h4>Exemple 3 - même exemple avec une seule condition vrai AVEC &&</h4>
<pre>
&lt;?php
    $et1 = 5;
    $et2 = 30;
    
    var_dump( $et1 > 12 && $et2 < 50 );
    echo "&lt;mark&gt; Le résultat sera false vu que la premier opération est fausse.&lt;/mark&gt;";
?&gt;
</pre>
<?php
    $et1 = 5;
    $et2 = 30;
    
    var_dump( $et1 > 12 && $et2 < 50 );
    echo "<mark> Le résultat sera false vu que la premier opération est fausse.</mark>";
?>
<h3>opérateur "OU"</h3>
<p>Pour écrire OU on utilise le mot clé "or" ou bien "||" aussi appelé pipe. Il faut savoir qu'à la différence du ET c'est qu'ici si une opération est juste alors la réponse sera vrai.</p>
<h4>Exemple 1 - avec or</h4>
<pre>
&lt;?php
    $ou1 = 69;
    $ou2 = 33;
    
    var_dump( $ou1 > 12 or $ou2 < 69 );
    echo "&lt;mark&gt; Le résultat sera true vu que les opérations sont toutes les 2 vrais.&lt;/mark&gt;";
?&gt;
</pre>
<?php
    $ou1 = 69;
    $ou2 = 33;
    
    var_dump( $ou1 > 12 or $ou2 < 69 );
    echo "<mark> Le résultat sera true vu que les opérations sont toutes les 2 vrais.</mark>";
?>
<h4>Exemple 2 - avec &&</h4>
<pre>
&lt;?php
    $ou3 = 99;
    $ou4 = 39;
    
    var_dump( $ou3 > 50 || $ou2 < 100 );
    echo "&lt;mark&gt; Le résultat sera true vu que les opérations sont toutes les 2 vrais.&lt;/mark&gt;";
?&gt;
</pre>
<?php
    $ou3 = 99;
    $ou4 = 39;
    
    var_dump( $ou3 > 50 || $ou2 < 100 );
    echo "<mark> Le résultat sera true vu que les opérations sont toutes les 2 vrais.</mark>";
?>


<h4>Exemple 3 - autre exemple avec une seule condition vrai AVEC or</h4>
<pre>
&lt;?php
    $ou5 = 10;
    $ou6 = 80;
    
    var_dump( $ou5 > 5 or $ou6 < 50 );
    echo "&lt;mark&gt; Le résultat sera false vu que la seconde opération est fausse.&lt;/mark&gt;";
?&gt;
</pre>
<?php
    $ou5 = 10;
    $ou6 = 80;
    
    var_dump( $ou5 > 5 or $ou6 < 50 );
    echo "<mark> Le résultat sera false vu que la seconde opération est fausse.</mark>";
?>

<h4>Exemple 4 - même exemple avec une seule condition vrai AVEC ||</h4>
<pre>
&lt;?php
    $ou7 = 10;
    $ou8 = 80;
    
    var_dump( $ou7 > 11 || $ou8 < 90 );
    echo "&lt;mark&gt; Le résultat sera true vu qu'au moins la seconde opération est juste.&lt;/mark&gt;";
?&gt;
</pre>
<?php
    $ou7 = 10;
    $ou8 = 80;
    
    var_dump( $ou7 > 11 || $ou8 < 90 );
    echo "<mark> Le résultat sera true vu qu'au moins la seconde opération est juste.</mark>";
?>
<h3>L'inverse d'un resultat</h3>
<p>on utilise ! pour définir l'inverse d'un résultat.</p>
<h4>exemple normal</h4>
<p>j'affiche ici une variable avec un boulean à true. On obtiendra via le var_dump true comme réponse.</p>
<pre>
&lt;?php
    $normal = true;
    var_dump($normal);
?&gt;
<?php
    $normal = true;
    var_dump($normal);
?>
</pre>
<h4>exemple inversé</h4>
<p>j'affiche ici une variable avec un boulean à true. Mais j'ajoute dans mon var_dump avant la variable le ! pour afficher l'inverse du résultat soit false.</p>
<pre>
&lt;?php
    $normal = true;
    var_dump(!$normal);
?&gt;
</pre>
<?php
    $normal = true;
    var_dump(!$normal);
?>
<h3>L'opérateur xor</h3>
<p>L'opérateur xor est très particulier, on doit obligatoirement obtenir une seule condition de vrai pour afficher true. Si 2 confitions sont vrai ou fausses, on obtiendra false. /!\ n'existe pas dans le javascript !!</p>
<h4>Exemple 1 - 2 réponses vrai et on obtient false avec xor</h4>
<pre>
    &lt;?php
        $xor1 = 10;
        $xor2 = 20;

        var_dump($xor1 > 5 xor $xor2 < 50);
        echo '$xor1 est bien supérieur à 5 et $xor2 est bien inférieur à 50 donc les 2 réponses sont vrai... On affiche avec xor false...';
    ?&gt;
</pre>
<?php
    $xor1 = 10;
    $xor2 = 20;

    var_dump($xor1 > 5 xor $xor2 < 50);
    echo '$xor1 est bien supérieur à 5 et $xor2 est bien inférieur à 50 donc les 2 réponses sont vrai... On affiche avec xor false...';
?>
<h4>Exemple 2 - 2 réponses fausses et on obtient false avec xor</h4>
<pre>
    &lt;?php
        $xor3 = 1;
        $xor4 = 10;

        var_dump($xor3 > 2 xor $xor4 < 9);
        echo '$xor3 n\'est pas supérieur à 2 et $xor4 n'est également pas inférieur à 9 donc les 2 réponses sont fausses... On affiche donc avec xor false...';
    ?&gt;
</pre>
<?php
    $xor3 = 1;
    $xor4 = 10;

    var_dump($xor3 > 2 xor $xor4 < 9);
    echo '$xor3 n\'est pas supérieur à 2 et $xor4 n\'est également pas inférieur à 9 donc les 2 réponses sont fausses... On affiche donc avec xor false...';
?>
<h4>Exemple 3 - 1 réponse est vrai et donc on obtient ici true avec xor</h4>
<pre>
    &lt;?php
        $xor5 = 50;
        $xor6 = 60;

        var_dump($xor5 > 100 xor $xor6 < 70);
        echo '$xor5 n\'est pas supérieur à 100 et $xor6 est par contre bien inférieur à 70 donc une des deux réponses est vrai. On affiche donc avec xor true...';
    ?&gt;
</pre>
<?php
    $xor5 = 50;
    $xor6 = 60;

    var_dump($xor5 > 100 xor $xor6 < 70);
    echo '$xor5 n\'est pas supérieur à 100 et $xor6 est par contre bien inférieur à 70 donc une des deux réponses est vrai. On affiche donc avec xor true...';
?>
<h3>Concaténé 2 string entre elles.</h3>
<h4>version longue</h4>
<pre>
    &lt;?php
        $concatenation1 = "Salut moi je m'appel : ";
        $concatenation2 = "Alain Guillon";
        $concatenation 1 = $concatenation1 . $concatenation2;

        echo $concatenation1;
    ?&gt;
</pre>
<?php
    $concatenation1 = "Salut moi je m'appel : ";
    $concatenation2 = "Alain Guillon";
    $concatenation1 = $concatenation1 . $concatenation2;

    echo $concatenation1;
?>
<h4>version courte</h4>
<pre>
    &lt;?php
        $concatenation1 = "Salut moi je m'appel : ";
        $concatenation2 = "Alain Guillon";
        $concatenation 1 .= $concatenation2;

        echo $concatenation1;
    ?&gt;
</pre>
<?php
    $concatenation1 = "Salut moi je m'appel : ";
    $concatenation2 = "Alain Guillon";
    $concatenation1 .= $concatenation2;

    echo $concatenation1;
?>
<h2>Les conditions</h2>
<h3>Si / sinon si / sinon </h3>
<h4>Exemple 1 - SI (if)</h4>
<pre>
    &lt;?php
        $motivation = 1;

        if ( $motivation < 3) {
            echo "&lt;mark&gt;oualalala, il faut se motiver&lt;/mark&gt;";
        } else if ( $motivation >= 3 && $motivation < 8) {
            echo "Allez un peu de courage on va y arrivé";
        } else {
            echo "Tu es vraiment motivé c'est topissime ensembles tu verras on va y arriver !!";
        }
    ?&gt;
</pre>
<?php
    $motivation = 1;

    if ( $motivation < 3) {
        echo "<mark>oualalala, il faut se motiver</mark>";
    } else if ( $motivation >= 3 && $motivation < 8) {
        echo "Allez un peu de courage on va y arrivé";
    } else {
        echo "Tu es vraiment motivé c'est topissime ensembles tu verras on va y arriver !!";
    }
?>
<h4>Exemple 2 - SINON SI (else if)</h4>
<pre>
    &lt;?php
        $motivation = 5;

        if ( $motivation < 3) {
            echo "oualalala, il faut se motiver";
        } else if ( $motivation >= 3 && $motivation < 8) {
            echo "&lt;mark&gt;Allez un peu de courage on va y arrivé&lt;/mark&gt;";
        } else {
            echo "Tu es vraiment motivé c'est topissime ensembles tu verras on va y arriver !!";
        }
    ?&gt;
</pre>
<?php
    $motivation = 5;

    if ( $motivation < 3) {
        echo "oualalala, il faut se motiver";
    } else if ( $motivation >= 3 && $motivation < 8) {
        echo "<mark>Allez un peu de courage on va y arrivé</mark>";
    } else {
        echo "Tu es vraiment motivé c'est topissime ensembles tu verras on va y arriver !!";
    }
?>
<h4>Exemple 3 - SINON (else)</h4>
<pre>
    &lt;?php
        $motivation = 8;

        if ( $motivation < 3) {
            echo "oualalala, il faut se motiver";
        } else if ( $motivation >= 3 && $motivation < 8) {
            echo "Allez un peu de courage on va y arrivé";
        } else {
            echo "&lt;mark&gt;Tu es vraiment motivé c'est topissime ensembles tu verras on va y arriver !!&lt;/mark&gt;";
        }
    ?&gt;
</pre>
<?php
    $motivation = 8;

    if ( $motivation < 3) {
        echo "oualalala, il faut se motiver";
    } else if ( $motivation >= 3 && $motivation < 8) {
        echo "Allez un peu de courage on va y arrivé";
    } else {
        echo "<mark>Tu es vraiment motivé c'est topissime ensembles tu verras on va y arriver !!</mark>";
    }
?>
<h2>Switch</h2>
<p>Le switch permet de définir un certain nombre de phrase spécifique dans un contexte bien précis. (On connait le nombre de réponse possible).</p>
<h3>Exemple 1 - La réponse par défaut</h3>
<p>Ici j'affiche la réponse : Choisis un objectif</p>
<pre>
    &lt;?php
        $objectif = "";

        switch ($objectif) {

            case "travailler en Freelance":
                echo "Freelance, c'est génial !";
                break;
            case "travailler à la maison":
                echo "T'as raison, c'est de la balle !";
                break;
            case "Coder mon site web":
                echo "Bonne chance !";
                break;

            default :
                echo "Choisis un objectif";
        }
    ?&gt;
</pre>
<?php
    $objectif = "";

    switch ($objectif) {

        case "travailler en Freelance":
            echo "Freelance, c'est génial !";
            break;
        case "travailler à la maison":
            echo "T'as raison, c'est de la balle !";
            break;
        case "Coder mon site web":
            echo "Bonne chance !";
            break;

        default :
            echo "Choisis un objectif";
    }
?>
<h3>Exemple 2 - La 3ème réponse</h3>
<p>ici j'afficherai la réponse : Bonne chance !</p>
<pre>
    &lt;?php
        $objectif = "Coder mon site web";

        switch ($objectif) {

            case "travailler en Freelance":
                echo "Freelance, c'est génial !";
                break;
            case "travailler à la maison":
                echo "T'as raison, c'est de la balle !";
                break;
            case "Coder mon site web":
                echo "Bonne chance !";
                break;

            default :
                echo "Choisis un objectif";
        }
    ?&gt;
</pre>
<?php
    $objectif = "Coder mon site web";

    switch ($objectif) {

        case "travailler en Freelance":
            echo "Freelance, c'est génial !";
            break;
        case "travailler à la maison":
            echo "T'as raison, c'est de la balle !";
            break;
        case "Coder mon site web":
            echo "Bonne chance !";
            break;

        default :
            echo "Choisis un objectif";
    }
?>
<h3>Exemple 3 - La 1ème réponse</h3>
<p>ici j'afficherai la réponse : Freelance, c'est génial !</p>
<pre>
    &lt;?php
        $objectif = "travailler en Freelance";

        switch ($objectif) {

            case "travailler en Freelance":
                echo "Freelance, c'est génial !";
                break;
            case "travailler à la maison":
                echo "T'as raison, c'est de la balle !";
                break;
            case "Coder mon site web":
                echo "Bonne chance !";
                break;

            default :
                echo "Choisis un objectif";
        }
    ?&gt;
</pre>
<?php
    $objectif = "travailler en Freelance";

    switch ($objectif) {

        case "travailler en Freelance":
            echo "Freelance, c'est génial !";
            break;
        case "travailler à la maison":
            echo "T'as raison, c'est de la balle !";
            break;
        case "Coder mon site web":
            echo "Bonne chance !";
            break;

        default :
            echo "Choisis un objectif";
    }
?>
<h2>Les boucles</h2>
<h3>While</h3>
<p>avec la boucle while (tant que) on peut très vite être confronté à une boucle infini.</p>
<pre>
    &lt;?php
        $while = 0;

        while ( $while <= 5 ) {
            echo "La valeur de ma variable while est : $while &lt;br /&gt;";
            // L'incrémentation est obligatoire au risque de se retrouver avec une boucle infini.
            $while++;
        }
    ?&gt;
</pre>
<?php
    $while = 0;

    while ( $while <= 5 ) {
        echo "La valeur de ma variable while est : $while <br />";
        // L'incrémentation est obligatoire au risque de se retrouver avec une boucle infini.
        $while++;
    }
?>
<h3>Do while</h3>
<p>A la différence du while qui pose tout d'abord la question de savoir si la condition est vrai afin d'afficher le code, ici le do while c'est on affiche directement le code à exécuté une première fois puis on pose la question si la boucle est vrai afin d'afficher ou non le code à nouveau.</p>
<pre>
    &lt;?php
        $doWhile = 0;

        do {
            echo "La valeur de ma variable do while est : $doWhile &lt;br /&gt;";
            $doWhile++;
        } while ( $doWhile <= 5);
    ?&gt;
</pre>
<?php
    $doWhile = 0;

    do {
        echo "La valeur de ma variable do while est : $doWhile <br />";
        $doWhile++;
    } while ( $doWhile <= 5);
?>
<h3>for</h3>
<p>Une boucle fait sensiblement la même chose qu'un while à contrario qu'on l'utilise uniqument quand on ne sait pas combien d'élément nous allons afficher.</p>
<p>la syntaxe : <mark>for ( $variable = 0; condition; incrementation ) { code a exécuter }</mark></p>
<pre>
    &lt;?php
        $for = 0;

        for ( $for = 0; $for <= 5; $for++ ) {
            echo "La valeur de ma variable for est : $for &lt;br /&gt;";
        }
    ?&gt;
</pre>
<?php
    $for = 0;

    for ( $for = 0; $for <= 5; $for++ ) {
        echo "La valeur de ma variable for est : $for <br />";
    }
?>
<h2>function</h2>
<p>Une fonction permet d'éviter de répéter un bout de code plusieurs fois. Ainsi si on doit répéter un bout de code, on utilisera une fonction qui nous permettra de gagner un temps fou.</p>
<h3>Déclaration d'une fonction</h3>
<p>le code de la fonction ci-dessous n'affichera rien du tout. En effet nous avons simplement déclarer la fonction en aucun cas on l'initialise</p>
<pre>
    &lt;?php
        function maFonction() {
            echo "Coucou";
        }
    ?&gt;
</pre>
<?php
    function maFonction() {
        echo "<mark>Coucou</mark>";
    }
?>
<h3>Initialisation de la function précédente</h3>
<pre>
    &lt;?php
        maFonction();
    ?&gt;
</pre>
<?php
    maFonction();
?>
<h3>Argument dans une fonction</h3>
<p>On peut spécifier un argument dans une fonction.</p>
<h4>exemple d'un argument de type message</h4>
<pre>
    &lt;?php
        function presentationPerso($message) {
            echo $message;
        }

        $presentationPerso("Salut je m'appel Alain GUILLON, je désire plus que tout devenir un grand nom dans le milieu du developpement informatique");
        $presentationPerso("&lt;br /&gt;Second texte avec exactement la même fonction...");
    ?&gt;
</pre>
<?php
    function presentationPerso($message) {
        echo $message;
    }

    presentationPerso("Salut je m'appel Alain GUILLON, je désire plus que tout devenir un grand nom dans le milieu du developpement informatique");
    presentationPerso("<br />Second texte avec exactement la même fonction...");
?>
<h3>Argument par defaut</h3>
<p>Dans une fonction, on peut saisir des arguments par défaut. Ainsi si on ne saisi rien, on obtiendra tout de même un message.</p>
<h4>Exemple 1 - Message par défaut</h4>
<pre>
    &lt;?php
        function myName ($nom = "Nom non spécifié") {
            echo "Je m'appel : $nom";
        }

        myName();
    ?&gt;
</pre>
<?php
    function myName ($nom = "Nom non spécifié") {
        echo "Je m'appel : $nom";
    }

    myName();
?>
<h4>Exemple 2 - nom saisi</h4>
<pre>
    &lt;?php
        function myName2 ($nom = "Nom non spécifié") {
            echo "Je m'appel : $nom";
        }

        myName2("Alain Guillon");
    ?&gt;
</pre>
<?php
    function myName2 ($nom = "Nom non spécifié") {
        echo "Je m'appel : $nom";
    }

    myName2("Alain Guillon");
?>
<h3>ajouter un 2emes arguments</h3>
<pre>
    &lt;?php
        function objectifPerso ($objectif, $combien) {
            for ( $i = 0; $i <= $combien; $i++ ) {
                echo "$objectif &lt;br /&gt;";
            }
        }

        objectifPerso("Je veux être un super DEVELOPPEUR", 5);
    ?&gt;
</pre>
<?php
    function objectifPerso ($objectif, $combien) {
        for ( $i = 0; $i <= $combien; $i++ ) {
            echo "$objectif <br />";
        }
    }

    objectifPerso("Je veux être un super DEVELOPPEUR", 5);
?>
<h3>retourner une valeur dans une fonction</h3>
<pre>
    &lt;?php
        function addition($x, $y, $z) {
            return $x + $y + $z;
        }

        echo "Le résultat de mon opération est : " . addition(15, 32, 69);
    ?&gt;
</pre>
<?php
    function addition($x, $y, $z) {
        return $x + $y + $z;
    }

    echo "Le résultat de mon opération est : " . addition(15, 32, 69);
?>
<h3>PHP 7 et la restriction du type imposer lors de la saisie de tel ou tel donnée</h3>
<p>Avec php 7, nous pouvons forcer l'utilisateur à saisir obligatoirement un integer ou un string etc.. mais pour celà il faut avant le DOCTYPE saisir :</p>
<p><strong>&lt;?php declare(strict_types=1); ?&gt;</strong></p>
<p>Ainsi, on pourra dans nos fonction saisir le type avant la variable et comme ça, l'utilisateur obtiendra une erreur si le type saisi ne correspond tout simplement pas.</p>
<h4>exemple 1 - saisi correcte</h4>
<pre>
    &lt;?php
       function saisiStrictValid(int $numberX, int $numberY) {
           return $numberX + $numberY;
       }

       echo saisiStrictValid(10,10);
    ?&gt;
</pre>
<?php
    function saisiStrictValid(int $numberX, int $numberY):int {
        return $numberX + $numberY;
    }

    echo saisiStrictValid(10,10);
?>
<h4>exemple 2 - saisi incorrecte</h4>
<pre>
    &lt;?php
       function saisiStrictNonValid(int $numberA, int $numberB) {
           return $numberA + $numberB;
       }

       echo saisiStrictNonValid(69,"35");
    ?&gt;
</pre>
<?php
    function saisiStrictNonValid(int $numberA, int $numberB):int {
        return $numberA + $numberB;
    }

    echo saisiStrictNonValid(69,"35");
?>

</body>
</html>