<?php
require_once '../controller/CalculoCtrl.php';

$objCalculoCtrl = new CalculoCtrl();

?>
<html>
    <head>
        <title>Pagina Inicial</title>
        <style>
table, th, td {
    border: 1px solid black;
}
</style>
    </head>
    <body>
        <table cellspacing="3" style="width: 50%; border: 2px solid black">
            <tr style="font-size: 16px;font-weight: bold"> 
                <td>Valor depositado</td>
                <td>Lucro:</td>
                <td>Valor total:</td>
            </tr>
            <?php
            if(isset($_SESSION['val'])){
                foreach($_SESSION['val'] as $array){
                    foreach($array as $a){
                ?>
            <tr style=" border: 1px solid black;"> 
                <td><?=$a['valorDepositado']?></td>
                <td><?=$a['lucro']?></td>
                <td><?=$a['valor']?></td>
            </tr>
            <?php
                    }
                }
            }
            ?>
            
        </table>
        <form action="telaCalculo.php" method="get">
            <br>
            Valor depositado: <input type="text" name="valorDepositado" value="<?=$objCalculoCtrl->valorDepositado?>">     Quantidade de meses: <input type="text" name="meses" value="<?=$objCalculoCtrl->meses?>">     Porcentagem: <input type="text" name="percent" value="<?=$objCalculoCtrl->percent?>">      
            <br>
            <input type="submit" value="Calcular">
            <br>
            <input type="submit" name="restart" value="restart">
        </form>
        
    </body>
</html>
