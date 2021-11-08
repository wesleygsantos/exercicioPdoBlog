<?php

    declare(strict_types=1);

    class Blog{

        private $conexao;

        // Conexão com o Mysql
        public function __construct()
        {

            try{
                $this->conexao = new PDO('mysql:host=localhost;dbname=blog','root','12345678');
            }catch(Exception $e){
                $e->getMessage();
                die();
            }

        }

        // Mostra a lista de todos os Posts cadastrados
        public function list() :  array{

            $sql = 'select * from post';

            $posts = [];

            foreach ($this->conexao->query($sql) as $key => $value){
                array_push($posts,$value);
            }

            return $posts;

        }

        // Adiciona um novo Post
        public function incluir($nome,$comentario) : int{

            $sql = 'insert into post (nome,comentario) values(?,?)';

            $prepare = $this->conexao->prepare($sql);
        
            $prepare->bindParam(1, $nome);
            $prepare->bindParam(2, $comentario);
            $prepare->execute();
        
            return $prepare->rowCount();

        }

        // Edita um Post já cadastrado
        public function editar($nome,$comentario,$id) : int{

            $sql = $sql = 'update post set nome = ?, comentario = ? where id = ?';

            $prepare = $this->conexao->prepare($sql);

            $prepare->bindParam(1,$nome);
            $prepare->bindParam(2,$comentario);
            $prepare->bindParam(3,$id);
            $prepare->execute();

            return $prepare->rowCount();

        }

        // Deleta um Post cadastrado
        public function deletar($id) : int{

            $sql = 'delete from post where id=?';

            $prepare = $this->conexao->prepare($sql);

            $prepare->bindParam(1, $id);
            $prepare->execute();

            return $prepare->rowCount();

        }

    }