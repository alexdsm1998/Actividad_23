<?php
/**
 * Permitir la conexion contra la base de datos
 */
class db
{
  //Atributos necesarios para la conexion
  private $host="localhost";
  private $user="root";
  private $pass="";
  private $db_name="nba";
  //Conector
  private $conexion;
  //Propiedades para controlar errores
  private $error=false;
  function __construct()
  {
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
      }
  }
  //Funcion para saber si hay error en la conexion
  function hayError(){
    return $this->error;
  }

  //function insercion contra la tabla usuarios
  //Devolvemos el ultimo equipo insertado.
    public function DevolverEquipoNombre($nombre)
    {
      $equipo="SELECT * FROM equipos WHERE Nombre='" .$nombre ."'";
      if($this->error==false){
        $resultado = $this->conexion->query($equipo);
        return $resultado;
      }else{
        return null;
      }
    }
  //function insercion contra la tabla usuarios
  public function insertarEquipo($Nombre,$Ciudad,$Conferencia,$Division){
    if($this->error==false)
    {
      $insert_sql="INSERT INTO equipos (Nombre, Ciudad, Conferencia, Division) VALUES ('".$Nombre."', '".$Ciudad."','".$Conferencia."', '".$Division."')";
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló la insercion de la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
  //function actualizar contra la tabla usuarios
  public function actualizarequipo($Nombre,$Ciudad,$Conferencia,$Division){
    if($this->error==false)
    {
      $insert_sql="UPDATE equipos SET Nombre='".$Nombre."', Ciudad='".$Ciudad."', Conferencia='".$Conferencia."', Division='".$Division."' WHERE Nombre='".$Nombre."'";
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló la actualizacion de la tabla: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
  //function borrar contra la tabla usuarios
  public function borrarEquipo($Nombre){
    if($this->error==false)
    {
      $insert_sql="DELETE FROM equipos WHERE Nombre='".$Nombre."'";
      if (!$this->conexion->query($insert_sql)) {
        echo "Falló el borrado del usuario: (" . $this->conexion->errno . ") " . $this->conexion->error;
        return false;
      }
      return true;
    }else{
      return false;
    }
  }
  //Devolvemos la lista de equipos.
 public function ListaEquipos()
 {
   $equipos="SELECT * FROM equipos";
   if($this->error==false){
     $resultado = $this->conexion->query($equipos);
     return $resultado;
   }else{
     return null;
   }
 }

 function devolverEquipos(){
   $tabla=[];
   if($this->error==false){
     $resultado = $this->conexion->query("SELECT * FROM equipos");
     while($fila=$resultado->fetch_assoc()){
       $tabla[]=$fila;
     }
     return $tabla;
   }else{
     return null;
   }
 }
}
 ?>
