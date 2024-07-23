<?php

session_start();

require_once '../../../config/database.php';
require_once '../../../Repository/ProdutosRepository.php';
require_once '../../../Repository/EntradasRepository.php';

use Repository\EntradasRepository;
use Repository\ProdutosRepository;

$produtoId = $_GET['id'];

$produtosRepository = new ProdutosRepository($pdo);
$entradasRepository = new EntradasRepository($pdo);

$produto = $produtosRepository->find($produtoId);
$entradas = $entradasRepository->getByProdutoId($produtoId);
?>

<?php include '../../../includes/header.php'; ?>

<div class="container">
    <div class="h-100 p-5 text-bg-light rounded-3 my-3">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-light">
                    <a href="/produtos">Produtos</a>
                </li>
                <li class="breadcrumb-item active">Entradas</li>
            </ol>
        </nav>

        <h2>Entradas do produto <?php echo $produto->id; ?></h2>
    </div>

    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Data da entrada</th>
            <th scope="col">Número da nota fiscal</th>
            <th scope="col">Fornecedor</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($entradas as $entrada) : ?>
            <tr>
                <th scope="row"><?php echo $entrada->id; ?></th>
                <td><?php echo $entrada->quantidade; ?></td>
                <td><?php echo $entrada->data_entrada; ?></td>
                <td><?php echo $entrada->numero_nota_fiscal; ?></td>
                <td><?php echo $entrada->fornecedor; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../../../includes/footer.php'; ?>
