insert into korisnik_status(status)
values
		('aktivan'),
        ('neaktivan'),
        ('blokiran');
        
select *
from korisnik;

insert into zavrsni.korisnik(ime,prezime,username,email,password,poslednje_logovanje,id_status)
values
		('Ivan','Kovrlija','anivia','kovrlijaivan@gmail.com','anivia',null,1);

select marke
from marke;

insert into stanje_vozila(stanje_vozila)
values
		('Novo vozilo'),
        ('Polovno vozilo');
        

delete from stanje_vozila
where id_stanje_vozila = 4;

select *
from stanje_vozila;

insert into stanje_vozila(stanje_vozila)
values ('Polovno vozilo');

update stanje_vozila set id_stanje_vozila = 2 where id_stanje_vozila = 5;

insert into gorivo(gorivo)
values ('Benzin'),('Dizel'),('Benzin i Gas');

select *
from gorivo;

ALTER TABLE korisnik MODIFY poslednje_logovanje TIMESTAMP;



