<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Minha pagina HTML
    <?php
        echo "<br>"."Ola mundao <br>";
        $nome="Sarah <br>";
        echo $nome;
    ?>
    <h2>Exemplo tipo dados PHP</h2>
    <?php
        $a=5;
        $b=7;
        echo "<p>".$a+$b."</p>";
    ?>
    <p> <?php echo $a*3+$b ?> </p>
    <h2> Operador ternário</h2>
    <?php
    $situacao = $nota >6 ? 'aptovado' : 'reprovado';
    echo $situacao
    ?>
    <h2>WHILE</h2>
    <?php
        $i = 0;
        while($i<10){
            $i++;
            ?>
            <p> <?php echo $i; ?> </p>
            <?php
        }
    ?>
    <?php
    $vetor = array (1, 2, 3, 4, 5);
    for($i = 0; $i <5; $i++){
        echo $vetor [$i]."<br/>"
    }
    ?>
    <h2>Array em php</h2>
    <?php
        $nome = ["sarah", "manuela", "maria", "ana"];
        echo $nome[0];
    ?>
    <h2>Variaveis de ambiente em PHP</h2>
    <?php
    echo "_GET". $_GET ($_REQUEST);

</body>
</html>