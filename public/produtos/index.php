<?php

session_start();

require_once '../../config/database.php';
require_once '../../Repository/ProdutosRepository.php';

use Repository\ProdutosRepository;

$produtosRepository = new ProdutosRepository($pdo);

$produtos = $produtosRepository->all();
?>

<?php include '../../includes/header.php'; ?>

<div class="container">
    <div class="h-100 p-5 text-bg-light rounded-3 my-3">
        <h2>Produtos</h2>

        <a class="btn btn-primary" href="/produtos/create.php" role="button">
            Cadastrar produto
        </a>
        <a class="btn btn-primary" href="/entradas/create.php" role="button">
            Cadastrar entrada
        </a>
        <a class="btn btn-primary" href="/saidas/create.php" role="button">
            Cadastrar saída
        </a>
    </div>

    <?php if(isset($_SESSION['flash'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['flash']['type']; ?>" role="alert">
            <?php echo $_SESSION['flash']['message']; ?>
        </div>

        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th scope="col">Estoque</th>
                <th scope="col">Responsável</th>
                <th scope="col">Categoria</th>
                <th scope="col">Subcategoria</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($produtos as $produto) : ?>
                <tr>
                    <th scope="row"><?php echo $produto->id; ?></th>
                    <td><?php echo $produto->descricao; ?></td>
                    <td><?php echo $produto->estoque; ?></td>
                    <td><?php echo $produto->responsavel; ?></td>
                    <td><?php echo $produto->categoria; ?></td>
                    <td><?php echo $produto->subcategoria; ?></td>
                    <td>
                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                            Ações
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/produtos/show.php?id=<?php echo $produto->id; ?>">
                                    Visualizar
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/produtos/edit.php?id=<?php echo $produto->id; ?>">
                                    Editar
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/produtos/entradas?id=<?php echo $produto->id; ?>">
                                    Entradas
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/produtos/saidas?id=<?php echo $produto->id; ?>">
                                    Saídas
                                </a>
                            </li>
                            <li>
                                <form action="/produtos/destroy.php" method="POST" onclick="if (! confirm('Tem certeza que deseja excluir?')) return false; ">
                                    <input type="hidden" name="id" value="<?php echo $produto->id; ?>">
                                    <button type="submit" class="dropdown-item">Excluir</button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if(! count($produtos)) : ?>
        <div class="alert alert-light" role="alert">
            Não há produtos cadastrados no momento.
        </div>
    <?php endif; ?>
</div>

<?php include '../../includes/footer.php'; ?>
