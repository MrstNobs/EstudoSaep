<?php

    class lista {
        public function addLista($email,$descricao) {
            try {
            
                $sql = "Insert into lista Values (?,?,?)";
        
                $stmt = Conexao::getConexao()->prepare($sql);
        
                $stmt->bindValue(1,'0');
                $stmt->bindValue(2,$descricao);
                $stmt->bindValue(3,$email);
        
                $stmt->execute();
        
                return true;
            } 
        
            catch (Exception $ex) {
                return false;
            }
        }
    
        public function removeLista($email) {
            try{
                $sql = "delete from lista where usuario=?";
            
                $stmt = Conexao::getConexao()->prepare($sql);
                $stmt->bindValue(1,$email);
            
                $stmt->execute();
            
                if($stmt->rowCount()>0){
                    return 'Lista Excluida';              
                } else{
                    return 'Nenhuma lista excluida';
                }
            } 
            
            catch (Exception $ex) {
                return 'Erro ao excluir lista';
            }
        }
    }
?>