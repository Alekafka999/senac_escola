<?php
require_once __DIR__ . '/Aluno.php';

class Matricula extends Aluno {
    public function __construct($db) {
        parent::__construct($db);
    }
}
?>
