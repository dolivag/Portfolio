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
    $total = 0;
    // Tasks list
    $compres = $compra->list();
    ?>

    <div class="container mx-auto">
        <div class="page-header">

            <h1><i class="fas fa-store-alt"></i> Llista de la compra</h1>
        </div>
        <p>Insereix, esborra i edita els articles a la teva llista de la compra</p>

    </div>

    <div class="container p-4">
        <a href="insereix.php" class="btn btn-primary btn-lg btn-block mr-1">Nou producte</a>
        <div class="row">

            <div class="col-md-12">
                <table class="table my-2">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Prod. ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Quantitat</th>
                            <th scope="col">Preu</th>
                            <th scope="col">Total producte</th>
                            <th scope="col">Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($compres as $compra) : ?>
                            <tr>
                                <th scope="row"><?php echo $compra['compra_id'] ?></th>
                                <td><?php echo $compra['nom_producte'] ?></td>
                                <td><?php echo $compra['quantitat'] ?></td>
                                <td><?php echo $compra['preu'] ?></td>
                                <td><?php echo $compra['preu'] * $compra['quantitat'] ?></td>
                                <?php $total += $compra['preu'] * $compra['quantitat'] ?>
                                <td>
                                    <a class="btn btn-secondary" href="modificar.php?id=<?php echo $compra['compra_id'] ?>"><i class="fas fa-pen-alt"></i></a>
                                    <a class="btn btn-danger" href="request/deleteRequest.php?id=<?php echo $compra['compra_id'] ?>"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <tfoot class="table-dark">
                        <tr>
                            <td><strong><?php echo "Total compra" ?></strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong><?php echo $total; ?></strong></td>
                            <td></td>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php' ?>
</body>

</html>