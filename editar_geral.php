<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConstaN</title>
    <link rel="shortcut icon" href="CN_IMG/asa.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        form {
            border: solid 4px whitesmoke;
            border-radius: 10px;
            padding: 20px;
            margin-left: 50px;
        }

    </style>
</head>
<body>

<button type="button" onclick="location.href='listagem.php';" class="btn btn-secondary" style="width: 85px; height: 35.97px; margin: 10px 0px 10px 0px">Voltar</button>
<div class="titulo" style="padding: 10px; height: 45px; width: 100%; background-color: whitesmoke" >
    <h4>Alterar Hierarquia</h4>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "consolidado";
$conn = new mysqli($servername, $username, $password, $dbname);

$id = isset($_GET['id']) ? $_GET['id'] : null;
$sql = "SELECT * FROM listagem_geral WHERE `id_alloha` = '$id'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $cargo = $row['cargo'];
}
?>

<form action="?page=salvar" method="POST" style="width: 90%; margin-top: 20px">
    <input type="hidden" name="acao" value="cadastrar">
    <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" placeholder="<?php echo $nome?>" required>
    </div>
    <div class="mb-3">
        <label>Cargo</label>
        <input type="text" name="nome" class="form-control" placeholder="<?php echo $cargo?>" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success" style="width: 85px; height: 35.97px; margin-top: 20px">Salvar</button>
        <button type="button" onclick="location.href='listagem.php';" class="btn btn-danger" style="width: 85px; height: 35.97px; margin: 20px 0px 0px 20px">Cancelar</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
