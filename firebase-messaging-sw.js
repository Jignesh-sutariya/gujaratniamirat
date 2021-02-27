importScripts('https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.2.1/firebase-messaging.js');
/*Update this config*/
var config = {
apiKey: "AIzaSyC_syHdgbJ40w9GxN2dz_weHXuDB1QQLVs",
authDomain: "gujaratniamirattest.firebaseapp.com",
projectId: "gujaratniamirattest",
storageBucket: "gujaratniamirattest.appspot.com",
messagingSenderId: "299403742311",
appId: "1:299403742311:web:758122231cd20f42cb58c2",
measurementId: "G-X24TMKZQY8"
};
firebase.initializeApp(config);
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
console.log('[firebase-messaging-sw.js] Received background message ', payload);
// Customize notification here
const notificationTitle = payload.data.title;
const notificationOptions = {
body: payload.data.body,
  icon: payload.data.icon,
  image: payload.data.image,
  click_action: payload.data.url, // To handle notification click when notification is moved to notification tray
data: {
click_action: payload.data.url
}
};
self.addEventListener('notificationclick', function(event) {
console.log(event.notification.data.click_action);
if (!event.action) {
// Was a normal notification click
console.log('Notification Click.');
self.clients.openWindow(event.notification.data.click_action, '_blank')
event.notification.close();
return;
}else{
event.notification.close();
}
});
return self.registration.showNotification(notificationTitle,
notificationOptions);
});
// [END background_handler]
