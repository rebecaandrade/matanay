/* tipo_favorecido */
insert into matanay.tipo_favorecido values(DEFAULT, "Artista");
insert into matanay.tipo_favorecido values(DEFAULT, "Autor");
insert into matanay.tipo_favorecido values(DEFAULT, "Produtor");

/* tipo_entidade */
insert into matanay.tipo_entidade values(DEFAULT, "Artista");
insert into matanay.tipo_entidade values(DEFAULT, "Autor");
insert into matanay.tipo_entidade values(DEFAULT, "Produtor");

/* tipo_album */
insert into matanay.tipo_album values(DEFAULT, "Estúdio");
insert into matanay.tipo_album values(DEFAULT, "Ao Vivo");
insert into matanay.tipo_album values(DEFAULT, "Coletânea");

/* tipo_modelo */
insert into matanay.tipo_modelo values(DEFAULT, "Nacional");
insert into matanay.tipo_modelo values(DEFAULT, "Internacional");

/* cliente */
insert into matanay.cliente values(DEFAULT, "admin",NULL);
insert into matanay.cliente values(DEFAULT, "cliente",NULL);

/* usuario */
insert into matanay.usuario values(DEFAULT, "admin","admin","21232f297a57a5a743894a0e4a801fc3",NULL,1);
insert into matanay.usuario values(DEFAULT, "cliente","cliente","4983a0ab83ed86e0e7213c8783940193",NULL,2);

/* favorecidos */
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 1","170.252.797-22","49.116.743/0001-10","contato1","email@email.com",NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 2","170.252.797-22","49.116.743/0001-10","contato2","email@email.com",NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 3","170.252.797-22","49.116.743/0001-10","contato3","email@email.com",NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 4","170.252.797-22","49.116.743/0001-10","contato4","email@email.com",NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 5","170.252.797-22","49.116.743/0001-10","contato5","email@email.com",NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 6","170.252.797-22","49.116.743/0001-10","contato6","email@email.com",NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 7","170.252.797-22","49.116.743/0001-10","contato6","email@email.com",NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 8","170.252.797-22","49.116.743/0001-10","contato6","email@email.com",NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 9","170.252.797-22","49.116.743/0001-10","contato6","email@email.com",NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 10","170.252.797-22","49.116.743/0001-10","contato1","email@email.com",NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 11","170.252.797-22","49.116.743/0001-10","contato2","email@email.com",NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 12","170.252.797-22","49.116.743/0001-10","contato3","email@email.com",NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 13","170.252.797-22","49.116.743/0001-10","contato4","email@email.com",NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 14","170.252.797-22","49.116.743/0001-10","contato5","email@email.com",NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 15","170.252.797-22","49.116.743/0001-10","contato6","email@email.com",NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 16","170.252.797-22","49.116.743/0001-10","contato6","email@email.com",NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 17","170.252.797-22","49.116.743/0001-10","contato6","email@email.com",NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 18","170.252.797-22","49.116.743/0001-10","contato6","email@email.com",NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 19","170.252.797-22","49.116.743/0001-10","contato6","email@email.com",NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido 20","170.252.797-22","49.116.743/0001-10","contato6","email@email.com",NULL,2);

