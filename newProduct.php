<?php
    $mysql = array(
        'server' => 'localhost',
        'user' => 'id21722465_nunes_sport',
        'bank' => 'id21722465_nunes_sport_vendas',
        'password' => 'Desafio-123'

    );
    $MySQLi = new MySQLi($mysql['server'], $mysql['user'],$mysql['password'],$mysql['bank']);
    if($MySQLi -> connect_error){ echo mysqli_connect_error(); }

    if(isset($_GET['ver'])){
        $sql = "SELECT * FROM `Vendas_Nunes_Sports`";
        $result = $MySQLi->query($sql) or trigger_error($MySQLi->error);

        while($r = mysqli_fetch_assoc($result)){
            echo "Nome: ".$r['Nome_Produto']."; Código: ".$r['Codigo_Produto']."; ID: ".$r['ID']."<br>";
            echo "Preço: ".$r['Preco_Produto']."<br>";
            echo "Descrição: ".$r['Descricao_Produto']."<br>"."<br>";
        }
    }
    if(isset($_GET['adicionar'])){
        $n = addslashes($_GET['nome']);
        $c = addslashes($_GET['codigo']);
        $d = addslashes($_GET['descricao']);
        $p = addslashes($_GET['preco']);

        $insert = "INSERT INTO `Vendas_Nunes_Sports` (`ID`, `Nome_Produto`, `Codigo_Produto`, 
                `Descricao_Produto`, `Preco_Produto`) VALUES (NULL, '$n', '$c', 
                 '$d', '$p')";
        $MySQLi->query($insert) or trigger_error($MySQLi->error);
        echo "Produto adicionado com sucesso.<br> Retorne para visualizar a tabela completa.";
    }
    if(isset($_GET['editar'])){
        $id = addslashes($_GET['id']);
        $col = addslashes($_GET['coluna']);
        $value = addslashes($_GET['novo']);

        $change = "UPDATE `Vendas_Nunes_Sports` SET `$col` = '$value' 
                WHERE `Vendas_Nunes_Sports`.`ID` = $id";
        $MySQLi->query($change) or trigger_error($MySQLi->error);
        echo "Produto editado com sucesso.<br> Retorne para visualizar a tabela completa.";
    }
    if(isset($_GET['deletar'])){
        $id = addslashes($_GET['id_del']);

        $delete = "DELETE FROM `Vendas_Nunes_Sports` 
                WHERE `Vendas_Nunes_Sports`.`ID` = $id";
        $MySQLi->query($delete) or trigger_error($MySQLi->error);
        echo "Produto deletado com sucesso.<br> Retorne para visualizar a tabela completa.";
    }
    
    
    $MySQLi->close();
?>