<?php

interface Veiculo {
    public function parar() : void;
    public function acelerar(int $velocidade) : void;
}

class CorPecaCarro{
    public $porta;
    public $paralama;
    public $teto;
    public $traseira;
}

class Carro implements Veiculo {

    private int $velocidadeAtual = 0;
    private int $velocidadeMaxima = 200;
    private CorPecaCarro $cor;    

    public function obtemEstadoMotor() {
        $giroLento = $this->velocidadeAtual == 0;
        $giroMedio = $this->velocidadeAtual > 0 && $this->velocidadeAtual < 50;

        if ($giroLento) 
            echo "\nmotor em marcha lenta ou desligado/parado";        
        else if ($giroMedio) 
            echo "\nmotor com o giro médio";        
        else {
            echo "\nmotor com giro alto";
        }
    }

    public function setarVelocidadeMaxima(int $velocidadeMaxima) {
        $this->velocidadeMaxima = $velocidadeMaxima;
    }

    public function obterStatusFuncionamentoCarro() {
        if ($this->velocidadeAtual == 0) {
            echo "\ncarro está parado!!!!"; return; 
        };
        echo "\ncarro está em movimento";
    }

    public function obterCor() : object {
        return $this->cor ?? [];
    }

    public function parar() : void {
        $this->velocidadeAtual;
        for ($i = $this->velocidadeAtual; $i = 0; $i-- ) {
            echo "carro desacelerando.... " . $this->velocidadeAtual + $i . "Km/h";            
        }
        $this->velocidadeAtual = 0;
        echo "\ncarro agora está parado!!!!";
    }

    public function pintar(CorPecaCarro $corPeca) : void {
        if (! $corPeca) {
            echo "não foram informadas as cores das peças"; return; 
        };
        $this->cor = $corPeca;
    }    

    private function velocidadeMaximaAtingida() {
        return $this->velocidadeAtual >= $this->velocidadeMaxima;
    }

    public function acelerar(int $velocidade) : void {
        if ($velocidade <= 0) { echo "velocidade a ser acelerada deve ser maior que zero"; return; }
        if ($this->velocidadeMaximaAtingida()) { echo "velocidade máxima"; return; }
        while ($velocidade > 0) {
            if ($this->velocidadeMaximaAtingida()) break;
            $this->velocidadeAtual++;
            echo "\n carro acelerando... " . $this->velocidadeAtual . "Km/h";
            usleep(40000);
            $velocidade--;            
        }        
    }
}


// SOLUCAO

$carroColorido = new Carro();
$carroColorido->setarVelocidadeMaxima(100);
$carroColorido->acelerar(10);
$carroColorido->obterStatusFuncionamentoCarro();
$carroColorido->obtemEstadoMotor();
$carroColorido->parar();
$carroColorido->obterStatusFuncionamentoCarro();
$carroColorido->obtemEstadoMotor();

//cores
$coresPecas = new CorPecaCarro();
$coresPecas->porta = "azul";
$coresPecas->traseira = "amarelo";
$coresPecas->teto = "verde";

$carroColorido->pintar($coresPecas);
echo "\n";
print_r($carro);
