require('./bootstrap');

require('alpinejs');

window.Echo.private('orders')

    .listen('.order.created', function (event) {
        alert(`new order Craeted ${event.order.number} `)
    });



window.Echo.private(`Notifications.1`)
    .notification(function (e) {
        $('.app-notification__content').prepend(`
    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
      <div>
        <p class="app-notification__message">${e.title}</p>
        <p class="app-notification__meta">${e.time}</p>
      </div>
      </a>
  </li>
  `);
    })
window.Echo.join('chat')
    .here((users) => {
        console.log(users);
    })
    .joining((user) => {
        $('#messages').append(`
        <div class="message">
        <strong class="text-red">${user.name} Joined Now  </strong>
         </div>
         `);
    })

    .leaving((user) => {
        $('#messages').append(`
        <div class="message">
        <strong style="color:red ">${user.name} Left Now  </strong>
         </div>
         `);
    })
    .listen('MessageSent', (event) => {
        console.log(event.message)
        addMessage(event);
    });

//var chat =document.getElementById('chat-form');

(function ($) {
    $('#chat-form').on('submit', function (event) {
        event.preventDefault();

        $.post($(this).attr('action'), $(this).serialize(), function (data) {
            $('#chat-form input').val('');
        });
    })



})(jQuery);

function addMessage(event) {
    //console.log(user.id);
    $('#messages').append(`<div class="message">
    <img class="img-thumbnail" style="width=50px; height:50px" src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" >
    <p class="info">${event.message}</p>
  </div>`);
}