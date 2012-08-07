<?php

/**
 * Classe que representa uma bolsa. Possui uma referência ao aluno bolsista,
 * à modalidade, tem um início e um fim que depende do vencimento da modalidade
 * para ser calculado.
 * 
 * @author Sergio Lisan
 *
 */
class Bolsa {
	
	var $id;
	var $aluno;
	var $inicio;
	var $fim;
	var $modalidade;

	public function __construct($aln, $ini, $mod) {
		$this->aluno = $aln;
		$this->inicio = $ini;
		$this->modalidade = $mod;
		
		calcFinal($modalidade->periodo);
	}
	
	/**
	 * Calcula o dia em que a bolsa vai vencer.
	 * @param Date $periodo tempo de duração da bolsa
	 */
	private function calcFinal($periodo) {
		// TODO Precisa definir um Objeto data para realizar o cálculo
	}

}

?>