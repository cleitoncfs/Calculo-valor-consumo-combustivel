<?php

if ($_POST) {

    $distancia = filter_var($_POST['distancia'], FILTER_VALIDATE_FLOAT);
    $autonomia = filter_var($_POST['autonomia'], FILTER_VALIDATE_FLOAT);

    $valorGasolina = 4.80;
    $valorAlcool = 3.80;
    $valorDiesel = 3.90;

    $mensagem = "";

    if ($autonomia && $distancia){
        if (($distancia > 0) && ($autonomia > 0)) {

            $consumoGasolina = ($distancia / $autonomia ) * $valorGasolina;
            $consumoGasolina = number_format($consumoGasolina, 2, ',', '.');

            $consumoAlcool = ($distancia / $autonomia ) * $valorAlcool;
            $consumoAlcool = number_format($consumoAlcool, 2, ',', '.');

            $consumoDiesel = ($distancia / $autonomia ) * $valorDiesel;
            $consumoDiesel = number_format($consumoDiesel, 2, ',', '.');

            $mensagem .= "<div class='sucesso'>";
            $mensagem .= "O valor total gasto será de:";
            $mensagem .= "<ul>";
            $mensagem .= "<li><b>Gasolina:</b> R$ ".$consumoGasolina."</li>";
            $mensagem .= "<li><b>Álcool:</b> R$ ".$consumoAlcool."</li>";
            $mensagem .= "<li><b>Diesel</b>: R$ ".$consumoDiesel."</li>";
            $mensagem .= "</ul>";
            $mensagem .= "</div>";
        } else {
            $mensagem .= "<div class='erro'>";
            $mensagem .= "<b>O valor da distância e da autonomia deve ser maior que zero.</b>";
            $mensagem .= "</div>";
        }
    } else {
        $mensagem .= "<div class='erro'>";
        $mensagem .= "<b>O valor recebido não é numérico</b>";
        $mensagem .= "</div>";
    }
} else {
    $mensagem = "<div class='erro'>";
    $mensagem .= "<b>Nenhum dado foi recebido pelo formulário</b>";
    $mensagem .= "</div>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculo de Consumo de Combustível</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <main>
        <section class="painel">
            <h2>Resultado do cálculo de consumo</h2>
            <div class="conteudo-painel">
                <?php
                echo $mensagem;
                ?>
                <a class="botao" href="index.php">Voltar</a>
            </div>
        </section>
    </main>
</body>
</html>
