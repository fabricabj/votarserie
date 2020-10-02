<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Problema</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="funciones.js" language="JavaScript"></script>
    <style>
       body{
           background:#212121;
       }
       .form input{
            width:70%;
       }
       .form select{
        width:70%;
       }
       h3{
           color:white;
       }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8" align="center">
                <h3>Vote esta serie</h3>
                <img src="img.jpg" alt="La musa de oro' de Picasso llega a los 56'2 millones" HEIGHT="400">
                <form method="post" action="index.php" class="form">
                  <div class="form-group">
                     <label>Nombre</label>
                     <input type="text" class="form-control" name="nombre" placeholder="ingrese nombre">
                  </div>
                  <div class="form-group">
                       <label>Voto</label>
                       <select name="puntaje" class="form-control">
                          <option value="0" selected>seleccione</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                       </select><br>
                       <input class="btn btn-dark" type="submit" value="votar" name="confirmar">
                  </div>
               </form>
            </div>
            <div class="col-md-4">
            <h3 align="center">Votos</h3>
            <div id="result" style="border: 1px solid white;overflow-y: scroll;background:#121212;padding-top:15px;color:white">
            <div style="height:600px">
               <?php
                   if (isset($_REQUEST['confirmar'])) {
                        $ar=fopen("puntaje.txt","a") or die("No se pudo abrir el archivo");
                        fputs($ar,"Nombre: ".$_REQUEST['nombre']."<br>");
                        if($_REQUEST['puntaje']<6){
                           fputs($ar,"Voto: <span style='color:red'>".$_REQUEST['puntaje']."</span><br><br>");
                        }else{
                           fputs($ar,"Voto: <span style='color:green'>".$_REQUEST['puntaje']."</span><br><br>");
                        }
                        fclose($ar);
                        $ar=fopen("puntaje.txt","r") or die("No se pudo abrir el archivo");
                        while (!feof($ar)){
                           $linea=fgets($ar);
                           echo $linea;
                        }
                        fclose($ar);
                   } 
                ?>
            </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>