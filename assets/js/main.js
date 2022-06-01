$(document).ready(function() {

  // Toast para notificaciones
  //toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');

  // Waitme
  //$('body').waitMe({effect : 'orbit'});
  
  /**
   * Alerta para confirmar una acción establecida en un link o ruta específica
   */
  $('body').on('click', '.confirmar', function(e) {
    e.preventDefault();

    let url = $(this).attr('href'),
    ok      = confirm('¿Estás seguro?');

    // Redirección a la URL del enlace
    if (ok) {
      window.location = url;
      return true;
    }
    
    console.log('Acción cancelada.');
    return true;
  });

  /**
   * Inicializa summernote el editor de texto avanzado para textareas
   */
  if ($('.summernote').length !== 0) {
    $('.summernote').summernote({
      placeholder: 'Escribe en este campo...',
      tabsize: 2,
      height: 300
    });
  }

  ////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////
  ///////// NO REQUERIDOS, SOLO PARA EL PROYECTO DEMO DE GASTOS E INGRESOS
  ////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////
  /**
   * LABORATORIO
   */
  // Cargar lista de presentaciones
  get_laboratorios();
  function get_laboratorios() {
    var wrapper = $('.wrapper_laboratorios'),
    hook        = 'bee_hook',
    action      = 'get';

    if (wrapper.length === 0) {
      return;
    }

    $.ajax({
      url: 'ajax/get_laboratorios',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action
      },
      beforeSend: function() {
        wrapper.waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        wrapper.html(res.data);

      } else {
        toastr.error(res.msg, '¡Upss!');
        wrapper.html(res.msg);
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      wrapper.html('Hubo un error al cargar las laboratorios, intenta más tarde.');
    }).always(function() {
      wrapper.waitMe('hide');
    })
  }
  /**
   * PRESENTACION
   */
  // Agregar un presentacion
  $('#add_presentation_form').on('submit', add_presentation_form);
  function add_presentation_form(e) {
    e.preventDefault();

    var form    = $(this),
    data        = new FormData(form.get(0));

    // AJAX
    $.ajax({
      url: 'ajax/add_presentation_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data : data,
      beforeSend: function() {
        form.waitMe();
      }
    }).done(function(res) {
      if(res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        form.trigger('reset');
        get_presentaciones();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function() {
      form.waitMe('hide');
    })
  }

  // Cargar información de presentación
  $('body').on('click', '.btnView_presentacion', btnView_presentacion);
  function btnView_presentacion(e) {
    e.preventDefault();

    var button = $(this),
    id         = button.data('id'),
    action     = 'get',
    hook       = 'bee_hook',
    form_e     = $('#view_presentation_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_presentation_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function() {
        $('.view_presentation_form').waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        $('[name="id"]', form_e).val(res.data.id_presentacion);
        $('[name="nombre_presentation"]', form_e).val(res.data.nombre_presentacion);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function() {
      $('.view_presentation_form').waitMe('hide');
    })
  }

  // Cargar información de presentación
  $('body').on('click', '.btnEdit_presentacion', btnEdit_presentacion);
  function btnEdit_presentacion(e) {
    e.preventDefault();

    var button = $(this),
    id         = button.data('id'),
    action     = 'get',
    hook       = 'bee_hook',
    form_e     = $('#edit_presentation_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_presentation_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function() {
        $('.edit_presentation_form').waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        $('[name="id"]', form_e).val(res.data.id_presentacion);
        $('[name="nombre_presentation"]', form_e).val(res.data.nombre_presentacion);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function() {
      $('.edit_presentation_form').waitMe('hide');
    })
  }

  // Guardar cambios de lección
  $('#edit_presentation_form').on('submit', edit_presentation_form);
  function edit_presentation_form(e) {
    e.preventDefault();

    var form = $(this),
    data     = new FormData(form.get(0));

    if (!confirm('¿Estás seguro?')) return;
    
    // AJAX
    $.ajax({
      url: 'ajax/update_presentacion_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data : data,
      beforeSend: function() {
        form.waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_presentaciones();
        //form.trigger('reset');
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function() {
      form.waitMe('hide');
    })
  }

  // Borrar una lección
  $('body').on('click', '.delete_presentacion', delete_presentacion);
  function delete_presentacion(e) {
    var boton   = $(this),
    id          = boton.data('id'),
    hook        = 'bee_hook',
    action      = 'delete';

    if(!confirm('¿Estás seguro?')) return false;

    $.ajax({
      url: 'ajax/delete_presentacion',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function() {
        $('body').waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_presentaciones();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function() {
      $('body').waitMe('hide');
    })
  }


  $('body').on('click', '#btnUpdate-presentation', function(e) {
    let select = $('#insertDt-presentacion-producto'),
    hook        = 'bee_hook',
    action      = 'get';
    console.log('Actualización');
    // AJAX
    $.ajax({
      url: 'ajax/get_selectPresentaciones',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action
      },
      beforeSend: function() {
        //wrapper.waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        select.html(res.data);
        console.log(res);
  
      } else {
        toastr.error(res.msg, '¡Upss!');
        //wrapper.html(res.msg);
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      //wrapper.html('Hubo un error al cargar las lecciones, intenta más tarde.');
    }).always(function() {
      //wrapper.waitMe('hide');
    })
    
  });

  // Cargar lista de presentaciones
  get_presentaciones();
  function get_presentaciones() {
    var wrapper = $('.wrapper_presentaciones'),
    hook        = 'bee_hook',
    action      = 'get';
  
    if (wrapper.length === 0) {
      return;
    }
  
    $.ajax({
      url: 'ajax/get_presentaciones',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action
      },
      beforeSend: function() {
        wrapper.waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        wrapper.html(res.data);
  
      } else {
        toastr.error(res.msg, '¡Upss!');
        wrapper.html(res.msg);
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      wrapper.html('Hubo un error al cargar las lecciones, intenta más tarde.');
    }).always(function() {
      wrapper.waitMe('hide');
    })
  }

  // Agregar un producto
  $('#add_product_form').on('submit', add_product_form);
  function add_product_form(e) {
    e.preventDefault();

    var form    = $(this),
    data        = new FormData(form.get(0));

    // AJAX
    $.ajax({
      url: 'ajax/add_product_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data : data,
      beforeSend: function() {
        form.waitMe();
      }
    }).done(function(res) {
      if(res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        form.trigger('reset');
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function() {
      form.waitMe('hide');
    })
  }

  // Cargar movimientos
  bee_get_movements();
  function bee_get_movements() {
    var wrapper = $('.bee_wrapper_movements'),
    hook        = 'bee_hook',
    action      = 'load';

    if (wrapper.length === 0) {
      return;
    }

    $.ajax({
      url: 'ajax/bee_get_movements',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action
      },
      beforeSend: function() {
        wrapper.waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        wrapper.html(res.data);
      } else {
        toastr.error(res.msg, '¡Upss!');
        wrapper.html('');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      wrapper.html('');
    }).always(function() {
      wrapper.waitMe('hide');
    })
  }

  // Actualizar un movimiento
  $('body').on('dblclick', '.bee_movement', bee_update_movement);
  function bee_update_movement(event) {
    var li              = $(this),
    id                  = li.data('id'),
    hook                = 'bee_hook',
    action              = 'get',
    add_form            = $('.bee_add_movement'),
    wrapper_update_form = $('.bee_wrapper_update_form');

    // AJAX
    $.ajax({
      url: 'ajax/bee_update_movement',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function() {
        wrapper_update_form.waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        wrapper_update_form.html(res.data);
        add_form.hide();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function() {
      wrapper_update_form.waitMe('hide');
    })
  }

  $('body').on('submit', '.bee_save_movement', bee_save_movement);
  function bee_save_movement(event) {
    event.preventDefault();

    var form    = $('.bee_save_movement'),
    hook        = 'bee_hook',
    action      = 'update',
    data        = new FormData(form.get(0)),
    type        = $('select[name="type"]', form).val(),
    description = $('input[name="description"]', form).val(),
    amount      = $('input[name="amount"]', form).val(),
    add_form            = $('.bee_add_movement');
    data.append('hook', hook);
    data.append('action', action);

    // Validar que este seleccionada una opción type
    if(type === 'none') {
      toastr.error('Selecciona un tipo de movimiento válido', '¡Upss!');
      return;
    }

    // Validar description
    if(description === '' || description.length < 5) {
      toastr.error('Ingresa una descripción válida', '¡Upss!');
      return;
    }

    // Validar amount
    if(amount === '' || amount <= 0) {
      toastr.error('Ingresa un monto válido', '¡Upss!');
      return;
    }

    // AJAX
    $.ajax({
      url: 'ajax/bee_save_movement',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data : data,
      beforeSend: function() {
        form.waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        form.trigger('reset');
        form.remove();
        add_form.show();
        bee_get_movements();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function() {
      form.waitMe('hide');
    })
  }

  // Borrar un movimiento
  $('body').on('click', '.bee_delete_movement', bee_delete_movement);
  function bee_delete_movement(event) {
    var boton   = $(this),
    id          = boton.data('id'),
    hook        = 'bee_hook',
    action      = 'delete',
    wrapper     = $('.bee_wrapper_movements');

    if(!confirm('¿Estás seguro?')) return false;

    $.ajax({
      url: 'ajax/bee_delete_movement',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function() {
        wrapper.waitMe();
      }
    }).done(function(res) {
      if(res.status === 200) {
        toastr.success(res.msg, 'Bien!');
        bee_get_movements();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function() {
      wrapper.waitMe('hide');
    })
  }

  // Guardar o actualizar opciones
  $('.bee_save_options').on('submit', bee_save_options);
  function bee_save_options(event) {
    event.preventDefault();

    var form = $('.bee_save_options'),
    data     = new FormData(form.get(0)),
    hook     = 'bee_hook',
    action   = 'add';
    data.append('hook', hook);
    data.append('action', action);

    // AJAX
    $.ajax({
      url: 'ajax/bee_save_options',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data : data,
      beforeSend: function() {
        form.waitMe();
      }
    }).done(function(res) {
      if(res.status === 200 || res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        bee_get_movements();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function(err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function() {
      form.waitMe('hide');
    })
  }
});