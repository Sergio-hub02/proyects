<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $datos = [];
    if ($_POST[$id] === "Editar") {
        $contact = $agendaController->retrieveContact($id);
        $datos = $contact;
    }
    ?>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="text" name="id" id="" value="<?php echo(empty($datos)) ? "" : $datos[0]["id_contacto"];?>" hidden>
        <label for="">Nombre:</label>
        <input type="text" name="nombre" id="" value="<?php echo(empty($datos)) ? "" : $datos[0]["nombre"];?>">
        <br>
        <label for="">Email:</label>
        <input type="eamil" name="email" id="" value="<?php echo(empty($datos)) ? "" : $datos[0]["email"];?>">
        <br>
        <label for="">Teléfono:</label>
        <input type="text" name="telefono" id="" value="<?php echo(empty($datos)) ? "" : $datos[0]["tlf"];?>">
        <br>
        <label for="">Dirección:</label>
        <input type="text" name="direccion" id="" value="<?php echo(empty($datos)) ? "" : $datos[0]["direccion"];?>">
        <br>
        <input type="submit" value="<?php echo(isset($_POST["añadir"])) ? "Crear contacto" : "Modificar contacto";?>" name="<?php echo(isset($_POST["añadir"])) ? "crear" : "modificar";?>">
    </form>
    <?php
    if (isset($_POST["modificar"]) || isset($_POST["crear"])) {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];

        if (isset($_POST["crear"])) {
            $agendaController->addContact($nombre, $email, $telefono, $direccion);
            chargePage();
        } elseif (isset($_POST["modificar"])) {
            $id = $_POST["id"];
            $agendaController->updateContact($id, $nombre, $email, $telefono, $direccion);
            chargePage();
        }
    }
    ?>
</body>

</html>