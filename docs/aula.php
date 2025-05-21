<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            text-align: center;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 15px;
        }
        .imc-value {
            font-size: 2.5em;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .classification {
            font-size: 1.1em;
            color: #333;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #e9e9e9;
        }
        .back-link {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .back-link:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Seu Resultado do IMC</h1>
        <?php
        // Verifica se os parâmetros foram enviados via POST
        if (isset($_REQUEST['peso']) && isset($_REQUEST['altura'])) {
            // Obtém os valores de peso e altura usando $_REQUEST
            $peso = floatval($_REQUEST['peso']);
            $altura = floatval($_REQUEST['altura']);

            // Verifica se a altura é zero para evitar divisão por zero
            if ($altura > 0) {
                // Calcula o IMC
                $imc = $peso / ($altura * $altura);

                echo "<p>Seu peso: " . number_format($peso, 2) . " kg</p>";
                echo "<p>Sua altura: " . number_format($altura, 2) . " m</p>";
                echo "<p>Seu IMC é:</p>";
                echo "<p class='imc-value'>" . number_format($imc, 2) . "</p>";

                echo "<div class='classification'>";
                echo "<p>Classificação do IMC:</p>";
                if ($imc < 18.5) {
                    echo "<p>Abaixo do peso</p>";
                } elseif ($imc >= 18.5 && $imc < 24.9) {
                    echo "<p>Peso normal</p>";
                } elseif ($imc >= 25 && $imc < 29.9) {
                    echo "<p>Sobrepeso</p>";
                } elseif ($imc >= 30 && $imc < 34.9) {
                    echo "<p>Obesidade Grau I</p>";
                } elseif ($imc >= 35 && $imc < 39.9) {
                    echo "<p>Obesidade Grau II</p>";
                } else {
                    echo "<p>Obesidade Grau III</p>";
                }
                echo "</div>";

            } else {
                echo "<p style='color: red;'>A altura não pode ser zero. Por favor, insira um valor válido.</p>";
            }
        } else {
            echo "<p style='color: red;'>Por favor, preencha o formulário para calcular o IMC.</p>";
        }
        ?>
        <a href="index.html" class="back-link">Voltar ao Formulário</a>
    </div>
</body>
</html>