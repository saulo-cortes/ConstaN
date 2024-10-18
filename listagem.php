<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConstaN</title>
    <link rel="shortcut icon" href="CN_IMG/asa.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        button {
            width: 85px;
            height: 35.97px;
        }
    </style>
</head>
<body>

<button type="button" onclick="location.href='opcoes.php';" class="btn btn-secondary" style="width: 85px; height: 35.97px; margin: 10px 0px 10px 0px">Voltar</button>

<div class="titulo" style="padding: 10px; height: 45px; width: 100%; background-color: whitesmoke" >
    <h4>Base de Colaboradores</h4>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "consolidado";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM listagem_geral WHERE 1=1 ORDER BY nome ASC";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    echo "<table class='table table-hover table-striped table-bordered'>";
    echo "<tr>";
    echo "<th>ID Alloha</th>";
    echo "<th>Nome</th>";
    echo "<th>Cargo</th>";
    echo "<th>Opções</th>";
    echo "</tr>";
    while ($row = $res->fetch_object()) {
        echo "<tr>";
        echo "<td>" . $row->id_alloha . "</td>";
        echo "<td>" . $row->nome . "</td>";
        echo "<td>" . $row->cargo . "</td>";
        echo "<td colspan='2' style='text-align: center;'>
        <button onclick=\"location.href='editar_geral.php?id=" . $row->id_alloha . "';\" class='btn btn-success' style='width: 85px;'>Editar</button>
        <button class='btn btn-danger' style='width: 85px;'>Excluir</button>
        </td>";

        echo "</tr>";
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>
</body>
</html>