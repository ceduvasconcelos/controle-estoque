<?php

session_start();

require_once '../../config/database.php';
require_once '../../Repository/ProdutosRepository.php';
require_once '../../Repository/SaidasRepository.php';

use Repository\ProdutosRepository;
use Repository\SaidasRepository;

try {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        throw new Exception;
    }

    $produtoId = filter_input(INPUT_POST, 'produto_id');
    $quantidade = filter_input(INPUT_POST, 'quantidade');
    $dataSaida = filter_input(INPUT_POST, 'data_saida');
    $numeroControleSaida = filter_input(INPUT_POST, 'numero_controle_saida');
    $localDestino = filter_input(INPUT_POST, 'local_destino');

    $produtosRepository = new ProdutosRepository($pdo);
    $saidasRepository = new SaidasRepository($pdo);

    $produto = $produtosRepository->find($produtoId);

    if ($produto->estoque < $quantidade) {
        throw new Exception;
    }

    if ($quantidade < 1) {
        throw new Exception;
    }

    $saidasRepository->store(
        $produtoId,
        $quantidade,
        $dataSaida,
        $numeroControleSaida,
        $localDestino
    );

    $produtosRepository->updateEstoque($produtoId, $produto->estoque - $quantidade);

    $_SESSION['flash']['type'] = 'success';
    $_SESSION['flash']['message'] = 'Saída cadastrada com sucesso!';
} catch (Exception $e) {
    $_SESSION['flash']['type'] = 'danger';
    $_SESSION['flash']['message'] = 'Ocorreu um erro ao tentar cadastrar a saída!';
}

header("Location: /produtos");
