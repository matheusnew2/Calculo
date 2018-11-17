<?php
class CalculoCtrl{
    public $array = array();
    public $meses;
    public $valorDepositado;
    public $percent;
    public function CalculoCtrl(){
        session_start();
        if(isset($_GET['restart'])){
            session_destroy();
        }else{
            $this->calcula();

        }
    }
    public function calcula(){
        if(isset($_GET['valorDepositado']) && isset($_GET['percent']) && isset($_GET['meses'])){
            $this->valorDepositado = $valorDepositado = $_GET['valorDepositado'];
            $this->percent = $_GET['percent'];
            $percent = "1.".$_GET['percent'];
            $this->meses = $meses  = $_GET['meses'];
            $valor = $valorDepositado;
            if(isset($_SESSION['val'])){
                $valor = $_SESSION['total']; 
                $valorDepositado = $_SESSION['total']; 
            }
            $this->array[0]['valorDepositado'] = $valorDepositado;
            $this->array[0]['valor'] = ($valor * $percent);
            $this->array[0]['lucro'] = ($valor * $percent) - $valor;
            $valor = $valor * $percent;
            for($i=1;$i<=$meses-1;$i++)
            {
                $valor += $_GET['valorDepositado'];
                $valorDepositado += $_GET['valorDepositado'];
                $this->array[$i]['valorDepositado'] = $valorDepositado;
                $this->array[$i]['valor'] = ($valor * $percent);
                $this->array[$i]['lucro'] = $valor * $percent - $valor;
                $valor = $valor * $percent;

            }
            $_SESSION['val'][] = $this->array;
            $_SESSION['total']  = $valor;
        }
    }
}
        

