<?php
    include_once "Conexao.php";
    class Funcoes extends Conexao{
        public function listar(): array{
            $array_clientes = $this->connection->prepare("SELECT * FROM CLIENTES");
            $array_clientes->execute();
            return $array_clientes->fetchAll();
        }
        
        public function cadastrar(string $nome, string $telefone, string $sexo, string $email): bool{
            try{
                $sanitizate_nome = filter_var($nome, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $sanitizate_telefone = filter_var($telefone, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $sanitizate_sexo = filter_var($sexo, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $sanitizate_email = filter_var($email, FILTER_SANITIZE_EMAIL);
                $query = $this->connection->prepare("INSERT INTO CLIENTES VALUES(NULL ,:nome, :telefone, :sexo, :email)");
                $query_parms = ["nome" => $sanitizate_nome, "telefone" => $sanitizate_telefone, "sexo" => $sanitizate_sexo, "email" => $sanitizate_email];
                $query->execute($query_parms);
                return true;
            }
            catch(Exception $e){
                echo "Erro: {$e}";
                return false;
            }
        }
    }
?>