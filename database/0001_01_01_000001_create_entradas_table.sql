create table `entradas` (
    `id` bigint unsigned not null auto_increment primary key,
    `produto_id` bigint unsigned not null,
    `quantidade` bigint unsigned not null,
    `data_entrada` timestamp not null,
    `numero_nota_fiscal` varchar(255) not null,
    `fornecedor` varchar(255) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

alter table `entradas` add constraint `entradas_produto_id_foreign` foreign key (`produto_id`) references `produtos` (`id`);
