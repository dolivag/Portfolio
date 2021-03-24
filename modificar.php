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

    //Uses the GET method to save the id
    $id = $_GET['id'];

    //Saves the data with id key into an object in order to display it later
    $data = $compra->show($id);

    ?>

    <!--Modify header page: title and description-->
    <div class="container mx-auto">
        <div class="page-header">
            <h1><i class="fas fa-exchange-alt"></i> Modificar article</h1>
        </div>
        <p>Canvia nom, quantitat i/o preu de l'article escollit</p>
    </div>

    <!--Formulary and buttons to update the shopping item. Include the button to go back to the main page-->
    <div class="container p-6">
        <!--Form-->
        <div class="col-md-6">
            <form method="POST" action="request/editRequest.php?id=<?php echo $data['compra_id']; ?>">
                <div class="form-group">
                    <label for="producte">Nom de producte</label>
                    <textarea class="form-control" id="producte" rows="3" name="producte"><?php echo $data['nom_producte']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="quantitat">Quantitat</label>
                    <textarea class="form-control" id="quantitat" rows="3" name="quantitat"><?php echo $data['quantitat']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="preu">Preu</label>
                    <textarea class="form-control" id="preu" rows="3" name="preu"><?php echo $data['preu']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Modificar</button>
                <button href="index.php" class="btn btn-secondary btn-block">Tornar</button>
            </form>
        </div>
    </div>


    </div>

    <?php include 'includes/footer.php' ?>
</body>

</html>