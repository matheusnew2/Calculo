<?php
require_once '../controller/CalculoCtrl.php';

$objCalculoCtrl = new CalculoCtrl();

?>
<html>
    <head>
        <title>Pagina Inicial</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body class="body" style="margin-left: 5px;margin-right: 5px">
        <table class="table table-dark" >
            <tr class="tr"style="font-size: 16px;font-weight: bold"> 
                <td>#</td>
                <td>Valor depositado</td>
                <td>Lucro:</td>
                <td>Valor total:</td>
            </tr>
            <?php
            if(isset($_SESSION['val'])){
                $cont = 1;
                foreach($_SESSION['val'] as $array){
                    foreach($array as $a){
                ?>
            <tr> 
                <td><?=$cont?></td>
                <td>R$ <?= number_format($a['valorDepositado'], 2, ",",".")?></td>
                <td>R$ <?= number_format($a['lucro'], 2, ",",".")?></td>
                <td>R$ <?= number_format($a['valor'], 2, ",",".")?></td>
            </tr>
            <?php
            $cont++;
                    }
                }
            }
            ?>
            
        </table>
        <form action="telaCalculo.php" method="POST" class="form-group" enctype="multipart/form-data">
            <div class="">
                <div class="row" >
                    <div class="col-lg-6">
                        Valor depositado: <input type="text" class="form-control"  name="valorDepositado" value="<?=$objCalculoCtrl->valorDepositado?>"> 
                    </div> 
                    <div class="col-lg-6">
                        Quantidade de meses: <input type="text" name="meses" class="form-control"   value="<?=$objCalculoCtrl->meses?>"> 
                    </div>
                    <div class="col-lg-12">
                        Porcentagem: <input type="text" class="form-control"   name="percent" value="<?=$objCalculoCtrl->percent?>">      
                    </div>

                    <div style="padding-top: 5px; padding-left: 15px">
                        <input class="btn btn-success" type="submit" value="Calcular">
                        <input class="btn btn-danger"  type="submit" name="restart" value="Restart">    
						<input class="btn btn-warning" type="button" name="compra_venda" onclick="window.location.href='calc_compra_vende.php'" value="Comprar / Vender">
						<a onclick="window.open('importarCsv.php')">
							<input type="button" value="Importar" class=" btn btn-primary" >
						</a>                       
                    </div>
                </div>
            </div>                    
        </form>
        
    </body>
</html>
