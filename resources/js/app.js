/* **************************************************************************
File principale JavaScript per l'applicazione, importa il file SCSS principale per gli stili, e utilizza Vite per importare tutte le immagini e i font presenti nelle rispettive cartelle, rendendoli disponibili per l'uso all'interno dell'applicazione. Questo setup permette di gestire in modo efficiente le risorse del progetto, garantendo un caricamento ottimizzato e una facile organizzazione dei file.
************************************************************************** */

// resources/js/app.js

import "../sass/app.scss";
import.meta.glob("../img/**/*");
import.meta.glob("../fonts/**/*");
