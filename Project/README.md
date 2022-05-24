# Oggetto PDO
# metodi:
- setAttribute() -> Sets an attribute on the database handle.
- exec($query) 
- query($sql) -> restitituisce un oggetto PDOStatement.

- prepare($sql) -> restitituisce un oggetto PDOStatement. Serve ad eseguire 
                    istruzioni preparate, cioè istruzioni INSERT, DELETE e UPDATE dove l'utente deve usare del testo.

# Oggetto PDOException
# metodi:
- getMessage()
- getFile()
- getLine()


# Oggetto PDOStatement (rappresenta un insieme dei risultati)
# è restituito dal metodo PDO query()
# Si comporta come un array (per cui si possono iterare con foreach())
# metodi:
- fetch() -> restituisce la prossima riga nell'insieme dei risultati (sotto forma di    
             array). In pratica restituisce una riga alla volta. Quando non ci sono più righe nell'insieme restituisce false.
            
- fetchall() -> restituisce tutti i dati ottenuti in una volta sola. Meglio evitarlo per grandi quantità di dati, perchè 
                potrebbe causare problemi di memroia. Come per fetch() si usa con le istruzioni SELECT.

- bindValue() -> serve per assegnare dei valori ai "segnaposto" usati nel    
                 metodo PDO prepare()

- execute() -> dice a MySQl di eseguire la qery preparata con i valori forniti. Accetta opzionalmente unargomento di parametri da legare anzichè usare bindValue()




# Inviare query SQL
- exec($query) -> Si usa per eseguire comandi SQL per la creazione di tabelle.
                  Per le query DELETE, INSERT e UPDATE restituisce il numero delle righe della tabelaa interessate dalla query.

- query($sql) -> restitituisce un oggetto PDOStatement. Serve per fare SELECT di dati

- prepare($sql) -> restitituisce un oggetto PDOStatement. Serve ad eseguire 
                    istruzioni preparate, cioè istruzioni INSERT, DELETE e UPDATE dove l'utente deve usare del testo.




# metodi php

- strtok(string $string, string $token): string|false -> strtok() divide una stringa (stringa) in stringhe più 
                                                        piccole (token), con ogni token delimitato da qualsiasi carattere dal token. Cioè, se hai una stringa come "Questa è una stringa di esempio" puoi tokenizzare questa stringa nelle sue singole parole usando il carattere spazio come token.

- ltrim(string $string, string $characters = " \n\r\t\v\x00"): string -> Elimina gli spazi bianchi (o altri
                                                                        caratteri) dall'inizio di una stringa.