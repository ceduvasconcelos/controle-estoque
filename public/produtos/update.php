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
    $descricao = filter_input(INPUT_POST, 'descricao');
    $responsavel = filter_input(INPUT_POST, 'responsavel');
    $estoque = filter_input(INPUT_POST, 'estoque');
    $categoria = filter_input(INPUT_POST, 'categoria');
    $subcategoria = filter_input(INPUT_POST, 'subcategoria');

    $produtosRepository = new ProdutosRepository($pdo);

    $produtosRepository->update(
        $produtoId,
        $descricao,
        $responsavel,
        $estoque,
        $categoria,
        $subcategoria
    );

    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Produto editado com sucesso!';
} catch (Exception $e) {
    $_SESSION['flash']['type'] = 'danger';
    $_SESSION['flash']['message'] = 'Ocorreu um erro ao tentar editar o produto!';
}

header("Location: /produtos");
