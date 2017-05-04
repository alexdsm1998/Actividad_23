<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulario de actualizacion</title>
  </head>
  <body>
    <form action="actualizardB.php" method="post">
      Nombre:<br>
      <input type="text" name="Nombre" value=<?=$_GET["Nombre"]?> readonly><br>
      Ciudad:<br>
      <input type="text" name="Ciudad" value="<?=$_GET["Ciudad"]?>"><br>
      Conferencia:<br>
      <input type="text" name="Conferencia" value="<?=$_GET["Conferencia"]?>"><br>
      Division:<br>
      <input type="text" name="Division" value=<?=$_GET["Division"]?>><br>
      <input type="submit" name="" value="Actualizar">
    </form>
  </body>
</html>
