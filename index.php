<?php 
    // Déclaration du type à saisir obligatoirement lors d'une saisi.
    declare(strict_types=1);
?>
<?php
    // Initialisation de notre super global $_SESSION.
    session_start();

    $_SESSION["nom"] = "Eléanore";
?>
<?php
    setcookie("myCookie", "alain", time() + 3600*24*30);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="stylePHP.css" type="text/css">
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
<span class="balisePHP">&lt;?php</span>
    echo "Cette ligne est écrite directement en php, soit :";
<span class="balisePHP">?&gt;</span>
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
        <span class="balisePHP">&lt;?php</span>
            <span class="variable">$nombreOne</span> = 72;
            <span class="variable">$nombreTwo</span> = 386;
            <span class="variable">$resultat</span> = <span class="variable">$nombreOne</span> + <span class="variable">$nombreTwo</span>;
            echo <span class="variable">$resultat</span>;
        <span class="balisePHP">?&gt;</span>
    </pre>

<h2>Les scopes</h2>
<h3>Scope Globale</h3>
<p>Une variable global peut être lu sur toute la page mais pas dans une fonction.</p>
<p>Exemple : (Variable global)</p>
<pre>
<span class="balisePHP">&lt;?php</span> 
    <span class="variable">$variableGlobal1</span> = "&lt;mark&gt;Je suis une variable global&lt;/mark&gt;";
    echo <span class="variable">$variableGlobal1</span>;
<span class="balisePHP">?&gt;</span>
</pre>
soit : 
<?php 
    $variableGlobal1 = "<mark>Je suis une variable global</mark>";
    echo $variableGlobal1;
?>
<p>Exemple 2 : Utilisation d'une variable global dans une fonction causera irrémédiablement une erreur avec cette syntaxe.</p>
<pre>
<span class="balisePHP">&lt;?php</span>
    <span class="variable">$variableGlobal2</span> = "&lt;mark&gt;Je suis une variable global dans un scope local&lt;/mark&gt;";
    function testGlobal(){
        echo <span class="variable">$variableGlobal2</span>;
    }
    testGlobal();
<span class="balisePHP">?&gt;</span>
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
<span class="balisePHP">&lt;?php</span> 
    <span class="variable">$variableGlobal3</span> = "&lt;mark&gt;Je suis une variable global dans un scope local&lt;/mark&gt;";
    function testGlobalInLocal(){
        global <span class="variable">$variableGlobal3</span>;
        echo <span class="variable">$variableGlobal3</span>;
    }
    testGlobalInLocal();
<span class="balisePHP">?&gt;</span>
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
<span class="balisePHP">&lt;?php</span> 
    <span class="variable">$variableGlobal4</span> = "&lt;mark&gt;Je suis une SUPER GLOBAL dans un scope local&lt;/mark&gt;";
    function testSuperGlobal(){
        echo <span class="variable">$GLOBALS</span>['variableGlobal4'];
    }
    testSuperGlobal();
<span class="balisePHP">?&gt;</span>
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
<span class="balisePHP">&lt;?php</span> 
    function essaiVariableStatic() {
        <span class="variable">$nombre1</span> = 10;
        <span class="variable">$nombre1</span>++;
        echo <span class="variable">$nombre1</span>;
    }

    essaiVariableStatic();
    echo "&lt;br&gt;";
    essaiVariableStatic();
    echo "&lt;br&gt;";
    essaiVariableStatic();
    echo "&lt;br&gt;";
    essaiVariableStatic();

<span class="balisePHP">?&gt;</span>
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
            <li> Avec un print_r() ça fonctionne :
            <pre>
<span class="balisePHP">&lt;?php</span>
    <span class="variable">$jourDeLaSemaine</span> = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","dimanche");
    print_r(<span class="variable">$jourDeLaSemaine</span>);
<span class="balisePHP">?&gt;</span>
            </pre>
            <?php
                $jourDeLaSemaine = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","dimanche");
            print_r($jourDeLaSemaine);
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

<span class="variable">$objetOne</span> = new Objet();
print_r(<span class="variable">$objetOne</span>);
                </pre>
                ce qui affichera :<mark>
                <?php
                    class Objet {
                    function __construct(){
                        $this->couleur = "Bleu";
                    }
                }
                $objetOne = new Objet();
                print_r($objetOne);
                ?></mark>
            </li>
        </ul>
    <li>null (null pas de valeur)</li>
        <ul>
            <li>
            $null = null;
            print_r($null);
            </li>
            <li>soit :
            <pre>
<span class="balisePHP">&lt;?php</span>
    <span class="variable">$null</span> = null;
    print_r(<span class="variable">$null</span>);
<span class="balisePHP">?&gt;</span>
            </pre>
            <mark>
            <?php
                $null = null;
                print_r($null);
            ?>
            </mark>
            </li>

        </ul>
</ul>

<h2>print_r() en php est l'équivalent d'un console.log() en javascripts</h2>
<p>En javascript nous utilisions le console.log() pour afficher dans la console un résultat, ici en php le print_r affichera directement sur la page ce qu'on a spécifier entre parenthèse.</p>
<p>Exemple de 2 print_r(). Le premier concernera une string et le second un nombr entier.</p>
<pre>
    <span class="balisePHP">&lt;?php</span> 
        <span class="variable">$myString</span> = "J'adore le code informatique";
        print_r(<span class="variable">$myString</span>);
    <span class="balisePHP">?&gt;</span>
</pre>
soit : 
<mark><?php 
    $myString = "J'adore le code informatique";
    print_r($myString);
?> </mark>(28 correspond au nombre de caractères).
<pre>
    <span class="balisePHP">&lt;?php</span> 
        <span class="variable">$myInteger</span> = 3;
        print_r(<span class="variable">$myInteger</span>);
    <span class="balisePHP">?&gt;</span>
</pre>
soit : 
<mark><?php 
    $myInteger = 3;
    print_r($myInteger);
?> </mark>(3 correspond au nombre définit dans la variable).

<h2>Quelques fonctions pour les chaines de caractères...</h2>
<h3>Longeur d'une string.</h3>
<pre>
    <span class="balisePHP">&lt;?php</span>
        <span class="variable">$functionString1</span> = "Utilisation de la fonction <strong>strlen()</strong> qui permet d'obtenir la longueur d'une chaine de caractère";
        echo 'ma variable : $functionString1 dispose de ' . strlen(<span class="variable">$functionString1</span>) . ' caractères.';
    <span class="balisePHP">?&gt;</span>
</pre>
affichera : 
<?php
        $functionString1 = "Utilisation de la fonction <strong>strlen()</strong> qui permet d'obtenir la longueur d'une chaine de caractère";
        echo 'ma variable : $functionString1 contient ' . strlen($functionString1) . ' caractères.';
    ?>
<h3>Comptez le nombre de mots</h3>
<pre>
    <span class="balisePHP">&lt;?php</span>
        <span class="variable">$functionString2</span> = "Utilisation de la fonction <strong>str_word_count()</strong> qui permet de compter le nombre de mots dans un texte.";
        echo 'ma variable $functionString2 contient ' . str_word_count(<span class="variable">$functionString2</span>) . ' mots.';
    <span class="balisePHP">?&gt;</span>
