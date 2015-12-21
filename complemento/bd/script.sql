/* Tipo_Favorecido */
insert into matanay.Tipo_Favorecido values(DEFAULT, "Artista");
insert into matanay.Tipo_Favorecido values(DEFAULT, "Autor");
insert into matanay.Tipo_Favorecido values(DEFAULT, "Produtor");

/* Tipo_Entidade */
insert into matanay.Tipo_Entidade values(DEFAULT, "Artista");
insert into matanay.Tipo_Entidade values(DEFAULT, "Autor");
insert into matanay.Tipo_Entidade values(DEFAULT, "Produtor");

/* Tipo_Album */
insert into matanay.Tipo_Album values(DEFAULT, "Estúdio");
insert into matanay.Tipo_Album values(DEFAULT, "Ao Vivo");
insert into matanay.Tipo_Album values(DEFAULT, "Coletânea");

/* Tipo_Modelo */
insert into matanay.Tipo_Modelo values(DEFAULT, "Nacional");
insert into matanay.Tipo_Modelo values(DEFAULT, "Internacional");

/* Cliente */
insert into matanay.Cliente values(DEFAULT, "admin",NULL, NULL);
insert into matanay.Cliente values(DEFAULT, "cliente",NULL, NULL);

/* Usuario */
insert into matanay.Usuario values(DEFAULT, "admin","admin","21232f297a57a5a743894a0e4a801fc3","email@gmail.com",NULL,NULL,1);
insert into matanay.Usuario values(DEFAULT, "cliente","cliente","4983a0ab83ed86e0e7213c8783940193","email1@gmail.com",NULL,NULL,2);

/* Favorecidos */
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","fastAndFurious","170.252.797-22",NULL,"pleaseSomeBodyStopUs","oneMOreRide@email.com",NULL,1);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","22JumpStreet",NULL,"49.116.743/0001-10","theBossDaughter","angelsOfLaw@email.com",NULL,1);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","meuAmigoDaEscola","170.252.797-22",NULL,"isAMonkey","kacoKacoKaco@email.com",NULL,1);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","yingYangYo",NULL,"49.116.743/0001-10","yingYangYoooohhh","issoDoi@tchan.com",NULL,1);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","seguraOchan","170.252.797-22",NULL,"amarraOChan","seguraOChan@Chan.Chan",NULL,1);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","digaAondeVoceVai",NULL,"49.116.743/0001-10","queEuVouVarrendo","vouVarrendo@vouVarrendo.com",NULL,1);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","bomXiBom","170.252.797-22",NULL,"xiBomBomBom","euDecimaSobe@oDeBaixoDesce.com",NULL,1);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","paraBailarLaBamba",NULL,"49.116.743/0001-10","seNecesita","unBoca@deGraca.com",NULL,1);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","kdsjhfkjshdfBuena","170.252.797-22",NULL,"dkjfdjBela","eeeeeMacarena@aaaaii.com",NULL,1);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","weAreHalfWayThere",NULL,"49.116.743/0001-10","ooohhooo","livingOnAPrayer@email.com",NULL,1);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","songMakerSaysItAnitSoBad","170.252.797-22",NULL,"dreamMakerIsGonnaMakeYouMad","SpaceManSays@everyBody.lookDown",NULL,2);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","CJR",NULL,"49.116.743/0001-10","theBest","junior@Company.com",NULL,2);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","hodor","170.252.797-22",NULL,"hodor","hodor@email.com",NULL,2);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","mutleyFacaALgumaCoisa",NULL,"49.116.743/0001-10","pegueOPompo","prendamSeguerem@agarrem.capturem",NULL,2);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","ninguemTemPacienciaComigo","170.252.797-22",NULL,"soNaoTeDouOutra","porQueeee@email.com",NULL,2);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","aCidadeDeTownsVille",NULL,"49.116.743/0001-10","macacoLouco","meninas@super.poderosas",NULL,2);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","seOPicaPauTivesse","170.252.797-22",NULL,"comunicadoAPolicia","nadaDisso@teria.acontecido",NULL,2);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","emTodosEssesAnos",NULL,"49.116.743/0001-10","nessaIndustriaVital","essaEAPrimeiraVez@queIsso.meAcontece",NULL,2);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","mayTheForce","170.252.797-22",NULL,"beWithYou","yoda@email.com",NULL,2);
insert into matanay.Favorecido values(DEFAULT,"banco","agencia","conta","ifYouDidntGet",NULL,"49.116.743/0001-10","theReferences","captain@america.does",NULL,2);

