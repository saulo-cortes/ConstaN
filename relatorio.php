<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConstaN</title>
    <link rel="shortcut icon" href="CN_IMG/asa.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
</head>
<body>

<div class="titulo" style="padding: 10px; height: 45px; width: 100%; background-color: whitesmoke" >
    <h4>Outliers</h4>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "eventos";

$conn = new mysqli($servername, $username, $password, $dbname);
$semSelecionada = isset($_POST['semana']) ? $_POST['semana'] : null;
$sql = "SELECT * FROM `base_eventos` WHERE `outlier` = 1";

if ($semSelecionada) {
    $semSelecionada = $conn->real_escape_string($semSelecionada);
    $sql .= " AND semana = '$semSelecionada'";
}

$res = $conn->query($sql);
?>

<div class="col" >
    <h4>Semana</h4>
    <form method="POST" action="">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownSemana" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-bottom: 20px">Semana</button>
            <div class="dropdown-menu" aria-labelledby="dropdownSemana">
                <?php
                $semSelecionadaQuery = "SELECT DISTINCT semana FROM base_eventos WHERE `outlier` = 1";
                $semSelecionadaResult = $conn->query($semSelecionadaQuery);
                while ($row = $semSelecionadaResult->fetch_object()) {
                    echo "<button class='dropdown-item' type='submit' name='semana' value='".$row->semana."'>".$row->semana."</button>";
                }
                ?>
            </div>
        </div>
    </form>
</div>

<?php
if ($res && $res->num_rows > 0) {
    echo "<table class='table table-hover table-striped table-bordered'>";
    echo "<tr>";
    echo "<th>OS</th>";
    echo "<th>Cidade</th>";
    echo "<th>Afetação</th>";
    echo "<th>Coordenador</th>";
    echo "<th>Gerente</th>";
    echo "<th>Tempo Total</th>";
    echo "<th>Regional</th>";
    echo "<th>Ações</th>";
    echo "</tr>";
    while ($row = $res->fetch_object()) {
        echo "<tr>";
        echo "<td onclick=\"location.href='detalhamento.php?id=" . $row->os . "';\" style='cursor:pointer;'>
        <img src='images/information-button.png' alt='Image description' width='18px' height='18px'>
        " . $row->os . "</td>";
        echo "<td>" . $row->cidade . "</td>";
        echo "<td>" . $row->clientes . "</td>";
        echo "<td>" . $row->coordenador . "</td>";
        echo "<td>" . $row->gerente . "</td>";
        echo "<td>" . $row->tmp_total_h . "h</td>";
        echo "<td>" . $row->regional . "</td>";
        echo "<td>
        <button onclick=\"location.href='justificar.php?id=" . $row->os . "';\" class='btn btn-primary' style='width: 85px; margin-bottom: 10px;'>FCA</button>
      </td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>