</pre>
    <?php
        $functionString2 = "Utilisation de la fonction <strong>str_word_count()</strong> qui permet de compter le nombre de mots dans un texte.";
        echo 'ma variable $functionString2 contient ' . str_word_count($functionString2) . ' mots.';
    ?>
<h3>Mettre à l'envers une phrase</h3>
<pre>
    <span class="balisePHP">&lt;?php</span>
        <span class="variable">$functionString3</span> = "Utilisation de la fonction <strong>strrev()</strong> qui permet d'inscrire une phrase completement a l'envers. Allez et si on parlait le verlant";

        echo '- Ma variable $functionString3 affiche en verlant cette phrase : &lt;br /&gt;' . strrev($functionString3) . '&lt;br /&gt;';
        echo "- La phrase d'origine pour la même fonction : &lt;br /&gt;" . <span class="variable">$functionString3</span>;
    <span class="balisePHP">?&gt;</span>
</pre>
    <?php
        $functionString3 = "Utilisation de la fonction <strong>strrev()</strong> qui permet d'inscrire une phrase completement a l'envers. Allez et si on parlait le verlant";

        echo '- Ma variable $functionString3 affiche en verlant cette phrase : <br />' . strrev($functionString3) . '<br />';
        echo "- La phrase d'origine pour la même fonction : <br />" . $functionString3;
    ?>
<h3>Trouver la position d'un mot précis</h3>
<p>A savoir que la function qui va suivre est comprise comme un boolean. Si le résultat est vrai alors il affichera le résultat. En revanche, si le résultat n'existe pas, à l'écran rien ne sera affiché hormis si on utilise un print_r() de la fonction qui affichera belle et bien le false à l'écran.</p>
<pre>
    <span class="balisePHP">&lt;?php</span>
        <span class="variable">$functionString4</span> = "Utilisation de la fonction <strong>strpos(arg1, arg2)</strong> qui prends comme premier argument la variable à rechercher. LE second argument quand à lui correspond au mot clé à chercher.";

        echo 'Dans ma variable $functionString4, je recherche le mot "variable". Le chiffre indiqué après correspond à la position du premier caractère du mot clé soit le "v". Donc le résultat est : &lt;br /&gt;' . strpos($functionString4, "variable");
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        <span class="variable">$functionString2a</span> = 'ancien-mot';
        <span class="variable">$functionString2b</span> = 'nouveau-mot';
        <span class="variable">$functionString2c</span> = 'Dans cette phrase on a remplacer ma variable $functionString2a par $functionString2b qui contient : ancien-mot qui était elle-même dans la $functionString2c';

        echo str_replace(<span class="variable">$functionString2a</span>, <span class="variable">$functionString2b</span>, <span class="variable">$functionString2c</span>);
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        define("MY_URL", "http://alain-guillon.fr");
        echo "l'adresse de mon site web se trouve à cette adresse " . MY_URL;
    <span class="balisePHP">?&gt;</span>
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
    print_r($nombreString);
    echo "<br />Ci dessous le même nombre mais avec le type integer <br />";
    print_r($nombreInt);
    echo "<br />Voici le résultat afficher dans un print_r() soit vrai<br />";
    print_r($nombreInt == $nombreString);
?>
<p>Avec le triple égale soit : "===" on <strong>NE VALIDE PAS LE CONTENU VU QUE LE TYPE NE CORRESPOND PAS</strong></p>
<?php
    $nombreString = "32";
    $nombreInt = 32;

    echo "Ci dessous à nouveau le nombre 32 écrit dans une chaine de caractère soit le type string <br />";
    print_r($nombreString);
    echo "<br />Ci dessous de nouveau le même nombre mais avec le type integer <br />";
    print_r($nombreInt);
    echo "<br />Voici le résultat afficher dans un print_r() soit cette fois-ci FAUX<br />";
    print_r($nombreInt === $nombreString);
?>
<h3>différent de</h3>
<p>Pour voir si un nombre est différent, on utilise le != qui permettra de poser la question si 2 variables sont identique ou non.</p>
<pre>
<span class="balisePHP">&lt;?php</span>
    <span class="variable">$different1</span> = 69;
    <span class="variable">$different2</span> = 42;

    print_r(<span class="variable">$different1</span> != <span class="variable">$different2</span>);
    echo 'Ici $different1 est bien différent de $different2 donc le boulean affiche bien true';
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $different1 = 69;
    $different2 = 42;

    print_r($different1 != $different2);
    echo 'Ici $different1 est bien différent de $different2 donc le boulean affiche bien true';
?>
<pre>
<span class="balisePHP">&lt;?php</span>
    $different1 = 69;
    $different2 = 69;

    print_r($different1 != $different2);
    echo 'ici $different1 est bien égale à $different2 et donc le boolean renvoi bien false.';
<span class="balisePHP">?&gt;</span>

</pre>
<?php
    $different1 = 69;
    $different2 = 69;

    print_r($different1 != $different2);
    echo 'ici $different1 est bien égale à $different2 et donc le boolean renvoi bien false.';
?>
<p>On a aussi la possibilité de vérifier le type tout en les différenciant soit avec le !==</p>
<pre>
<span class="balisePHP">&lt;?php</span>
    $different1 = 69;
    $different2 = "69";

    print_r($different1 !== $different2);
    echo 'ici $different1 n\'est plus égale à $different2 vu qu\' on a deux types différent donc le boolean renvoi bien true.';
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $different1 = 69;
    $different2 = "69";

    print_r($different1 !== $different2);
    echo 'ici $different1 n\'est plus égale à $different2 vu qu\' on a deux types différent donc le boolean renvoi bien true.';
?>
<h3>Supérieur</h3>
<p>on utilise le caractère > pour vérifier si un nombr est supérieur à un autre.</p>
<pre>
<span class="balisePHP">&lt;?php</span>
    $superieur1 = 32;
    $superieur2 = 10;
    $resultSuperieur = $superieur1 > $superieur2;

    print_r($resultSuperieur);
    echo 'On affiche bien que la la variable $superieur1 est belle et bien supérieur à la variable $superieur2 soit true.';
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $superieur1 = 32;
    $superieur2 = 10;
    $resultSuperieur = $superieur1 > $superieur2;

    print_r($resultSuperieur);
    echo 'On affiche bien que la la variable $superieur1 est belle et bien supérieur à la variable $superieur2 soit true.';
?>
<h3>Supérieur ou égale</h3>
<p>on utilise les caractères >= pour vérifier si un nombre est supérieur ou égale à un autre nombre.</p>
<pre>
<span class="balisePHP">&lt;?php</span>
    $superieurEgale1 = 69;
    $superieurEgale2 = 79;
    $superieurEgale3 = 38;
    $superieurEgale4 = 65;
    $superieurEgale5 = 69;
    $resultSuperieurEgale1 = $superieurEgale1 >= $superieurEgale2;
    $resultSuperieurEgale2 = $superieurEgale1 >= $superieurEgale3;
    $resultSuperieurEgale3 = $superieurEgale1 >= $superieurEgale4;
    $resultSuperieurEgale4 = $superieurEgale1 >= $superieurEgale5;

    print_r($resultSuperieurEgale1);
    echo 'On affiche false vu que la variable $superieurEgale1 est belle et bien inferieur à la variable $superieurEgale2.&lt;br /&gt;';
    print_r($resultSuperieurEgale2);
    echo 'On affiche bien true vu que la la variable $superieurEgale1 est belle et bien supérieur à la variable $superieurEgale3.&lt;br /&gt;';
    print_r($resultSuperieurEgale3);
    echo 'On affiche false que la la variable $superieurEgale1 est de nouveau bien inférieur à la variable $superieurEgale4.&lt;br /&gt;';
    print_r($resultSuperieurEgale4);
    echo 'On affiche bien true vue que la la variable $superieurEgale1 est belle et bien EGALE à la variable $superieurEgale5.';
