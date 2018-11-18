<?php
class CalculoCtrl{
    public $array = array();
    public $meses;
    public $valorDepositado;
    public $percent;
    public function CalculoCtrl(){
        session_start();
        if(isset($_POST['restart'])){
            session_destroy();
        }else{
            $this->calcula();

        }
    }
    public function calcula(){
     
        if(isset($_POST['valorDepositado']) && isset($_POST['percent']) && isset($_POST['meses'])){
            
            
            $this->valorDepositado = $valorDepositado = $_POST['valorDepositado'];
            $this->percent = $_POST['percent'];
            $percent = "1.".$_POST['percent'];
            $this->meses = $meses  = $_POST['meses'];
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
                $valor += $_POST['valorDepositado'];
                $valorDepositado += $_POST['valorDepositado'];
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
        

