<?php

session_start();

require_once '../../config/database.php';
?>

<?php include '../../includes/header.php'; ?>

<div class="container">
    <div class="h-100 p-5 text-bg-light rounded-3 my-3">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-light">
                    <a href="/produtos">Produtos</a>
                </li>
                <li class="breadcrumb-item active">Cadastrar</li>
            </ol>
        </nav>

        <h2>Cadastrar produto</h2>
    </div>

    <form action="/produtos/store.php" method="POST">
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Responsável</label>
            <input type="text" class="form-control" name="responsavel" id="responsavel" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Estoque</label>
            <input type="number" class="form-control" name="estoque" id="estoque" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Categoria</label>
            <input type="text" class="form-control" name="categoria" id="categoria" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Subcategoria</label>
            <input type="text" class="form-control" name="subcategoria" id="subcategoria" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
