<?php
/**
 * 
 */
class Conexao{

	public $pdo;
	public $host;
	public $banco;
	public $usuario;
	public $senha;
	public $nome;



	public function __construct(){
		$this->host = 'localhost'; 
		$this->porta = '3306';
		$this->banco = 'sis_alugueis';
		$this->usuario = 'root';
		$this->senha = '';
		$this->conecta();	
	}
	// Connecting, selecting database
	public function conecta(){

	$this->pdo = new PDO("mysql:dbname=$this->banco;host=$this->host", $this->usuario, $this->senha); 
	return $this->pdo;
	}

}
