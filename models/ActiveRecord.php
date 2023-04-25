<?php

namespace Model;

class ActiveRecord {
      // base de datos
      protected static $db;
      protected static $columnasDb = [];
      protected static $tabla = '';
  
      // Errores 
      public static $errores = [];
  
  
  
      // definir la conexion a la db
      public static function setDB($database) {
          self::$db = $database;
      }
  
   
  
      public function guardar() {
          if( !is_null($this->id)) {
              // Actualizar
              $this->actualizar();
          } else {
              // Creando un nuevo registros
              $this->crear();
          }
      }
  
      public function crear() {
          
          // Sanitizar los datos
          $atributos = $this->sanitizarAtributos();
  
           // Insetar en la base de datos
          $query = " INSERT INTO " . static::$tabla . " ( ";
          $query .= join(', ', array_keys($atributos));
          $query .= " ) VALUES ('";
          $query .= join("', '", array_values($atributos));
          $query .= "') ";
  
         $resultado = self::$db->query($query);
         
          // Mensaje de exito
          if($resultado) {
              // Redireccionar
  
              header('Location: /admin?resultado=1');
          }
           
      }
  
      public function actualizar() {
          // Sanitizar los datos
          $atributos = $this->sanitizarAtributos();
  
          $valores = [];
          foreach($atributos as $key => $value) {
              $valores[] = "{$key}='{$value}'";
          }
          $query = " UPDATE " . static::$tabla . " SET ";
          $query .= join(', ', $valores);
          $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' " ;
          $query .= " LIMIT 1 ";

      
  
          $resultado = self::$db->query($query);
          
            
          if($resultado) {
              // Redireccionar
  
              header('Location: /admin?resultado=2');
          }
      }
  
  
      // Subida de Archivos
      public function setImagen($imagen) {
          // Elimina la imagen previa
          if(!is_null($this->id) ) {
             $this->borrarImagen();
             
          }
          // Asignar al atributo de imagen el nombre de la imagen
          if($imagen) {
              $this->imagen = $imagen;
          }
      }
  
      // Eliminar imagen
      public function borrarImagen() {
          $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
          if($existeArchivo) {
               unlink(CARPETA_IMAGENES . $this->imagen);
          }
      }
  
      // Eliminar un registro
      public function eliminar() {
          $query = " DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
          
          $resultado = self::$db->query($query);
  
          if($resultado) {
              $this->borrarImagen();
              header('location: /admin?resultado=3');
          }
      }
  
      // Identificar y unir los atributos de la BD
      public function atributos(){
          $atributos = [];
          foreach(static::$columnasDb as $columna) {
              if ($columna === 'id') continue;
              $atributos[$columna] = $this->$columna;
          }
          return $atributos;
      }
  
      public function sanitizarAtributos () {
          $atributos = $this->atributos();
          $sanitizado = [];
  
          foreach($atributos as $key => $value) {
              $sanitizado[$key] = self::$db->escape_string($value);
          }
          return $sanitizado;
      }
  
      // Validacion 
      public static function getErrores() {
          return static::$errores;
      }

     public function validar() {
          
          static::$errores = [];    
          return static::$errores;
     }

     // Lista de todas las registros
     public static function all(){
          $query = "SELECT * FROM " . static::$tabla;

          
  
          $resultado = self::consultaSQL($query);
  
          return $resultado;
     }
     // Busca un registro por su ID 
     public static function find($id) {
          $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
            
          $resultado = self::consultaSQL($query);

          return array_shift($resultado);
     }
  
     public static function consultaSQL($query) {
          // consultar la base de datos
         
          $resultado = self::$db->query($query);
  
          // iterar los resultados
          $array = [];
          while($registro = $resultado->fetch_assoc()) {
              $array[] = static::crearObjeto($registro);
          }
          
          // Liberar la memoria
          $resultado->free();
  
          // retornar los resultados
          return $array;
     }
  
     protected static function crearObjeto($registro) {
          $objeto = new static;
  
          foreach($registro as $key => $value) {
              if(property_exists($objeto, $key)) {
                  $objeto ->$key = $value;
              }
          }
          return $objeto;
     }
     
     // sincroniza l objeto en memoria con los cambios realizados por el usuario
     public function sincronizar( $args = []) {
          foreach($args as $key => $value ) {
              if(property_exists($this, $key) && !is_null($value)) {
                  $this->$key = $value;
              }
          }
     }

     // Obtiene un determinado numereo de registros
     public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

        

        $resultado = self::consultaSQL($query);

        return $resultado;
   }
}