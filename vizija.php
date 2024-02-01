<?php require('header.php') ?> 

<div class="container">

    <div>
        <h3>Web aplikacija za rezervaciju hotelskih soba.</h3>
        <h5><b>Vizija projekta:</b></h5>
    </div>
    <div class="previewbox">
        
        <div><p>Zbog iznime proširenosti internet mreže, pred tvrtkama koje nude smještaj postavlja se novi zahtjev da 
            njihove usluge budu vidljive i dostupne 0-24h putem web-a.<br> Zbog velike konkurencije, bitno je osigurati što kvalitetniju uslugu praćenu 
            ekonomičnošću i za klijenta i za davatelja usluge. Da bi se hotel nametnuo kao prvi izbor klijentima važno je osigurati jednostavan 
            uvid u ponudu hotela i privlačan i jednostavan način rezervacije smještaja.<br>
            Upravo to cilj je naše aplikacije. </p></div>
    </div>
    <div class="previewbox">
        
        <div><h5><b>Korisničko sučelje</b></h5>
        <p>
            Svaki klijent aplikaciji može pristupiti kao "gost". Kao takav, ima uvid i pristup svim ponudama hotela. Može pronaći dodatne informacije za kontakt, pregledavati ponudu soba, galeriju fotografija.<br>
            Međutim, kako bi održali konzistentnost, za samu rezervaciju smještaja potrebna je prijava korisnika u sustav i pohranjivanje njegovih podataka u našu bazu podataka.<br>
            Prijavi se pristupa klikom na poveznicu "Login" kojom se otvara Login modal u koji je potrebno unijeti Ime korisnika i zaporku.<br>
            Pri samoj rezervaciji sobe, nekon klika na gumb "Rezerviraj" potrebno je ispuniti dodatne podatke kao što je 
            željeni termin odsjedanja u hotelu.</p></div>
    </div>
    <div class="previewbox">
        
        <div><p><h5><b>Razine pristupa</b></h5>
        <p>
            Osim gosta i korisnika, aplikaciji se može pristupiti kao administrator i kao referent za smještaj.
            Administrator je osoba zadužena za protok podataka u aplikaciji. Može regulirati korisnike, dodavati nove i brisati postojeće.
            Također ima uvid u sve postojeće rezervacije.
            Referent za smještaj je posebni zaposlenik hotela koji se bavi sektorom usluga za smještaj. On ima pristup aplikaciji na posebnoj razini
            koja mu omogućuje uvid u stanje ponude. Pod tim se misli da upravlja ponudom soba, regulira dostupnost ili zauzetost sobe ukoliko je ista 
            rezervirana u određenom terminu. Referent također može dodavati nove sobe, mijenjati informacije o pojedinim sobama, kao što su cijena
            i dostupnost posebnih usluga u sobi.</p></div>
    </div>

    <div class="previewbox">
        
        <div><p><h5><b>Podaci za prijavu</b></h5>
        <p>
            Prijava običnog korisnika: korisnik@korisnik.com; lozinka korisnik <br>
            Prijava administratora: admin@admin.com; lozinka admin
            </p></div>
    </div>

</div>

</div>

<?php require('footer.php') ?>