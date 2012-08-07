<?php

/**
 * Classe que representa um aluno
 * @author Sergio Lisan
 *
 */
class Aluno {
	
	var $matricula;
	var $nome;
	var $estado;
	var $bolsas;
	
	public function __construct($mat, $nome, $estado, $bolsas) {
		$this->matricula = $mat;
		$this->nome 		 = $nome;
		$this->estado 	 = $estado;		
		$this->bolsas    = $bolsas;
	}
}


/**
 * Enumeração usada para definir o status (ou estado) do aluno com relação a sua
 * posição na Universidade.
 * 
 * @author Sergio Lisan
 */
class Status {
	
	const RESIDENTE = "Aluno Residente";
	const EM_ESPERA = "Aluno em espera";
	const REGULAR   = "Aluno regularmente matriculado";
	const UAG       = "Aluno da UAG";
	const UAST      = "Aluno da  UAST";
	
}

?>