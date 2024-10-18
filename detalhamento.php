<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhamento de Evento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

<button type="button" onclick="location.href='relatorio.php';" class="btn btn-secondary" style="width: 85px; height: 35.97px; margin: 10px 0px 10px 0px">Voltar</button>

<div class="titulo" style="padding: 10px; height: 45px; width: 100%; background-color: whitesmoke">
    <h4>Detalhes do Evento</h4>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "eventos";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $id = $conn->real_escape_string($id);
    $sql = "SELECT * FROM `base_eventos` WHERE `os` = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul class='list-group-flush'>";
        while ($row = $result->fetch_object()) {
            echo "<li class='list-group-item'><strong>OS:</strong> " . $row->os . "</li>";
            echo "<li class='list-group-item'><strong>Prazo:</strong> " . $row->prazo . "</li>";
            echo "<li class='list-group-item'><strong>Origem:</strong> " . $row->origem . "</li>";
            echo "<li class='list-group-item'><strong>Causa:</strong> " . $row->causa . "</li>";
            echo "<li class='list-group-item'><strong>Antiga Marca:</strong> " . $row->ant_marca . "</li>";
            echo "<li class='list-group-item'><strong>Mês:</strong> " . $row->mes_fec . "</li>";
            echo "<li class='list-group-item'><strong>Abertura</strong> " . $row->data_abt . "</li>";
            echo "<li class='list-group-item'><strong>Encerramento</strong> " . $row->data_fec . "</li>";
            echo "<li class='list-group-item'><strong>Afetação:</strong> " . $row->clientes . "</li>";
            echo "<li class='list-group-item'><strong>Tipo do Evento:</strong> " . $row->tipo_eve . "</li>";
            echo "<li class='list-group-item'><strong>Cabo:</strong> " . $row->classe_cabo . "</li>";
            echo "<li class='list-group-item'><strong>Tempo Total:</strong> " . $row->tmp_total_h . "h</li>";
            echo "<li class='list-group-item'><strong>Range:</strong> " . $row->range . "</li>";
            echo "<li class='list-group-item'><strong>Evento DP:</strong> " . $row->evento_dp . "</li>";
            echo "<li class='list-group-item'><strong>Rede:</strong> " . $row->rede . "</li>";
            echo "<li class='list-group-item'><strong>Semana:</strong> " . $row->semana . "</li>";
            echo "<li class='list-group-item'><strong>Cidade:</strong> " . $row->cidade . "</li>";
            echo "<li class='list-group-item'><strong>Estado:</strong> " . $row->uf . "</li>";
            echo "<li class='list-group-item'><strong>Território:</strong> " . $row->territorio . "</li>";
            echo "<li class='list-group-item'><strong>Coordenador:</strong> " . $row->coordenador . "</li>";
            echo "<li class='list-group-item'><strong>Gerente:</strong> " . $row->gerente . "</li>";
            echo "<li class='list-group-item'><strong>Regional:</strong> " . $row->regional . "</li>";
            $causa_info = empty($row->causa_2) ? "Não informado" : "$row->causa_2";
            echo "<li class='list-group-item'><strong>Causa Constatada:</strong> " . $causa_info . "</li>";
            $justificado = empty($row->acao) ? "Não informado" : "$row->acao";
            echo "<li class='list-group-item'><strong>Ação:</strong> " . $justificado . "</li>";
        }
        echo "</ul>";
    }
}
$conn->close();
?>

</body>
</html>
