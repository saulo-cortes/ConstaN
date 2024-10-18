<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConstaN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .opt {
            height: 180px;
            width: 250px;
            border: 3px solid gainsboro;
            border-radius: 2px;
            padding: 20px;
            margin: 10px;
            float: left;
            background-color: whitesmoke;
            text-align: center;
            cursor: pointer;
            transition: all 0.5s;
        }

        .opt:hover{
            box-shadow: 3px 3px 3px whitesmoke;
            transition: all 0.5s;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background: #2f4858;">
    <a class="navbar-brand" href="images/asal.webp"><img src="images/asal.webp" alt="ConstaN" style="height: 40px; width: 40px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">

            <!-- Rede Externa  -->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold;">
                    <i class="fa-solid fa-signal" style="color: white;"></i>&nbsp;&nbsp; Rede Externa
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black" style="cursor:pointer;">Cockpit</a>
                    <a class="dropdown-item" onclick="document.getElementById('id04').style.display='block'" class="w3-button w3-black" style="cursor:pointer;">Timeline KPI</a>
                    <a class="dropdown-item" onclick="document.getElementById('id05').style.display='block'" class="w3-button w3-black" style="cursor:pointer;">Timeline Volume</a>
                    <a class="dropdown-item" onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black" style="cursor:pointer;">Acesso</a>
                    <a class="dropdown-item" onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-black" style="cursor:pointer;">Backbone+Haul</a>
                    <a class="dropdown-item" onclick="document.getElementById('id06').style.display='block'" class="w3-button w3-black" style="cursor:pointer;">KPI Dia</a>
                    <a class="dropdown-item" onclick="document.getElementById('id07').style.display='block'" class="w3-button w3-black" style="cursor:pointer;">Entrante Dia</a>
                </div>
            </li>


            <!-- COPE REDE  -->


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold;">
                    <i class="fa-solid fa-medal" style="color: white;"></i>&nbsp;&nbsp; Cope Rede
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://spwext.xyz/CN_HUB_ATENDIMENTO.php">Atendimento</a>
                    <a class="dropdown-item" href="https://spwext.xyz/CN_ANALITICO_ATENDIMENTO.php">Analítico Atendimento </a>
                    <a class="dropdown-item" href="https://spwext.xyz/CN_ATENDIMENTO_BI.php">KPI's Cope Rede </a>
                </div>
            </li>
        </ul>
    </div>

    <div style="text-align: right;">
        <a style="color: white;">saulo.cruz@alloha.com</a>&nbsp;&nbsp;
        <a href="CN_SAIR.php"><i class="fa-solid fa-arrow-right-from-bracket" style="color: white;cursor:pointer;"></i></a>
    </div>
</nav>

<div class="opt" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">
    <img src="images/man.png" alt="recursos" height="100px" width="100px">
    <legend style="font-size: 16px;">Base de Colaboradores</legend>

</div>

<div class="opt" onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black">
    <img src="images/outlier.png" alt="outliers" height="90px" width="90px">
    <legend style="font-size: 16px; margin-top: 10px">Outliers</legend>

</div>
<!--<div class="opt" onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black">-->
<!--    <img src="images/edit.png" alt="recursos" height="100px" width="100px">-->
<!--    <legend style="font-size: 16px;">Alterar Base</legend>-->
<!---->
<!--</div>-->

<div id="id01" class="w3-modal">
    <div class="w3-modal-content  w3-animate-bottom" style="width: 90%;height:700px;border-radius:2px;">
        <div class="w3-container">
            <span onclick="fechar().style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <div style="margin:10px;padding:10px;">
                <iframe src="opcoes.php" frameborder="0" style="width:100%; height:600px;margin-top:2px;" allowFullScreen="true"></iframe>
            </div>

        </div>
    </div>
</div>

<div id="id02" class="w3-modal">
    <div class="w3-modal-content  w3-animate-bottom" style="width: 90%;height:700px;border-radius:2px;">
        <div class="w3-container">
            <span onclick="fechar().style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <div style="margin:10px;padding:10px;">
                <iframe src="relatorio.php" frameborder="0" style="width:100%; height:600px;margin-top:2px;" allowFullScreen="true"></iframe>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
        crossorigin="anonymous"></script>

<script>
    function fechar(){
        window.location='index.php'
    }
</script>
</body>
</html>