<span class="balisePHP">?&gt;</span>
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

    print_r($resultSuperieurEgale1);
    echo 'On affiche false vu que la variable $superieurEgale1 est belle et bien inferieur à la variable $superieurEgale2.<br />';
    print_r($resultSuperieurEgale2);
    echo 'On affiche bien true vu que la la variable $superieurEgale1 est belle et bien supérieur à la variable $superieurEgale3.<br />';
    print_r($resultSuperieurEgale3);
    echo 'On affiche false que la la variable $superieurEgale1 est de nouveau bien inférieur à la variable $superieurEgale4.<br />';
    print_r($resultSuperieurEgale4);
    echo 'On affiche bien true vue que la la variable $superieurEgale1 est belle et bien EGALE à la variable $superieurEgale5.';
?>
<h3>inférieur</h3>
<p>On utilise le caractère < pour vérifier si un nombre est bien inférieur à un autre.</p>
<pre>
<span class="balisePHP">&lt;?php</span>
    $inferieur1 = 100;
    $inferieur2 = 150;
    $resultInferieur = $inferieur1 < $inferieur2;

    print_r($resultInferieur);
    echo 'On affiche bien que la la variable $inferieur1 est belle et bien supérieur à la variable $inferieur2 soit true.';
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $inferieur1 = 100;
    $inferieur2 = 150;
    $resultInferieur = $inferieur1 < $inferieur2;

    print_r($resultInferieur);
    echo 'On affiche bien que la la variable $inferieur1 est belle et bien inférieur à la variable $inferieur2 soit true.';
?>
<h3>inférieur ou égale</h3>
<p>On utilise les caractères <= pour vérifier si un nombre est bien inférieur ou égale à un autre.</p>
<pre>
<span class="balisePHP">&lt;?php</span>
    $inferieurEgale1 = 90;
    $inferieurEgale2 = 32;
    $inferieurEgale3 = 150;
    $inferieurEgale4 = 90;
    $inferieurEgale5 = 91;
    $resultInferieurEgale1 = $inferieurEgale1 <= $inferieurEgale2;
    $resultInferieurEgale2 = $inferieurEgale1 <= $inferieurEgale3;
    $resultInferieurEgale3 = $inferieurEgale1 <= $inferieurEgale4;
    $resultInferieurEgale4 = $inferieurEgale1 <= $inferieurEgale5;

    print_r($resultInferieurEgale1);
    echo 'On affiche false vu que la variable $inferieurEgale1 n\'est pas inferieur à la variable $inferieurEgale2.&lt;br &gt;>';
    print_r($resultInferieurEgale2);
    echo 'On affiche bien true vu que la la variable $inferieurEgale1 est belle et bien inférieur à la variable $inferieurEgale3.&lt;br /&gt;';
    print_r($resultInferieurEgale3);
    echo 'On affiche true vu que la la variable $inferieurEgale1 est de égale à la variable $inferieurEgale4.&lt;br /&gt;';
    print_r($resultInferieurEgale4);
    echo 'On affiche bien true vue que la la variable $inferieurEgale1 est belle et bien inferieur à la variable $inferieurEgale4.';
<span class="balisePHP">?&gt;</span>
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

    print_r($resultInferieurEgale1);
    echo 'On affiche false vu que la variable $inferieurEgale1 n\'est pas inferieur à la variable $inferieurEgale2.<br />';
    print_r($resultInferieurEgale2);
    echo 'On affiche bien true vu que la la variable $inferieurEgale1 est belle et bien inférieur à la variable $inferieurEgale3.<br />';
    print_r($resultInferieurEgale3);
    echo 'On affiche true vu que la la variable $inferieurEgale1 est de égale à la variable $inferieurEgale4.<br />';
    print_r($resultInferieurEgale4);
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
<span class="balisePHP">&lt;?php</span>
    $note1 = 8;
    $resultatNote1 = ($note1 <= 12)? "Il faut que tu sois un peu plus rigoureux dans ton travail... allez accroche toi !" : "C'est bien tu es dans la moyenne. Encore un effort tu peux mieux faire !";

    echo "&lt;mark&gt;" . $resultatNote1 . "&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $note1 = 8;
    $resultatNote1 = ($note1 <= 12)? "Il faut que tu sois un peu plus rigoureux dans ton travail... allez accroche toi !" : "C'est bien tu es dans la moyenne. Encore un effort tu peux mieux faire !";
    
    echo "<mark>" . $resultatNote1 . "</mark>";
?>
<p>Ci dessous le même exemple que précédemment mais avec un toute autre résultat.</p>
<pre>
<span class="balisePHP">&lt;?php</span>
    $note2 = 18;
    $resultatNote2 = ($note12 <= 12)? "Il faut que tu sois un peu plus rigoureux dans ton travail... allez accroche toi !" : "C'est bien tu es dans la moyenne. Encore un effort tu peux mieux faire !";
    
    echo "&lt;mark&gt;" . $resultatNote2 . "&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $couleurCrayon = $bleu ?? $rouge ?? $vert ?? $noir ?? "Je n'ai plus de stylo..";
        echo $couleurCrayon;
    <span class="balisePHP">?&gt;</span>
</pre>
    <?php
        $couleurCrayon = $bleu ?? $rouge ?? $vert ?? $noir ?? "Je n'ai plus de stylo..";
        echo "<mark>" . $couleurCrayon . "</mark>";
    ?>
<p>Même exemple avec la définition d'une couleur avant. Ici je spécifie une couleur rouge et donc il va rechercher si une variable existe et si oui il affichera le message adéquat.</p>
<pre>
    <span class="balisePHP">&lt;?php</span>
        $rouge = "Je n'ai plus de stylo rouge...";
        $couleurCrayon = $bleu ?? $rouge ?? $vert ?? $noir ?? "Je n'ai plus de stylo..";
        echo $couleurCrayon;
    <span class="balisePHP">?&gt;</span>
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
<span class="balisePHP">&lt;?php</span> 
    $spacechip1 = 69;
    $spacechip2 = 69;
    $resultSpacechip1 = $spacechip1 <=> $spacechip2;

    echo "&lt;mark&gt;" . $resultSpacechip1 ."&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php 
    $spacechip1 = 69;
    $spacechip2 = 69;
    $resultSpacechip1 = $spacechip1 <=> $spacechip2;

    echo "<mark>" . $resultSpacechip1 ."</mark>";
