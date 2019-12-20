var calendar;

function llamarCalendarioLista() {
  $.ajax({
    url: "http://localhost/test/api/eventoCalendarioLista.php",
    type: "GET",
    dataType: "json",
    success: enviado,
    error: error
  });

  function enviado(e) {
    console.log(e);
    var calendarEl = document.getElementById('calendar');
    var eventosLista = new Array();

    for (var i = 0; i < e['eventos'].length; i++) {
      
      if (e['eventos'][i].terminado === '1') {  
        var estado = 'salon' + e['eventos'][i].IDSalon + ' evento' + e['eventos'][i].IDEvento + ' terminado'
      } else if (e['eventos'][i].infoCompleta === '1') {
        var estado = 'salon' + e['eventos'][i].IDSalon + ' evento' + e['eventos'][i].IDEvento + ' infoCompleta'
      } else if (e['eventos'][i].señaEvento === '1') {
        var estado = 'salon' + e['eventos'][i].IDSalon + ' evento' + e['eventos'][i].IDEvento + ' señado'
      } else {
        var estado = 'salon' + e['eventos'][i].IDSalon + ' evento' + e['eventos'][i].IDEvento + ' noSeñado'
      }
      var aux = {
        'title': e['eventos'][i].tipoEvento + ' - ' + e['eventos'][i].homenajeadoEvento,
        'start': e['eventos'][i].fechaEvento + 'T' + e['eventos'][i].horaInicio,
        'end': e['eventos'][i].fechaEvento + 'T' + e['eventos'][i].horaFin,
        'className': estado,
        'id': 'evento' + e['eventos'][i].IDEvento
      };
      console.log(aux);
      
      eventosLista.push(aux);
    }


    for (var i = 0; i < e['recordatorios'].length; i++) {
      if (e['recordatorios'][i].todoElDia === '1') {
        var aux = {
          'title': e['recordatorios'][i].descripcionRecordatorio,
          'start': e['recordatorios'][i].fechaRecordatorio,
          'end': e['recordatorios'][i].fechaRecordatorio,
          'className': 'recordatorio' + e['recordatorios'][i].IDRecordatorio,
          'id': 'recordatorio' + e['recordatorios'][i].IDRecordatorio
        };
      } else {
        var aux = {
          'title': e['recordatorios'][i].descripcionRecordatorio,
          'start': e['recordatorios'][i].fechaRecordatorio + 'T' + e['recordatorios'][i].horaInicio,
          'end': e['recordatorios'][i].fechaRecordatorio + 'T' + e['recordatorios'][i].horaFin,
          'className': 'recordatorio' + e['recordatorios'][i].IDRecordatorio,
          'id': 'recordatorio' + e['recordatorios'][i].IDRecordatorio
        };
      }
      eventosLista.push(aux);
    }


    console.log(eventosLista);
    calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
      height: 'parent',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: ''
      },
      defaultView: 'listWeek',
      locale: 'es',
      selectable: true,
      navLinks: false, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: eventosLista
    });
    calendar.render();
    calendar.rerenderEvents();
  }


  function error(e) {
    console.log(e);
  }

}

