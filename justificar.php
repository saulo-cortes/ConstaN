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
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        form {
            border: solid 4px whitesmoke;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body>

<button type="button" onclick="location.href='relatorio.php';" class="btn btn-secondary" style="width: 85px; height: 35.97px; margin: 10px 0px 10px 0px">Voltar</button>

<div class="titulo" style="padding: 10px; height: 45px; width: 100%; background-color: whitesmoke">
    <h4>Enviar FCA</h4>
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

    $sql = "SELECT data_ini, data_abt, classe_cabo, causa FROM `base_eventos` WHERE `os` = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $data_abt = $row['data_abt'];
        $classe_cabo = $row['classe_cabo'];
        $causa = $row['causa'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $causa = $conn->real_escape_string($_POST['causa']);
    $acao = $conn->real_escape_string($_POST['acao']);

    $sql = "UPDATE `base_eventos` SET `causa_2` = '$causa', `acao` = '$acao' WHERE `os` = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert" style="margin-top: 20px">Justificativa enviada!</div>';
        echo '<script>
                setTimeout(function() {
                    window.location.href = "relatorio.php";
                }, 2000);
              </script>';
        exit();
    }
}
?>
<div class="container">
    <div class="row" style="justify-content: space-evenly">
        <div class="quadro" style="width: 60%">
            <div class="inputs">
                <form style="margin-top: 20px;" method="POST" id="form">
                    <div class="alert alert-danger" role="alert">
                        Após o envio as informações não poderão ser alteradas!
                    </div>
                    <div class="form-group">
                        <label for="causa">Causa:</label>
                        <input type="text" class="form-control" id="causa" name="causa" required>
                    </div>
                    <div class="form-group">
                        <label for="acao">Ação:</label>
                        <textarea class="form-control" id="acao" name="acao" rows="4" required></textarea>
                    </div>
                    <button class="btn btn-primary" style="width: 85px; height: 35.97px;">Enviar</button>
                </form>
            </div>
        </div>

        <div class="quadro" style="width: 35%">
            <div class="inputs">
                <form style="margin-top: 20px;" method="POST" id="form">
                    <div class="form-group">
                        <label for="causa">Número da Ordem:</label>
                        <input type="text" class="form-control" value="<?php echo $id?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="causa">Data da Abertura:</label>
                        <input type="text" class="form-control" value="<?php echo $data_abt?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="causa">Classe do Cabo:</label>
                        <input type="text" class="form-control" value="<?php echo $classe_cabo?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="causa">Causa:</label>
                        <input type="text" class="form-control" value="<?php echo $causa?>"readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
