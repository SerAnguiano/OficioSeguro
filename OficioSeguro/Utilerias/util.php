<?php
class Persona
{
    private $_usuario;
    private $_contrasennia;
 
    public function __construct($usuario,$contrasennia)
    {
        $this->_usuario = $usuario;
        $this->_contrasennia = $contrasennia;
    }
 
    public function getUsuario()
    {
        return $this->_usuario;
    }
 
    public function getContrasennia()
    {
        return $this->_contrasennia;
    }
 
    public function setContrasennia($contrasennia)
    {
        $this->_contrasennia = $contrasennia;
    }
}
?>