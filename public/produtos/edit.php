<?php

session_start();

require_once '../../config/database.php';
require_once '../../Repository/ProdutosRepository.php';

use Repository\ProdutosRepository;

$produtoId = $_GET['id'];

$produtosRepository = new ProdutosRepository($pdo);

$produto = $produtosRepository->find($produtoId);
?>

<?php include '../../includes/header.php'; ?>

<div class="container">
    <div class="h-100 p-5 text-bg-light rounded-3 my-3">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-light">
                    <a href="/produtos">Produtos</a>
                </li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </nav>

        <h2>Editar produto <?php echo $produto->id; ?></h2>
    </div>

    <form action="/produtos/update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $produto->id; ?>">

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo $produto->descricao; ?>" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Responsável</label>
            <input type="text" class="form-control" name="responsavel" id="responsavel" value="<?php echo $produto->responsavel; ?>" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Estoque</label>
            <input type="number" class="form-control" name="estoque" id="estoque" value="<?php echo $produto->estoque; ?>" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Categoria</label>
            <input type="text" class="form-control" name="categoria" id="categoria" value="<?php echo $produto->categoria; ?>" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Subcategoria</label>
            <input type="text" class="form-control" name="subcategoria" id="subcategoria" value="<?php echo $produto->subcategoria; ?>" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>

<?php include '../../includes/footer.php'; ?>
