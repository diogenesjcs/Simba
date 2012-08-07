<?php

/**
 * Classe que representa uma modalidade. Cada uma delas tem uma Pró-reitoria, um nome,
 * um valor fixo em reais e um tempo de duração, dito como validade.
 * 
 * @author Sergio Lisan
 */
class Modalidade {
	
	var $id;
	var $nome;
	var $pro_reitoria;
	var $valor;
	var $vencimento;
	
	public function __construct($nome, $pro_reit, $value, $vencimento) {
		$this->nome = $nome;
		$this->pro_reitoria = $pro_reit;
		$this->valor = $value;
		$this->vencimento = $vencimento;
	}
	
}

?>