/*Favorecido_has_Tipo_Favorecido*/
insert into matanay.Favorecido_has_Tipo_Favorecido values(1,1,56,79,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(2,2,3,74,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(3,3,63,12,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(4,1,87,5,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(5,2,98,6,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(6,3,32,71,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(7,1,68,3,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(8,2,87,4,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(9,3,98,63,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(10,1,56,79,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(11,1,56,79,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(12,2,3,74,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(13,3,63,12,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(14,1,87,5,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(15,2,98,6,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(16,3,32,71,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(17,1,68,3,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(18,2,87,4,NULL);
insert into matanay.Favorecido_has_Tipo_Favorecido values(19,3,98,63,NULL);

/* Entidades */
insert into matanay.Entidade values(DEFAULT,"BillyOLindo",NULL,"49.116.743/0001-10","sirBilly","masterBilly@coisa.com",NULL,1,NULL,1);
insert into matanay.Entidade values(DEFAULT,"totoroMaisDe8000",NULL,"49.116.743/0001-10","oneTotoro","thatTotoro@coisa.com",NULL,2,NULL,1);
insert into matanay.Entidade values(DEFAULT,"tiaMei","170.252.797-22",NULL,"tioBen","spider@coisa.com",NULL,3,NULL,1);
insert into matanay.Entidade values(DEFAULT,"Jairo","170.252.797-22",NULL,"joe","myJoe@coisa.com",NULL,4,NULL,1);
insert into matanay.Entidade values(DEFAULT,"mundoCanibal",NULL,"49.116.743/0001-10","travesseiroDepreda","michelin@coisa.com",NULL,5,NULL,1);
insert into matanay.Entidade values(DEFAULT,"pabloDoArrocha",NULL,"49.116.743/0001-10","estouIndoEmbora","aMalaJaEstaLaFora@coisa.com",NULL,6,NULL,1);
insert into matanay.Entidade values(DEFAULT,"mrCatra","170.252.797-22",NULL,"25Filhos","talvezSejaVoce@coisa.com",NULL,7,NULL,1);
insert into matanay.Entidade values(DEFAULT,"starLord","170.252.797-22",NULL,"Who?","guardioes@coisa.com",NULL,8,NULL,1);
insert into matanay.Entidade values(DEFAULT,"manOfStell",NULL,"49.116.743/0001-10","Betsy","Tony@coisa.com",NULL,9,NULL,1);
insert into matanay.Entidade values(DEFAULT,"NedStark",NULL,"49.116.743/0001-10","WinterIsComing","noHead@coisa.com",NULL,10,NULL,1);
insert into matanay.Entidade values(DEFAULT,"RRMartin",NULL,"49.116.743/0001-10","whoIsGonnaDieNext","Tyrion@coisa.com",NULL,11,NULL,2);
insert into matanay.Entidade values(DEFAULT,"shiaLabouf",NULL,"49.116.743/0001-10","DoIt","nothingIsImpossible@coisa.com",NULL,12,NULL,2);
insert into matanay.Entidade values(DEFAULT,"onlyAGinger",NULL,"49.116.743/0001-10","canCall","anotherGingerGinger@coisa.com",NULL,13,NULL,2);
insert into matanay.Entidade values(DEFAULT,"dragonBall","170.252.797-22",NULL,"Ressurection","ofFreeza@coisa.com",NULL,14,NULL,2);
insert into matanay.Entidade values(DEFAULT,"knockKnock","170.252.797-22",NULL,"whoIsThere___YouKnow","youKnowWho___Exactly@coisa.com",NULL,15,NULL,2);
insert into matanay.Entidade values(DEFAULT,"IIIIIiiiIIWillAlwaysLoveYou","170.252.797-22",NULL,"leoDiCaprio","Anita@coisa.com",NULL,16,NULL,2);
insert into matanay.Entidade values(DEFAULT,"obamaCell","170.252.797-22",NULL,"don_uanaBi","obamaCell_EniMor@coisa.com",NULL,17,NULL,2);
insert into matanay.Entidade values(DEFAULT,"whoLetTheDogsOut","170.252.797-22",NULL,"rouffRouff","evenYouRouffus@coisa.com",NULL,18,NULL,2);
insert into matanay.Entidade values(DEFAULT,"oRaulPerguntou",NULL,"49.116.743/0001-10","voceNaoAcertou_pegueSeuBanquinho","eSaiaDeMansinho@coisa.com",NULL,19,NULL,2);
insert into matanay.Entidade values(DEFAULT,"hitmonlee",NULL,"49.116.743/0001-10","hitmonchan","hitmondefesta@coisa.com",NULL,20,NULL,2);

/*Entidade_has_Tipo_Entidade*/
insert into matanay.Entidade_has_Tipo_Entidade values(1,1,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(1,2,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(1,3,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(2,2,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(3,3,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(4,1,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(5,2,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(5,3,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(6,3,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(7,1,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(8,2,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(9,1,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(9,3,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(10,1,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(11,1,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(11,2,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(12,3,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(13,1,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(14,2,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(15,2,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(15,3,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(16,1,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(17,2,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(18,3,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(19,1,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(20,1,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(20,2,20,20,NULL);
insert into matanay.Entidade_has_Tipo_Entidade values(20,3,20,20,NULL);

/* telefone Entidade */
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",1);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",1);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",2);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",2);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",3);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",3);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",4);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",4);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",5);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",5);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",6);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",6);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",7);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",7);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",8);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",8);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",9);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",9);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",10);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",10);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",11);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",11);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",12);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",12);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",13);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",13);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",14);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",14);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",15);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",15);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",16);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",16);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",17);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",17);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",18);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",18);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",19);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",19);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",20);
insert into matanay.Telefone_Entidade values(DEFAULT,"(99)9999-9999",20);

/* telefone Favorecidos */
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",1);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",1);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",2);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",2);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",3);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",3);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",4);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",4);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",5);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",5);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",6);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",6);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",7);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",7);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",8);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",8);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",9);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",9);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",10);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",10);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",11);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",11);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",12);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",12);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",13);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",13);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",14);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",14);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",15);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",15);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",16);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",16);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",17);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",17);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",18);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",18);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",19);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",19);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",20);
insert into matanay.Telefone_Favorecido values(DEFAULT,NULL,"(99)9999-9999",20);

/* Moedas */
insert into matanay.Moeda values(DEFAULT,"Moeda 1","M1",5.34,NULL,1);
insert into matanay.Moeda values(DEFAULT,"Moeda 2","M2",3.21,NULL,1);
insert into matanay.Moeda values(DEFAULT,"Moeda 3","M3",1.11,NULL,1);
insert into matanay.Moeda values(DEFAULT,"Moeda 4","M4",5.74,NULL,1);
insert into matanay.Moeda values(DEFAULT,"Moeda 5","M5",1.37,NULL,1);
insert into matanay.Moeda values(DEFAULT,"Moeda 6","M6",3.34,NULL,2);
insert into matanay.Moeda values(DEFAULT,"Moeda 7","M7",5.34,NULL,2);
insert into matanay.Moeda values(DEFAULT,"Moeda 8","M8",3.21,NULL,2);
insert into matanay.Moeda values(DEFAULT,"Moeda 9","M9",1.01,NULL,2);
insert into matanay.Moeda values(DEFAULT,"Moeda 10","M10",5.74,NULL,2);	

/* Tipo_Imposto */
insert into matanay.Tipo_Imposto values(DEFAULT, "Fisico");
insert into matanay.Tipo_Imposto values(DEFAULT, "Digital");

/* Imposto */
insert into matanay.Imposto values(DEFAULT,"Imposto 1","100",1,1,NULL);
insert into matanay.Imposto values(DEFAULT,"Imposto 2","200",1,2,NULL);
insert into matanay.Imposto values(DEFAULT,"Imposto 3","300",1,1,NULL);
insert into matanay.Imposto values(DEFAULT,"Imposto 4","400",1,2,NULL);
insert into matanay.Imposto values(DEFAULT,"Imposto 5","100",2,1,NULL);
insert into matanay.Imposto values(DEFAULT,"Imposto 6","200",2,2,NULL);
insert into matanay.Imposto values(DEFAULT,"Imposto 7","300",2,1,NULL);
insert into matanay.Imposto values(DEFAULT,"Imposto 8","400",2,2,NULL);

/* faixas */
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 1","BRRGE1500600",NULL,NULL,1);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 2","BRRGE1500601",NULL,NULL,1);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 3","BRRGE1500602",NULL,NULL,1);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 4","BRRGE1500603",NULL,NULL,1);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 5","BRRGE1500604",NULL,NULL,1);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 6","BRRGE1500605",NULL,NULL,1);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 7","BRRGE1500606",NULL,NULL,1);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 8","BRRGE1500607",NULL,NULL,1);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 9","BRRGE1500608",NULL,NULL,1);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 10","BRRGE1500600",NULL,NULL,1);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 11","BRRGE1500601",NULL,NULL,2);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 12","BRRGE1500601",NULL,NULL,2);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 13","BRRGE1500602",NULL,NULL,2);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 14","BRRGE1500603",NULL,NULL,2);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 15","BRRGE1500604",NULL,NULL,2);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 16","BRRGE1500605",NULL,NULL,2);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 17","BRRGE1500606",NULL,NULL,2);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 18","BRRGE1500607",NULL,NULL,2);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 19","BRRGE1500608",NULL,NULL,2);
insert into matanay.Faixa_Video values(DEFAULT,"Faixa 20","BRRGE1500601",NULL,NULL,2);

