<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Oliva Gómez">
    <title>PHP_M-5</title>
    <style>
        body {
            margin-left: 4rem;
            font-family: sans-serif;
            margin-top: 2rem;
        }

        ;
    </style>

</head>

<body>

    <?php
    /***************LEVEL 1***************/

    /*EXERCISE 1*/
    /*Defineix una variable de cada tipus: integer,double,string i boolean. Després, imprimeix-les per pantalla.*/

    /*Integer type*/
    $integer = 6;

    /*Double type*/
    $double = 22.04;

    /*String type*/
    $string = "Variable";

    /*Boolean type*/
    $boolean = false;


    /*Printing variables*/
    echo "<h1 style='margin-bottom: 1rem'> Level 1 - Exercise 1";

    echo "<h2 style='color:grey'>The integer variable is: " . $integer . ".</h2>";
    echo "<h2 style='color:blue'>The double variable is: " . $double . ".</h2>";
    echo "<h2 style='color:darkOliveGreen'>The string variable is: " . $string . ".</h2>";
    echo "<h2 style='color:paleVioletRed'>The boolean variable is: " . ($boolean ? "true" : "false") . ".</h4>";


    /*EXERCISE 2*/
    /*Crea una altra variable string.*/

    $string2 = "Hola Mundo";

    echo "<h1 style='margin-bottom: 1rem, margin-top: 1rem'> Level 1 - Exercise 2";

    /*Imprimeix per pantalla el tamany(longitud) del dos strings.*/

    echo "<h4 style='color: firebrick'> The first string length is: " . strlen($string) . ".</h4>";
    echo "<h4 style='color: steelblue'> The second string length is: " . strlen($string2) . ".</h4>";

    /*Imprimeix per pantalla el dos strings però en ordre invers de caràcters.*/

    echo "<h4 style='color: navy'> The reversed first string is: " . strrev($string) . ".</h4>";
    echo "<h4 style='color: blueViolet'> The reversed second string is: " . strrev($string2) . ".</h4>";

    /*Imprimeix la concatenació dels dos strings.*/

    echo "<h4 style='color: goldenRod'> The concatenation of both strings is " . $string . $string2 . ".</h4>";

    /*EXERCISE 3*/
    /*Crea una constant que inclogui el teu nom i imprimeix-la per pantalla.*/

    define("name", "Daniel Oliva Gómez");

    echo "<h1 style='margin-bottom: 1rem; margin-top: 1rem'> Level 1 - Exercise 3";

    echo "<h4 style='color: seaGreen'> My name is : " . name . ".</h4>";


    /***************LEVEL 2***************/

    /*EXERCISE 1*/
    /*Crea dos arrays, un que inclogui 5 integers, i un altre que inclogui 3 integers.*/

    $myArray = array(4, 8, 15, 16, 23);
    $myArray2 = array(42, 16, 15);

    /*EXERCISE 2*/
    /*Afegeix un valor més a l'array que conté 3 integers.*/

    array_push($myArray2, 8);

    /*EXERCISE 3*/
    /*Mescla els dos arrays i imprimeix el tamany de l'array resultant per pantalla.*/

    /*Merging both arrays*/
    $result = array_merge($myArray, $myArray2);

    echo "<h1 style='margin-bottom: 1rem; margin-top: 5rem'> Level 2 - Exercises 1,2,3";

    echo "<h4 style='color: forestGreen'> The length of both arrays mixed is : " . count($result) . ".</h4>";


    /***************LEVEL 3***************/

    /*EXERCISE 1*/
    /*Imprimeix per pantalla(valor a valor) l'array resultant del nivell anterior.*/

    echo "<h1 style='margin-bottom: 1rem; margin-top: 5rem'> Level 3 - Exercise 1";

    /*Loop through the array*/
    foreach ($result as $arrayIndex => $arrayItem) {
        echo "<h4>The item number " . $arrayIndex + 1 . " of our array is: " . $arrayItem . ".</h4>";
    };

    /*EXERCISE 2*/
    /* Escriure un programa PHP que realitzi lo següent: 

    declarar dues variables X e Y de tipus int, dues variables N i M de tipous double i assigna a cada una un valor. A continuació, mostra per pantalla, per a X e Y:

    El valor de cada variable
        La suma 
        La resta 
        El producte  
        La divisió 
        El mòdul
            
    per a N i M, lo mateix.

    I per a totes les variables(X,Y,N,M):

    El doble de cada variable
    La suma de totes les variables
    El producte de totes les variables*/

    /*Declaration*/
    $x = 9;
    $y = 5;
    $n = 16.17;
    $m = 24.43;

    echo "<h1 style='margin-bottom: 1rem; margin-top: 1rem'> Level 3 - Exercise 2";

    /*Operations with x and y*/
    echo "<h4 style='color: darkSlateGrey'> The value of x is " . $x . " and the value of y is " . $y . ".</h4>";
    echo "<h4 style='color: darkSlateGrey'> The value of their sum is: " . $x + $y . ".</h4>";
    echo "<h4 style='color: darkSlateGrey'> The value of their substraction is: " . $x - $y . ".</h4>";
    echo "<h4 style='color: darkSlateGrey'> The value of their product is: " . $x * $y . ".</h4>";
    echo "<h4 style='color: darkSlateGrey'> The value of their division is: " . $x / $y . ".</h4>";
    echo "<h4 style='color: darkSlateGrey'> The value of their module is: " . $x % $y . ".</h4>";
    echo "<br>";

    /*Operations with n and m*/
    echo "<h4 style='color: crimson'> The value of m is " . $m . " and the value of n is " . $n . ".</h4>";
    echo "<h4 style='color: crimson'> The value of their sum is: " . $n + $m . ".</h4>";
    echo "<h4 style='color: crimson'> The value of their substraction is: " . $m - $n . ".</h4>";
    echo "<h4 style='color: crimson'> The value of their product is: " . $m * $n . ".</h4>";
    echo "<h4 style='color: crimson'> The value of their division is: " . $m / $n . ".</h4>";
    echo "<h4 style='color: crimson'> The value of their module is: " . $m % $n . ".</h4>";
    echo "<br>";

    /*Operations with all variables*/

    echo "<h4 style='color: indianRed'> The double of x is " . $x * 2 . ".</h4>";
    echo "<h4 style='color: indianRed'> The double of y is " . $y * 2 . ".</h4>";
    echo "<h4 style='color: indianRed'> The double of m is " . $m * 2 . ".</h4>";
    echo "<h4 style='color: indianRed'> The double of n is " . $n * 2 . ".</h4>";

    echo "<h4 style='color: indianRed'> The sum of all of them is " . $x + $y + $m + $n . ".</h4>";
    echo "<h4 style='color: indianRed'> The product of all of them is " . $x * $y * $m * $n . ".</h4>";

    ?>

</body>

</html>