-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Lug 16, 2022 alle 16:44
-- Versione del server: 10.4.21-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `name` varchar(300) NOT NULL,
  `descr` varchar(10000) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `img_path` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`name`, `descr`, `price`, `img_path`) VALUES
('Curry Verde di Pollo Thai', 'Curry Verde di Pollo Thai un piatto facile e veloce da preparare e dalla piccantezza tipica tailandese. Perfetto per ogni occasione, è un vero must per gli amanti della cucina etnica! La pasta di curry è uno dei mix di spezie più usato nella cucina tailandese. Esiste di vari colori, in questo caso utilizzeremo quella verde. Tra le spezie che lo compongono troviamo scorza di lime kaffir e peperoncino verde. La pasta di curry si può preparare in casa ma qui da noi è difficile trovare gli ingredienti. Per questo io utilizzo quella già pronta. Si può trovare in alcuni supermercati oppure nei negozi etnici o online. A bilanciare il sapore pungente e leggermente piccante della pasta di curry c’è la dolcezza del latte di cocco. Quest’ultimo viene venduto in lattine e generalmente ha un prezzo molto contenuto. Il risultato è un piatto cremoso, speziato ma dal sapore equilibrato! In Tailandia viene preparato in tanti modi, anche con altre carni o con i gamberi. La mia versione prevede petto di pollo, piselli e fagiolini. Per me è fantastica! In casa mi chiedono tutti il bis! Prepariamo insieme il Curry Verde di Pollo Thai.', '10.00', '/res/DSC_0991.jpg'),
('Focaccia al Basilico e Olive con Lievito Istantaneo', 'Focaccia al Basilico e Olive con Lievito Istantaneo pronta in 5 minuti! Alta, soffice e profumata grazie al basilico tritato nell’impasto! Perfetta da preparare all’ultimo minuto! Stamattina avevo proprio voglia di mangiare una bella fetta di focaccia ma il tempo stringeva e non c’era tempo per farla lievitare. Così ho pensato di sperimentare questo impasto con lievito chimico (tipo quello per dolci) e il risultato è stato formidabile! La focaccia è sofficissima, alta e profumata, una fetta tira l’altra! Ve la consiglio, non lasciatevela scappare! Segnatevi la ricetta e fatemi sapere se vi piace!', '4.55', '/res/DSC_0940-1024x1536.jpg'),
('Insalata di Fagiolini con Dressing alla Senape', 'Insalata di Fagiolini con Dressing alla Senape. Ho sempre avuto un rapporto di odio/amore con i fagiolini. Così teneri, buoni e versatili in cucina ma così faticosi da raccogliere! Quando andavo nell’orto ci lasciavo sempre la schiena Scherzi a parte, i fagiolini sono l’emblema dell’estate e oggi ve li voglio proporre in un’insalata fredda con dressing alla senape, arricchita con semi di sesamo e pinoli per dare un tocco crunchy in più! Una proposta super fresh, veloce e sfiziosa perfetta per l’estate! Fatemi sapere se vi piace! Vi aspetto sul mio profilo Instagram! Buona giornata!', '6.64', '/res/DSC_0931-1024x1536.jpg'),
('Muffin al Cacao Pistacchio e Fava Tonka', 'Muffin al Cacao Pistacchio e Fava Tonka. Oggi vi presento dei muffin davvero deliziosi e con un profumo indescrivibile! Sono sofficissimi e senza burro! Prepararli è facilissimo, serve solo una ciotola e un paio di fruste  elettriche. Al posto del burro utilizziamo l’olio di semi e un cucchiaio di crema di pistacchi (io rigorosamente pura, 100% pistacchio). Nei giorni passati avevo chiesto su Instagram se qualcuno conoscesse questa spezia ma la maggior parte di voi ha risposto NO. Per questo lasciatemi spendere due parole su questa meravigliosa spezia! Con fava Tonka si intende il seme chiamato cumaru contenuto nel frutto dell’albero Dipteryx odorata (appartenente alla famiglia delle Fabaceae, la stessa dei fagioli) che cresce nelle foreste amazzoniche venezuelane e brasiliane, in Guyana francese e Trinidad. Il frutto, almeno per l’aspetto, assomiglia al mango mentre i suoi semi (ovvero le fave tonka) sembrano dei datteri “rugosi”. La fava tonka ha un profumo ricco, intenso e avvolgente, leggermente pungente e vanigliato. Se dovessi descriverlo in due parole, direi che sembra un mix tra vaniglia e rum! La fava tonka si presta moltissimo in pasticceria, in particolare si utilizza grattugiata in piccole quantità per aromatizzare dolci, creme e non solo! Vi consiglio di utilizzare la grattugia della noce moscata. Oggi utilizzeremo la fava tonka insieme al pistacchio e al cacao. Sentirete che profumo ma soprattutto che bontà!! Vediamo insieme come preparare i Muffin al Cacao Pistacchio e Fava Tonka.', '7.22', '/res/muffin.jpg'),
('Polpettone di Zucca e Patate alla Genovese', 'Il Polpettone di Zucca e Patate alla Genovese è la versione autunnale -e meno conosciuta- del classico polpettone ligure di patate e fagiolini. La preparazione è identica tranne che per la cottura della zucca che va a sostituire quella dei fagiolini. Il polpettone di zucca e patate si presenta basso, ricoperto da una delizia crosticina di pangrattato ed è morbidissimo all’interno. In superficie viene decorato decorato con i rebbi di una forchetta. Ovviamente è un piatto senza carne quindi perfetto per una dieta vegetariana! Per preparare un ottimo polpettone bisogna scegliere con cura la qualità di patate e di zucca. Le patate ideali sono quelle a pasta bianca mentre per la zucca il discorso è un po’ diverso. La mia preferita è quella mantovana ma, in genere, vanno bene un po’ tutte. La cosa importante è che siano belle arancioni! Può essere servito come piatto unico ma anche come sfizioso antipasto/aperitivo, tagliato a piccoli pezzetti. E’ comodo anche come pranzo da portare in ufficio o per fare mangiare un po’ di verdura ai vostri bimbi! Vediamo insieme come preparare il Polpettone di Zucca e Patate alla Genovese.', '9.50', '/res/DSC_1093.jpg'),
('Ragù di Soia fatto in casa', 'Ragù di Soia fatto in casa. Oggi vi racconto del mio ragù di soia, ovvero un ragù vegano che si prepara con soia, verdure e passata di pomodoro! Negli ultimi mesi sto sperimentando molti ingredienti e ricette “alternative” e, senza alcun dubbio, vi dico che questa è la migliore in assoluto! Il ragù di soia ha dell’incredibile, sembra di mangiare il ragù di carne! I miei famigliari lo hanno mangiato all’insaputa pensando che fosse il solito ragù preparato con il macinato. Ci sono cascati in pieno!! Il ragù di soia fatto in casa sembra un ragù di carne, il sapore è praticamente identico, solo un po’ più delicato. Sembra fatto con un macinato molto magro. Quale soia devo utilizzare? Per il ragù di soia fatto in casa serve la soia ristrutturata, come il granulare di soia oppure i bocconcini/medaglioni di soia (quest’ultimi andranno sbriciolati). Il granulare di soia è conosciuto anche come proteine testurizzate di soia, e se volete più informazioni a riguardo vi rimando al mio articolo sui nuggets vegani di soia. Dove posso acquistare il granulare o i medaglioni di soia? Li trovi in tutti i supermercati specializzati in prodotti bio o vegetali, oppure nei negozi online. Se vi ho incuriosito abbastanza, non vi resta che provare la mia ricetta e farmi sapere cosa ne pensate! Non partite con alcun pregiudizio, il ragù di soia è buonissimo e piacerà a tutti! Io vi consiglio di condirci una bella tagliatella oppure una bella lasagna! Adesso vi saluto, vi aspetto sul mio profilo IG o sulla mia pagina Facebook!', '11.48', '/res/DSC_0573-1024x1536.jpg'),
('Ravioli al Vapore di Tofu e Verdure', 'Ravioli al Vapore di Tofu e Verdure. Ciao amici! Oggi vi porto in Oriente con i miei jiaozi (ravioli al vapore) vegetali. Sono semplici e veloci da preparare, naturalmente senza carne e senza crostacei. La pasta per ravioli è facilissima, solo acqua, farina e un pizzico di sale. Per questa versione quasi vegana (mi sono tradito con la salsa di ostriche) ho utilizzato tofu, carote e cipollotto. Andremo a sbriciolare il tofu nelle verdure, lo insaporiremo con spezie e aromi e poi lo salteremo in padella. Il trucco per ottenere dei ravioli così buoni sta nella scelta delle spezie e dei condimenti. Quello che però fa veramente la differenza è il cucchiaio di olio di sesamo (di ottima qualità). Il suo profumo è davvero irresistibile! I ravioli al vapore di tofu e verdure si possono cucinare sia in padella che in vaporiera. Per la cottura al vapore potete utilizzare o la vaporiera elettrica o quella tradizionale in bambù. Vediamo insieme come preparare i Ravioli al Vapore di Tofu e Verdure.', '11.50', '/res/DSC_0069.jpg'),
('Risotto con Zucchine ricetta', 'Risotto con Zucchine ricetta. Ciao amici, il risotto con zucchine è uno dei miei piatti preferiti! Facile e veloce da preparare, cremoso ma senza grassi (qui sotto vi svelo il segreto), perfetto per la primavera o per l’estate quando le zucchine sono fresche e di stagione! A casa mia si consumano tantissime zucchine, mio padre ha un piccolo orto e in estate è uno degli ortaggi che cresce di più! Ogni giorno bisogna raccoglierle. Le prepariamo in tutti i modi, dalle torte salate come la torta di zucchine ligure e la torta di riso e zucchine a primi piatti come gli spaghetti alla Nerano. Oggi vi presento questo risotto che si prepara in 20 minuti. E’ cremosissimo, senza panna e senza burro, la cremosità è data da una parte di zucchine che vengono frullate e aggiunte al riso. Io aggiungo anche qualche foglia di basilico (o di menta), donano un profumo delizioso! Vediamo insieme come preparare il Risotto con Zucchine ricetta.', '6.76', '/res/DSC_0968.jpg'),
('Spaghetti Aglio Nero Olio e Peperoncino', 'Gli Spaghetti Aglio Nero Olio e Peperoncino sono una versione gourmet della classica aglio, olio e peperoncino. La ricetta è veramente simile a quella tradizionale ma qui protagonista assoluto è l’aglio nero che conferisce al piatto un sapore più morbido e delicato. Inoltre, la pasta viene risottata per ottenere una consistenza più cremosa. L’aglio nero è il risultato del lento processo di fermentazione naturale dell’aglio bianco, perde il suo sapore forte e pungente e il sapore ricorda un incrocio tra liquirizia, salsa di soia e aceto balsamico. Per maggiori informazioni sull’aglio nero vi rimando al mio risotto all’aglio nero che ho pubblicato qualche tempo fa. La ricetta degli spaghetti aglio nero olio e peperoncino è facile e veloce. Per due persone sono più che sufficienti 2-3 spicchi d’aglio nero. Mi raccomando, scegliete un buon olio extravergine d’oliva. Il peperoncino va bene sia fresco che secco. Vediamo insieme come preparare gli spaghetti aglio nero olio e peperoncino.', '9.99', '/res/DSC_0468-1024x1536.jpg'),
('Tofu con Funghi e Verdure Saltati', 'Il Tofu con Funghi e Verdure Saltati in padella è una ricetta facile e veloce da preparare, vegetariana e vegana, dal sapore tipicamente orientale. Il tofu è un alimento diffuso in quasi tutto l’Estremo Oriente, si ottiene dalla cagliatura del latte di soia e pertanto è ricco di proteine vegetali. E’ un prodotto molto versatile in cucina ma se cucinato male può risultare poco saporito e persino gommoso. La ricetta che vi condivido oggi è un vero salva pranzo ma soprattutto un modo per farvi innamorare del tofu! Il piatto è un trionfo di gusto e di colori! Il bianco è dato dal tofu, l’arancione dalle carote, il marrone dai funghi shiitake mentre il verde dalle zucchine o da altre verdure di stagione. In inverno, per esempio, potete utilizzare il cavolo cinese. Vediamo insieme come preparare il Tofu con Funghi e Verdure Saltati.', '8.48', '/res/DSC_1052.jpg');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
