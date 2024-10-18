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
    </style>
</head>
<body>

<button type="button" onclick="location.href='opcoes.php';" class="btn btn-secondary" style="width: 85px; height: 35.97px; margin: 10px 0px 10px 0px">Voltar</button>

<div class="titulo" style="padding: 10px; height: 45px; width: 100%; background-color: whitesmoke" >
    <h4>Associação de Hierarquia</h4>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "consolidado";

$conn = new mysqli($servername, $username, $password, $dbname);

$gerSelecionado = isset($_POST['gerente']) ? $_POST['gerente'] : null;
$coorSelecionado = isset($_POST['coordenador']) ? $_POST['coordenador'] : null;
$supSelecionado = isset($_POST['supervisor']) ? $_POST['supervisor'] : null;

$sql = "SELECT * FROM hierarquia_geral WHERE 1=1";

if ($gerSelecionado) {
    $gerSelecionado = $conn->real_escape_string($gerSelecionado);
    $sql .= " AND gerente = '$gerSelecionado'";
}

if ($coorSelecionado) {
    $coorSelecionado = $conn->real_escape_string($coorSelecionado);
    $sql .= " AND coordenador = '$coorSelecionado'";
}

if ($supSelecionado) {
    $supSelecionado = $conn->real_escape_string($supSelecionado);
    $sql .= " AND supervisor = '$supSelecionado'";
}

$res = $conn->query($sql);
?>

<div class="row" style="margin-top: 10px;float: left">
    <div class="col">
        <h4>Gerência</h4>
        <form method="POST" action="">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="margin-bottom: 20px">Selecionar</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                $sqlGerentes = "SELECT DISTINCT gerente FROM hierarquia_geral";
                $resGerentes = $conn->query($sqlGerentes);
                while ($row = $resGerentes->fetch_object()) {
                    echo "<button class='dropdown-item' type='submit' name='gerente' value='".$row->gerente."'>".$row->gerente."</button>";
                }
                ?>
            </div>
        </form>
    </div>

    <div class="col">
        <h4>Coordenação</h4>
        <form method="POST" action="">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="margin-bottom: 20px">Selecionar</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                $sqlCoordenadores = "SELECT DISTINCT coordenador FROM hierarquia_geral";
                $resCoordenadores = $conn->query($sqlCoordenadores);
                while ($row = $resCoordenadores->fetch_object()) {
                    echo "<button class='dropdown-item' type='submit' name='coordenador' value='".$row->coordenador."'>".$row->coordenador."</button>";
                }
                ?>
            </div>
        </form>
    </div>

    <div class="col">
        <h4>Supervisão</h4>
        <form method="POST" action="">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    style="margin-bottom: 20px">Selecionar</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                $sqlSupervisores = "SELECT DISTINCT supervisor FROM hierarquia_geral";
                $resSupervisores = $conn->query($sqlSupervisores);
                while ($row = $resSupervisores->fetch_object()) {
                    echo "<button class='dropdown-item' type='submit' name='supervisor' value='".$row->supervisor."'>".$row->supervisor."</button>";
                }
                ?>
            </div>
        </form>
    </div>
</div>

<div id="tabela-hierarquia">
    <?php
    if ($res->num_rows > 0) {
        echo "<table class='table table-hover table-striped table-bordered'>";
        echo "<tr>";
        echo "<th>ID Alloha</th>";
        echo "<th>Técnico</th>";
        echo "<th>Supervisor</th>";
        echo "<th>Coordenador</th>";
        echo "<th>Gerente</th>";
        echo "<th>Regional</th>";
        echo "<th>Opções</th>";
        echo "</tr>";
        while ($row = $res->fetch_object()) {
            echo "<tr>";
            echo "<td>" . $row->id_alloha . "</td>";
            echo "<td>" . $row->tecnico . "</td>";
            echo "<td>" . $row->supervisor . "</td>";
            echo "<td>" . $row->coordenador . "</td>";
            echo "<td>" . $row->gerente . "</td>";
            echo "<td>" . $row->regional . "</td>";
            echo "<td colspan='2' style='text-align: center;'>
          <button onclick=\"location.href='editar.php?id=" . $row->id_alloha . "';\" class='btn btn-success' style='width: 85px; margin-bottom: 10px'>Editar</button>
          <button class='btn btn-danger' style='width: 85px;'>Excluir</button>
          </td>";
            echo "</tr>";
        }
    }
    ?>
</div>


</body>
</html>