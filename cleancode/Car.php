<?php

namespace App\Services;

use App\Models\Garagem;
use PhpParser\Node\Stmt\Switch_;

class validaCarroService
{
    public $vA = 0; //velocidade atual    
    public $cor_portas;
    public $cor_capo;
    public $cor_paralama;
    public $cor_teto;
    public $cor_traseira;
    
    public static function carro($motor, $estado, $cor)    
    {

        //verifica motor do carro 

        if ($motor != 'off') {

            if ($motor == 'lenta') { return 'Motor com giro baixo';  
            }
            if ($motor == 'acelerado') {
                return 'Motor com o giro alto';
            }

            return 'Motor ligado';
        }

        //Verifica se o carro está andando ou parado

        if ($estado != 'parado') {
            if ($estado == 'Andando') {
                return 'Carro andando';
            }

            return 'Carro Parado';
        }

        //Retorna a cor do carro
        
        switch ($cor) {
            case 'preto':
                echo "Carro é preto";
                break;
            case 'azul':
                echo "Carro é azul";
                break;
            case 'vermelho':
                echo "Carro é vermelho";
                break;
        }
        
        $carro = $motor + $estado + $cor;

        return $carro;
    }

    public function stopCarro() {

        /* stop car devagarzinho */
        $vA = $this->vA;
        for ($i = $vA; $i = 0; $i-- ) {
            echo "carro desacelerando.... " . $vA + $i . "Km/h";
        }
        $this->vA = 0;
        echo "carro parado!";


    }

    public function pintar($p, $c, $pa, $t, $tr) {
        $this->cor_portas = $p;
        $this->cor_capo = $c;
        $this->cor_paralama = $pa;
        $this->cor_teto = $t;
        $this->cor_traseira = $tr;
    }

    public function Speed($v) {
        $vA = $this->vA;
        
        if ($v > 0) {

            if ($v > 100) { return "velocidade máxima"; }
                if ($v > 0 and $v < 100) {
                    for ($i = $vA; $i < ($vA + $v); $i++ ) {

                        echo "carro acelerado: " . $vA + $i;
                    }
            }
        }

        $this->vA = $vA;
    }
}
