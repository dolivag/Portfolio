<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Daniel Oliva Gómez">
    <title>PHP_M-6</title>
    <style>
        body {
            font-family: sans-serif;
        }

        ;
    </style>
</head>

<body>
    <?php

    /***************NIVEL 1***************/

    /*EJERCICIO 1*/
    /*Programa la funció "resta" que, donats dos paràmetres ens retorni la resta dels dos números*/

    echo "<h1 style='margin-bottom: 1rem'> Nivel 1 - Ejercicio 1</h1>";

    function resta($r1, $r2)
    {
        return $r1 - $r2;
    };

    /*EJERCICIO 2*/
    /*Programa una lògica que, donat un número qualsevol(per exemple,la teva edat) ens digui si és parell o imparell mitjançant un missatge per pantalla.*/

    echo "<h1 style='margin-bottom: 1rem'> Nivel 1 - Ejercicio 2</h1>";

    $number = 20;

    if ($number % 2 == 1) {
        echo "<h4> El número es impar </h4>";
    } else {
        echo "<h4> El número es par </h4>";
    }

    /*EJERCICIO 3*/
    /*Agafa la lògica de l'exercici 2 i encapsulala en una funció de nom parell_o_imparell. Invoca aquesta funció per a comprovar que funciona correctament.*/

    echo "<h1 style='margin-bottom: 1rem'> Nivel 1 - Ejercicio 3</h1>";

    function parell_o_imparell($number)
    {
        if ($number % 2 == 1) {
            echo "<h4> El número es impar </h4>";
        } else {
            echo "<h4> El número es par </h4>";
        }
    }

    parell_o_imparell(31);

    /*EJERCICIO 4*/
    /*Programa un bucle que compti fins a 10, mostrant cada  número per pantalla.*/

    echo "<h1 style='margin-bottom: 1rem'> Nivel 1 - Ejercicio 4</h1>";

    for ($x = 0; $x <= 10; $x++) {
        echo "<h4> " . $x . "</h4>";
    }


    /***************NIVEL 2***************/

    /*EJERCICIO 1*/
    /*Per jugar a "l'amagatall"  se'ns ha demanat un programa que compti fins a 10. 
    Però la persona que comptarà és una mica tramposa y ho farà comptant de dos en dos. 
    Crea una funció que compti fins a 10, de 2 en 2, mostrant cada número del compte per pantalla.*/


    echo "<h1 style='margin-bottom: 1rem; margin-top: 3rem;'> Nivel 2 - Ejercicio 1</h1>";


    function contador2()
    {
        for ($i = 0; $i <= 10; $i += 2) {
            echo "<h4>" . $i . "</h4>";
        }
        echo "<h4>¡¡Que voy!!</h4>";
    }

    contador2();

    /*EJERCICIO 2*/
    /*Imagina't que volem que conti fins a un número diferent de 10. Programa la funció per a que el final del compte estigui parametritzat.*/

    echo "<h1 style='margin-bottom: 1rem'> Nivel 2 - Ejercicio 2</h1>";

    function counterTo($to)
    {
        for ($i = 0; $i <= $to; $i += 2) {
            echo "<h4>" . $i . "</h4>";
        }
        echo "<h4>¡¡Que voy!!</h4>";
    }

    counterTo(20);

    /*EJERCICIO 3*/
    /*Per a prevenir oblits al utilitzar la nostra meravellosa funció "amagatall" establirem
    un paràmetre per defecte a 10 en la funció que s'encarrega de fer aquest compte. .*/

    echo "<h1 style='margin-bottom: 1rem'> Nivel 2 - Ejercicio 3</h1>";

    function counterTo2($to = 10)
    {
        for ($i = 0; $i <= $to; $i += 2) {
            echo "<h4>" . $i . "</h4>";
        }
        echo "<h4>¡¡Que voy!!</h4>";
    }

    counterTo2(15);


    /***************NIVEL 3***************/

    /*EJERCICIO 1*/
    /*Ens han demanat un llistat de tots els anys on es van produir jocs olímpics desde 1960 inclós fins al 2016. 
    Programa un bucle que calculi i mostri per pantalla els anys olímpics dins de l'interval esmentat..*/

    echo "<h1 style='margin-bottom: 1rem; margin-top: 3rem'> Nivel 3 - Ejercicio 1</h1>";

    $interval_start = 1960;
    $interval_end = 2016;

    echo "<h4> Desde el año " . $interval_start . " hasta el año " . $interval_end . " hubieron las siguientes Olimpiadas:</h4>";
    echo "<ul>";
    for ($i = $interval_start; $i <= $interval_end; $i += 4) {
        echo "<li><h5> Olimpiadas del año " . $i . ".</h5></li>";
    }
    echo "</ul>";

    /*EJERCICIO 2*/
    /*Imagina que som a una botiga on es ven:
    Xocolata: 1 euro
    Xiclets: 0.50 euros
    Caramels: 1.50 euros
    Implementa un programa que permeti afegir càlculs a un total de compres d'aquest tipus. Per exemple, que si comprem:
    2 xocolates, 1 de xiclets i 1 de carmels, tinguem un programa que permeti anar afegint els subtotals a un total, tal que així,
    funció(2 xocolates) + funció(1 de xiclets) + funció(1 de carmels) = 2+0.5+1.5. Sent per tant el total, 4.*/

    echo "<h1 style='margin-bottom: 1rem'> Nivel 3 - Ejercicio 2</h1>";

    define("CHOCOLATE", 1);
    define("CHICLE", 0.5);
    define("CARAMELO", 1.5);

    function chocolates($cantidad)
    {
        return $cantidad * CHOCOLATE;
    }

    function chicles($cantidad)
    {
        return $cantidad * CHICLE;
    }

    function caramelos($cantidad)
    {
        return $cantidad * CARAMELO;
    }

    $productos = array(
        "Chocolate" => 3,
        "Chicles" => 5,
        "Caramelos" => 2,
    );

    function precioTotal($arrayCompra)
    {
        return (chocolates($arrayCompra['Chocolate']) + chicles($arrayCompra['Chicles']) + caramelos($arrayCompra['Caramelos']));
    }

    echo "<h4>El precio total por: <h4>";
    echo "<ul><li><h5> Chocolate: " . $productos['Chocolate'] . ".</h5></li>";
    echo "<li><h5> Chicles: " . $productos['Chicles'] . ".</h5></li>";
    echo "<li><h5> Caramelos: " . $productos['Caramelos'] . ".</h5></li>";
    echo "</ul><h4>Es de " . precioTotal($productos) . " euros.</h4>";

    /*EJERCICIO */
    /*La criba d'Eratóstenes és un algoritme pensat per a trobar nombres primers dins d'un interval donat. 
    Basats en l'informació de l'enllaç adjunt, implementa la criba d'Eratóstenes dins d'una funció, 
    de tal forma que poguem invocar la funció per a un número concret.*/

    echo "<h1 style='margin-bottom: 1rem'> Nivel 3 - Ejercicio 3</h1>";


    function eratostenes($valor)
    {
        $myArr = []; //Nuevo array donde se irán guardando los múltiplos de los números primos


        echo "<h4>Desde 2 hasta " . $valor . " los números primos son:  <h4><ul>"; //Imprimimos el título.
        echo "<li><h5> 2</h5></li>"; //Imprimimos el número 2, el primer primo.

        for ($x = 3; $x <= $valor; $x += 2) { //Desde el número siguiente al primer primo, si no está en la lista de múltiplos, se añade como primo.
            if (!in_array($x, $myArr)) {
                echo "<li><h5>" . $x . "</h5></li>"; //Al añadirse como primo, lo imprimimos por pantalla.
                for ($y = 1; $y <= $valor; $y++) {
                    array_push($myArr, $x * $y); //Tras añadir un primo, empujamos sus múltiplos al array, para poder seguir comprobando en el siguiente loop.
                }
            }
        }
    }

    eratostenes(53);

    ?>



</body>

</html>