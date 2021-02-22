# Meteo_BOT #

## Progetto Piattaforme Digitali per la Gestione del Territorio ##

### Studente: ###
* [Ducci Francesco](https://github.com/Francy9)

-----------------------------------------------------

## Descrizione ##

lo scopo di questo progetto è dare la possibilità all' utente finale di:
* conoscere il meteo in cui si trova per i prossimi 7 giorni.
* conscere il meteo attuale di una città.
* conoscere solo una specifica componente metereologica(tempo,temperatura,massime,minime,alba,tramonto,). 

-----------------------------------------------------

## Relazione ##
il progetto si basa sulla creazione di un API in NodeJS che effettua richieste ai server di "openWeather" richiedendo file json, e l' implementazione di un bot telegram in php. 

-----------------------------------------------------


<h1>Descrizione Progetto </h1>
in base a quello che l'utente sceglie di voler sapere il bot telegram effettuerà una richiesta all'API che a sua volta effettuerà una richiesta ai server di "openWeather" ottenendo come risposta un file json, di questo file vengono prese solo determinate parti e inviate sottoforma di testo come risposta alla precedente richiesta effettuata dal bot.
quello che ottiene l'utente finale è un file di testo inviatogli come messaggio telegram contenente parte delle informazioni prese dai server di "openWeather".

Per la messa online del servizio è stato usato heroku sia per L'API che per il bot telegram.

<h2>Bot di telegram </h2>
Una volta aver avviato l'applicazione telegram e ricercato il bot denominato "Meteo_bot" avremmo una chiat che si presenta così:
<a><img src='Immagini/bot_start.PNG' height='250' alt='ScreenShot'/></a>
Una volta avviato il bot ci verrà inviato un messaggio di benvenuto e apparià una keyboard con due opzioni, la prima quella di poter richiedere un meteo dettagliato e la seconda è quella di richiedere il meteo di un determinato giorno:
<a><img src='Immagini/bot_benvenuto.PNG' height='250' alt='ScreenShot'/></a>
in caso si scerlga il meteo giornaliero potremmo scegliere di quale giorno conoscere il meteo :
<a><img src='Immagini/meteo_giornaliero' height='250' alt='ScreenShot'/></a>
in caso si scerlga il meteo dettagliato avremmo una serie di opzioni per poter scegiere cosa voglianmo sapere precisamente :
<a><img src='Immagini/keyboard_scelta_dettagliata.PNG' height='250' alt='ScreenShot'/></a>
in caso vogliamo sapere il meteo di un giorno che non sia quello odierno dovremmo inviare la nosra posizione :
<a><img src='Immagini/meteo_con_posizione.PNG' height='250' alt='ScreenShot'/></a>
se ad esempio si vuole sapere il tempo in un determinato luogo bisogna procedere come segue:
<a><img src='Immagini/meteo_dettagliato.PNG' height='250' alt='ScreenShot'/></a>

<a><img src='Immagini/imissione.jpg' height='250' alt='ScreenShot'/></a>


