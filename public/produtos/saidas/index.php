<?php

session_start();

require_once '../../../config/database.php';
require_once '../../../Repository/ProdutosRepository.php';
require_once '../../../Repository/SaidasRepository.php';

use Repository\ProdutosRepository;
use Repository\SaidasRepository;

$produtoId = $_GET['id'];

$produtosRepository = new ProdutosRepository($pdo);
$saidasRepository = new SaidasRepository($pdo);

$produto = $produtosRepository->find($produtoId);
$saidas = $saidasRepository->getByProdutoId($produtoId)
?>

<?php include '../../../includes/header.php'; ?>

<div class="container">
    <div class="h-100 p-5 text-bg-light rounded-3 my-3">
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-light">
                    <a href="/produtos">Produtos</a>
                </li>
                <li class="breadcrumb-item active">Saídas</li>
            </ol>
        </nav>

        <h2>Saídas do produto <?php echo $produto->id; ?></h2>
    </div>

    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Data da saída</th>
            <th scope="col">Número de controle da saída</th>
            <th scope="col">Local de destino</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($saidas as $saida) : ?>
            <tr>
                <th scope="row"><?php echo $saida->id; ?></th>
                <td><?php echo $saida->quantidade; ?></td>
                <td><?php echo $saida->data_saida; ?></td>
                <td><?php echo $saida->numero_controle_saida; ?></td>
                <td><?php echo $saida->local_destino; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../../../includes/footer.php'; ?>
