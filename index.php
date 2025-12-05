<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escola SENAC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Sistema Escola - Cadastro de Alunos e Cursos</a>
            <div class="navbar-nav">
                <a class="nav-link" href="alunos/index.php">Alunos</a>
                <a class="nav-link" href="cursos/index.php">Cursos</a>
                <a class="nav-link" href="matricula.php">Matrícula</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Sistema de Gestão Escolar</h1>
                <p class="text-center">Gerencie alunos e cursos da escola</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gerenciar Alunos</h5>
                        <p class="card-text">Cadastre, edite e visualize alunos</p>
                        <a href="alunos/index.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gerenciar Cursos</h5>
                        <p class="card-text">Cadastre, edite e visualize cursos</p>
                        <a href="cursos/index.php" class="btn btn-success">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Matrícula</h5>
                        <p class="card-text">Matricular Alunos</p>
                        <a href="alunos/index.php" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>