<h1>Listar Usuarios</h1>
<?php

    require_once "../config/config.php";

    $sql = "SELECT * FROM usuarios";

    $res = $conexao -> query($sql);

    $qtd = $res -> num_rows;

    if ($qtd > 0){

        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
            //Nomes das tabelas
            print "<th>ID</th>";
            print "<th>NOME</th>";
            print "<th>EMAIL</th>";
            print "<th>DATA DE NASCIMENTO</th>";
            print "<th>ACOES</th>";

            print "</tr>";

        while($row = $res-> fetch_object()){
            print "<tr>";
            //Tabelas de dados
            print "<td>" . $row -> id . "</td>";
            print "<td>" . $row -> nome . "</td>";
            print "<td>" . $row -> email . "</td>";
            print "<td>" . $row -> data_nascimento . "</td>";

            //Botoes de acoes
            print "<td>
                <button onclick=\"location.href='?page=editar&id=". $row-> id ."';\" class= 'btn btn-success'> Editar </button>
                <button onclick= \"if(confirm('tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row ->id."';}else{false;}\" class='btn btn-danger'> Excluir </button>           
            </td>";

            print "</tr>";

        }

        print "</table>";
    }
    else{
        //Se não achar dados na tabela, então...
        print "<p class= 'alert alert-danger'> Não encontramos resultados! </p";
    }
?>