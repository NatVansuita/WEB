
    <?php
    
    if (!isset ($_POST['peso']) || !isset($_POST['Altura']) ){
        header("Location: formulario.php?error=faltando_dados");
        exit();
    }

    $peso=$_POST['peso'];
    $altura=$_POST['Altura'];

    if(!is_numeric($peso) || is_numeric($altura) || $altura <= 0){
        header("Location: imc.php?error=faltando_dados");
        exit();
    }

    $imc = $peso / ($altura * $altura);
    $imc = round($imc,2);
    echo '<h1>Resultado do calculo do IMC</h1>';
    echo '<p>Seu IMC é: $imc</p>';

    ?>