/*favorecido_has_tipo_favorecido*/
insert into matanay.favorecido_has_tipo_favorecido values(1,1,56,79,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(2,2,3,74,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(3,3,63,12,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(4,1,87,5,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(5,2,98,6,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(6,3,32,71,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(7,1,68,3,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(8,2,87,4,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(9,3,98,63,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(10,1,56,79,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(11,1,56,79,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(12,2,3,74,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(13,3,63,12,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(14,1,87,5,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(15,2,98,6,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(16,3,32,71,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(17,1,68,3,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(18,2,87,4,NULL);
insert into matanay.favorecido_has_tipo_favorecido values(19,3,98,63,NULL);

/* entidades */
insert into matanay.entidade values(DEFAULT,"Entidade1",NULL,"49.116.743/0001-10","contato1","email1@coisa.com",NULL,1,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade2",NULL,"49.116.743/0001-10","contato2","email2@coisa.com",NULL,2,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade3","170.252.797-22",NULL,"contato3","email3@coisa.com",NULL,3,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade4","170.252.797-22",NULL,"contato4","email4@coisa.com",NULL,4,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade5",NULL,"49.116.743/0001-10","contato5","email5@coisa.com",NULL,5,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade6",NULL,"49.116.743/0001-10","contato6","email6@coisa.com",NULL,6,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade7","170.252.797-22",NULL,"contato7","email7@coisa.com",NULL,7,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade8","170.252.797-22",NULL,"contato8","email8@coisa.com",NULL,8,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade9",NULL,"49.116.743/0001-10","contato9","email9@coisa.com",NULL,9,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade10",NULL,"49.116.743/0001-10","contato10","email10@coisa.com",NULL,10,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade11",NULL,"49.116.743/0001-10","contato11","email11@coisa.com",NULL,11,NULL,2);
insert into matanay.entidade values(DEFAULT,"Entidade12",NULL,"49.116.743/0001-10","contato12","email12@coisa.com",NULL,12,NULL,2);
insert into matanay.entidade values(DEFAULT,"Entidade13",NULL,"49.116.743/0001-10","contato13","email13@coisa.com",NULL,13,NULL,2);
insert into matanay.entidade values(DEFAULT,"Entidade14","170.252.797-22",NULL,"contato14","email14@coisa.com",NULL,14,NULL,2);
insert into matanay.entidade values(DEFAULT,"Entidade15","170.252.797-22",NULL,"contato15","email15@coisa.com",NULL,15,NULL,2);
insert into matanay.entidade values(DEFAULT,"Entidade16","170.252.797-22",NULL,"contato16","email16@coisa.com",NULL,16,NULL,2);
insert into matanay.entidade values(DEFAULT,"Entidade17","170.252.797-22",NULL,"contato17","email17@coisa.com",NULL,17,NULL,2);
insert into matanay.entidade values(DEFAULT,"Entidade18","170.252.797-22",NULL,"contato18","email18@coisa.com",NULL,18,NULL,2);
insert into matanay.entidade values(DEFAULT,"Entidade19",NULL,"49.116.743/0001-10","contato19","email19@coisa.com",NULL,19,NULL,2);
insert into matanay.entidade values(DEFAULT,"Entidade20",NULL,"49.116.743/0001-10","contato20","email20@coisa.com",NULL,20,NULL,2);

/*entidade_has_tipo_entidade*/
insert into matanay.entidade_has_tipo_entidade values(1,1,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(1,2,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(1,3,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(2,2,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(3,3,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(4,1,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(5,2,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(5,3,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(6,3,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(7,1,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(8,2,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(9,1,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(9,3,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(10,1,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(11,1,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(11,2,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(12,3,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(13,1,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(14,2,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(15,2,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(15,3,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(16,1,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(17,2,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(18,3,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(19,1,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(20,1,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(20,2,20,20,NULL);
insert into matanay.entidade_has_tipo_entidade values(20,3,20,20,NULL);

/* telefone entidade */
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",1);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",1);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",2);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",2);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",3);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",3);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",4);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",4);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",5);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",5);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",6);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",6);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",7);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",7);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",8);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",8);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",9);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",9);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",10);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",10);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",11);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",11);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",12);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",12);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",13);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",13);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",14);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",14);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",15);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",15);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",16);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",16);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",17);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",17);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",18);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",18);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",19);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",19);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",20);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",20);

/* telefone favorecidos */
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",1);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",1);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",2);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",2);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",3);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",3);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",4);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",4);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",5);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",5);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",6);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",6);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",7);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",7);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",8);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",8);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",9);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",9);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",10);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",10);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",11);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",11);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",12);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",12);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",13);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",13);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",14);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",14);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",15);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",15);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",16);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",16);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",17);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",17);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",18);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",18);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",19);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",19);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",20);
insert into matanay.telefone_favorecido values(DEFAULT,NULL,"(99)9999-9999",20);

/* moedas */
insert into matanay.moeda values(DEFAULT,"Moeda 1","M1",5.34,NULL,1);
insert into matanay.moeda values(DEFAULT,"Moeda 2","M2",3.21,NULL,1);
insert into matanay.moeda values(DEFAULT,"Moeda 3","M3",1.11,NULL,1);
insert into matanay.moeda values(DEFAULT,"Moeda 4","M4",5.74,NULL,1);
insert into matanay.moeda values(DEFAULT,"Moeda 5","M5",1.37,NULL,1);
insert into matanay.moeda values(DEFAULT,"Moeda 6","M6",3.34,NULL,2);
insert into matanay.moeda values(DEFAULT,"Moeda 7","M7",5.34,NULL,2);
insert into matanay.moeda values(DEFAULT,"Moeda 8","M8",3.21,NULL,2);
insert into matanay.moeda values(DEFAULT,"Moeda 9","M9",1.01,NULL,2);
insert into matanay.moeda values(DEFAULT,"Moeda 10","M10",5.74,NULL,2);	

/* tipo_imposto */
insert into matanay.tipo_imposto values(DEFAULT, "Fisico");
insert into matanay.tipo_imposto values(DEFAULT, "Digital");

/* imposto */
insert into matanay.imposto values(DEFAULT,"Imposto 1","100",1,1,NULL);
insert into matanay.imposto values(DEFAULT,"Imposto 2","200",1,2,NULL);
insert into matanay.imposto values(DEFAULT,"Imposto 3","300",1,1,NULL);
insert into matanay.imposto values(DEFAULT,"Imposto 4","400",1,2,NULL);
insert into matanay.imposto values(DEFAULT,"Imposto 5","100",2,1,NULL);
insert into matanay.imposto values(DEFAULT,"Imposto 6","200",2,2,NULL);
insert into matanay.imposto values(DEFAULT,"Imposto 7","300",2,1,NULL);
insert into matanay.imposto values(DEFAULT,"Imposto 8","400",2,2,NULL);

/* faixas */
insert into matanay.faixa_video values(DEFAULT,"Faixa 1","BRRGE1500600",NULL,NULL,1,1);
insert into matanay.faixa_video values(DEFAULT,"Faixa 2","BRRGE1500601",NULL,NULL,2,1);
insert into matanay.faixa_video values(DEFAULT,"Faixa 3","BRRGE1500602",NULL,NULL,3,1);
insert into matanay.faixa_video values(DEFAULT,"Faixa 4","BRRGE1500603",NULL,NULL,4,1);
insert into matanay.faixa_video values(DEFAULT,"Faixa 5","BRRGE1500604",NULL,NULL,1,1);
insert into matanay.faixa_video values(DEFAULT,"Faixa 6","BRRGE1500605",NULL,NULL,2,1);
insert into matanay.faixa_video values(DEFAULT,"Faixa 7","BRRGE1500606",NULL,NULL,3,1);
insert into matanay.faixa_video values(DEFAULT,"Faixa 8","BRRGE1500607",NULL,NULL,4,1);
insert into matanay.faixa_video values(DEFAULT,"Faixa 9","BRRGE1500608",NULL,NULL,1,1);
insert into matanay.faixa_video values(DEFAULT,"Faixa 10","BRRGE1500600",NULL,NULL,5,1);
insert into matanay.faixa_video values(DEFAULT,"Faixa 11","BRRGE1500601",NULL,NULL,6,2);
insert into matanay.faixa_video values(DEFAULT,"Faixa 12","BRRGE1500601",NULL,NULL,7,2);
insert into matanay.faixa_video values(DEFAULT,"Faixa 13","BRRGE1500602",NULL,NULL,8,2);
insert into matanay.faixa_video values(DEFAULT,"Faixa 14","BRRGE1500603",NULL,NULL,5,2);
insert into matanay.faixa_video values(DEFAULT,"Faixa 15","BRRGE1500604",NULL,NULL,6,2);
insert into matanay.faixa_video values(DEFAULT,"Faixa 16","BRRGE1500605",NULL,NULL,7,2);
insert into matanay.faixa_video values(DEFAULT,"Faixa 17","BRRGE1500606",NULL,NULL,8,2);
insert into matanay.faixa_video values(DEFAULT,"Faixa 18","BRRGE1500607",NULL,NULL,5,2);
insert into matanay.faixa_video values(DEFAULT,"Faixa 19","BRRGE1500608",NULL,NULL,6,2);
insert into matanay.faixa_video values(DEFAULT,"Faixa 20","BRRGE1500601",NULL,NULL,7,2);

/* albuns */
insert into matanay.album values(DEFAULT,"Album 1",2,"7891430144791",50,"2001","11111",1,NULL,1);
insert into matanay.album values(DEFAULT,"Album 2",2,"7891430144791",50,"2002","22222",2,NULL,1);
insert into matanay.album values(DEFAULT,"Album 3",2,"7891430144791",50,"2003","33333",3,NULL,1);
insert into matanay.album values(DEFAULT,"Album 4",2,"7891430144791",50,"2004","44444",1,NULL,1);
insert into matanay.album values(DEFAULT,"Album 5",2,"7891430144791",50,"2005","55555",2,NULL,1);
insert into matanay.album values(DEFAULT,"Album 6",2,"7891430144791",50,"2006","66666",3,NULL,1);
insert into matanay.album values(DEFAULT,"Album 7",2,"7891430144791",50,"2007","77777",1,NULL,1);
insert into matanay.album values(DEFAULT,"Album 8",2,"7891430144791",50,"2008","88888",2,NULL,1);
insert into matanay.album values(DEFAULT,"Album 9",2,"7891430144791",50,"2009","99999",3,NULL,1);
insert into matanay.album values(DEFAULT,"Album 10",2,"7891430144791",50,"2001","11111",1,NULL,1);
insert into matanay.album values(DEFAULT,"Album 11",2,"7891430144791",50,"2001","11111",1,NULL,2);
insert into matanay.album values(DEFAULT,"Album 12",2,"7891430144791",50,"2002","22222",2,NULL,2);
insert into matanay.album values(DEFAULT,"Album 13",2,"7891430144791",50,"2003","33333",3,NULL,2);
insert into matanay.album values(DEFAULT,"Album 14",2,"7891430144791",50,"2004","44444",1,NULL,2);
insert into matanay.album values(DEFAULT,"Album 15",2,"7891430144791",50,"2005","55555",2,NULL,2);
insert into matanay.album values(DEFAULT,"Album 16",2,"7891430144791",50,"2006","66666",3,NULL,2);
insert into matanay.album values(DEFAULT,"Album 17",2,"7891430144791",50,"2007","77777",1,NULL,2);
insert into matanay.album values(DEFAULT,"Album 18",2,"7891430144791",50,"2008","88888",2,NULL,2);
insert into matanay.album values(DEFAULT,"Album 19",2,"7891430144791",50,"2009","99999",3,NULL,2);
insert into matanay.album values(DEFAULT,"Album 20",2,"7891430144791",50,"2001","11111",1,NULL,2);

/* album has faixa */
insert into matanay.album_has_faixa values(1,1);
insert into matanay.album_has_faixa values(1,2);
insert into matanay.album_has_faixa values(2,3);
insert into matanay.album_has_faixa values(2,4);
insert into matanay.album_has_faixa values(3,5);
insert into matanay.album_has_faixa values(3,6);
insert into matanay.album_has_faixa values(4,7);
insert into matanay.album_has_faixa values(4,8);
insert into matanay.album_has_faixa values(5,9);
insert into matanay.album_has_faixa values(5,10);
insert into matanay.album_has_faixa values(6,2);
insert into matanay.album_has_faixa values(6,3);
insert into matanay.album_has_faixa values(7,4);
insert into matanay.album_has_faixa values(7,5);
insert into matanay.album_has_faixa values(8,6);
insert into matanay.album_has_faixa values(8,7);
insert into matanay.album_has_faixa values(9,8);
insert into matanay.album_has_faixa values(9,9);
insert into matanay.album_has_faixa values(10,1);
insert into matanay.album_has_faixa values(10,2);
insert into matanay.album_has_faixa values(11,11);
insert into matanay.album_has_faixa values(11,12);
insert into matanay.album_has_faixa values(12,13);
insert into matanay.album_has_faixa values(12,14);
insert into matanay.album_has_faixa values(13,15);
insert into matanay.album_has_faixa values(13,16);
insert into matanay.album_has_faixa values(14,17);
insert into matanay.album_has_faixa values(14,18);
insert into matanay.album_has_faixa values(15,19);
insert into matanay.album_has_faixa values(15,11);
insert into matanay.album_has_faixa values(16,20);
insert into matanay.album_has_faixa values(16,13);
insert into matanay.album_has_faixa values(17,14);
insert into matanay.album_has_faixa values(17,15);
insert into matanay.album_has_faixa values(18,16);
insert into matanay.album_has_faixa values(18,17);
insert into matanay.album_has_faixa values(19,18);
insert into matanay.album_has_faixa values(19,19);
insert into matanay.album_has_faixa values(20,18);
insert into matanay.album_has_faixa values(20,19);

/* entidade has album */
insert into matanay.entidade_has_album values(1,1);
insert into matanay.entidade_has_album values(4,2);
insert into matanay.entidade_has_album values(7,3);
insert into matanay.entidade_has_album values(9,4);
insert into matanay.entidade_has_album values(10,5);
insert into matanay.entidade_has_album values(1,6);
insert into matanay.entidade_has_album values(4,7);
insert into matanay.entidade_has_album values(1,8);
insert into matanay.entidade_has_album values(7,9);
insert into matanay.entidade_has_album values(10,10);
insert into matanay.entidade_has_album values(19,11);
insert into matanay.entidade_has_album values(13,12);
insert into matanay.entidade_has_album values(16,13);
insert into matanay.entidade_has_album values(19,14);
insert into matanay.entidade_has_album values(20,15);
insert into matanay.entidade_has_album values(11,16);
insert into matanay.entidade_has_album values(13,17);
insert into matanay.entidade_has_album values(16,18);
insert into matanay.entidade_has_album values(19,19);
insert into matanay.entidade_has_album values(20,20);

/* entidade has faixa com percentual */
insert into matanay.entidade_has_faixa_video values(1,1,100,1);
insert into matanay.entidade_has_faixa_video values(1,1,50,2);
insert into matanay.entidade_has_faixa_video values(1,1,100,3);
insert into matanay.entidade_has_faixa_video values(2,1,50,2);
insert into matanay.entidade_has_faixa_video values(1,2,100,1);
insert into matanay.entidade_has_faixa_video values(5,2,60,2);
insert into matanay.entidade_has_faixa_video values(8,2,40,2);
insert into matanay.entidade_has_faixa_video values(4,3,55,1);
insert into matanay.entidade_has_faixa_video values(2,3,85,2);
insert into matanay.entidade_has_faixa_video values(8,3,15,2);
insert into matanay.entidade_has_faixa_video values(4,4,100,1);
insert into matanay.entidade_has_faixa_video values(2,4,100,2);
insert into matanay.entidade_has_faixa_video values(3,4,40,3);
insert into matanay.entidade_has_faixa_video values(6,4,30,3);
insert into matanay.entidade_has_faixa_video values(9,4,30,3);
insert into matanay.entidade_has_faixa_video values(7,5,100,1);
insert into matanay.entidade_has_faixa_video values(5,5,80,2);
insert into matanay.entidade_has_faixa_video values(8,5,20,2);
insert into matanay.entidade_has_faixa_video values(1,5,25,3);
insert into matanay.entidade_has_faixa_video values(5,5,25,3);
insert into matanay.entidade_has_faixa_video values(6,5,25,3);
insert into matanay.entidade_has_faixa_video values(9,5,25,3);
insert into matanay.entidade_has_faixa_video values(7,6,70,1);
insert into matanay.entidade_has_faixa_video values(4,6,30,1);
insert into matanay.entidade_has_faixa_video values(2,6,100,2);
insert into matanay.entidade_has_faixa_video values(1,7,100,1);
insert into matanay.entidade_has_faixa_video values(2,7,100,2);
insert into matanay.entidade_has_faixa_video values(3,7,100,3);
insert into matanay.entidade_has_faixa_video values(4,8,100,1);
insert into matanay.entidade_has_faixa_video values(5,8,100,2);
insert into matanay.entidade_has_faixa_video values(6,8,100,3);
insert into matanay.entidade_has_faixa_video values(10,9,100,1);
insert into matanay.entidade_has_faixa_video values(8,9,100,2);
insert into matanay.entidade_has_faixa_video values(9,9,100,3);
insert into matanay.entidade_has_faixa_video values(1,10,100,1);
insert into matanay.entidade_has_faixa_video values(1,10,100,2);
insert into matanay.entidade_has_faixa_video values(1,10,100,3);
insert into matanay.entidade_has_faixa_video values(11,11,100,1);
insert into matanay.entidade_has_faixa_video values(11,11,100,2);
insert into matanay.entidade_has_faixa_video values(18,11,100,3);
insert into matanay.entidade_has_faixa_video values(13,12,100,1);
insert into matanay.entidade_has_faixa_video values(14,12,100,2);
insert into matanay.entidade_has_faixa_video values(15,12,100,3);
insert into matanay.entidade_has_faixa_video values(16,13,100,1);
insert into matanay.entidade_has_faixa_video values(17,13,100,2);
insert into matanay.entidade_has_faixa_video values(12,13,100,3);
insert into matanay.entidade_has_faixa_video values(19,14,100,1);
insert into matanay.entidade_has_faixa_video values(20,14,100,2);
insert into matanay.entidade_has_faixa_video values(20,14,100,3);
insert into matanay.entidade_has_faixa_video values(20,15,100,1);
insert into matanay.entidade_has_faixa_video values(14,15,100,2);
insert into matanay.entidade_has_faixa_video values(12,15,100,3);
insert into matanay.entidade_has_faixa_video values(11,16,100,1);
insert into matanay.entidade_has_faixa_video values(17,16,100,2);
insert into matanay.entidade_has_faixa_video values(18,16,100,3);
insert into matanay.entidade_has_faixa_video values(16,17,100,1);
insert into matanay.entidade_has_faixa_video values(11,17,100,2);
insert into matanay.entidade_has_faixa_video values(15,17,100,3);
insert into matanay.entidade_has_faixa_video values(11,18,100,1);
insert into matanay.entidade_has_faixa_video values(20,18,100,2);
insert into matanay.entidade_has_faixa_video values(12,18,100,3);
insert into matanay.entidade_has_faixa_video values(19,19,100,1);
insert into matanay.entidade_has_faixa_video values(17,19,100,2);
insert into matanay.entidade_has_faixa_video values(20,19,100,3);
insert into matanay.entidade_has_faixa_video values(13,20,100,1);
insert into matanay.entidade_has_faixa_video values(14,20,100,2);
insert into matanay.entidade_has_faixa_video values(18,20,100,3);

#Funcionalidades

#cliente
insert into matanay.funcionalidades values(DEFAULT,"func_manter_cliente",NULL);

#perfil
insert into matanay.funcionalidades values(DEFAULT,"func_manter_perfil",NULL);

#Entidade
insert into matanay.funcionalidades values(DEFAULT,"func_cadastrar_entidade",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_listar_entidade",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_excluir_entidade",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_atualizar_entidade",NULL);

#favorecido
insert into matanay.funcionalidades values(DEFAULT,"func_cadastrar_favorecido",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_listar_favorecido",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_excluir_favorecido",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_atualizar_favorecido",NULL);

#faixas
insert into matanay.funcionalidades values(DEFAULT,"func_cadastrar_faixas",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_listar_faixas",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_excluir_faixas",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_atualizar_faixas",NULL);

#albuns
insert into matanay.funcionalidades values(DEFAULT,"func_cadastrar_albuns",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_listar_albuns",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_excluir_albuns",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_atualizar_albuns",NULL);

#imposto
insert into matanay.funcionalidades values(DEFAULT,"func_cadastrar_imposto",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_listar_imposto",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_excluir_imposto",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_atualizar_imposto",NULL);

#moeda
insert into matanay.funcionalidades values(DEFAULT,"func_cadastrar_moeda",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_listar_moeda",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_excluir_moeda",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_atualizar_moeda",NULL);

#relatorio
insert into matanay.funcionalidades values(DEFAULT,"func_cadastrar_relatorio",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_listar_relatorio",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_excluir_relatorio",NULL);
insert into matanay.funcionalidades values(DEFAULT,"func_atualizar_relatorio",NULL);

