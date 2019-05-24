<html>
    <head>
        <meta charset="utf-8">
        <title>gEtiqueta</title>
        <style type="text/css">
        .table-image, td{
            border-collapse: collapse;
            border: 1px solid black;
            width: auto;
        }
        
        img{
            width:250px;
        }
            
        </style>
        
    </head>
    
    <body>
        
        <table class="table-image">
            <?php
                require 'config.php';
                $path = WORKSPACE.'img/etiquetas';
                $diretorio = dir($path);
            
                
                $dirbase = array();
                while($arquivo = $diretorio->read()){
                    if($arquivo != '.' && $arquivo != '..' && $arquivo != 'index.php'){
                        array_push($dirbase, "<td><img src='".URL."/img/etiquetas/$arquivo'></td>");
                    }
                }
                
                $cont = 0;
                echo '<tr>';
                
                foreach($dirbase as $key => $value){
                    if($cont == 3){
                        echo $value.'</tr>';
                        $cont = 0;
                    }else{
                         echo $value;
                         $cont++;
                    }
                    
                    
                    /*($cont == 3)? $cont = 0 : $cont++;*/
                }
                
                
             $diretorio->close();
            ?>
            
        </table>
    </body>
</html>