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

/* perfil */
insert into matanay.usuario values(DEFAULT, "admin","admin","21232f297a57a5a743894a0e4a801fc3",NULL,1);

/* favorecidos */
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Caue Moura","170.252.797-22","49.116.743/0001-10","contato1","caue@coisa.com",30,30,NULL);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Dercy Goncalves","170.252.797-22","49.116.743/0001-10","contato2","velha@coisa.com",30,30,NULL);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Bilbo o Lindo","170.252.797-22","49.116.743/0001-10","contato3","lindao@coisa.com",30,30,NULL);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Chapolin","170.252.797-22","49.116.743/0001-10","contato4","polegar@coisa.com",30,30,NULL);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","XUXA","170.252.797-22","49.116.743/0001-10","contato5","baixinhos@coisa.com",30,30,NULL);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Balao Magico","170.252.797-22","49.116.743/0001-10","contato6","balMa@coisa.com",30,30,NULL);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","TheStrokes","170.252.797-22","49.116.743/0001-10","contato6","Strok@coisa.com",30,30,NULL);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","TheKillers","170.252.797-22","49.116.743/0001-10","contato6","Kill@coisa.com",30,30,NULL);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","EuRobo","170.252.797-22","49.116.743/0001-10","contato6","IRobot@coisa.com",30,30,NULL);

/*favorecido_has_tipo_favorecido*/
insert into matanay.favorecido_has_tipo_favorecido values(1,1);
insert into matanay.favorecido_has_tipo_favorecido values(2,2);
insert into matanay.favorecido_has_tipo_favorecido values(3,3);
insert into matanay.favorecido_has_tipo_favorecido values(3,1);
insert into matanay.favorecido_has_tipo_favorecido values(5,2);
insert into matanay.favorecido_has_tipo_favorecido values(6,3);
insert into matanay.favorecido_has_tipo_favorecido values(7,1);
insert into matanay.favorecido_has_tipo_favorecido values(8,2);
insert into matanay.favorecido_has_tipo_favorecido values(9,3);
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
insert into matanay.entidade values(DEFAULT,"Entidade10",NULL,"49.116.743/0001-10","contato10","email10@coisa.com",NULL,1,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade11",NULL,"49.116.743/0001-10","contato11","email11@coisa.com",NULL,2,NULL,1);
insert into matanay.entidade values(DEFAULT,"DragonBallSuper",NULL,"49.116.743/0001-10","contato12","email12@coisa.com",NULL,3,NULL,1);
insert into matanay.entidade values(DEFAULT,"GANTZ",NULL,"49.116.743/0001-10","contato13","email13@coisa.com",NULL,4,NULL,1);
insert into matanay.entidade values(DEFAULT,"Fate/Zero","170.252.797-22",NULL,"contato14","email14@coisa.com",NULL,5,NULL,1);
insert into matanay.entidade values(DEFAULT,"Code Geass","170.252.797-22",NULL,"contato15","email15@coisa.com",NULL,6,NULL,1);
insert into matanay.entidade values(DEFAULT,"Digimon","170.252.797-22",NULL,"contato16","email16@coisa.com",NULL,7,NULL,1);
insert into matanay.entidade values(DEFAULT,"Goku","170.252.797-22",NULL,"contato17","email17@coisa.com",NULL,8,NULL,1);
insert into matanay.entidade values(DEFAULT,"Smaug","170.252.797-22",NULL,"contato18","email18@coisa.com",NULL,9,NULL,1);
insert into matanay.entidade values(DEFAULT,"Jose",NULL,"49.116.743/0001-10","contato19","email19@coisa.com",NULL,1,NULL,1);
insert into matanay.entidade values(DEFAULT,"Maria",NULL,"49.116.743/0001-10","contato20","email20@coisa.com",NULL,2,NULL,1);
insert into matanay.entidade values(DEFAULT,"SuaMae",NULL,"49.116.743/0001-10","contato21","email21@coisa.com",NULL,3,NULL,1);
insert into matanay.entidade values(DEFAULT,"JUJU",NULL,"49.116.743/0001-10","contato22","email22@coisa.com",NULL,4,NULL,1);
insert into matanay.entidade values(DEFAULT,"Billy Gatao",NULL,"49.116.743/0001-10","contato23","email23@coisa.com",NULL,5,NULL,1);
insert into matanay.entidade values(DEFAULT,"Bridges","170.252.797-22",NULL,"contato24","email24@coisa.com",NULL,6,NULL,1);
insert into matanay.entidade values(DEFAULT,"romario","170.252.797-22",NULL,"contato25","email25@coisa.com",NULL,7,NULL,1);
insert into matanay.entidade values(DEFAULT,"Arlinda","170.252.797-22",NULL,"contato25","email25@coisa.com",NULL,8,NULL,1);
insert into matanay.entidade values(DEFAULT,"Amelia","170.252.797-22",NULL,"contato25","email25@coisa.com",NULL,9,NULL,1);

/*entidade_has_tipo_entidade*/
insert into matanay.entidade_has_tipo_entidade values(1,1,20,20);
insert into matanay.entidade_has_tipo_entidade values(2,1,20,20);
insert into matanay.entidade_has_tipo_entidade values(3,1,20,20);
insert into matanay.entidade_has_tipo_entidade values(4,1,20,20);
insert into matanay.entidade_has_tipo_entidade values(5,1,20,20);
insert into matanay.entidade_has_tipo_entidade values(6,1,20,20);
insert into matanay.entidade_has_tipo_entidade values(7,1,20,20);
insert into matanay.entidade_has_tipo_entidade values(8,2,20,20);
insert into matanay.entidade_has_tipo_entidade values(9,2,20,20);
insert into matanay.entidade_has_tipo_entidade values(10,2,20,20);
insert into matanay.entidade_has_tipo_entidade values(11,2,20,20);
insert into matanay.entidade_has_tipo_entidade values(12,2,20,20);
insert into matanay.entidade_has_tipo_entidade values(13,2,20,20);
insert into matanay.entidade_has_tipo_entidade values(14,2,20,20);
insert into matanay.entidade_has_tipo_entidade values(15,3,20,20);
insert into matanay.entidade_has_tipo_entidade values(16,3,20,20);
insert into matanay.entidade_has_tipo_entidade values(17,3,20,20);
insert into matanay.entidade_has_tipo_entidade values(18,3,20,20);
insert into matanay.entidade_has_tipo_entidade values(19,3,20,20);
insert into matanay.entidade_has_tipo_entidade values(20,3,20,20);
insert into matanay.entidade_has_tipo_entidade values(21,3,20,20);
insert into matanay.entidade_has_tipo_entidade values(22,1,20,20);
insert into matanay.entidade_has_tipo_entidade values(23,2,20,20);
insert into matanay.entidade_has_tipo_entidade values(24,3,20,20);
insert into matanay.entidade_has_tipo_entidade values(25,1,20,20);
insert into matanay.entidade_has_tipo_entidade values(26,2,20,20);
insert into matanay.entidade_has_tipo_entidade values(27,3,20,20);


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
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",21);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",21);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",22);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",22);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",23);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",23);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",24);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",24);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",25);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",25);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",26);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",26);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",27);
insert into matanay.telefone_entidade values(DEFAULT,"(99)9999-9999",27);

