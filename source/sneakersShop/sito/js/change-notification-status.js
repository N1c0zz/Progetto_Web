'use strict';

async function toggleStatus(node, currStatus, newStatus, currIcon, newIcon) {
    try {
        
        const formData = new FormData();
        formData.append('currentStatus', currStatus);
        formData.append('notificationID', node.id);

        const response = await fetch('index.php?request=change-notification-status', {
            method: "POST",
            body: formData
        });

        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }

        const json = await response.json();
        console.log(json);

        if(json["status-changed"]) {
            node.classList.replace(currStatus, newStatus);
            node.classList.replace(currIcon, newIcon);
            node.closest('li').classList.toggle('bg-body-secondary');
        }
    } catch (error) {
        console.error('Fetch error: ', error.message);
    }
}

document.querySelectorAll('a.letta, a.da_leggere').forEach(link => {
    link.addEventListener('click', async (e) => {
        if(link.classList.contains('da_leggere')) {
            toggleStatus(link, 'da_leggere', 'letta', 'bi-envelope-open', 'bi-envelope');
        } else {
            toggleStatus(link, 'letta', 'da_leggere', 'bi-envelope', 'bi-envelope-open');
        }
        e.preventDefault();
    });
});