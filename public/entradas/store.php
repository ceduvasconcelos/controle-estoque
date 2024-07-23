<?php

session_start();

require_once '../../config/database.php';
require_once '../../Repository/ProdutosRepository.php';
require_once '../../Repository/EntradasRepository.php';

use Repository\EntradasRepository;
use Repository\ProdutosRepository;

try {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        throw new Exception;
    }

    $produtoId = filter_input(INPUT_POST, 'produto_id');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    $dataEntrada = filter_input(INPUT_POST, 'data_entrada');
    $numeroNotaFiscal = filter_input(INPUT_POST, 'numero_nota_fiscal');
    $fornecedor = filter_input(INPUT_POST, 'fornecedor');

    $produtosRepository = new ProdutosRepository($pdo);
    $entradasRepository = new EntradasRepository($pdo);

    $produto = $produtosRepository->find($produtoId);

    if ($quantidade < 1) {
        throw new Exception;
    }

    $entradasRepository->store(
        $produtoId,
        $quantidade,
        $dataEntrada,
        $numeroNotaFiscal,
        $fornecedor
    );

    $produtosRepository->updateEstoque($produtoId, $produto->estoque + $quantidade);

    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Entrada cadastrada com sucesso!';
} catch (Exception $e) {
    $_SESSION['flash']['type'] = 'danger';
    $_SESSION['flash']['message'] = 'Ocorreu um erro ao tentar cadastrar a entrada!';
}

header("Location: /produtos");
