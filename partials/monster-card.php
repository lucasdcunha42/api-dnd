<?php
// URL da API que você deseja consumir para o monstro Aboleth
$api_url = 'https://www.dnd5eapi.co/api/monsters/badger';

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
        ?>
        <div class="col-lg-4 col-md-6">
            <div class="monster-card">
                <div class="monster-name"><?php echo $data['name']; ?></div>

                <div class="property">
                    <span class="property-value"><?php echo $data['size']; ?></span>
                    <span class="property-value"><?php echo $data['type']; ?></span>
                    <span class="property-value"><?php echo $data['alignment']; ?></span>
                </div>

                <div class="property">
                    <span class="property-value">Classe de Armadura: <?php echo $data['armor_class'][0]['value']; ?></span>
                </div>

                <div class="property">
                    <span class="property-value">Pontos de Vida: <?php echo $data['hit_points']; ?></span>
                    <span class="property-value">Dados de Vida: <?php echo $data['hit_dice']; ?></span>
                </div>

                <div class="property">
                    <span class="property-value">Velocidade: Caminhar: <?php echo $data['speed']['walk']; ?></span>
                    <span class="property-value">Nadar: <?php echo isset($data['speed']['swim']) ? $data['speed']['swim'] : 'N/A'; ?></span>
                </div>

                <?php if (isset($data['special_abilities']) && is_array($data['special_abilities']) && count($data['special_abilities']) > 0) : ?>
                    <h3>Habilidades Especiais:</h3>
                    <ul>
                        <?php foreach ($data['special_abilities'] as $special_ability) : ?>
                            <li><strong><?php echo $special_ability['name']; ?>:</strong> <?php echo $special_ability['desc']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (isset($data['actions']) && is_array($data['actions']) && count($data['actions']) > 0) : ?>
                    <h3>Ações:</h3>
                    <ul>
                        <?php foreach ($data['actions'] as $action) : ?>
                            <li><strong><?php echo $action['name']; ?>:</strong> <?php echo $action['desc']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (isset($data['legendary_actions']) && is_array($data['legendary_actions']) && count($data['legendary_actions']) > 0) : ?>
                    <h3>Ações Lendárias:</h3>
                    <ul>
                        <?php foreach ($data['legendary_actions'] as $legendary_action) : ?>
                            <li><strong><?php echo $legendary_action['name']; ?>:</strong> <?php echo $legendary_action['desc']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <?php
    } else {
        echo '<p>Erro ao processar os dados da API. Verifique o formato dos dados retornados.</p>';
    }
}
?>
