<?php

    declare(strict_types=1);

    require 'blog.php';

    $blog = new blog();

    switch($_GET['operacao']){

        case 'list':

            echo '<h3>Post: </h3>';

            foreach ($blog->list() as $value){
                echo 'Id: ' . $value['id'] . '<br> Nome: ' . $value['nome'] . '<br> Comentário: '. 
                $value['comentario'] . '<hr>';
            }
            break;

        case 'incluir':

            $status = $blog->incluir('Wesley','Segundo Post');

            if(!$status){
                echo 'Não foi possivel executar a operação!';
                return false;
            }

            echo "Post cadastrado com sucesso!";
            break;

        case 'editar':

            $status = $blog->editar('Ana Paula','Post RH',2);

            if(!$status){
                echo 'Não foi possivel executar a operação!';
                return false;
            }

            echo "Post alterado com sucesso!";
            break;

        case 'deletar':

            $status = $blog->deletar(4);

            if(!$status){
                echo 'Não foi possivel executar a operação!';
                return false;
            }

            echo "Post deletado com sucesso!";
            break;

    }

    
