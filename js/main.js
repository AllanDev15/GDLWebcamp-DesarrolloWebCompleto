(function () {
  document.addEventListener('DOMContentLoaded', () => {
    const alertAdmin = document.querySelector('.alert-admin__toggle-btn');
    const alertAdminContent = document.querySelector('.alert-admin__content');
    setTimeout(() => {
      alertAdminContent.classList.add('fade');
    }, 7000);
    alertAdmin.addEventListener('click', (e) => alertAdminContent.classList.toggle('fade'));
    const copyright = document.querySelector('.copyright p');
    copyright.textContent = 'Todos los derechos reservados GDLWEBCAMP ' + new Date().getFullYear();
    function a() {
      let a;
      const { id: c } = this;
      (a = document.querySelector(`#${c} + p`)),
        console.log(a),
        '' == this.value
          ? (g++,
            (a.style.display = 'block'),
            (a.style.color = '#FE4918'),
            (this.style.border = '2px solid #FE4918'),
            b(),
            console.log(g))
          : ((a.style.display = 'none'),
            (this.style.border = ''),
            0 < g && g--,
            console.log(g),
            b());
    }
    function b() {
      0 == g
        ? (f.style.display = 'none')
        : 0 < g && ((f.style.display = 'block'), (f.innerHTML = `* Campo obligatorio.`));
    }
    if (document.querySelector('.mapa')) {
      const a = L.map('mapa').setView([20.6530556, -103.3913889], 17);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(a),
        L.marker([20.6530556, -103.3913889]).addTo(a).bindPopup('GDLWebcamp').openPopup();
    }
    const c = document.querySelector('#nombre'),
      d = document.querySelector('#apellido'),
      e = document.querySelector('#email'),
      f = document.querySelector('#error');
    c.addEventListener('blur', a),
      d.addEventListener('blur', a),
      e.addEventListener('blur', a),
      e.addEventListener('blur', function () {
        -1 < this.value.indexOf('@')
          ? ((this.style.border = ''), (f.style.display = 'none'))
          : ((f.style.display = 'block'),
            (f.innerHTML = 'No tiene formato de correo'),
            (this.style.border = '1px solid #FE4918'));
      });
    let g = 0;
  });
})(),
  $(() => {
    document.getElementsByClassName('nombre-sitio') && $('.nombre-sitio').lettering();
    const a = $(window).height(),
      b = $('.barra').innerHeight();
    $(window).scroll(() => {
      const c = $(window).scrollTop();
      c > a
        ? ($('.barra').addClass('fixed'), $('body').css({ 'margin-top': `${b}px` }))
        : ($('.barra').removeClass('fixed'), $('body').css({ 'margin-top': '0px' }));
    }),
      $('.menu-mobile').on('click', () => {
        $('.navegacion-principal').slideToggle();
      }),
      $('.menu-programa a:first').addClass('activo'),
      $('.programa-evento .info-curso:first').show(),
      $('.menu-programa a').on('click', function () {
        $('.menu-programa a').removeClass('activo'),
          $(this).addClass('activo'),
          $('.ocultar').hide();
        const a = $(this).attr('href');
        return $(a).fadeIn(500), !1;
      });
    let c = 0;
    $(window).scroll(() => {
      const a = $(window).scrollTop();
      2400 < a &&
        3e3 > a &&
        0 == c &&
        ($('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6 }, 1500),
        $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1500),
        $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3 }, 1500),
        $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 4 }, 1500),
        (c = 1));
    });
    const actualDate = new Date();
    const eventYear = actualDate.getFullYear();
    const actualMonth = actualDate.getMonth() + 1;
    const actualDay = actualDate.getDate();

    if (actualMonth == 12 && actualDay >= 10) {
      eventYear++;
    }

    $('.cuenta-regresiva').countdown(`${eventYear}/12/10 00:00:00`, (a) => {
      $('#dias').html(a.strftime('%D')),
        $('#horas').html(a.strftime('%H')),
        $('#minutos').html(a.strftime('%M')),
        $('#segundos').html(a.strftime('%S'));
    }),
      $('body.conferencia .navegacion-principal a:contains("Conferencia")').addClass('activo'),
      $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo'),
      $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
    const d = $('body').attr('class');
    ('invitados' == d || 'index' == d) &&
      $('.invitado_info').colorbox({ inline: !0, width: '40%' });
  });
