<?php
   
   $etq = simplexml_load_file("etiquetas.xml");
    
    foreach ($etq->host as $host) {
        printf("<p>%s appeared in %d and was created by %s.</p>", $host["name"], $host->appeared, $host->creator);
    }
    
    