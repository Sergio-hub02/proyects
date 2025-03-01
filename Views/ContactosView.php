<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
        <table class="table-auto">
            <thead>
                <tr>
                    <th colspan="2">Opciones</th>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) { ?>
                    <tr>
                        <td><input type="submit" value="Editar" id="tBtnEdit" name="<?php echo $contact["id_contacto"] ?>"></td>
                        <td><input type="submit" value="Borrar" id="tBtnDelet" name="<?php echo $contact["id_contacto"] ?>"></td>
                        <td><?php echo $contact["id_contacto"] ?></td>
                        <td><?php echo $contact["nombre"] ?></td>
                        <td><?php echo $contact["email"] ?></td>
                        <td><?php echo $contact["tlf"] ?></td>
                        <td><?php echo $contact["direccion"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
        <input type="submit" value="Añadir Contacto" id="tBtnInsert" name="añadir">
        <input type="submit" value="Borrar todo" id="tBtnDeleteAll" name="borrarTodo">
    </form>
</body>
</html>