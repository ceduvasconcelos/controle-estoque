<?php

session_start();

require_once '../../config/database.php';
require_once '../../Repository/ProdutosRepository.php';

use Repository\ProdutosRepository;

$produtosRepository = new ProdutosRepository($pdo);

$produtos = $produtosRepository->all();
?>

<?php include '../../includes/header.php'; ?>

<div class="container">
    <div class="h-100 p-5 text-bg-light rounded-3 my-3">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-light">
                    <a href="/produtos">Produtos</a>
                </li>
                <li class="breadcrumb-item active">Entradas</li>
                <li class="breadcrumb-item active">Cadastrar</li>
            </ol>
        </nav>

        <h2>Cadastrar entrada</h2>
    </div>

    <form action="/entradas/store.php" method="POST">
        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select class="form-select" name="produto_id" id="produto_id">
                <option selected>Selecione um produto</option>
                <?php foreach ($produtos as $produto) : ?>
                    <option value="<?php echo $produto->id; ?>"><?php echo $produto->descricao; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" class="form-control" name="quantidade" id="quantidade" required>
        </div>
        <div class="mb-3">
            <label for="data_entrada" class="form-label">Data da entrada</label>
            <input type="date" class="form-control" name="data_entrada" id="data_entrada" required>
        </div>
        <div class="mb-3">
            <label for="numero_nota_fiscal" class="form-label">Número da nota fiscal</label>
            <input type="text" class="form-control" name="numero_nota_fiscal" id="numero_nota_fiscal" required>
        </div>
        <div class="mb-3">
            <label for="fornecedor" class="form-label">Fornecedor</label>
            <input type="text" class="form-control" name="fornecedor" id="fornecedor" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
