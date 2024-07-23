create table `saidas` (
    `id` bigint unsigned not null auto_increment primary key,
    `produto_id` bigint unsigned not null,
    `quantidade` int not null,
    `data_saida` timestamp not null,
    `numero_controle_saida` int not null,
    `local_destino` varchar(255) not null
) default character set utf8mb4 collate 'utf8mb4_unicode_ci';

alter table `saidas` add constraint `saidas_produto_id_foreign` foreign key (`produto_id`) references `produtos` (`id`);
alter table `saidas` add unique `saidas_numero_controle_saida_unique`(`numero_controle_saida`)