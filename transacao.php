<?php
public function apagarUsuario() {
	
	try{
		#iniciando transação
		$pdo->beginTransaction();
	
		$linhas_afetadas = $pdo->exec('DELETE FROM usuario WHERE email = '.$pdo->quote($email));
	
		if($linhas_afetadas == 1){
			#se as linhas forem afetadas commit			
			$pdo->commit();
		}else{
			throw new Exception('Erro ao excluir usuario');
		}
	}catch(Exception $ex){
		#caso seja capturado uma exceção, é executado um rollback
		#para desfazer todos as alterações feitas no banco de dados.
		$pdo->rollBack();
		echo $ex->getMessage();
	}
}