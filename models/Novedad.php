<?php
namespace Model;

class Novedad extends ActiveRecord
{
    protected static $tabla = 'novedad';
    protected static $columnasDB = ['novedad_descripcion', 'novedad_situacion'];
    protected static $idTabla = 'novedad_id';

    public $novedad_id;
    public $novedad_descripcion;
    public $novedad_situacion;

    public function __construct($args = [])
    {
        $this->novedad_id = $args['novedad_id'] ?? null;
        $this->novedad_descripcion = utf8_decode(mb_strtoupper($args['novedad_descripcion'])) ?? '';
        $this->novedad_situacion = $args['novedad_situacion'] ?? 1;
        
    }
  
    public static function obtenerNovedad()
    {
        $sql = "SELECT * FROM novedad WHERE novedad_situacion = 1";
        return self::fetchArray($sql);
    }

    
    public static function validarNovedad()
    {
        $datos = utf8_decode(mb_strtoupper($_POST['novedad_descripcion']));
        $sql = "SELECT novedad_descripcion 
                FROM novedad 
                WHERE novedad_situacion = 1 
                AND UPPER(novedad_descripcion) = '$datos'";
    
        return self::fetchArray($sql);
    }
    
    
}