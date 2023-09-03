

self.addEventListener("push", function(t) {
    if (self.Notification && "granted" === self.Notification.permission && t.data) {
        const n = t.data.json();
        t.waitUntil(self.registration.showNotification(n.title, {
            body: n.body,
            icon: n.icon,
            actions: n.actions,
            image: n.image,
            data: n.data
        }));
    }
}), self.addEventListener("notificationclose", function(t) {}), self.addEventListener("notificationclick", function(t) {
    var n = t.notification;
    "close" === t.action ? n.close() : (clients.openWindow(n.data.url), n.close());
});