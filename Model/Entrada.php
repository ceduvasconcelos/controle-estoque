<?php

namespace Model;

class Entrada
{
    public int $id;
    public int $produto_id;
    public int $quantidade;
    public string $data_entrada;
    public string $numero_nota_fiscal;
    public string $fornecedor;
}