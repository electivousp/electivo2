<?php
if(isset($_POST["subir"]))
{
    //Subir archivo
    $origen = $_FILES['archivo']['tmp_name'];
    $destino = $_FILES['archivo']['name'];
    move_uploaded_file($origen, $destino);    
}
?>
<html>
    <body>
        <div>
        <p>:: Importar datos ::</p>
        <form method="post" action="importar.php" enctype="multipart/form-data">
            <input type="file" name="archivo" id="archivo" value="Seleccionar archivo" />
            <input type="submit" value="Leer" name="subir" />
            <input type="submit" value="Subir fichero" name="guardar" />
        </form>
        </div>
        <table>
            <tr>
                <th>Nro</th>
                <th>Descripci&oacute;n</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>            
            <?php
                if(isset($_POST["subir"]))
                {
                    $nombre=$_FILES['archivo']['name'];
                    $x = fopen($nombre,"r");    
                    $i=1;
                    while(!feof($x)){                    
                    $linea = explode(";",fgets($x));
                    if(strlen($linea[0])>0){
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$linea[0]."</td>";
                        echo "<td>".$linea[1]."</td>";
                        echo "<td>".$linea[2]."</td>";
                        echo "</tr>";
                        $i++;
                    }    
                    }
                    fclose($x);
                }    
            ?>
        </table>
    </body>
</html>



