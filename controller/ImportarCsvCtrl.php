<?php

class ImportarCsvCtrl {

    public $array = array();

    public function ImportarCsvCtrl() {
        $this->importar();
    }

    public function importar() {
        if (isset($_FILES['file'])) {
            $file = $_FILES['file']['tmp_name'];
            $file = file($file);
            $total = 0;
            $cont = 0;

            foreach ($file as $f) {
                if ($cont != 0) {
                    $linha = explode(";", $f);

                    $mes = date('m', strtotime($linha[3]));
                    $this->array[$mes][$linha[3]]['dia'] = date("d/m/Y", strtotime($linha[3]));
                    $this->array[$mes][$linha[3]]['lucroUs'] = $linha[4];
                    $this->array[$mes][$linha[3]]['lucroPe'] = $linha[2];
                    
                }

                $cont++;
            }
        }
    }

}
