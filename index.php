<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Monstro</title>
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT&display=swap" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Monstros</h1>

    <div class="container">
        <div class="row">
            <?php
            // Incluir o arquivo "monster-details.php" 6 vezes por página
            for ($i = 0; $i < 6; $i++) {
                include 'monster-details.php';
            }
            ?>
        </div>
    </div>
</body>
</html>
