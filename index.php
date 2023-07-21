<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Monstro - Aboleth</title>
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT&display=swap" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Detalhes do Monstro - Aboleth</h1>
    <div class="monster-block">

        <?php
        // URL da API que você deseja consumir para o monstro Aboleth
        $api_url = 'https://www.dnd5eapi.co/api/monsters/aboleth';

        // Faz a requisição à API e obtém os dados
        $json_data = @file_get_contents($api_url);

        // Verifica se houve algum erro na requisição
        if ($json_data === false) {
            echo '<p>Erro ao acessar a API. Verifique a URL ou a disponibilidade do serviço.</p>';
            echo '<p>Erro: ' . error_get_last()['message'] . '</p>';
        } else {
            // Decodifica os dados JSON em um array associativo
            $data = json_decode($json_data, true);

            // Verifica se os dados foram decodificados corretamente
            if (is_array($data)) {
                // Exibe as informações gerais do monstro
                echo '<h2>Nome: ' . $data['name'] . '</h2>';
                echo '<p>Tamanho: ' . $data['size'] . '</p>';
                echo '<p>Tipo: ' . $data['type'] . '</p>';
                echo '<p>Alinhamento: ' . $data['alignment'] . '</p>';
                echo '<p>Classe de Armadura: ' . $data['armor_class'][0]['value'] . '</p>';
                echo '<p>Pontos de Vida: ' . $data['hit_points'] . '</p>';
                echo '<p>Dados de Vida: ' . $data['hit_dice'] . '</p>';
                echo '<p>Velocidade: Caminhar: ' . $data['speed']['walk'] . ', Nadar: ' . $data['speed']['swim'] . '</p>';

                // Exibe as habilidades especiais do monstro
                if (isset($data['special_abilities']) && is_array($data['special_abilities']) && count($data['special_abilities']) > 0) {
                    echo '<h3>Habilidades Especiais:</h3>';
                    echo '<ul>';
                    foreach ($data['special_abilities'] as $special_ability) {
                        echo '<li><strong>' . $special_ability['name'] . ':</strong> ' . $special_ability['desc'] . '</li>';
                    }
                    echo '</ul>';
                }

                // Exibe as ações do monstro
                if (isset($data['actions']) && is_array($data['actions']) && count($data['actions']) > 0) {
                    echo '<h3>Ações:</h3>';
                    echo '<ul>';
                    foreach ($data['actions'] as $action) {
                        echo '<li><strong>' . $action['name'] . ':</strong> ' . $action['desc'] . '</li>';
                    }
                    echo '</ul>';
                }

                // Exibe as ações lendárias do monstro
                if (isset($data['legendary_actions']) && is_array($data['legendary_actions']) && count($data['legendary_actions']) > 0) {
                    echo '<h3>Ações Lendárias:</h3>';
                    echo '<ul>';
                    foreach ($data['legendary_actions'] as $legendary_action) {
                        echo '<li><strong>' . $legendary_action['name'] . ':</strong> ' . $legendary_action['desc'] . '</li>';
                    }
                    echo '</ul>';
                }
            } else {
                echo '<p>Erro ao processar os dados da API. Verifique o formato dos dados retornados.</p>';
            }
        }
        ?>
    </div>

</body>
</html>
