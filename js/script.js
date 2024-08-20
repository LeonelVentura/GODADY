// script.js

// Simulación de notificaciones
const notifications = [
    { id: 1, text: "Evento nuevo publicado", read: false },
    { id: 2, text: "Actualización en tu perfil", read: true },
    { id: 3, text: "Nueva notificación", read: false },
];

// Función para cargar notificaciones
function loadNotifications() {
    const content = document.getElementById('content');
    const ul = document.createElement('ul');
    ul.className = 'notification-list';

    notifications.forEach(notification => {
        const li = document.createElement('li');
        li.textContent = notification.text;
        li.className = notification.read ? 'read' : 'unread';
        ul.appendChild(li);
    });

    content.innerHTML = '';
    content.appendChild(ul);
}

// Verificar si estamos en la página de notificaciones
if (window.location.pathname.endsWith('notifications.html')) {
    loadNotifications();
    document.getElementById('notifications-link').style.textDecoration = 'underline';
    document.getElementById('notification-count').style.display = 'none';
}

// Actualización del conteo de notificaciones
function updateNotificationCount() {
    const unreadCount = notifications.filter(notification => !notification.read).length;
    const notificationCount = document.getElementById('notification-count');
    if (unreadCount > 0) {
        notificationCount.textContent = `+${unreadCount}`;
    } else {
        notificationCount.style.display = 'none';
    }
}

updateNotificationCount();