?>
<h4>Exemple 2 - le premier nombre est supérieur</h4>
<pre>
<span class="balisePHP">&lt;?php</span> 
    $spacechip3 = 69;
    $spacechip4 = 39;
    $resultSpacechip2 = $spacechip3 <=> $spacechip4;

    echo "&lt;mark&gt;" . $resultSpacechip2 ."&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php 
    $spacechip3 = 69;
    $spacechip4 = 39;
    $resultSpacechip2 = $spacechip3 <=> $spacechip4;

    echo "<mark>" . $resultSpacechip2 ."</mark>";
?>
<h4>Exemple 3 - le premier nombre est inférieur</h4>
<pre>
<span class="balisePHP">&lt;?php</span> 
    $spacechip5 = 69;
    $spacechip6 = 99;
    $resultSpacechip3 = $spacechip5 <=> $spacechip6;

    echo "&lt;mark&gt;" . $resultSpacechip3 ."&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $incrementation1 = 1;
        echo "&lt;mark&gt;" . $incrementation1 . "&lt;/mark&gt; &lt;br /&gt;";
        $incrementation1 = $incrementation1 + $incrementation1;
        echo "&lt;mark&gt;" . $incrementation1 . "&lt;/mark&gt;";
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $incrementation1 = 1;
        echo "&lt;mark&gt;" . $incrementation1 . "&lt;/mark&gt; &lt;br /&gt;";
        $incrementation1++;
        echo "&lt;mark&gt;" . $incrementation1 . "&lt;/mark&gt;";
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $decrementation = 10;
        echo "&lt;mark&gt;" . $decrementation . "&lt;/mark&gt; &lt;br /&gt;";
        $decrementation = $decrementation - $decrementation;
        echo "&lt;mark&gt;" . $decrementation . "&lt;/mark&gt;";
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $decrementation = 10;
        echo "&lt;mark&gt;" . $decrementation . "&lt;/mark&gt; &lt;br /&gt;";
        $decrementation--;
        echo "&lt;mark&gt;" . $decrementation . "&lt;/mark&gt;";
    <span class="balisePHP">?&gt;</span>
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
<span class="balisePHP">&lt;?php</span>
    $et1 = 18;
    $et2 = 20;
    
    print_r( $et1 > 12 and $et2 < 21 );
    echo "&lt;mark&gt; Le résultat sera true vu que les opérations sont toutes les 2 vrais.&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $et1 = 18;
    $et2 = 20;
    
    print_r( $et1 > 12 and $et2 < 21 );
    echo "<mark> Le résultat sera true vu que les opérations sont toutes les 2 vrais.</mark>";
?>
<h4>Exemple 2 - avec &&</h4>
<pre>
<span class="balisePHP">&lt;?php</span>
    $et3 = 18;
    $et4 = 20;
    
    print_r( $et3 > 12 && $et4 < 21 );
    echo "&lt;mark&gt; Le résultat sera true vu que les opérations sont toutes les 2 vrais.&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $et3 = 18;
    $et4 = 20;
    
    print_r( $et3 > 12 && $et4 < 21 );
    echo "<mark> Le résultat sera true vu que les opérations sont toutes les 2 vrais.</mark>";
?>


<h4>Exemple 3 - même exemple avec une seule condition vrai AVEC and</h4>
<pre>
<span class="balisePHP">&lt;?php</span>
    $et1 = 5;
    $et2 = 30;
    
    print_r( $et1 > 12 and $et2 < 50 );
    echo "&lt;mark&gt; Le résultat sera false vu que la premier opération est fausse.&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $et1 = 5;
    $et2 = 30;
    
    print_r( $et1 > 12 and $et2 < 50 );
    echo "<mark> Le résultat sera false vu que la premier opération est fausse.</mark>";
?>

<h4>Exemple 3 - même exemple avec une seule condition vrai AVEC &&</h4>
<pre>
<span class="balisePHP">&lt;?php</span>
    $et1 = 5;
    $et2 = 30;
    
    print_r( $et1 > 12 && $et2 < 50 );
    echo "&lt;mark&gt; Le résultat sera false vu que la premier opération est fausse.&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $et1 = 5;
    $et2 = 30;
    
    print_r( $et1 > 12 && $et2 < 50 );
    echo "<mark> Le résultat sera false vu que la premier opération est fausse.</mark>";
?>
<h3>opérateur "OU"</h3>
<p>Pour écrire OU on utilise le mot clé "or" ou bien "||" aussi appelé pipe. Il faut savoir qu'à la différence du ET c'est qu'ici si une opération est juste alors la réponse sera vrai.</p>
<h4>Exemple 1 - avec or</h4>
<pre>
<span class="balisePHP">&lt;?php</span>
    $ou1 = 69;
    $ou2 = 33;
    
    print_r( $ou1 > 12 or $ou2 < 69 );
    echo "&lt;mark&gt; Le résultat sera true vu que les opérations sont toutes les 2 vrais.&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $ou1 = 69;
    $ou2 = 33;
    
    print_r( $ou1 > 12 or $ou2 < 69 );
    echo "<mark> Le résultat sera true vu que les opérations sont toutes les 2 vrais.</mark>";
?>
<h4>Exemple 2 - avec &&</h4>
<pre>
<span class="balisePHP">&lt;?php</span>
    $ou3 = 99;
    $ou4 = 39;
    
    print_r( $ou3 > 50 || $ou2 < 100 );
    echo "&lt;mark&gt; Le résultat sera true vu que les opérations sont toutes les 2 vrais.&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $ou3 = 99;
    $ou4 = 39;
    
    print_r( $ou3 > 50 || $ou2 < 100 );
    echo "<mark> Le résultat sera true vu que les opérations sont toutes les 2 vrais.</mark>";
?>


<h4>Exemple 3 - autre exemple avec une seule condition vrai AVEC or</h4>
<pre>
<span class="balisePHP">&lt;?php</span>
    $ou5 = 10;
    $ou6 = 80;
    
    print_r( $ou5 > 5 or $ou6 < 50 );
    echo "&lt;mark&gt; Le résultat sera false vu que la seconde opération est fausse.&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $ou5 = 10;
    $ou6 = 80;
    
    print_r( $ou5 > 5 or $ou6 < 50 );
    echo "<mark> Le résultat sera false vu que la seconde opération est fausse.</mark>";
?>

<h4>Exemple 4 - même exemple avec une seule condition vrai AVEC ||</h4>
<pre>
<span class="balisePHP">&lt;?php</span>
    $ou7 = 10;
    $ou8 = 80;
    
    print_r( $ou7 > 11 || $ou8 < 90 );
    echo "&lt;mark&gt; Le résultat sera true vu qu'au moins la seconde opération est juste.&lt;/mark&gt;";
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $ou7 = 10;
    $ou8 = 80;
    
    print_r( $ou7 > 11 || $ou8 < 90 );
    echo "<mark> Le résultat sera true vu qu'au moins la seconde opération est juste.</mark>";
?>
<h3>L'inverse d'un resultat</h3>
<p>on utilise ! pour définir l'inverse d'un résultat.</p>
<h4>exemple normal</h4>
<p>j'affiche ici une variable avec un boulean à true. On obtiendra via le print_r true comme réponse.</p>
<pre>
<span class="balisePHP">&lt;?php</span>
    $normal = true;
    print_r($normal);
<span class="balisePHP">?&gt;</span>
<?php
    $normal = true;
    print_r($normal);
