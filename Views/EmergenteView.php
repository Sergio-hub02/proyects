<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <div>¿Deseas eliminar este contacto?</div>
        <input type="text" name="id" id="" value="<?php echo $id ?>" hidden>
        <input type="submit" value="Si" id="tBtnYes" name="aceptar">
        <input type="submit" value="No" id="tBtnNo" name="cancelar">
    </form>
</body>

<?php
if (isset($_POST["aceptar"])) {
    $agendaController->deleteContact($_POST["id"]);
    chargePage();
} elseif (!empty($_POST["cancelar"])) {
}
?>

</html>