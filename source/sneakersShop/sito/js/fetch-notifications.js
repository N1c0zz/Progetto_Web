'use strict';

async function fetchNotifications() {
    try {
        // calcola il numero di notifiche presenti
        const currentAmount = document.getElementById("notification-list").querySelectorAll("li").length;
        const formData = new FormData();
        formData.append('currentAmount', currentAmount);

        // Effettua la richiesta fetch
        const response = await fetch('index.php?request=get-new-notifications', {
            method: "POST",
            body: formData
        });

        // Controlla se la risposta è OK
        if (!response.ok) {
          throw new Error(`Response status: ${response.status}`);
        }
        
        // Elabora i dati della risposta (JSON)
        const json = await response.json();
        // console.log(json);
        
        if(json["new-notifications"]) {
            // aggiorna UI
            const final_result = generateNotificationHtml(json["notifications"]);
            document.getElementById("notification-list").insertAdjacentHTML('afterbegin', final_result);
        }        
    } catch (error) {
        console.error('Fetch error: ', error.message);
    }
}

function generateNotificationHtml(notifications) {
    let result = "";

    for (let i = 0; i < notifications.length; i++) {
        let notif = `
        <li class="list-group-item notification bg-body-secondary">
            <article>
                <div class="text-break">
                    <div class="d-flex w-100">
                        <h2 class="mb-3 flex-grow-1 h5">${notifications[i]["titolo"]}</h2>
                        <a class="btn btn-sm bi bi bi-trash3 py-0 pe-1 fs-3 icon delete_notif" id="${notifications[i]["idnotifica"]}" aria-label="Elimina notifica"></a>
                        <a class="btn btn-sm bi bi-envelope-open py-0 ps-1 fs-3 icon da_leggere" id="${notifications[i]["idnotifica"]}" aria-label="Segna Come già letto/da leggere"></a>
                        <small class="text-body-secondary mt-2">${notifications[i]["data"]}</small>
                    </div>
                    <p class="mb-1">${notifications[i]["messaggio"]}</p>
                </div>
            </article>
        </li>
        `;
        result += notif;
    }
    return result;
}

const period = 2000;
// viene richiesta la presenza di nuove notifiche ogni *period* secondi
const interval = setInterval(fetchNotifications, period);

// Ferma l'intervallo prima di cambiare pagina
window.addEventListener('beforeunload', () => {
    clearInterval(interval);
});
