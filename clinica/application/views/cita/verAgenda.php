<!-- /widget -->
<div class="widget widget-nopad">
    <div class="widget-header"> <i class="icon-list-alt"></i>
        <h3> Agenda Citas</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
        <div id='calendar'>
        </div>
    </div>
    <!-- /widget-content --> 
</div>
<!-- /widget -->



<!-- Modal -->
<div id="modalCita" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Editar Cita</h3>
    </div>
    <div class="modal-body">

    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
        <button class="btn btn-primary">Actualizar Cita</button>
    </div>
</div>


<form action="<?php echo base_url('cita/establecerCita') ?>" method="POST" id="fomNuevaCita">
    <input type="hidden" name="citaDia" id="citaDia"/>
    <input type="hidden" name="citaHora" id="citaHora"/>
</form>

<form action="<?php echo base_url('cita/establecerCita') ?>" method="POST" id="fomEditarCita">
    <input type="hidden" name="citaId" id="citaId"/>
</form>


<script>

    /*$(document).ready(function() { 
     
     /*$('#calendar').fullCalendar({ 
     draggable: true, 
     events: "json_events.php", 
     eventDrop: function(event, delta) { 
     alert(event.title + ' was moved ' + delta + ' days\n' + 
     '(should probably update your database)'); 
     }, 
     loading: function(bool) { 
     if (bool) $('#loading').show(); 
     else $('#loading').hide(); 
     } 
     }); 
     
     });*/


    /*$('#calendar').fullCalendar({
     header: {
     left: 'prev,next today',
     center: 'title',
     right: 'month,agendaWeek,agendaDay'
     },
     
     
     editable: true,
     
     events: "json.php",
     
     eventDrop: function(event, delta) {
     alert(event.title + ' was moved ' + delta + ' days\n' +
     '(should probably update your database)');
     },
     
     loading: function(bool) {
     if (bool) $('#loading').show();
     else $('#loading').hide();
     }
     
     });
     
     });
     
     
     /*$(document).ready(function() {    
     var date = new Date();
     var d = date.getDate();
     var m = date.getMonth();
     var y = date.getFullYear();
     var calendar = $('#calendar').fullCalendar({
     header: {
     left: 'prev,next today',
     center: 'title',
     right: 'month,agendaWeek,agendaDay'
     },
     selectable: true,
     selectHelper: true,
     select: function(start, end, allDay) {
     var title = prompt('Event Title:');
     if (title) {
     calendar.fullCalendar('renderEvent',
     {
     title: title,
     start: start,
     end: end,
     allDay: allDay
     },
     true // make the event "stick"
     );
     }
     calendar.fullCalendar('unselect');
     },
     editable: true,
     events: [
     {
     title: 'All Day Event',
     start: new Date(y, m, 1)
     },
     {
     title: 'Long Event',
     start: new Date(y, m, d+5),
     end: new Date(y, m, d+7)
     },
     {
     id: 999,
     title: 'Repeating Event',
     start: new Date(y, m, d-3, 16, 0),
     allDay: false
     },
     {
     id: 999,
     title: 'Repeating Event',
     start: new Date(y, m, d+4, 16, 0),
     allDay: false
     },
     {
     title: 'Meeting',
     start: new Date(y, m, d, 10, 30),
     allDay: false
     },
     {
     title: 'Lunch',
     start: new Date(y, m, d, 12, 0),
     end: new Date(y, m, d, 14, 0),
     allDay: false
     },
     {
     title: 'Birthday Party',
     start: new Date(y, m, d+1, 19, 0),
     end: new Date(y, m, d+1, 22, 30),
     allDay: false
     },
     {
     title: 'EGrappler.com',
     start: new Date(y, m, 28),
     end: new Date(y, m, 29),
     url: 'http://EGrappler.com/'
     }
     ]
     });
     });*/



    $(document).ready(function() {

        var date = new Date();
        var d = "<?php echo date('d'); ?>";
        //var m = date.getMonth();
        var y = "<?php echo date('Y'); ?>";


        $('#calendar').fullCalendar({
            eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {
       
        /* if (dayDelta >= 0) {
                    dayDelta = "+" + dayDelta;
                }
                if (minuteDelta >= 0) {
                    minuteDelta = "+" + minuteDelta;
                }
                $.post("../events/mover/" + event.id + "/" + dayDelta + "/" + minuteDelta + "/" + allDay);
         */

            },
            eventResize: function(event, dayDelta, minuteDelta, revertFunc) {
                if (dayDelta >= 0) {
                    dayDelta = "+" + dayDelta;
                }
                if (minuteDelta >= 0) {
                    minuteDelta = "+" + minuteDelta;
                }
                $.post("../events/resize/" + event.id + "/" + dayDelta + "/" + minuteDelta);
            },
            dayClick: function(date, allDay, jsEvent, view) {
                var check = $.fullCalendar.formatDate(date, 'yyyy-MM-dd');
                var today = $.fullCalendar.formatDate(new Date(), 'yyyy-MM-dd');
                if (check < today) {
                    alert("No es posible crear citas para dias pasados .");
                }
                else
                {
                    if ("../events/agregar/") {
                        //there are different names for view.name the options are: agendaWeek, month, agendaDay 
                        if (view.name == 'month') {
                            $(this).css('background-color', '#00ba8b');
                        }

                        if (view.name == 'agendaWeek' || view.name == 'agendaDay') {
                            var element = jsEvent.currentTarget;
                            $(element).css('background-color', '#00ba8b');
                        }

                        var diaCita = $.fullCalendar.formatDate(date, "yyyy-MM-dd");
                        var horaCita = $.fullCalendar.formatDate(date, "HH:mm");
                        $("#citaDia").val(diaCita);
                        $("#citaHora").val(horaCita);
                        $("#fomNuevaCita").submit();
                        return true;
                    }
                }
            },
            eventClick: function(calEvent, jsEvent, view) {
                var idCita = calEvent.id;
                $("#citaId").val(idCita);
                $("#fomEditarCita").submit();
                return true;
            },
            events: "<?php echo base_url('cita/listaCitas'); ?>",
            // Convert the allDay from string to boolean
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            defaultView: 'month',
            minTime: '8:00',
            maxTime: '18:00',
            hiddenDays: [0],
            allDaySlot: false,
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: false,
            slotMinutes: 30,
        });


        /*var date = new Date();
         var d = date.getDate();
         var m = date.getMonth();
         var y = date.getFullYear();
         
         var calendar = $('#calendar').fullCalendar({
         editable: true,
         minTime: 8,
         maxTime: 18,
         hiddenDays:[0,1],
         header: {
         left: 'prev,next today',
         center: 'title',
         right: 'agendaWeek,agendaDay'
         },
         // events: "<?php echo base_url('cita/getCitas'); ?>",
         // Convert the allDay from string to boolean
         eventRender: function(event, element, view) {
         if (event.allDay === 'true') {
         event.allDay = true;
         } else {
         event.allDay = false;
         }
         },
         selectable: true,
         selectHelper: true,
         select: function(start, end, allDay) {
         var title = prompt('Event Title:');
         var url = prompt('Type Event url, if exits:');
         if (title) {
         var start = $.fullCalendar.formatDate(start, "yyyy-MM-dd HH:mm:ss");
         var end = $.fullCalendar.formatDate(end, "yyyy-MM-dd HH:mm:ss");
         $.ajax({
         url: 'http://localhost:8888/fullcalendar/add_events.php',
         data: 'title=' + title + '&start=' + start + '&end=' + end + '&url=' + url,
         type: "POST",
         success: function(json) {
         alert('Added Successfully');
         }
         });
         calendar.fullCalendar('renderEvent',
         {
         title: title,
         start: start,
         end: end,
         allDay: allDay
         },
         true // make the event "stick"
         );
         }
         calendar.fullCalendar('unselect');
         },
         editable: true,
         eventDrop: function(event, delta) {
         var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
         var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
         $.ajax({
         url: '<?php echo base_url('cita/actualizarCita'); ?>',
         data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
         type: "POST",
         success: function(json) {
         alert("Updated Successfully");
         }
         });
         },
         eventResize: function(event) {
         var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
         var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
         $.ajax({
         url: 'http://localhost:8888/fullcalendar/updateC.php',
         data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
         type: "POST",
         success: function(json) {
         alert("Updated Successfully");
         }
         });
         
         },
         eventClick: function(event) {
         var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
         var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
         
         console.log(event);
         $('#modalCita').modal('show');
         $("#FECHA_INICIO").val(start);
         $("#FECHA_FIN").val(end);
         $("#MOTIVO").val(event.title);                
         },
         });*/

    });

</script>




</script><!-- /Calendar -->          