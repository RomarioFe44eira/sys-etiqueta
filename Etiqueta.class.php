<?php
require 'config.php';

class Etiqueta{
    private $imagem;
    private $logo;
    private $header;
    private $width;
    private $height;
    
    private $hostname;
    private $ip;
    private $mac;
    private $patrimonio;
    private $modelo;
    private $setor;
    
    public function __construct($logo, $header, $width, $height){
        $this->logo = imagecreatefromjpeg($logo);
        $this->ctype = $header;
        $this->width = $width;
        $this->height = $height;
    }
    
    public function setDados($hostname, $ip, $mac, $patrimonio, $modelo, $setor){
       $this->hostname = strtoupper($hostname);
       $this->ip = $ip;
       $this->mac = strtoupper($mac);
       $this->patrimonio = $patrimonio;
       $this->modelo = strtoupper($modelo);
       $this->setor = strtoupper($setor);
    }
    
    public function getDados(){
        return array(
            $this->hostname,
            $this->ip, 
            $this->mac, 
            $this->patrimonio,
            $this->modelo,
            $this->setor
        );
    }
    
    private function getLabel($id){
        switch($id){
            case 0: return "HOSTNAME";
            case 1: return "IP";
            case 2: return "MAC";
            case 3: return "PATRIMONIO";
            case 4: return "MODELO";
            case 5: return "SETOR";
            default: return "INVALIDO";
        }
    }
    
    public function gerarEtiqueta(){
        header('Content-type:'.$this->ctype);
        $this->imagem = imagecreate($this->width, $this->height);
        $preto = imagecolorallocate($this->imagem,255,255,255); //Cria um fundo Branco
        $branco = imagecolorallocate($this->imagem,0,0,0); //Armazena uma cor
        
        $d;
   
        foreach($this->getDados() as $key => $value){
            if(!empty($value)){
                imagestring($this->imagem,10, 8,($key-$d)*15,$_GET["width"]." {$this->getLabel($key)} : {$value}".$_GET["height"], $branco); //Escreve na imagem
            }
            else{
                $d++;
            }
        }
        
        imagecopymerge($this->imagem, $this->logo , 280, 20, 0, 0,imagesx($this->imagem),imagesy($this->logo),100);
        ///imagepng($this->imagem);
        
        imagepng($this->imagem, WORKSPACE.'/img/etiquetas/'.$this->hostname.'.png');
        imagedestroy($this->imagem);
        
       header('location: img/etiquetas/'.$this->hostname.'.png');
        
    }
    
    public function validarDados(){
        $validate = array();
        
        $this->patrimonio = filter_var($this->patrimonio, FILTER_SANITIZE_NUMBER_INT);
        
        if (!filter_var($this->ip, FILTER_VALIDATE_IP)) 
            array_push($validate, 'ip-off');
        
        if (!filter_var($this->mac, FILTER_VALIDATE_MAC)) 
             array_push($validate, 'mac-off');
             
        
        return $validate;
        
    }
    
    
    
}   

