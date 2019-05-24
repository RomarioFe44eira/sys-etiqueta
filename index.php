<?php
    require 'config.php';
    @header('Content-Type: text/html; charset=utf-8');
    $arquivo_xml = simplexml_load_file(URL.'info.xml');
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>gEtiqueta</title>
    </head>
    
    <body class="body">
        <form action="run.php" method="post">
            <div style="background-color: silver; width: 35%;">
                <table border="1%" style="width: 100%;">
                    <tr align="center">
                        <td>Hostname</td>
                        <td><input type="text" name="hostname" value="MACHINE-C000"/></td>
                    </tr>
                    <tr align="center">
                        <td>Ip</td>
                        <td><input type="text" name="ip" value="177.168.0.0"/></td>
                    </tr>
                    <tr align="center">
                        <td>Mac</td>
                        <td><input type="text" name="macAdress" value="AA:BB:CC:DD:11:22"/></td>
                    </tr>
                    <tr align="center">
                        <td>Patrimônio</td>
                        <td><input type="text" name="patrimonio" value="56498"/></td>
                    </tr>
                    <tr align="center">
                        <td>Modelo</td>
                        <td><input list="modelo" name="modelo"></td>
                    </tr>
                    <tr align="center">
                        <td><label>Setor</label></td>
                        <td> <input list="setor" name="setor"></td>
                    </tr>
                </table>
            </div>
            
            <datalist id="modelo">
           
           <?php
                foreach($arquivo_xml->modelos->modelo as $key => $value){
                    echo '<option value="'.$value.'">';
                }
          
                echo '</datalist></br><datalist id="setor">';
          
                foreach($arquivo_xml->setores->setor as $key => $value){
                    echo '<option value="'.$value.'">';
                }
           ?>
            </datalist>
            <input type="submit" name="btn-incluir" value="Incluir"/>
        </form>
        
        <hr>
        
        <div style="background-color: silver; width: 75%;">
            <table border="1%" style="width: 100%;">
                 <tr align="center" style="font-style: italic;">
                    <th colspan="4">Etiquetas</th>
                </tr>
                
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
        
        </div>
        
    </body>
</html>