/* faixa has Imposto */
insert into matanay.Faixa_Video_has_Imposto values(1,1);
insert into matanay.Faixa_Video_has_Imposto values(1,2);
insert into matanay.Faixa_Video_has_Imposto values(1,3);
insert into matanay.Faixa_Video_has_Imposto values(2,1);
insert into matanay.Faixa_Video_has_Imposto values(3,4);
insert into matanay.Faixa_Video_has_Imposto values(4,1);
insert into matanay.Faixa_Video_has_Imposto values(5,3);
insert into matanay.Faixa_Video_has_Imposto values(7,2);
insert into matanay.Faixa_Video_has_Imposto values(9,4);
insert into matanay.Faixa_Video_has_Imposto values(10,4);
insert into matanay.Faixa_Video_has_Imposto values(11,6);
insert into matanay.Faixa_Video_has_Imposto values(11,8);
insert into matanay.Faixa_Video_has_Imposto values(13,6);
insert into matanay.Faixa_Video_has_Imposto values(15,7);
insert into matanay.Faixa_Video_has_Imposto values(15,5);
insert into matanay.Faixa_Video_has_Imposto values(16,5);
insert into matanay.Faixa_Video_has_Imposto values(17,6);
insert into matanay.Faixa_Video_has_Imposto values(18,7);
insert into matanay.Faixa_Video_has_Imposto values(19,7);

