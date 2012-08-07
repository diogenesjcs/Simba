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
	var $validade;
	
	public function __construct($nom, $pro_reit, $value, $validad) {
		$this->nome = $nom;
		$this->pro_reitoria = $pro_reit;
		$this->valor = $value;
		$this->validade = $validade;
	}
	
}

?>