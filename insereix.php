<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<?php include 'includes/header.php' ?>

<body>
    <?php
    require_once 'controllers/compres.php';
    $compra = new Compra;
    ?>

    <!--Insert page header: title and description-->
    <div class="container mx-auto">
        <div class="page-header">
            <h1><i class="fas fa-plus-circle"></i> Afegir article</h1>
        </div>
        <p>Escriu el nom de l'article, quants vols i quin preu té</p>
    </div>

    <!--Formulary to write the data for a new article in the shopping list-->
    <div class="container p-6">
        <div class="row">
            <div class="col-md-6">
                <!--Form-->
                <form method="POST" action="request/createRequest.php">
                    <div class="form-group">
                        <label for="producte">Nom de l'article</label>
                        <textarea class="form-control" id="producte" rows="3" name="producte"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="quantitat">Quantitat</label>
                        <textarea class="form-control" id="quantitat" rows="3" name="quantitat"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="preu">Preu</label>
                        <textarea class="form-control" id="preu" rows="3" name="preu"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Afegir</button>
                    <button href="index.php" class="btn btn-secondary btn-block">Tornar</button>
                </form>
            </div>
        </div>

        <?php include 'includes/footer.php' ?>
</body>

</html>