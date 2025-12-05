<?php
require_once '../config/database.php';
require_once '../classes/Curso.php';

$database = new Database();
$db = $database->getConnection();
$curso = new Curso($db);

if ($_POST) {
    $curso->nome = $_POST['nome'];
    $curso->carga_horaria = $_POST['carga_horaria'];
    $curso->periodo = $_POST['periodo'];
    $curso->valor = $_POST['valor'];
    $curso->categoria = $_POST['categoria'];
    $curso->ativo = $_POST['ativo'];

    if ($curso->create()) {
        $message = "Curso cadastrado com sucesso!";
    } else {
        $message = "Erro ao cadastrar curso.";
    }
}

$stmt = $curso->readAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Sistema Escola</a>
            <div class="navbar-nav">
                <a class="nav-link" href="../alunos/index.php">Alunos</a>
                <a class="nav-link active" href="index.php">Cursos</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Gerenciar Cursos</h2>

        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-4">
                <h4>Cadastrar Novo Curso</h4>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Carga Horária</label>
                        <input type="number" class="form-control" name="carga_horaria" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Período</label>
                        <select class="form-control" name="periodo" required>
                            <option value="">Selecione...</option>
                            <option value="manhã">Manhã</option>
                            <option value="vespertino">Vespertino</option>
                            <option value="noite">Noite</option>
                            <option value="dia inteiro">Dia Inteiro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Valor</label>
                        <input type="number" step="0.01" class="form-control" name="valor" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <select class="form-control" name="categoria" required>
                            <option value="">Selecione...</option>
                            <option value="Exatas">Exatas</option>
                            <option value="Humanas">Humanas</option>
                            <option value="Biológicas">Biológicas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="ativo" required>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>

            <div class="col-md-8">
                <h4>Lista de Cursos</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Carga Horária</th>
                            <th>Período</th>
                            <th>Valor</th>
                            <th>Categoria</th>
                            <th>Data Cadastro</th>
                            <th>Ativo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['carga_horaria']; ?>h</td>
                            <td><?php echo ucfirst($row['periodo']); ?></td>
                            <td>R$ <?php echo number_format($row['valor'], 2, ',', '.'); ?></td>
                            <td><?php echo $row['categoria']; ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($row['data_cadastro'])); ?></td>
                            <td><?php echo $row['ativo'] ? 'Sim' : 'Não'; ?></td>
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