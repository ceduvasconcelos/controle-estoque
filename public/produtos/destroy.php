<?php

session_start();

require_once '../../config/database.php';
require_once '../../Repository/ProdutosRepository.php';

use Repository\ProdutosRepository;

try {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        throw new Exception;
    }

    $produtoId = $_POST['id'];

    $produtosRepository = new ProdutosRepository($pdo);

    $produtosRepository->destroy($produtoId);

    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Produto excluido com sucesso!';
} catch (Exception $e) {
    $_SESSION['flash']['type'] = 'danger';
    $_SESSION['flash']['message'] = 'Ocorreu um erro ao tentar excluir o produto!';
}

header("Location: /produtos");