/* albuns */
insert into matanay.Album values(DEFAULT,"Album 1",2,"7891430144791",50,"2001","11111",1,NULL,1);
insert into matanay.Album values(DEFAULT,"Album 2",2,"7891430144791",50,"2002","22222",2,NULL,1);
insert into matanay.Album values(DEFAULT,"Album 3",2,"7891430144791",50,"2003","33333",3,NULL,1);
insert into matanay.Album values(DEFAULT,"Album 4",2,"7891430144791",50,"2004","44444",1,NULL,1);
insert into matanay.Album values(DEFAULT,"Album 5",2,"7891430144791",50,"2005","55555",2,NULL,1);
insert into matanay.Album values(DEFAULT,"Album 6",2,"7891430144791",50,"2006","66666",3,NULL,1);
insert into matanay.Album values(DEFAULT,"Album 7",2,"7891430144791",50,"2007","77777",1,NULL,1);
insert into matanay.Album values(DEFAULT,"Album 8",2,"7891430144791",50,"2008","88888",2,NULL,1);
insert into matanay.Album values(DEFAULT,"Album 9",2,"7891430144791",50,"2009","99999",3,NULL,1);
insert into matanay.Album values(DEFAULT,"Album 10",2,"7891430144791",50,"2001","11111",1,NULL,1);
insert into matanay.Album values(DEFAULT,"Album 11",2,"7891430144791",50,"2001","11111",1,NULL,2);
insert into matanay.Album values(DEFAULT,"Album 12",2,"7891430144791",50,"2002","22222",2,NULL,2);
insert into matanay.Album values(DEFAULT,"Album 13",2,"7891430144791",50,"2003","33333",3,NULL,2);
insert into matanay.Album values(DEFAULT,"Album 14",2,"7891430144791",50,"2004","44444",1,NULL,2);
insert into matanay.Album values(DEFAULT,"Album 15",2,"7891430144791",50,"2005","55555",2,NULL,2);
insert into matanay.Album values(DEFAULT,"Album 16",2,"7891430144791",50,"2006","66666",3,NULL,2);
insert into matanay.Album values(DEFAULT,"Album 17",2,"7891430144791",50,"2007","77777",1,NULL,2);
insert into matanay.Album values(DEFAULT,"Album 18",2,"7891430144791",50,"2008","88888",2,NULL,2);
insert into matanay.Album values(DEFAULT,"Album 19",2,"7891430144791",50,"2009","99999",3,NULL,2);
insert into matanay.Album values(DEFAULT,"Album 20",2,"7891430144791",50,"2001","11111",1,NULL,2);