?>
</pre>
<h4>exemple inversé</h4>
<p>j'affiche ici une variable avec un boulean à true. Mais j'ajoute dans mon print_r avant la variable le ! pour afficher l'inverse du résultat soit false.</p>
<pre>
<span class="balisePHP">&lt;?php</span>
    $normal = true;
    print_r(!$normal);
<span class="balisePHP">?&gt;</span>
</pre>
<?php
    $normal = true;
    print_r(!$normal);
?>
<h3>L'opérateur xor</h3>
<p>L'opérateur xor est très particulier, on doit obligatoirement obtenir une seule condition de vrai pour afficher true. Si 2 confitions sont vrai ou fausses, on obtiendra false. /!\ n'existe pas dans le javascript !!</p>
<h4>Exemple 1 - 2 réponses vrai et on obtient false avec xor</h4>
<pre>
    <span class="balisePHP">&lt;?php</span>
        $xor1 = 10;
        $xor2 = 20;

        print_r($xor1 > 5 xor $xor2 < 50);
        echo '$xor1 est bien supérieur à 5 et $xor2 est bien inférieur à 50 donc les 2 réponses sont vrai... On affiche avec xor false...';
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    $xor1 = 10;
    $xor2 = 20;

    print_r($xor1 > 5 xor $xor2 < 50);
    echo '$xor1 est bien supérieur à 5 et $xor2 est bien inférieur à 50 donc les 2 réponses sont vrai... On affiche avec xor false...';
?>
<h4>Exemple 2 - 2 réponses fausses et on obtient false avec xor</h4>
<pre>
    <span class="balisePHP">&lt;?php</span>
        $xor3 = 1;
        $xor4 = 10;

        print_r($xor3 > 2 xor $xor4 < 9);
        echo '$xor3 n\'est pas supérieur à 2 et $xor4 n'est également pas inférieur à 9 donc les 2 réponses sont fausses... On affiche donc avec xor false...';
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    $xor3 = 1;
    $xor4 = 10;

    print_r($xor3 > 2 xor $xor4 < 9);
    echo '$xor3 n\'est pas supérieur à 2 et $xor4 n\'est également pas inférieur à 9 donc les 2 réponses sont fausses... On affiche donc avec xor false...';
?>
<h4>Exemple 3 - 1 réponse est vrai et donc on obtient ici true avec xor</h4>
<pre>
    <span class="balisePHP">&lt;?php</span>
        $xor5 = 50;
        $xor6 = 60;

        print_r($xor5 > 100 xor $xor6 < 70);
        echo '$xor5 n\'est pas supérieur à 100 et $xor6 est par contre bien inférieur à 70 donc une des deux réponses est vrai. On affiche donc avec xor true...';
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    $xor5 = 50;
    $xor6 = 60;

    print_r($xor5 > 100 xor $xor6 < 70);
    echo '$xor5 n\'est pas supérieur à 100 et $xor6 est par contre bien inférieur à 70 donc une des deux réponses est vrai. On affiche donc avec xor true...';
?>
<h3>Concaténé 2 string entre elles.</h3>
<h4>version longue</h4>
<pre>
    <span class="balisePHP">&lt;?php</span>
        $concatenation1 = "Salut moi je m'appel : ";
        $concatenation2 = "Alain Guillon";
        $concatenation 1 = $concatenation1 . $concatenation2;

        echo $concatenation1;
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    $concatenation1 = "Salut moi je m'appel : ";
    $concatenation2 = "Alain Guillon";
    $concatenation1 = $concatenation1 . $concatenation2;

    echo $concatenation1;
?>
<h4>version courte</h4>
<pre>
    <span class="balisePHP">&lt;?php</span>
        $concatenation1 = "Salut moi je m'appel : ";
        $concatenation2 = "Alain Guillon";
        $concatenation 1 .= $concatenation2;

        echo $concatenation1;
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $motivation = 1;

        if ( $motivation < 3) {
            echo "&lt;mark&gt;oualalala, il faut se motiver&lt;/mark&gt;";
        } else if ( $motivation >= 3 && $motivation < 8) {
            echo "Allez un peu de courage on va y arrivé";
        } else {
            echo "Tu es vraiment motivé c'est topissime ensembles tu verras on va y arriver !!";
        }
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $motivation = 5;

        if ( $motivation < 3) {
            echo "oualalala, il faut se motiver";
        } else if ( $motivation >= 3 && $motivation < 8) {
            echo "&lt;mark&gt;Allez un peu de courage on va y arrivé&lt;/mark&gt;";
        } else {
            echo "Tu es vraiment motivé c'est topissime ensembles tu verras on va y arriver !!";
        }
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $motivation = 8;

        if ( $motivation < 3) {
            echo "oualalala, il faut se motiver";
        } else if ( $motivation >= 3 && $motivation < 8) {
            echo "Allez un peu de courage on va y arrivé";
        } else {
            echo "&lt;mark&gt;Tu es vraiment motivé c'est topissime ensembles tu verras on va y arriver !!&lt;/mark&gt;";
        }
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
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
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
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
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
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
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $while = 0;

        while ( $while <= 5 ) {
            echo "La valeur de ma variable while est : $while &lt;br /&gt;";
            // L'incrémentation est obligatoire au risque de se retrouver avec une boucle infini.
            $while++;
        }
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $doWhile = 0;

        do {
            echo "La valeur de ma variable do while est : $doWhile &lt;br /&gt;";
            $doWhile++;
        } while ( $doWhile <= 5);
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        $for = 0;

        for ( $for = 0; $for <= 5; $for++ ) {
            echo "La valeur de ma variable for est : $for &lt;br /&gt;";
        }
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        function maFonction() {
            echo "Coucou";
        }
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    function maFonction() {
        echo "<mark>Coucou</mark>";
    }
?>
<h3>Initialisation de la function précédente</h3>
<pre>
    <span class="balisePHP">&lt;?php</span>
        maFonction();
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    maFonction();
?>
<h3>Argument dans une fonction</h3>
<p>On peut spécifier un argument dans une fonction.</p>
<h4>exemple d'un argument de type message</h4>
<pre>
    <span class="balisePHP">&lt;?php</span>
        function presentationPerso($message) {
            echo $message;
        }

        $presentationPerso("Salut je m'appel Alain GUILLON, je désire plus que tout devenir un grand nom dans le milieu du developpement informatique");
        $presentationPerso("&lt;br /&gt;Second texte avec exactement la même fonction...");
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        function myName ($nom = "Nom non spécifié") {
            echo "Je m'appel : $nom";
        }

        myName();
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    function myName ($nom = "Nom non spécifié") {
        echo "Je m'appel : $nom";
    }

    myName();
?>
<h4>Exemple 2 - nom saisi</h4>
<pre>
    <span class="balisePHP">&lt;?php</span>
        function myName2 ($nom = "Nom non spécifié") {
            echo "Je m'appel : $nom";
        }

        myName2("Alain Guillon");
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    function myName2 ($nom = "Nom non spécifié") {
        echo "Je m'appel : $nom";
    }

    myName2("Alain Guillon");
