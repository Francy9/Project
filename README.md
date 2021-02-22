# Meteo_BOT #

## Progetto Piattaforme Digitali per la Gestione del Territorio ##

### Studente: ###
* [Ducci Francesco mat n°283055](https://github.com/Francy9)

-----------------------------------------------------

## Descrizione ##

Lo scopo di questo progetto è dare la possibilità all' utente finale di:
* conoscere il meteo del luogo in cui si trova per i prossimi 7 giorni.
* conoscere il meteo attuale di una città.
* conoscere solo una specifica componente metereologica(tempo,temperatura,massime,minime,alba,tramonto,). 

-----------------------------------------------------

## Relazione ##
Il progetto si basa sulla creazione di un API in NodeJS che effettua richieste ai server di "openWeather" richiedendo file di tipo json, e l' implementazione di un bot telegram in php. 

-----------------------------------------------------


<h1>Descrizione Progetto </h1>
In base a quello che l'utente sceglie il bot telegram effettuerà una richiesta all'API che a sua volta inoltrerà una richiesta ai server di "openWeather" ottenendo come risposta un file json. Di questo file vengono prese solo determinate parti e inviate sottoforma di testo come risposta alla precedente richiesta effettuata dal bot.
Quello che ottiene l'utente finale è un file di testo inviatogli come messaggio telegram contenente parte delle informazioni prese dai server di "openWeather".

Per la messa online del servizio è stato usato heroku sia per L'API che per il bot telegram.

<h2>Bot di telegram </h2>
Una volta aver avviato l'applicazione telegram e ricercato il bot denominato "Meteo_bot" avremmo una chiat che si presenta così:
<a><img src='Immagini/bot_start.PNG' height='250' alt='ScreenShot'/></a>
Una volta avviato il bot ci verrà inviato un messaggio di benvenuto e apparià una keyboard con due opzioni, la prima quella di poter richiedere un meteo dettagliato e la seconda è quella di richiedere il meteo di un determinato giorno:
<a><img src='Immagini/bot_benvenuto.PNG' height='300' alt='ScreenShot'/></a>
in caso si scerlga il meteo giornaliero potremmo scegliere di quale giorno conoscere il meteo :
<a><img src='Immagini/Meteo_giornaliero' height='300' alt='ScreenShot'/></a>
in caso si scerlga il meteo dettagliato avremmo una serie di opzioni per poter scegiere cosa voglianmo sapere precisamente :
<a><img src='Immagini/keyboard_scelta_dettagliata.PNG' height='300' alt='ScreenShot'/></a>
in caso vogliamo sapere il meteo di un giorno che non sia quello odierno dovremmo inviare la nosra posizione :
<a><img src='Immagini/meteo_con_posizione.PNG' height='300' alt='ScreenShot'/></a>
se ad esempio si vuole sapere il tempo in un determinato luogo bisogna procedere come segue:
<a><img src='Immagini/meteo_dettagliato.PNG' height='300' alt='ScreenShot'/></a>



