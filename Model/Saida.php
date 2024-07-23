<?php

namespace Model;

class Saida
{
    public int $id;
    public int $produto_id;
    public int $quantidade;
    public string $data_saida;
    public int $numero_nota_fiscal;
    public string $numero_controle_saida;
    public string $fornecedor;
    public string $local_destino;
}