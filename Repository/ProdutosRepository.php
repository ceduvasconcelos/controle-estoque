<?php

namespace Repository;

require_once __DIR__ . '/../Model/Produto.php';

use Model\Produto;
use PDO;

class ProdutosRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, Produto::class);
    }

    public function find(int $id): Produto
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([ $id ]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Produto::class);

        return $stmt->fetch();
    }

    public function store($descricao, $responsavel, $estoque, $categoria, $subcategoria)
    {
        $stmt = $this->pdo->prepare("INSERT INTO produtos (
            descricao,
            responsavel,
            estoque,
            categoria,
            subcategoria
        ) VALUES (?, ?, ?, ?, ?)");

        $stmt->execute([
            $descricao,
            $responsavel,
            $estoque,
            $categoria,
            $subcategoria
        ]);
    }

    public function update($id, $descricao, $responsavel, $estoque, $categoria, $subcategoria)
    {
        $stmt = $this->pdo->prepare("UPDATE produtos SET
            descricao = ?,
            responsavel = ?,
            estoque = ?,
            categoria = ?,
            subcategoria = ?
            WHERE id = ?");

        $stmt->execute([
            $descricao,
            $responsavel,
            $estoque,
            $categoria,
            $subcategoria,
            $id
        ]);
    }

    public function destroy($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM entradas WHERE produto_id = ?");
        $stmt->execute([ $id ]);

        $stmt = $this->pdo->prepare("DELETE FROM saidas WHERE produto_id = ?");
        $stmt->execute([ $id ]);

        $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE id = ?");
        $stmt->execute([ $id ]);
    }

    public function updateEstoque($id, $estoque)
    {
        $stmt = $this->pdo->prepare("UPDATE produtos SET estoque = ? WHERE id = ?");

        $stmt->execute([
            $estoque,
            $id
        ]);
    }
}
