<?php

session_start();

require_once '../../config/database.php';
require_once '../../Repository/ProdutosRepository.php';

use Model\Produto;
use Repository\ProdutosRepository;

try {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        throw new Exception;
    }

    $descricao = filter_input(INPUT_POST, 'descricao');
    $responsavel = filter_input(INPUT_POST, 'responsavel');
    $estoque = filter_input(INPUT_POST, 'estoque');
    $categoria = filter_input(INPUT_POST, 'categoria');
    $subcategoria = filter_input(INPUT_POST, 'subcategoria');

    $produtosRepository = new ProdutosRepository($pdo);

    $produtosRepository->store($descricao, $responsavel, $estoque, $categoria, $subcategoria);

    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Produto adicionado com sucesso!';
} catch (Exception $e) {
    $_SESSION['flash']['type'] = 'danger';
    $_SESSION['flash']['message'] = 'Ocorreu um erro ao tentar cadastrar o produto!';
}

header("Location: /produtos");
