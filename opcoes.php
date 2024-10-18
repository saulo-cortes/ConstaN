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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        div.opt {
            height: 180px;
            width: 250px;
            border: 2px solid gainsboro;
            border-radius: 2px;
            padding: 20px;
            margin: 10px;
            float: left;
            background-color: whitesmoke;
            text-align: center;
            cursor: pointer;
            transition: all 0.5s;
        }

        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

<div class="titulo" style="padding: 10px; height: 45px; width: 100%; background-color: whitesmoke">
    <h4>Apropriação de Mão de Obra</h4>
</div>

<a href="hierarquia.php" target="_self">
    <div class="opt">
        <img src="images/hierarchy.png" alt="recursos" height="100px" width="100px">
        <legend style="font-size: 16px;">Hierarquia Geral</legend>
    </div>
</a>

<a href="listagem.php" target="_self">
    <div class="opt">
        <img src="images/edit.png" alt="recursos" height="100px" width="100px">
        <legend style="font-size: 16px;">Listagem Geral</legend>
    </div>
</a>
</body>
</html>
