'use strict';

async function deleteNotification(node) {
    try {
        
        const formData = new FormData();
        formData.append('notificationId', node.id);

        const response = await fetch('index.php?request=delete-notification', {
            method: "POST",
            body: formData
        });

        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }

        const json = await response.json();
        console.log(json);

        if(json["notification-deleted"]) {
            node.closest('li.notification').remove();
        }
    } catch (error) {
        console.error('Fetch error: ', error.message);
    }
}

document.querySelectorAll('a.delete_notif').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        deleteNotification(btn)
        e.preventDefault();
    });
});