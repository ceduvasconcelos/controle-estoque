create table `produtos` (
    `id` bigint unsigned not null auto_increment primary key,
    `descricao` varchar(255) not null,
    `responsavel` varchar(255) not null,
    `estoque` int not null,
    `categoria` varchar(255) not null,
    `subcategoria` varchar(255) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';