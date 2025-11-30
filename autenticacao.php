
    <?php
    
    if (!isset ($_POST['nome']) || !isset($_POST['senha']) ){
        header("Location: formulario.php?error=faltando_dados");
        exit();
    }

    $nome=$_POST['nome'];
    $senha=$_POST['senha'];

    if($nome === "admin" && $senha === "123"){
        
        header("Location: imc.php?error=faltando_dados");
        exit();
    }

   

    ?>