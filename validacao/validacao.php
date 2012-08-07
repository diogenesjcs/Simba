<?php

include '../commons/Aluno.php';
include '../commons/Modalidade.php';
include '../commons/Bolsa.php';

/**
 * Função que valida uma bolsa
 * @param Bolsa $bolsa
 */
function validate($bolsa) {
	$bolsista   = $bolsa->aluno;
	
	// Verificação para alunos residentes
	if ($bolsista->estado == Status::RESIDENTE) {
		$num_bolsa = count($bolsista->bolsas);		
		// verifica se o aluno tem duas bolsas. Caso tenha mais duas, já é invalidado
		if ($num_bolsa >= 2)
			return false;
		// Verifica se a modalidade é um dos tipos permitidos para esse aluno e depois verifica se 
		// essa bolsa já existe ou não, dentro do cadastro de alunos.
		if ( ($bolsa->modalidade->nome == 'RU') || ($bolsa->modalidade->nome == 'RESTAURANTE') ) {
			if (in_array($bolsa->modalidade->nome, $bolsista->bolsas))			
				return false;		
		} else {
			return false;
		}
		
		
	// Verifica para bolsistas em espera
	} else if ($bolsista->estado == Status::EM_ESPERA) {
		$num_bolsa = count($bolsista->bolsas);		
		if ($num_bolsa >= 3)
			return false;
		// Se ja tiver uma bolsa cadastrada, ou nehuma, verifica se a bolsa é RU, TRANSPORTE,
		//  ou MANUTENÇÃO.
		if (   ($bolsa->modalidade->nome == 'RU') || ($bolsa->modalidade->nome == 'TRANSPORTE')  
				|| ($bolsa->modalidade->nome == 'MANUTENÇÃO')  ) {			
			if (in_array($bolsa->modalidade->nome, $bolsista->bolsas))			
				return false;				
		}	else {
			return false;
		}
		
		
	// Verifica para alunos regularmente matriculados	
	} else if ($bolsista->estado == Status::REGULAR) {
		$num_bolsa = count($bolsista->bolsas);
		if ($num_bolsa >= 3)
			return false;		
		if (   ($bolsa->modalidade->nome == 'RU') || ($bolsa->modalidade->nome == 'TRANSPORTE')
				|| ($bolsa->modalidade->nome == 'MANUTENÇÃO')  ) {			
			if (in_array($bolsa->modalidade->nome, $bolsista->bolsas))			
				return false;			
		} else {
			return false;
		}
		
		
	// Verifica para os alunos que estudam na UAG
	} else if ($bolsista->estado == Status::UAG) {
		$num_bolsa = count($bolsista->bolsas);
		if ($num_bolsa >= 5)
			return false;
		if (($bolsa->modalidade->nome == 'RESIDÊNCIA') || ($bolsa->modalidade->nome == 'TRANSPORTE')  ||
				($bolsa->modalidade->nome == 'MANUTENÇÃO') || ($bolsa->modalidade->nome == 'ALIMENTAÇÃO') ||
				($bolsa->modalidade->nome == 'EVENTOS') ) {
			if (in_array($bolsa->modalidade->nome, $bolsista->bolsas) )
				return false;
		} else {
			return false;
		}

	// Verificam por Alunos da UAST
	} else if ($bolsista->estado == Status::UAST) {
		$num_bolsa = count($bolsista->bolsas);
		if ($num_bolsa >= 4)
			return false;
		if (($bolsa->modalidade->nome == 'EVENTOS')    || ($bolsa->modalidade->nome == 'TRANSPORTE')  ||
				($bolsa->modalidade->nome == 'MANUTENÇÃO') || ($bolsa->modalidade->nome == 'ALIMENTAÇÃO') )	 {
			if (in_array($bolsa->modalidade->nome, $bolsista->bolsas) )
				return false;
		} else {
			return false;
		}
	}
	
	// Outras validações
	else {
		// Pega o nome das bolsas do bolsista
		$nomes_bolsas = array();
		foreach ($bolsista->bolsas as $bols) {
			array_push($nomes_bolsas, $bols->modalidade->nome);
		}
		// Verifica se uma das bolsas conflitantes já está cadastrada. Se estiver, a bolsa é recusada.
		if (in_array($nomes_bolsas, 'APOIOACADÊMICO') || in_array($nomes_bolsas, 'INFORMÁTICA') || 
				in_array($nomes_bolsas, 'CORAL') || in_array($nomes_bolsas, 'MONITORIA') )
			return false;
	}
	
	// Se passar por todas as validações, retorna verdadeiro
	return true;
}

?>