?>
<h3>ajouter un 2emes arguments</h3>
<pre>
    <span class="balisePHP">&lt;?php</span>
        function objectifPerso ($objectif, $combien) {
            for ( $i = 0; $i <= $combien; $i++ ) {
                echo "$objectif &lt;br /&gt;";
            }
        }

        objectifPerso("Je veux être un super DEVELOPPEUR", 5);
    <span class="balisePHP">?&gt;</span>
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
    <span class="balisePHP">&lt;?php</span>
        function addition($x, $y, $z) {
            return $x + $y + $z;
        }

        echo "Le résultat de mon opération est : " . addition(15, 32, 69);
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    function addition($x, $y, $z) {
        return $x + $y + $z;
    }

    echo "Le résultat de mon opération est : " . addition(15, 32, 69);
?>
<h3>PHP 7 et la restriction du type imposer lors de la saisie de tel ou tel donnée</h3>
<p>Avec php 7, nous pouvons forcer l'utilisateur à saisir obligatoirement un integer ou un string etc.. mais pour celà il faut avant le DOCTYPE saisir :</p>
<p><strong><span class="balisePHP">&lt;?php</span> declare(strict_types=1); <span class="balisePHP">?&gt;</span></strong></p>
<p>Ainsi, on pourra dans nos fonction saisir le type avant la variable et comme ça, l'utilisateur obtiendra une erreur si le type saisi ne correspond tout simplement pas.</p>
<h4>exemple 1 - saisi correcte</h4>
<pre>
    <span class="balisePHP">&lt;?php</span>
       function saisiStrictValid(int $numberX, int $numberY) {
           return $numberX + $numberY;
       }

       echo saisiStrictValid(10,10);
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    function saisiStrictValid(int $numberX, int $numberY):int {
        return $numberX + $numberY;
    }

    echo saisiStrictValid(10,10);
?>
<h4>exemple 2 - saisi incorrecte</h4>
<pre>
    <span class="balisePHP">&lt;?php</span>
       function saisiStrictNonValid(int $numberA, int $numberB) {
           return $numberA + $numberB;
       }

       echo saisiStrictNonValid(69,"35");
    <span class="balisePHP">?&gt;</span>
</pre>
<?php
    function saisiStrictNonValid(int $numberA, int $numberB):int {
        return $numberA + $numberB;
    }

    // echo saisiStrictNonValid(69,"35");
?>
<p>Je suis obligé de commenter cette ligne de code : echo saisiStrictNonValid(69,"35"); sinon le code qui suit ne fonctionnera plus..</p>
<img src="http://puu.sh/to670/deaca893dc.png" alt="erreur qui sera affiché" />
<h2>Les tableaux Array</h2>
<p>pour ce tableau je vais garder du début à la fin le même tableau.</p>
<p>L'affichage du contenu brut d'un tableau peut être affiché de 2 manières</p>
<h3>methode 1 - directement en php.</h3>
<?php      
    $semaine = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
    print_r($semaine);
?>
<h3>methode 2 - en php mais dans une balise pre</h3>
<pre>
    <?php      
        $semaine = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");
        print_r($semaine);
    ?>
</pre>
<p>La lisibilité est nettement plus simple dans une balise pre. (La couleur est uniquement du à mon fichier stylePHP.css).</p>
<h3>accéder à une variable spécifique du array</h3>
<p>pour acceder à une donner spécifique du tableau, on réutilise le nom de la variable du tableau et on lui associe des [] avec à l'intérieur l'indice que l'on souhaite rechercher. Pour rappel l'indice d'un tableau commence toujours à 0. Donc :</p>
<ul></ul>
    <li>lundi = 0</li>
    <li>mardi = 1</li>
    <li>mercredi = 2</li>
    <li>jeudi = 3</li>
    <li>vendredi = 4</li>
    <li>samedi = 5</li>
    <li>dimanche = 6</li>
</ul>
<p>Donc le code pour afficher lundi sera le suivant :</p>
<pre>
    &lt;?php 
        $lundi = $semaine[0];
        echo $lundi;
    ?&gt;
</pre>
<?php 
    $lundi = $semaine[0];
    echo $lundi;
?>
<h3>compter le nombre d'élément dans un tableau</h3>
<p>pour compter le nombre d'élément dans un tableau on utilise la fonction count().</p>
<pre>
    &lt;?php echo count($semaine); ?&gt;
</pre>
<?php echo count($semaine); ?>
<h3>afficher tous les éléments d'un tableaux</h3>
<pre>
    &lt;?php
        for ( $i = 0; $i <= 6; $i++) {
            echo "jour : " . $semaine[$i] . "&lt;br /&gt;";
        }
    ?&gt;
</pre>
<?php
    for ( $i = 0; $i <= 6; $i++) {
        echo "L'index $i affichera : " . $semaine[$i] . "<br />";
    }
?>
<h3>Et si on ne sait pas combien d'élément comporte le tableau ?</h3>
<p>Là un cas de figure qui peut arrivé souvent. On ne sait pas combien d'élément dispose le tableau. En l'occurence, nous le savons mais imaginons qu'on ne le sait pas. On a vu la fonction count() ainsi on peut la réutiliser dans notre boucle.</p>
<pre>
    &lt;?php
        for ( $i = 0; $i < count($semaine); $i++ ) {
            echo "Même réponse que précédemment, l'index $i correspond à : " . $semaine[$i] . ".&lt;br /&gt;";
        }
    ?&gt;
</pre>
<?php
    for ( $i = 0; $i < count($semaine); $i++ ) {
        echo "Même réponse que précédemment, l'index $i correspond à : " . $semaine[$i] . ".<br />";
    }
?>
<p>L'avantage ici c'est que si on est amené à ajouter des jours ou en enlevé, on ne sera pas obliger de remodifier notre boucle, elle s'adaptera automatiquement.</p>
<h2>Tableau associatif</h2>
<h3>conception d'un tableau associatif :</h3>
<pre>
    &lt;?php
        $identiter = array (
                "nom" => "Caron",
                "prenom" => "marjorie",
                "age" => 32,
                "sexe" => "féminin"
        );

        print_r($identiter);
    ?&gt;
</pre>
<?php
    $identiter = array (
        "nom" => "Caron",
        "prenom" => "marjorie",
        "age" => 32,
        "sexe" => "féminin"
    );

    print_r($identiter);
?>
<h3>Récupérer une valeur d'un tableau associatif</h3>
<p>Si on désire obtenir le résultat d'un élément précis dans un tableau associatif, on sélectionnera la variable du tableau suivi de [] avec pour contenu soit dans notre variable $identiter : "nom" qui correpond à 0 et "sexe" qui correspondrai à l'indice 3</p>
<h4>exemple</h4>
<pre>
    &lt;?php
        echo "Le nom de cette personne est : " . $identiter["nom"] . "&lt;br /&gt;";
        echo "Le sexe de cette personne est : " . $identiter["sexe"];
    ?&gt;
</pre>
<?php
    echo "Le nom de cette personne est : " . $identiter["nom"] . "<br />";
    echo "Le sexe de cette personne est : " . $identiter["sexe"];
?>
<h2>Quelle boucle utiliser pour un tableau associatif</h2>
<p>la boucle à utiliser pour un tableau associatif est la boucle foreach (pour chaque).</p>
<h3>la syntaxe</h3>
<p>On va créer un tableau avec 5 prénoms à l'intérieur.</p>
<pre>
    &lt;?php 
        $prenoms = array (
            "Position1" => "Sheryle",
            "Position2" => "Océane",
            "Position3" => "Éléanore",
            "Position4" => "Marjorie",
            "Position5" => "Alain",
            "Position6" => "France"
        );

        print_r( $prenoms ); 
    ?&gt;
