<?php
    require 'Etiqueta.class.php';
    
    $e = new Etiqueta(
        '/home/ubuntu/workspace/img/frimesa75x75.jpg',
        'image/jpeg',
        350,100
    );
    
    $e->setDados(
        $_POST['hostname'],
        $_POST['ip'],
        $_POST['macAdress'],
        $_POST['patrimonio'],
        $_POST['modelo'],
        $_POST['setor']
    );
    
    $e->gerarEtiqueta();


?>