/* telefone favorecidos */
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",1);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",1);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",2);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",2);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",3);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",3);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",4);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",4);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",5);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",5);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",6);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",6);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",7);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",7);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",8);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",8);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",9);
insert into matanay.telefone_favorecido values(DEFAULT,"(99)9999-9999",9);

/* moedas */
insert into matanay.moeda values(DEFAULT,"NOME","SIGLA",5.34,NULL,1);
insert into matanay.moeda values(DEFAULT,"Dollar","USD",3.21,NULL,1);
insert into matanay.moeda values(DEFAULT,"Real","BRL",1,NULL,1);
insert into matanay.moeda values(DEFAULT,"Hey","so",515.74,NULL,1);
insert into matanay.moeda values(DEFAULT,"TESTE","TESTE",13.37,NULL,1);
insert into matanay.moeda values(DEFAULT,"DELETADO","DELETADO",34.34,1,1);	

/* faixas */
insert into matanay.faixa_video values(DEFAULT,"Faixa 1","1111111111",NULL,NULL);
insert into matanay.faixa_video values(DEFAULT,"Faixa 2","2222222222",NULL,NULL);
insert into matanay.faixa_video values(DEFAULT,"Faixa 3","3333333333",NULL,NULL);
insert into matanay.faixa_video values(DEFAULT,"Faixa 4","4444444444",NULL,NULL);
insert into matanay.faixa_video values(DEFAULT,"Faixa 5","5555555555",NULL,NULL);
insert into matanay.faixa_video values(DEFAULT,"Faixa 6","6666666666",NULL,NULL);
insert into matanay.faixa_video values(DEFAULT,"Faixa 7","7777777777",NULL,NULL);
insert into matanay.faixa_video values(DEFAULT,"Faixa 8","8888888888",NULL,NULL);
insert into matanay.faixa_video values(DEFAULT,"Faixa 9","9999999999",NULL,NULL);