/* Album has Imposto */
insert into matanay.Album_has_Imposto values(1,1);
insert into matanay.Album_has_Imposto values(1,2);
insert into matanay.Album_has_Imposto values(1,3);
insert into matanay.Album_has_Imposto values(2,1);
insert into matanay.Album_has_Imposto values(3,4);
insert into matanay.Album_has_Imposto values(4,1);
insert into matanay.Album_has_Imposto values(5,3);
insert into matanay.Album_has_Imposto values(7,2);
insert into matanay.Album_has_Imposto values(9,4);
insert into matanay.Album_has_Imposto values(10,4);
insert into matanay.Album_has_Imposto values(11,6);
insert into matanay.Album_has_Imposto values(11,8);
insert into matanay.Album_has_Imposto values(13,6);
insert into matanay.Album_has_Imposto values(15,7);
insert into matanay.Album_has_Imposto values(15,5);
insert into matanay.Album_has_Imposto values(16,5);
insert into matanay.Album_has_Imposto values(17,6);
insert into matanay.Album_has_Imposto values(18,7);
insert into matanay.Album_has_Imposto values(19,7);

/* Album has faixa */
insert into matanay.Album_has_Faixa values(1,1);
insert into matanay.Album_has_Faixa values(1,2);
insert into matanay.Album_has_Faixa values(2,3);
insert into matanay.Album_has_Faixa values(2,4);
insert into matanay.Album_has_Faixa values(3,5);
insert into matanay.Album_has_Faixa values(3,6);
insert into matanay.Album_has_Faixa values(4,7);
insert into matanay.Album_has_Faixa values(4,8);
insert into matanay.Album_has_Faixa values(5,9);
insert into matanay.Album_has_Faixa values(5,10);
insert into matanay.Album_has_Faixa values(6,2);
insert into matanay.Album_has_Faixa values(6,3);
insert into matanay.Album_has_Faixa values(7,4);
insert into matanay.Album_has_Faixa values(7,5);
insert into matanay.Album_has_Faixa values(8,6);
insert into matanay.Album_has_Faixa values(8,7);
insert into matanay.Album_has_Faixa values(9,8);
insert into matanay.Album_has_Faixa values(9,9);
insert into matanay.Album_has_Faixa values(10,1);
insert into matanay.Album_has_Faixa values(10,2);
insert into matanay.Album_has_Faixa values(11,11);
insert into matanay.Album_has_Faixa values(11,12);
insert into matanay.Album_has_Faixa values(12,13);
insert into matanay.Album_has_Faixa values(12,14);
insert into matanay.Album_has_Faixa values(13,15);
insert into matanay.Album_has_Faixa values(13,16);
insert into matanay.Album_has_Faixa values(14,17);
insert into matanay.Album_has_Faixa values(14,18);
insert into matanay.Album_has_Faixa values(15,19);
insert into matanay.Album_has_Faixa values(15,11);
insert into matanay.Album_has_Faixa values(16,20);
insert into matanay.Album_has_Faixa values(16,13);
insert into matanay.Album_has_Faixa values(17,14);
insert into matanay.Album_has_Faixa values(17,15);
insert into matanay.Album_has_Faixa values(18,16);
insert into matanay.Album_has_Faixa values(18,17);
insert into matanay.Album_has_Faixa values(19,18);
insert into matanay.Album_has_Faixa values(19,19);
insert into matanay.Album_has_Faixa values(20,18);
insert into matanay.Album_has_Faixa values(20,19);