</pre>
<?php
    $prenoms = array (
        "Position1" => "Sheryle",
        "Position2" => "Océane",
        "Position3" => "Éléanore",
        "Position4" => "Marjorie",
        "Position5" => "Alain",
        "Position6" => "France"
    );
    
    print_r( $prenoms ); 
?>
<p>La syntaxe de la boucle foreach est la suivante :</p>
<pre>
    &lt;?php
        foreach ( $variable as $key => $value) {
            echo $key . " correspond à la valeur : " . $value;
        }
    ?&gt;
</pre>
<p>Ci dessous j'affiche le résultat de ma boucle foreach</p>
<pre>
    &lt;?php
        foreach ( $prenoms as $key => $value ) {
            echo "En $key on trouve le prénom suivant : $value <br />" ;
        }
    ?&gt;
</pre>
<?php
    foreach ( $prenoms as $key => $value ) {
        echo "En $key on trouve le prénom suivant : $value <br />";
    }
?>
<h2>Les objets</h2>
<p>Les objet c'est comme la vie courante, tout tourne autour d'objet. Exemple un crayon est un objet il peut être à papier de couleur si il est de couleur il peut être rouge bleu jaune vert etc... en programmation orienté objet (POO) c'est exactement la même chose.</p>
<h3>Déclaration d'un objet</h3>
<p>exemple concret avec la déclaration de l'objet Etudiant</p>
<pre>
    &lt;?php
        class Etudiant {

            public $etudie = true;
            public $nom;
            public $age;
            public $notes;

            // Fonction constructeur
            public function __construct ($nomdelapersonne, $agedelapersonne, $notesdelapersonne) {
                $this -> nom = $nomdelapersonne;
                $this -> age = $agedelapersonne;
                $this -> notes = $notesdelapersonne;
            } /Fin du constructeur
        }
    ?&gt;
</pre>
<?php
    class Etudiant {

        public $etudie = true;
        public $nom;
        public $age;
        public $notes;

        // Fonction constructeur
        public function __construct ($nomdelapersonne, $agedelapersonne, $notesdelapersonne) {
            $this -> nom = $nomdelapersonne;
            $this -> age = $agedelapersonne;
            $this -> notes = $notesdelapersonne;
        } // Fin du constructeur
    }
?>
<h3>Création d'une INSTANCE de notre objet Etudiant</h3>
<p>Une instance est tout simplement un nouvel objet basé sur le constructeur. Ainsi ci-dessous je créer ma propre instance de ma personne.</p>
<pre>
    &lt;?php
        $notesAlain = array(
            "Maths" => 15,
            "Français" => 9,
            "Anglais" => 12
        );
        $alain = new Etudiant ( "Guillon", 32, $notesAlain);
        print_r($alain);
    ?&gt;
</pre>
<?php
    $notesAlain = array(
            "Maths" => 15,
            "Français" => 9,
            "Anglais" => 12
        );
    $alain = new Etudiant ( "Guillon", 32, $notesAlain);
    print_r($alain);
?>
<p>Pour afficher visuellement parlant le même objet mais plus proprement on utilise la balise pre avec un print_r</p>
<pre>
    <?php
        $notesAlain = array(
                "Maths" => 15,
                "Français" => 9,
                "Anglais" => 12
            );
        $alain = new Etudiant ( "Guillon", 32, $notesAlain);
        print_r($alain);
    ?>
</pre>
<h3>Définition d'un autre objet basé sur le premier objet Etudiant. Puis on y ajoute une méthode sePresenter()</h3>
<pre>
    &lt;?php
        class EtudiantTwo {

            public $etudie = true;
            public $nom;
            public $age;
            public $notes;

            // constructeur
            public function __construct ($nomdelapersonne, $agedelapersonne, $notesdelapersonne) {
                $this -> nom = $nomdelapersonne;
                $this -> age = $agedelapersonne;
                $this -> notes = $notesdelapersonne;
            } // Fin du constructeur

            // Méthode
            public function sePresenterTwo () {
                if ( $this->etudie) {
                    echo "Je m'appel $this->nom et j'ai $this->age ans. &lt;br /&gt;" ;

                    foreach ( $this->notes as $matiere => $note ) {
                    echo "Dans le langage <strong>$matiere</strong>, je pense avoir : <strong>$note</strong> <br />";
                    }
                }
            } // Fin de la méthode sePresenter()
        }
    ?&gt;
</pre>
<?php
    class EtudiantTwo {

        public $etudie = true;
        public $nom;
        public $age;
        public $notes;

        // Fonction constructeur
        public function __construct ($nomdelapersonne, $agedelapersonne, $notesdelapersonne) {
            $this -> nom = $nomdelapersonne;
            $this -> age = $agedelapersonne;
            $this -> notes = $notesdelapersonne;
        } // Fin du constructeur

        // Méthode 
        public function sePresenterTwo () {
            if ( $this->etudie) {
                echo "Je m'appel $this->nom et j'ai $this->age ans. <br />" ;
                echo "<hr /><br />";

                foreach ( $this->notes as $matiere => $note ) {
                    echo "Dans le langage <strong>$matiere</strong>, je pense avoir : <strong>$note</strong> <br />";
                }
            }
        } // Fin de la méthode sePresenter()
    }
?>
<p>Maintenant qu'on a définit la méthode. on créer ci-dessous un tableau de note qui sera attribué un une instance de notre EtudiantTwo. Pour finir, on lui ajoutera notre fonction se présenter.</p>
<pre>
    &lt;?php

        // Conception d'un tableau de note spécifique à l'utilisateur Alain.
        $tableauAlainNote = array (
            "Html 5" => "Une très Bonne connaissance",
            "CSS 3" => "Une très bonne connaissance",
            "Bootstrap 3" => "Une très Bonne connaissance",
            "Bootstrap 4" => "Une assez bonne connaissance",
            "JavaScript" => "Une bonne connaissance",
            "JQuery" => "Une assez bonne conaissance",
            "PHP" => "Une bonne conaissance",
            "MySQL" => "Vu à la 3WA non pratiqué depuis juillet 2016",
            "POO" => "Actuellent en cours d'apprentissage",
            "Laravel" => "Vu en cours à la 3WA non pratiqué depuis juillet 2016",
            "Emmet" => "Une bonne connaissance côté HTML uniquement",
            "Sass" => "Je pratique uniquement la base pour le moment",
            "Git" => "Une connaissance uniquement sur : git status / git add -A / git add . / git commit -am 'blabla' / git push origin master / git clone url / git pull origin master",
            "Angular 2" => "Je prévois de l'apprendre début 2017"
        );

        // Création d'une instance de EtudiantTwo
        $alainGuillon = new EtudiantTwo ("Guillon", 32, $tableauAlainNote);

        // J'exécute ma méthode directement ci-dessous.
        $alainGuillon->sePresenterTwo();
    ?&gt;