/* albuns */
insert into matanay.album values(DEFAULT,"Album 1",2,"11111",50,"2001","11111",1,NULL);
insert into matanay.album values(DEFAULT,"Album 2",2,"22222",50,"2002","22222",2,NULL);
insert into matanay.album values(DEFAULT,"Album 3",2,"33333",50,"2003","33333",3,NULL);
insert into matanay.album values(DEFAULT,"Album 4",2,"44444",50,"2004","44444",1,NULL);
insert into matanay.album values(DEFAULT,"Album 5",2,"55555",50,"2005","55555",2,NULL);
insert into matanay.album values(DEFAULT,"Album 6",2,"66666",50,"2006","66666",3,NULL);
insert into matanay.album values(DEFAULT,"Album 7",2,"77777",50,"2007","77777",1,NULL);
insert into matanay.album values(DEFAULT,"Album 8",2,"88888",50,"2008","88888",2,NULL);
insert into matanay.album values(DEFAULT,"Album 9",2,"99999",50,"2009","99999",3,NULL);

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
insert into matanay.album_has_faixa values(5,1);
insert into matanay.album_has_faixa values(6,2);
insert into matanay.album_has_faixa values(6,3);
insert into matanay.album_has_faixa values(7,4);
insert into matanay.album_has_faixa values(7,5);
insert into matanay.album_has_faixa values(8,6);
insert into matanay.album_has_faixa values(8,7);
insert into matanay.album_has_faixa values(9,8);
insert into matanay.album_has_faixa values(9,9);

/* entidade has album */
insert into matanay.entidade_has_album values(1,1);
insert into matanay.entidade_has_album values(2,1);
insert into matanay.entidade_has_album values(3,1);
insert into matanay.entidade_has_album values(4,2);
insert into matanay.entidade_has_album values(5,2);
insert into matanay.entidade_has_album values(6,2);
insert into matanay.entidade_has_album values(7,3);
insert into matanay.entidade_has_album values(8,3);
insert into matanay.entidade_has_album values(9,3);
insert into matanay.entidade_has_album values(1,4);
insert into matanay.entidade_has_album values(2,4);
insert into matanay.entidade_has_album values(3,4);
insert into matanay.entidade_has_album values(4,5);
insert into matanay.entidade_has_album values(5,5);
insert into matanay.entidade_has_album values(6,5);
insert into matanay.entidade_has_album values(7,6);
insert into matanay.entidade_has_album values(8,6);
insert into matanay.entidade_has_album values(9,6);
insert into matanay.entidade_has_album values(1,7);
insert into matanay.entidade_has_album values(2,7);
insert into matanay.entidade_has_album values(3,7);
insert into matanay.entidade_has_album values(4,8);
insert into matanay.entidade_has_album values(5,8);
insert into matanay.entidade_has_album values(6,8);
insert into matanay.entidade_has_album values(7,9);
insert into matanay.entidade_has_album values(8,9);
insert into matanay.entidade_has_album values(9,9);

/* entidade has faixa com percentual */
insert into matanay.entidade_has_faixa_video values(1,1,50);
insert into matanay.entidade_has_faixa_video values(2,1,30);
insert into matanay.entidade_has_faixa_video values(3,1,20);
insert into matanay.entidade_has_faixa_video values(4,2,50);
insert into matanay.entidade_has_faixa_video values(5,2,30);
insert into matanay.entidade_has_faixa_video values(6,2,20);
insert into matanay.entidade_has_faixa_video values(7,3,50);
insert into matanay.entidade_has_faixa_video values(8,3,30);
insert into matanay.entidade_has_faixa_video values(9,3,20);
insert into matanay.entidade_has_faixa_video values(1,4,50);
insert into matanay.entidade_has_faixa_video values(2,4,30);
insert into matanay.entidade_has_faixa_video values(3,4,20);
insert into matanay.entidade_has_faixa_video values(4,5,50);
insert into matanay.entidade_has_faixa_video values(5,5,30);
insert into matanay.entidade_has_faixa_video values(6,5,20);
insert into matanay.entidade_has_faixa_video values(7,6,50);
insert into matanay.entidade_has_faixa_video values(8,6,30);
insert into matanay.entidade_has_faixa_video values(9,6,20);
insert into matanay.entidade_has_faixa_video values(1,7,50);
insert into matanay.entidade_has_faixa_video values(2,7,30);
insert into matanay.entidade_has_faixa_video values(3,7,20);
insert into matanay.entidade_has_faixa_video values(4,8,50);
insert into matanay.entidade_has_faixa_video values(5,8,30);
insert into matanay.entidade_has_faixa_video values(6,8,20);
insert into matanay.entidade_has_faixa_video values(7,9,50);
insert into matanay.entidade_has_faixa_video values(8,9,30);
insert into matanay.entidade_has_faixa_video values(9,9,20);