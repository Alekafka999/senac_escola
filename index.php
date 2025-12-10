<?php
$sql = "
  SELECT
    tb_matricula.id,
    tb_alunos.nome AS aluno,
    tb_cursos.nome AS curso,
    tb_matricula.data_cadastro,
    tb_matricula.ativo
  FROM tb_matricula
  INNER JOIN tb_alunos ON tb_alunos.id = tb_matricula.id_aluno
  INNER JOIN tb_cursos ON tb_cursos.id = tb_matricula.id_cursos
";

if (isset($matriculas)) {
    foreach($matriculas as $matricula): ?>

    <tr>
        <td><?php echo $matricula['aluno']; ?></td>
        <td><?php echo $matricula['curso']; ?></td>

        <td>
            <?php
                if ($matricula['ativo'] == 1) {
                    echo "Ativo";
                } else {
                    echo "Inativo";
                }
            ?>
        </td>

        <td>
            <?php
            echo date("d/m/Y H:i:s", strtotime($matricula['data_cadastro']));
            ?>
        </td>
    </tr>
    <?php endforeach;
}
?>

