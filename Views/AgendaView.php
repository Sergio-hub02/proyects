<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <style>
        :root {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100dvh;
        }

        h1 {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            margin: 0px 0px 10px 0px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        input[type=submit] {
            background-color: white;
            color: black;
            border: solid 1px black;
            padding: 5px;
            border-radius: 5px;
        }

        #tBtnEdit:hover {
            background-color: lightblue;
        }

        #tBtnDelet:hover,
        #tBtnNo:hover {
            background-color: lightcoral;
        }

        #tBtnYes:hover {
            background-color: lightgreen;
        }

        #tBtnInsert:hover {
            background-color: lightsalmon;
        }

        form {
            margin: 20px auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea,
        select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Agenda</h1>
    <h2>Contactos</h2>
    <?php
    require_once __DIR__ . "/../Controllers/AgendaController.php";
    $agendaController = new AgendaController();
    $contacts = $agendaController->retrieveContacts();
    if ($_POST) {
        $id = key($_POST);
        if ($_POST[$id] === "Borrar" || isset($_POST["aceptar"]) || isset($_POST["cancelar"])) {
            include("EmergenteView.php");
        } elseif (isset($_POST["añadir"]) || $_POST[$id] === "Editar" || isset($_POST["modificar"]) || isset($_POST["crear"])) {
            include("FormularioView.php");
        } elseif (isset($_POST["borrarTodo"])) {
            $agendaController->deleteAllContacts();
            chargePage();
        } else {
            include "ContactosView.php";
        }
        include "ContactosView.php";
    } else {
        include "ContactosView.php";
    }

    function chargePage()
    {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    ?>
</body>

</html>