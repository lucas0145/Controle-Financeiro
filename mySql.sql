create database db_CF;
use db_CF;

create table tbl_financas (
	id int primary key auto_increment,
    descricao varchar(100) not null,
    valor double not null,
    parcela char(10) not null,
	data datetime not null
);
    
SELECT * FROM db_CF.tbl_financas;

SELECT * FROM db_CF.tbl_financas where data between '2009-2-00' and '2009-3-00';

