<?php
    require '../../config.php';
    
    
    echo "Redirecionamento para : " .URL;
    
    
    //header('location: '.URL);
    
   
    $path = WORKSPACE.'img/etiquetas';
    $diretorio = dir($path);
 
    header('Content-type: text/html');

    echo "<br><br>Lista de Arquivos do diretorio '<strong>".$path."</strong>':<br />";
    
    while($arquivo = $diretorio -> read()){
        echo "<a href='".$arquivo."'>".$arquivo."</a><br />";
    }
    
    $diretorio -> close();



?>