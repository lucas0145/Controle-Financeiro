create database db_CF;
use db_CF;

create table tbl_financas (
	id int primary key auto_increment,
    descricao varchar(100) not null,
    valor double not null,
    parcela int not null,
    ano char(4) not null,
    mes char(2) not null,
    dia char(2) not null
);
    
select * from tbl_financas;

