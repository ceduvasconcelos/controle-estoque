<?php

namespace Repository;

require_once __DIR__ . '/../Model/Saida.php';

use Model\Saida;
use PDO;

class SaidasRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getByProdutoId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM saidas WHERE produto_id = ?");
        $stmt->execute([ $id ]);

        return $stmt->fetchAll(PDO::FETCH_CLASS, Saida::class);
    }

    public function store($produtoId, $quantidade, $dataSaida, $numeroControleSaida, $localDestino)
    {
        $stmt = $this->pdo->prepare("INSERT INTO saidas (
            produto_id,
            quantidade,
            data_saida,
            numero_controle_saida,
            local_destino
        ) VALUES (?, ?, ?, ?, ?)");

        $stmt->execute([
            $produtoId,
            $quantidade,
            $dataSaida,
            $numeroControleSaida,
            $localDestino
        ]);
    }
}
