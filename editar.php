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

        button {
            width: 85px;
            height: 35.97px;
        }
    </style>
</head>
<body>

<button type="button" onclick="location.href='hierarquia.php';" class="btn btn-secondary" style="margin: 10px 0;">Voltar</button>

<div class="titulo" style="padding: 10px; height: 45px; width: 100%; background-color: whitesmoke;">
    <h4>Alterar Informações</h4>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "consolidado";
$conn = new mysqli($servername, $username, $password, $dbname);

$id = isset($_GET['id']) ? $_GET['id'] : null;
$nome = $supervisor = $coordenador = $gerente = $regional = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
    $nome = $_POST['nome'];
    $supervisor = $_POST['supervisor'];
    $coordenador = $_POST['coordenador'];
    $gerente = $_POST['gerente'];
    $regional = $_POST['regional'];

    $sql = "UPDATE hierarquia_geral SET tecnico=?, supervisor=?, coordenador=?, gerente=?, regional=? WHERE id_alloha=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $nome, $supervisor, $coordenador, $gerente, $regional, $id);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert" style="margin-top: 20px">Registro atualizado com sucesso!</div>';
        echo '<script>
                setTimeout(function() {
                    window.location.href = "hierarquia.php";
                }, 2000);
              </script>';
        exit();
    } else {
        echo "<div class='alert alert-danger'>Erro ao atualizar registro: " . $stmt->error . "</div>";
    }

    $stmt->close();
} else {
    $sql = "SELECT * FROM hierarquia_geral WHERE `id_alloha` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['tecnico'];
        $supervisor = $row['supervisor'];
        $coordenador = $row['coordenador'];
        $gerente = $row['gerente'];
        $regional = $row['regional'];
    }

    $stmt->close();
}

$conn->close();
?>

<form action="" method="POST" style="width: 90%; margin-top: 20px;">
    <input type="hidden" name="acao" value="cadastrar">
    <input type="hidden" name="id" value="<?php echo $id?>">

    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="<?php echo $nome?>" required>
    </div>
    <div class="mb-3">
        <label>Supervisor</label>
        <input type="text" name="supervisor" class="form-control" value="<?php echo $supervisor?>" required>
    </div>
    <div class="mb-3">
        <label>Coordenador</label>
        <input type="text" name="coordenador" class="form-control" value="<?php echo $coordenador?>" required>
    </div>
    <div class="mb-3">
        <label>Gerente</label>
        <input type="text" name="gerente" class="form-control" value="<?php echo $gerente?>" required>
    </div>
    <div class="mb-3">
        <label>Regional</label>
        <input type="text" name="regional" class="form-control" value="<?php echo $regional?>" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success" style="margin-top: 20px;">Salvar</button>
        <button type="button" onclick="location.href='hierarquia.php';" class="btn btn-danger" style="margin: 20px 0 0 20px;">Cancelar</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
