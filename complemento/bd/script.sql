/*tipo_favorecido*/
insert into matanay.tipo_favorecido values(DEFAULT, "artista");
insert into matanay.tipo_favorecido values(DEFAULT, "produtor");
insert into matanay.tipo_favorecido values(DEFAULT, "autor");
/*tipo_album*/
insert into matanay.tipo_album values(DEFAULT, "coletanea");
insert into matanay.tipo_album values(DEFAULT, "ao vivo");
insert into matanay.tipo_album values(DEFAULT, "estudio");
/*tipo_entidade*/
insert into matanay.tipo_entidade values(DEFAULT, "artista");
insert into matanay.tipo_entidade values(DEFAULT, "produtor");
insert into matanay.tipo_entidade values(DEFAULT, "autor");
/*tipo_modelo*/
insert into matanay.tipo_modelo values(DEFAULT, "nacional");
insert into matanay.tipo_modelo values(DEFAULT, "internacional");
/*cliente*/
insert into matanay.cliente values(DEFAULT, "admin",NULL);
/*perfil*/
insert into matanay.perfis values(DEFAULT, "admin","admim","21232f297a57a5a743894a0e4a801fc3",NULL,1);

/*favorecidos */
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido1","111.111.111-11","93.826.171/0001-55","contato1","email1",30,30,NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido2","111.111.111-12","93.826.171/0001-57","contato2","email2",30,30,NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido3","111.111.111-13","93.826.171/0001-56","contato3","email3",30,30,NULL,3);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido4","111.111.111-14","93.826.171/0001-58","contato4","email4",30,30,NULL,1);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido5","111.111.111-15","93.826.171/0001-59","contato5","email5",30,30,NULL,2);
insert into matanay.favorecido values(DEFAULT,"padrao","padrao","padrao","Favorecido6","111.111.111-16","93.826.171/0001-54","contato6","email6",30,30,NULL,3);

	/*Entidades*/
insert into matanay.entidade values(DEFAULT,"Entidade1",NULL,"93.826.171/0001-54","contato1","email1",NULL,30,30,1,1,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade2",NULL,"93.826.171/0001-54","contato2","email2",NULL,30,30,2,2,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade3","111.111.111-16",NULL,"contato3","email3",NULL,30,30,3,3,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade4","111.111.111-16",NULL,"contato4","email4",NULL,30,30,1,4,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade5",NULL,"93.826.171/0001-54","contato5","email5",NULL,30,30,2,5,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade6",NULL,"93.826.171/0001-54","contato6","email6",NULL,30,30,3,6,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade7","111.111.111-16",NULL,"contato7","email7",NULL,30,30,1,1,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade8","111.111.111-16",NULL,"contato8","email8",NULL,30,30,2,2,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade9",NULL,"93.826.171/0001-54","contato9","email9",NULL,30,30,3,3,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade10",NULL,"93.826.171/0001-54","contato10","email10",NULL,30,30,1,4,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade11",NULL,"93.826.171/0001-54","contato11","email11",NULL,30,30,2,5,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade12",NULL,"93.826.171/0001-54","contato12","email12",NULL,30,30,3,6,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade13",NULL,"93.826.171/0001-54","contato13","email13",NULL,30,30,1,1,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade14","111.111.111-16",NULL,"contato14","email14",NULL,30,30,2,2,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade15","111.111.111-16",NULL,"contato15","email15",NULL,30,30,3,3,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade16","111.111.111-16",NULL,"contato16","email16",NULL,30,30,1,4,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade17","111.111.111-16",NULL,"contato17","email17",NULL,30,30,2,5,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade18","111.111.111-16",NULL,"contato18","email18",NULL,30,30,3,6,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade19",NULL,"93.826.171/0001-54","contato19","email19",NULL,30,30,1,1,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade20",NULL,"93.826.171/0001-54","contato20","email20",NULL,30,30,2,2,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade21",NULL,"93.826.171/0001-54","contato21","email21",NULL,30,30,3,3,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade22",NULL,"93.826.171/0001-54","contato22","email22",NULL,30,30,1,4,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade23",NULL,"93.826.171/0001-54","contato23","email23",NULL,30,30,2,5,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade24","111.111.111-16",NULL,"contato24","email24",NULL,30,30,3,6,NULL,1);
insert into matanay.entidade values(DEFAULT,"Entidade25","111.111.111-16",NULL,"contato25","email25",NULL,30,30,1,1,NULL,1);

/*TELEFONE Entidade*/
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