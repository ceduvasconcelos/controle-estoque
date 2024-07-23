<?php

namespace Repository;

require_once __DIR__ . '/../Model/Entrada.php';

use Model\Entrada;
use PDO;

class EntradasRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getByProdutoId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM entradas WHERE produto_id = ?");
        $stmt->execute([ $id ]);

        return $stmt->fetchAll(PDO::FETCH_CLASS, Entrada::class);
    }

    public function store($produtoId, $quantidade, $dataEntrada, $numeroNotaFiscal, $fornecedor)
    {
        $stmt = $this->pdo->prepare("INSERT INTO entradas (
            produto_id,
            quantidade,
            data_entrada,
            numero_nota_fiscal,
            fornecedor
        ) VALUES (?, ?, ?, ?, ?)");

        $stmt->execute([
            $produtoId,
            $quantidade,
            $dataEntrada,
            $numeroNotaFiscal,
            $fornecedor
        ]);
    }
}