/* Entidade has Album */
insert into matanay.Entidade_has_Album values(1,1);
insert into matanay.Entidade_has_Album values(4,2);
insert into matanay.Entidade_has_Album values(7,3);
insert into matanay.Entidade_has_Album values(9,4);
insert into matanay.Entidade_has_Album values(10,5);
insert into matanay.Entidade_has_Album values(1,6);
insert into matanay.Entidade_has_Album values(4,7);
insert into matanay.Entidade_has_Album values(1,8);
insert into matanay.Entidade_has_Album values(7,9);
insert into matanay.Entidade_has_Album values(10,10);
insert into matanay.Entidade_has_Album values(19,11);
insert into matanay.Entidade_has_Album values(13,12);
insert into matanay.Entidade_has_Album values(16,13);
insert into matanay.Entidade_has_Album values(19,14);
insert into matanay.Entidade_has_Album values(20,15);
insert into matanay.Entidade_has_Album values(11,16);
insert into matanay.Entidade_has_Album values(13,17);
insert into matanay.Entidade_has_Album values(16,18);
insert into matanay.Entidade_has_Album values(19,19);
insert into matanay.Entidade_has_Album values(20,20);

/* Entidade has faixa com percentual */
insert into matanay.Entidade_has_Faixa_Video values(1,1,100,1);
insert into matanay.Entidade_has_Faixa_Video values(1,1,50,2);
insert into matanay.Entidade_has_Faixa_Video values(1,1,100,3);
insert into matanay.Entidade_has_Faixa_Video values(2,1,50,2);
insert into matanay.Entidade_has_Faixa_Video values(1,2,100,1);
insert into matanay.Entidade_has_Faixa_Video values(5,2,60,2);
insert into matanay.Entidade_has_Faixa_Video values(8,2,40,2);
insert into matanay.Entidade_has_Faixa_Video values(4,3,55,1);
insert into matanay.Entidade_has_Faixa_Video values(2,3,85,2);
insert into matanay.Entidade_has_Faixa_Video values(8,3,15,2);
insert into matanay.Entidade_has_Faixa_Video values(4,4,100,1);
insert into matanay.Entidade_has_Faixa_Video values(2,4,100,2);
insert into matanay.Entidade_has_Faixa_Video values(3,4,40,3);
insert into matanay.Entidade_has_Faixa_Video values(6,4,30,3);
insert into matanay.Entidade_has_Faixa_Video values(9,4,30,3);
insert into matanay.Entidade_has_Faixa_Video values(7,5,100,1);
insert into matanay.Entidade_has_Faixa_Video values(5,5,80,2);
insert into matanay.Entidade_has_Faixa_Video values(8,5,20,2);
insert into matanay.Entidade_has_Faixa_Video values(1,5,25,3);
insert into matanay.Entidade_has_Faixa_Video values(5,5,25,3);
insert into matanay.Entidade_has_Faixa_Video values(6,5,25,3);
insert into matanay.Entidade_has_Faixa_Video values(9,5,25,3);
insert into matanay.Entidade_has_Faixa_Video values(7,6,70,1);
insert into matanay.Entidade_has_Faixa_Video values(4,6,30,1);
insert into matanay.Entidade_has_Faixa_Video values(2,6,100,2);
insert into matanay.Entidade_has_Faixa_Video values(1,7,100,1);
insert into matanay.Entidade_has_Faixa_Video values(2,7,100,2);
insert into matanay.Entidade_has_Faixa_Video values(3,7,100,3);
insert into matanay.Entidade_has_Faixa_Video values(4,8,100,1);
insert into matanay.Entidade_has_Faixa_Video values(5,8,100,2);
insert into matanay.Entidade_has_Faixa_Video values(6,8,100,3);
insert into matanay.Entidade_has_Faixa_Video values(10,9,100,1);
insert into matanay.Entidade_has_Faixa_Video values(8,9,100,2);
insert into matanay.Entidade_has_Faixa_Video values(9,9,100,3);
insert into matanay.Entidade_has_Faixa_Video values(1,10,100,1);
insert into matanay.Entidade_has_Faixa_Video values(1,10,100,2);
insert into matanay.Entidade_has_Faixa_Video values(1,10,100,3);
insert into matanay.Entidade_has_Faixa_Video values(11,11,100,1);
insert into matanay.Entidade_has_Faixa_Video values(11,11,100,2);
insert into matanay.Entidade_has_Faixa_Video values(18,11,100,3);
insert into matanay.Entidade_has_Faixa_Video values(13,12,100,1);
insert into matanay.Entidade_has_Faixa_Video values(14,12,100,2);
insert into matanay.Entidade_has_Faixa_Video values(15,12,100,3);
insert into matanay.Entidade_has_Faixa_Video values(16,13,100,1);
insert into matanay.Entidade_has_Faixa_Video values(17,13,100,2);
insert into matanay.Entidade_has_Faixa_Video values(12,13,100,3);
insert into matanay.Entidade_has_Faixa_Video values(19,14,100,1);
insert into matanay.Entidade_has_Faixa_Video values(20,14,100,2);
insert into matanay.Entidade_has_Faixa_Video values(20,14,100,3);
insert into matanay.Entidade_has_Faixa_Video values(20,15,100,1);
insert into matanay.Entidade_has_Faixa_Video values(14,15,100,2);
insert into matanay.Entidade_has_Faixa_Video values(12,15,100,3);
insert into matanay.Entidade_has_Faixa_Video values(11,16,100,1);
insert into matanay.Entidade_has_Faixa_Video values(17,16,100,2);
insert into matanay.Entidade_has_Faixa_Video values(18,16,100,3);
insert into matanay.Entidade_has_Faixa_Video values(16,17,100,1);
insert into matanay.Entidade_has_Faixa_Video values(11,17,100,2);
insert into matanay.Entidade_has_Faixa_Video values(15,17,100,3);
insert into matanay.Entidade_has_Faixa_Video values(11,18,100,1);
insert into matanay.Entidade_has_Faixa_Video values(20,18,100,2);
insert into matanay.Entidade_has_Faixa_Video values(12,18,100,3);
insert into matanay.Entidade_has_Faixa_Video values(19,19,100,1);
insert into matanay.Entidade_has_Faixa_Video values(17,19,100,2);
insert into matanay.Entidade_has_Faixa_Video values(20,19,100,3);
insert into matanay.Entidade_has_Faixa_Video values(13,20,100,1);
insert into matanay.Entidade_has_Faixa_Video values(14,20,100,2);
insert into matanay.Entidade_has_Faixa_Video values(18,20,100,3);

