$sql = ''
  SELECT
    tb_matricula.id,
    tb_alunos.nome AS aluno,
    tb_cursos.nome AS curso,
    tb_matricula.data_cadastro,
    tb_matricula.ativo
  FROM tb_matricula
  INNER JOIN tb_alunos ON tb_alunos.id = tb_matricula.id_aluno
  INNER JOIN tb_cursos ON tb_cursos.id = tb_matricula.ide_cursos";


  TABELA
    FOREACH($matriculas as $matricula):

    <?php echo matricula ['aluno'];?>

    <td>
        <?php
                if($matricula['Ativo']) == 1) {
                    echo "Ativo";
                }else{
                    echo "Inativo";
                ]
            ?>
    </td>

    <td>
        <?php
        echo date("d/m/Y H:i:s", strtime($matricula['data_matricula']));
        ?>
    </td>

    