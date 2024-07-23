<?php

session_start();

require_once '../../config/database.php';
require_once '../../Repository/ProdutosRepository.php';

use Repository\ProdutosRepository;

$produtos = (new ProdutosRepository($pdo))->all();
?>

<?php include '../../includes/header.php'; ?>

<div class="container">
    <div class="h-100 p-5 text-bg-light rounded-3 my-3">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-light">
                    <a href="/produtos">Produtos</a>
                </li>
                <li class="breadcrumb-item active">Saídas</li>
                <li class="breadcrumb-item active">Cadastrar</li>
            </ol>
        </nav>

        <h2>Cadastrar saída</h2>
    </div>

    <form action="/saidas/store.php" method="POST">
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
            <label for="data_saida" class="form-label">Data da saída</label>
            <input type="date" class="form-control" name="data_saida" id="data_saida" required>
        </div>
        <div class="mb-3">
            <label for="numero_controle_saida" class="form-label">Número de controle da saída</label>
            <input type="number" class="form-control" name="numero_controle_saida" id="numero_controle_saida" required>
        </div>
        <div class="mb-3">
            <label for="local_destino" class="form-label">Local de destino</label>
            <input type="text" class="form-control" name="local_destino" id="local_destino" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
