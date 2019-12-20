var calendar;
var salonFantasy = new Array();
var salonMagic = new Array();


function llamarCalendario(tipoEvento, edad, checkFantasy, checkMagic, clickeable) {
  salonFantasy = [];
  salonMagic = [];
  $.ajax({
    url: "http://localhost/test/api/eventoCalendario.php",
    type: "GET",
    dataType: "json",
    success: enviado,
    error: error
  });

  function enviado(e) {
    console.log(e);
    console.log("hola");

    var calendarEl = document.getElementById('calendarIni');


    for (var i = 0; i < e.length; i++) {
      if (e[i].terminado === '1') {
        var estado = 'salon' + e[i].IDSalon + ' evento' + e[i].IDEvento + ' terminado'
      } else if (e[i].infoCompleta === '1') {
        var estado = 'salon' + e[i].IDSalon + ' evento' + e[i].IDEvento + ' infoCompleta'
      } else if (e[i].señaEvento === '1') {
        var estado = 'salon' + e[i].IDSalon + ' evento' + e[i].IDEvento + ' señado'
      } else {
        var estado = 'salon' + e[i].IDSalon + ' evento' + e[i].IDEvento + ' noSeñado'
      }
      // var tipoEvento = e[i].tipoEvento.slice(0, 4)

      var aux = {
        // 'title': e[i].homenajeadoEvento + ' - ' + tipoEvento+'...',
        'title': e[i].homenajeadoEvento,
        'start': e[i].fechaEvento + 'T' + e[i].horaInicio,
        'end': e[i].fechaEvento + 'T' + e[i].horaFin,
        'className': estado,
        'id': 'evento' + e[i].IDEvento
      };

      if (e[i].IDSalon === '2') {
        salonMagic.push(aux);
      } else {
        salonFantasy.push(aux);
      }
    }
    console.log(salonFantasy);
    console.log(salonMagic);

    calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
      height: 'parent',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,'
      },
      defaultView: 'dayGridMonth',

      locale: 'es',
      displayEventTime: true,
      eventTimeFormat: { // like '14:30:00'
        hour: 'numeric',
        minute: '2-digit',
        meridiem: 'lowercase',
        omitZeroMinute: false,
      },
      selectable: false,
      navLinks: false, // can click day/week names to navigate views
      editable: false,
      eventLimit: false, // allow "more" link when too many events
      dateClick: (clickeable === '') ? '' : calendarioClick,
      // events: salonMagic,
      eventSources: [
        {
          events: salonFantasy,
          id: 'salon1'
        },
        {
          events: salonMagic,
          id: 'salon2'
        }
      ],
      eventColor: '#fff',
      eventClick: (clickeable != '') ? '' : clickEvento,
    });
    calendar.render();
    calendar.rerenderEvents();
  }


  function error(e) {
    console.log(e);
  }


  function calendarioClick(info) {
    if ($('#fantasyCheck').is(':checked')) {
      checkFantasy = true;
    } else {
      checkFantasy = false;
    }


    if ($('#magicCheck').is(':checked')) {
      checkMagic = true;
    } else {
      checkMagic = false;
    }

    document.querySelector('#myNavigator').pushPage('formularioEvento.html', { data: { dia: info.dateStr, tipoEvento: tipoEvento, edad: edad, checkFantasy: checkFantasy, checkMagic: checkMagic } });
    var salon = 0;
    if (checkFantasy === true && checkMagic === false) {
      salon = 1;
    } else if (checkFantasy === false && checkMagic === true) {
      salon = 2;
    } else {
      salon = 0;
    }

    $.ajax({
      url: "http://localhost/test/api/eventoCalendario.php?fechaEvento=" + info.dateStr + "&salon=" + salon,
      type: "GET",
      dataType: "json",
      success: enviadoDia,
      error: error
    });

    console.log(info.dateStr);
    console.log(tipoEvento);
    console.log(edad);
    console.log(checkFantasy);
    console.log(checkMagic);

    // alert('Clicked on: ' + info.dateStr);
    // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
    // alert('Current view: ' + info.view.type);
    // // change the day's background color just for fun
    // info.dayEl.style.backgroundColor = 'red';
  }

  function enviadoDia(e) {
    console.log("evento");
    console.log(e);
    if (e.length === 0) {
      console.log("no  hay fiesta");
    } else {
      console.log("hay fiesta");
      var horaInicio = e[0].horaInicio;
      var horaFin = e[0].horaFin;
      var inicioI = custom_values.indexOf(horaInicio);
      horaInicio = (inicioI * (98.8852 - 1.11483) / custom_values.length) + 1.11483 + 1.11483;
      var finI = custom_values.indexOf(horaFin);
      horaFin = (finI * (98.8852 - 1.11483) / custom_values.length) - horaInicio + 1.11483 + 1.11483;
      if (inicioI >= custom_values.indexOf("12:00") && finI <= custom_values.indexOf("16:00")) {
        console.log("entra");

        var actualizarHora = $(".js-range-slider");
        var actualizarHora_instance = actualizarHora.data("ionRangeSlider");
        actualizarHora_instance.update({ from: finI + 2, to: finI + 8 });
      }
      $(".irs-bar").parent().append(`<div class='irs-bar red-bar' style='background-color: #ed5565 !important; left: ${horaInicio}%; width: ${horaFin}%;'></div>`)
    }
  }

  function clickEvento(info) {
    var IDEvento = info.event.id;
    IDEvento = IDEvento.slice(6, 12);
    //pregunta si tiene clase terminado, si tiene envio un data y recibo, si recibo seteo todo disabled ( o voy a funcion que ya cree ) 
    var terminado = 0;
    for (var i = 0; i < info.event.classNames.length; i++) {
      if (info.event.classNames[i] === 'terminado') {
        terminado = 1;
      }
    }

    document.querySelector('#myNavigator').bringPageTop('formularioDosEvento.html', { data: { IDEvento: IDEvento, terminado: terminado } });
  }

}

