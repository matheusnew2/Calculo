<?php
require_once '../controller/ImportarCsvCtrl.php';
$objImportarCsvCtrl = new ImportarCsvCtrl();
$geral = 0;
$dolar = 0;
?>
<html>
    <head>
        <title>Importar CSV</title>
        
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
            <?php
                if(count($objImportarCsvCtrl->array)>0){
                 
                    foreach($objImportarCsvCtrl->array as $array){
                        
                    ?>
         <table class="table table-dark">
            <tr>
                <td>Dia</td>
                <td>Lucro US$</td>
                <td>Lucro %</td>
            </tr>
            <?php
                        $total = 0;
                        foreach($array as $a){
                            $total += $a['lucroPe'];
                            $dolar += doubleval($a['lucroUs']);
                        ?>
            <tr>
                <td><?=$a['dia']?></td>
                <td><?=$a['lucroUs']?></td>
                <td><?=$a['lucroPe']?></td>
            </tr>
            <?php
                        }
                        ?>
         </table>
        <?php
                        $geral += $total;
                        echo "O total é:".$total;

                    }
                }
            ?>
        <br>  A quantia final é %<?=$geral?> O lucro é de US$ <?=$dolar?>
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="file"  name="file">
            <input type="submit" value="Enviar" class="btn" name="enviar">
        </form>
    </body>
</html>