/*Modelo relatorio*/
insert into matanay.Modelo values(DEFAULT ,"queridaEsqueciAsKids","A","C","E","G","I","K","M","O",1,NULL,1);
insert into matanay.Modelo values(DEFAULT ,"aPoupancaDosAneis","O","M","K","I","G","E","C","A",1,NULL,1);
insert into matanay.Modelo values(DEFAULT ,"oInfernoDaPoupanca","E","G","I","K","M","O","A","C",1,NULL,1);
insert into matanay.Modelo values(DEFAULT ,"entreTapasEPoupancas","K","M","O","A","C","E","G","I",1,NULL,1);
insert into matanay.Modelo values(DEFAULT ,"aPoderosaPoupanca","A","C","E","N","P","R","T","X",2,NULL,2);
insert into matanay.Modelo values(DEFAULT ,"poupancaDeMatar","X","T","R","P","N","E","C","A",2,NULL,2);
insert into matanay.Modelo values(DEFAULT ,"eAPoupancaLevou","R","P","N","E","C","A","X","T",2,NULL,2);
insert into matanay.Modelo values(DEFAULT ,"poupancaEvil","A","R","F","X","N","U","D","I",2,NULL,2);
insert into matanay.Modelo values(20,"MatanayPadrao","C","A","D","F","V","U","T","N",1,NULL,1);