</pre>
<?php

    // Conception d'un tableau de note spécifique à l'utilisateur Alain.
    $tableauAlainNote = array (
        "Html 5" => "Une très Bonne connaissance",
        "CSS 3" => "Une très bonne connaissance",
        "Bootstrap 3" => "Une très Bonne connaissance",
        "Bootstrap 4" => "Une assez bonne connaissance",
        "JavaScript" => "Une bonne connaissance",
        "JQuery" => "Une assez bonne conaissance",
        "PHP" => "Une bonne conaissance",
        "MySQL" => "Vu à la 3WA non pratiqué depuis juillet 2016",
        "POO" => "Actuellent en cours d'apprentissage",
        "Laravel" => "Vu en cours à la 3WA non pratiqué depuis juillet 2016",
        "Emmet" => "Une bonne connaissance côté HTML uniquement",
        "Sass" => "Je pratique uniquement la base pour le moment",
        "Git" => "Une connaissance uniquement sur : git status / git add -A / git add . / git commit -am 'blabla' / git push origin master / git clone url / git pull origin master",
        "Angular 2" => "Je prévois de l'apprendre début 2017"
    );

    // Création d'une instance de EtudiantTwo
    $alainGuillon = new EtudiantTwo ("Guillon Alain", 32, $tableauAlainNote);

    // J'exécute ma méthode directement ci-dessous.
    $alainGuillon->sePresenterTwo();
?>

<h2>Include & Require</h2>
<h3>include</h3>
<p>La fonction include() permet de spécifier un bout de code qui sera lui inscrit dans une autre page web.</p>
<h4>exemple 1 - include promotions.php</h4>
<pre>
    &lt;?php
        include( "promotions.php" );
    ?&gt;
</pre>
<?php
    include( "promotions.php" );
?>
<p>Le code de la page promotion</p>
<pre>
    &lt;p&gt;&lt;mark&gt;Ce paragraphe qui est surligner fait partie du code de la page promotions.php&lt;/mark&gt;&lt;/p&gt;
</pre>
<p>Une variante existe avec include_once() qui permet cette fois-ci de s'assurer que le bout de code qui sera ajouter n'existe pas déjà.</p>

<h3>require</h3>
<p>require fait exactement la même chose à une nuance prêt. Quand on cherche à ajouter un code d'une autre page qui n'existe pas, avec include, le code sera tout de même exécuter. En revanche si on utilise un require pour la même chose, le code qui succède au require ne sera JAMAIS interprêté.</p>
<h2>Les super globales</h2>
<h3>La super global GLOBALS</h3>
<p>cette super global permet de lire une variable global dans une function qui de base ne serait possible.</p>
<h4>exemple super global - GLOBALS[]</h4>
<pre>
    &lt;?php 
        $xx = 10;
        $yy = 20;

        function superGlobalGlobal () {
            echo $GLOBALS["xx"];
        }

        superGlobalGlobal();
    ?&gt;
</pre>
<?php 
    $xx = 10;
    $yy = 20;

    function superGlobalGlobal () {
        echo $GLOBALS["xx"];
    }

    superGlobalGlobal();
?>
<h3>LA super global $_SERVER</h3>
<p>la super global $_SERVER permet d'afficher directement toutes les informations du serveur.</p>
<pre>
    &lt;?php
        print_r($_SERVER);
    ?&gt;
</pre>
<?php
    print_r($_SERVER);
?>
<p>LEs autres super global qui existe</p>
<ul>
    <li>$_REQUEST</li>
    <li>$_POST</li>
    <li>$_GET</li>
    <li>$_COOKIE</li>
    <li>$_SESSION</li>
</ul>
<h2>la super global $_GET</h2>
<p>la super global $_GET() est uniquement utiliser pour tout ce qui est moteur de recherche. En effet les informations qui transite avec cette super global sont accessible directement dans la barre d'adresse. Ainsi il peut être délicat. </p>
<h3>Exemple $_GET</h3>
<p>
    <a href="presentation.php?nom=Alain&age=32">Présentation</a>
</p>
<h3>Autre exemple d'un $_GET</h3>
<p>
    <a href="aboutus.php?lang1=html5&lang2=css3&lang3=jquery&lang4=php&lang5=mysql">aboutus</a>
</p>
<h2>LA super global $_POST</h2>
<p>A contrario de la super global $_GET qui transite via la barre d'adresse, la super global $_POST elle n'est pas visible à l'oeil nu. Obligatoirement à utiliser dans un formulaire.</p>
<h3>Conception d'un formulaire.</h3>
<form action="traitementFormulaire.php" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" placeholder="saisir votre nom ici">

    <label for="mail">Email :</label>
    <input type="email" name="mail" id="mail" placeholder="saisir votre mail ici">

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" placeholder="saisir votre prénom">

    <button type="submit">Soumettre le formulaire</button>
</form>
<h2>LA super global $_SESSION</h2>
<p>Cette super globale permet de retenir des informations lors d'une visite de votre site.</p>
<p>Tout ce situe avant le doctype en initialisant avec cette ligne :</p>
<pre>
    &lt;?php
        session_start();

        // stocker une information d'un utilisateur
        $_SESSION["nom"] = "Alain";
    ?&gt;
</pre>
<p>A savoir, sur chaque page, il faut réinscrir le session_start() c'est obligatoire. Inutile par contre de noter le reste. dans les autres pages, on aura saisis comme $_POST[] la même chose qu'à la différence de POST c'est SESSION soit : $_SESSION[]</p>
<h3>exemple $_SESSION</h3>
<p>le lien qui suit nous renvoi vers la page testSession.php qui permet de voir si la super global qui a été saisi tout en haut avant le doctype. Correspond bien avec la baleur stocker soit "Alain"</p>

<a href="testSession.php">Lien vers la page de teste de la session.</a>
<h2>La super global $_COOKIE</h2>
<p>La super global cookie va nous permettre de garder en mémoire des informations spécifique sur le contenu de son site web. Ainsi nous ne seront pas obligé de retaper indéfiniment les données qui aurait déjà été saisi auparavant.</p>
<p>Un cookie se créer au tout début avant le doctype.</p>
<h3>la syntaxe</h3>
<pre>
    &lt;?php
        // Conception d'un cookie
        setcookie(arg1, arg2, time() + 3600*24*30);

        /* arg1 = le nom du cookie (string)
         * arg2 = la valeur qu'on stock (exemple : "nom")
         *time() + 3600*24*30 = fonction time() qui définira le temps de validité d'un cookie. 3600 = 1h * 24h * 30 qui donne un cookie valide 30 jours.
         */
    ?&gt;
</pre>
<h3>Verrifier si un cookie existe</h3>
<p>On peut vérifier si un cookie existe ou non avec isset()</p>
<h4>exemple d'un isset()</h4>
<pre>
    &lt;?php
        if ( isset ( $_COOKIE["myCookie"] ) ) {
            echo "&lt;h1&gt;". $_COOKIE["myCookie"] ."&lt;/h1&gt;";
        } else {
            echo "&lt;h1&gt;Nom inconnu&lt;/h1&gt;";
        }
    ?&gt;
</pre>
<?php
    if ( isset ( $_COOKIE["myCookie"] ) ) {
        echo "<h1>". $_COOKIE["myCookie"] ."</h1>";
    } else {
        echo "<h1>Nom inconnu</h1>";
    }
?>

</body>
</html>