<?php
require_once '../config/database.php';


$database = new Database();
$db = $database->getConnection();
$aluno = new Matricula($db);

if ($_POST) {
    $matricula->nome = $_POST['nome'];
    $matricula->email = $_POST['email'];
    $matricula->cpf = $_POST['cpf'];
    $matricula->telefone = $_POST['telefone'];
    $matricula->ativo = $_POST['ativo'];

    if ($aluno->create()) {
        $message = "Aluno cadastrado com sucesso!";
    } else {
        $message = "Erro ao cadastrar aluno.";
    }
}

$stmt = $aluno->readAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Alunos</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Sistema Escola</a>
            <div class="navbar-nav">
                <a class="nav-link active" href="index.php">Alunos</a>
                <a class="nav-link" href="../cursos/index.php">Cursos</a>
                <a class="nav-link" href="matricula.php">Matrícula</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Gerenciar Matrículas</h2>

        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-4">
                <h4>Fazer Nova Matrícula</h4>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CPF</label>
                        <input type="text" class="form-control" name="cpf" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="ativo" required>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>

            <div class="col-md-8">
                <h4>Lista de Alunos</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Data Cadastro</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['cpf']; ?></td>
                            <td><?php echo $row['telefone']; ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($row['data_cadastro'])); ?></td>
                            <td><?php echo $row['ativo'] ? 'Ativo' : 'Inativo'; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>