/* Contrato */
insert into matanay.Contrato values(DEFAULT,"Contrato 1","2015-01-01","2015-02-01",NULL,1,1,NULL,1);
insert into matanay.Contrato values(DEFAULT,"Contrato 2","2015-01-01","2015-10-01",NULL,3,4,NULL,1);
insert into matanay.Contrato values(DEFAULT,"Contrato 3","2015-01-01","2015-07-01",NULL,6,6,NULL,1);
insert into matanay.Contrato values(DEFAULT,"Contrato 4","2015-01-01","2015-03-01",NULL,4,7,NULL,1);
insert into matanay.Contrato values(DEFAULT,"Contrato 5","2015-01-01","2015-11-01",NULL,8,2,NULL,1);
insert into matanay.Contrato values(DEFAULT,"Contrato 6","2015-01-01","2015-05-01",NULL,12,13,NULL,2);
insert into matanay.Contrato values(DEFAULT,"Contrato 7","2015-01-01","2015-09-01",NULL,19,17,NULL,2);
insert into matanay.Contrato values(DEFAULT,"Contrato 8","2015-01-01","2015-12-01",NULL,14,15,NULL,2);
insert into matanay.Contrato values(DEFAULT,"Contrato 9","2015-01-01","2015-06-01",NULL,13,16,NULL,2);
insert into matanay.Contrato values(DEFAULT,"Contrato 10","2015-01-01","2015-10-01",NULL,20,12,NULL,2);	

#Funcionalidades

#cliente
insert into matanay.Funcionalidades values(DEFAULT,"func_manter_cliente",NULL);

#perfil
insert into matanay.Funcionalidades values(DEFAULT,"func_manter_perfil",NULL);

#Entidade
insert into matanay.Funcionalidades values(DEFAULT,"func_cadastrar_Entidade",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_listar_Entidade",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_excluir_Entidade",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_atualizar_Entidade",NULL);

#Favorecido
insert into matanay.Funcionalidades values(DEFAULT,"func_cadastrar_Favorecido",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_listar_Favorecido",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_excluir_Favorecido",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_atualizar_Favorecido",NULL);

#faixas
insert into matanay.Funcionalidades values(DEFAULT,"func_cadastrar_faixas",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_listar_faixas",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_excluir_faixas",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_atualizar_faixas",NULL);

#albuns
insert into matanay.Funcionalidades values(DEFAULT,"func_cadastrar_albuns",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_listar_albuns",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_excluir_albuns",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_atualizar_albuns",NULL);

#Imposto
insert into matanay.Funcionalidades values(DEFAULT,"func_cadastrar_Imposto",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_listar_Imposto",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_excluir_Imposto",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_atualizar_Imposto",NULL);

#Moeda
insert into matanay.Funcionalidades values(DEFAULT,"func_cadastrar_Moeda",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_listar_Moeda",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_excluir_Moeda",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_atualizar_Moeda",NULL);

#rio
insert into matanay.Funcionalidades values(DEFAULT,"func_cadastrar_relatorio",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_listar_relatorio",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_excluir_relatorio",NULL);
insert into matanay.Funcionalidades values(DEFAULT,"func_atualizar_relatorio",NULL);

