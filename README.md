# Requisiti
* XAMPP *(https://www.apachefriends.org/index.html)*
* VS Code *(https://code.visualstudio.com/Download)*

# Descrizione
Vendita take-away di piatti **Danicucina**.

# Cartelle
* `res`
* `styles`
* `scripts`
* `api`

# HTML + CSS
* `index.html`
  * Copertina
  * Mostra di alcuni piatti
  * Link ad altre pagine
  * Offerta a tempo
* `articoli.html`
  * Elenco piatti in vendita
    * Nome, descrizione, foto, prezzo
* `profilo.html`
  *	Profilo utente
    * Nome, cognome, eta` (data di nascita)
* `login.html`
  * Nome utente, password, ricordami
* `registrazione.html`
  * Nome, cognome, data di nascita, indirizzo mail, password, conferma password, accetto condizioni, iscriviti alla newsletter

# JavaScript
* `index.js`
  * aggiornare in tempo reale la data
* `articoli.js`
  *	Caricare i dati da json (`api/articoli.json`)
  * Nascondere descrizione senza bootstrap
* `registrazione.js`
  * Controlli con feedback in tempo reale

## Controlli registrazione
* Tutti i campi devono essere compilati
* Password deve contenere almeno una maiuscola, minuscola, simbolo, numero ed essere di almeno 8 caratteri
* Password e conferma password devono coincidere
* L'utente deve essere maggiorenne
* Email deve essere verosimile
* Condizioni devono essere accettate
* *Nome utente deve essere univoco (richiede PHP)*

# Database
* Tabella `utenti` *(username, pw_hash, firstname, lastname, birthdate)*
* Tabella `articoli` *(name, price, descr, imgpath)*

# PHP
1. `login.php`
2. `logout.php`
3. `registrazione.php`
4. `profilo.php`
   * Caricare i dati da db
5. `articoli.php`
   * Caricare da db (`api/articoli.php`)
6. `admin.php`
   * Controllo per admin
   * Modifica articoli in vendita per admin
   * Nomina e revoca admin
   * Rimozione articoli
   * Aggiunta articoli (compresa immagine)

# Opzionale
* Direttiva `include` - PHP
* Storico 10 ultimi login in console admin
* Login / registrazione tramite modal in `home.php`
