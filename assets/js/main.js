$(document).ready(function () {

  // Toast para notificaciones
  //toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');

  // Waitme
  //$('body').waitMe({effect : 'orbit'});

  /**
   * Alerta para confirmar una acción establecida en un link o ruta específica
   */
  $('body').on('click', '.confirmar', function (e) {
    e.preventDefault();

    let url = $(this).attr('href'),
      ok = confirm('¿Estás seguro?');

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
    * PRESENTACION
    */
  // Agregar un presentacion
  $('#add_presentation_form').on('submit', add_presentation_form);
  function add_presentation_form(e) {
    e.preventDefault();
    var form = $(this),
      data = new FormData(form.get(0));
    // AJAX
    $.ajax({
      url: 'ajax/add_presentation_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        form.trigger('reset');
        get_presentaciones();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Cargar información de presentación [VISTA]
  $('body').on('click', '.btnView_presentacion', btnView_presentacion);
  function btnView_presentacion(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#view_presentation_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_presentation_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.view_presentation_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        $('[name="nombre_presentation"]', form_e).val(res.data.nombre_presentacion);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.view_presentation_form').waitMe('hide');
    })
  }

  // Cargar información de presentación [EDITAR]
  $('body').on('click', '.btnEdit_presentacion', btnEdit_presentacion);
  function btnEdit_presentacion(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#edit_presentation_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_presentation_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.edit_presentation_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        $('[name="id"]', form_e).val(res.data.id_presentacion);
        $('[name="nombre_presentation"]', form_e).val(res.data.nombre_presentacion);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.edit_presentation_form').waitMe('hide');
    })
  }

  // Guardar cambios de presentación
  $('#edit_presentation_form').on('submit', edit_presentation_form);
  function edit_presentation_form(e) {
    e.preventDefault();

    var form = $(this),
      data = new FormData(form.get(0));

    if (!confirm('¿Estás seguro?')) return;

    // AJAX
    $.ajax({
      url: 'ajax/update_presentacion_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_presentaciones();
        //form.trigger('reset');
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Borrar una presentación [BORRAR]
  $('body').on('click', '.delete_presentacion', delete_presentacion);
  function delete_presentacion(e) {
    var boton = $(this),
      id = boton.data('id'),
      hook = 'bee_hook',
      action = 'delete';

    if (!confirm('¿Estás seguro?')) return false;

    $.ajax({
      url: 'ajax/delete_presentacion',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('body').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_presentaciones();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('body').waitMe('hide');
    })
  }


  $('body').on('click', '#btnUpdate-presentation', function (e) {
    let select = $('#insertDt-presentacion-producto'),
      hook = 'bee_hook',
      action = 'get';
    console.log('Actualización');
    // AJAX
    $.ajax({
      url: 'ajax/getSelect_Presentaciones',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action
      },
      beforeSend: function () {
        //wrapper.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        select.html(res.data);
        console.log(res);

      } else {
        toastr.error(res.msg, '¡Upss!');
        //wrapper.html(res.msg);
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      //wrapper.html('Hubo un error al cargar las lecciones, intenta más tarde.');
    }).always(function () {
      //wrapper.waitMe('hide');
    })
  });

  // Cargar lista de presentaciones
  get_presentaciones();
  function get_presentaciones() {
    var wrapper = $('.wrapper_presentaciones'),
      hook = 'bee_hook',
      action = 'get';

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
      beforeSend: function () {
        wrapper.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        wrapper.html(res.data);

      } else {
        toastr.error(res.msg, '¡Upss!');
        wrapper.html(res.msg);
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      wrapper.html('Hubo un error al cargar las lecciones, intenta más tarde.');
    }).always(function () {
      wrapper.waitMe('hide');
    })
  }
  get_laboratorios();

  /* LABORATORIO */
  /**
   * Cargar lista de laboratorio [CARGA TABLA]
   */
  function get_laboratorios() {
    var wrapper = $('.wrapper_laboratory'),
      hook = 'bee_hook',
      action = 'get';

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
      beforeSend: function () {
        wrapper.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        wrapper.html(res.data);

      } else {
        toastr.error(res.msg, '¡Upss!');
        wrapper.html(res.msg);
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      wrapper.html('Hubo un error al cargar las laboratorios, intenta más tarde.');
    }).always(function () {
      wrapper.waitMe('hide');
    })
  }

  // Agregar un laboratorio
  $('#add_laboratorio_form').on('submit', add_laboratorio_form);
  function add_laboratorio_form(e) {
    e.preventDefault();
    var form = $(this),
      data = new FormData(form.get(0));
    // AJAX
    $.ajax({
      url: 'ajax/add_laboratorio_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        form.trigger('reset');
        get_laboratorios();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Cargar información de presentación [VISTA]
  $('body').on('click', '.btnView_laboratory', btnView_laboratory);
  function btnView_laboratory(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#view_laboratory_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_laboratory_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.view_laboratory_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        $('[name="nombre_laboratory"]', form_e).val(res.data.nombre_laboratorio);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.view_laboratory_form').waitMe('hide');
    })
  }

  // Cargar información de presentación [EDITAR]
  $('body').on('click', '.btnEdit_laboratory', btnEdit_laboratory);
  function btnEdit_laboratory(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#edit_laboratory_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_laboratory_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.edit_laboratory_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        $('[name="id"]', form_e).val(res.data.id_laboratorio);
        $('[name="nombre_laboratory"]', form_e).val(res.data.nombre_laboratorio);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.edit_laboratory_form').waitMe('hide');
    })
  }

  // Guardar cambios de presentación
  $('#edit_laboratory_form').on('submit', edit_laboratory_form);
  function edit_laboratory_form(e) {
    e.preventDefault();

    var form = $(this),
      data = new FormData(form.get(0));

    if (!confirm('¿Estás seguro?')) return;

    // AJAX
    $.ajax({
      url: 'ajax/update_laboratorio_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_laboratorios();
        //form.trigger('reset');
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Borrar una laboratorio [BORRAR]
  $('body').on('click', '.delete_laboratory', delete_laboratory);
  function delete_laboratory(e) {
    var boton = $(this),
      id = boton.data('id'),
      hook = 'bee_hook',
      action = 'delete';

    if (!confirm('¿Estás seguro?')) return false;

    $.ajax({
      url: 'ajax/delete_laboratorio',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('body').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_laboratorios();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('body').waitMe('hide');
    })
  }
  $('body').on('click', '#btnUpdate-laboratory', function (e) {
    let select = $('#insertDt-presentacion-producto'),
      hook = 'bee_hook',
      action = 'get';
    console.log('Actualización');
    // AJAX
    $.ajax({
      url: 'ajax/getSelect_Presentaciones',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action
      },
      beforeSend: function () {
        //wrapper.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        select.html(res.data);
        console.log(res);

      } else {
        toastr.error(res.msg, '¡Upss!');
        //wrapper.html(res.msg);
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      //wrapper.html('Hubo un error al cargar las lecciones, intenta más tarde.');
    }).always(function () {
      //wrapper.waitMe('hide');
    })
  });
  /**
   * Grupos
   */
  get_groups();
  function get_groups() {
    var wrapper = $('.wrapper_group'),
      hook = 'bee_hook',
      action = 'get';

    if (wrapper.length === 0) {
      return;
    }

    $.ajax({
      url: 'ajax/get_groups',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action
      },
      beforeSend: function () {
        wrapper.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        wrapper.html(res.data);

      } else {
        toastr.error(res.msg, '¡Upss!');
        wrapper.html(res.msg);
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      wrapper.html('Hubo un error al cargar las lecciones, intenta más tarde.');
    }).always(function () {
      wrapper.waitMe('hide');
    })
  }

  // Agregar un grupo
  $('#add_group_form').on('submit', add_group_form);
  function add_group_form(e) {
    e.preventDefault();
    var form = $(this),
      data = new FormData(form.get(0));
    // AJAX
    $.ajax({
      url: 'ajax/add_group_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        form.trigger('reset');
        get_groups();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Cargar información de Grupo [VISTA]
  $('body').on('click', '.btnView_group', btnView_group);
  function btnView_group(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#view_group_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_grupos_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.view_group_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        $('[name="nombre_group"]', form_e).val(res.data.nombre_grupo);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.view_group_form').waitMe('hide');
    })
  }

  // Cargar información de Grupo [EDITAR]
  $('body').on('click', '.btnEdit_group', btnEdit_group);
  function btnEdit_group(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#edit_group_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_grupos_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.edit_group_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        $('[name="id"]', form_e).val(res.data.id_grupo);
        $('[name="nombre_group"]', form_e).val(res.data.nombre_grupo);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.edit_group_form').waitMe('hide');
    })
  }

  // Guardar cambios de presentación
  $('#edit_group_form').on('submit', edit_group_form);
  function edit_group_form(e) {
    e.preventDefault();

    var form = $(this),
      data = new FormData(form.get(0));

    if (!confirm('¿Estás seguro?')) return;

    // AJAX
    $.ajax({
      url: 'ajax/update_group_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_groups();
        //form.trigger('reset');
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Borrar una laboratorio [BORRAR]
  $('body').on('click', '.delete_group', delete_group);
  function delete_group(e) {
    var boton = $(this),
      id = boton.data('id'),
      hook = 'bee_hook',
      action = 'delete';

    if (!confirm('¿Estás seguro?')) return false;

    $.ajax({
      url: 'ajax/delete_laboratorio',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('body').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_groups();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('body').waitMe('hide');
    })
  }

  /**
 * Principios Activos
 */
  get_activePrinciples();
  function get_activePrinciples() {
    var wrapper = $('.wrapper_activePrinciples'),
      hook = 'bee_hook',
      action = 'get';

    if (wrapper.length === 0) {
      return;
    }

    $.ajax({
      url: 'ajax/get_activePrinciples',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action
      },
      beforeSend: function () {
        wrapper.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        wrapper.html(res.data);

      } else {
        toastr.error(res.msg, '¡Upss!');
        wrapper.html(res.msg);
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      wrapper.html('Hubo un error al cargar las Principales activo, intenta más tarde.');
    }).always(function () {
      wrapper.waitMe('hide');
    })
  }

  // Agregar un Principio Activo
  $('#add_activePrinciple_form').on('submit', add_activePrinciple_form);
  function add_activePrinciple_form(e) {
    e.preventDefault();
    var form = $(this),
      data = new FormData(form.get(0));
    // AJAX
    $.ajax({
      url: 'ajax/add_activePrinciple_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        form.trigger('reset');
        get_activePrinciples();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Cargar información de Principio Activo [VISTA]
  $('body').on('click', '.btnView_activePrinciple', btnView_activePrinciple);
  function btnView_activePrinciple(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#view_activePrinciple_form');

    // Cargar la información del registro de la Principio Activo
    $.ajax({
      url: 'ajax/get_activePrinciple_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.view_activePrinciple_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        $('[name="nombre_activePrinciple"]', form_e).val(res.data.nombre_principioActivo);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.view_activePrinciple_form').waitMe('hide');
    })
  }

  // Cargar información de Principio Activo [EDITAR]
  $('body').on('click', '.btnEdit_activePrinciple', btnEdit_activePrinciple);
  function btnEdit_activePrinciple(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#edit_activePrinciple_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_activePrinciple_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.edit_activePrinciple_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        $('[name="id"]', form_e).val(res.data.id_principioActivo);
        $('[name="nombre_activePrinciple"]', form_e).val(res.data.nombre_principioActivo);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.edit_activePrinciple_form').waitMe('hide');
    })
  }

  // Guardar cambios de Principio Activo
  $('#edit_activePrinciple_form').on('submit', edit_activePrinciple_form);
  function edit_activePrinciple_form(e) {
    e.preventDefault();

    var form = $(this),
      data = new FormData(form.get(0));

    if (!confirm('¿Estás seguro?')) return;

    // AJAX
    $.ajax({
      url: 'ajax/update_activePrinciple_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_activePrinciples();
        //form.trigger('reset');
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Borrar una Principio Activo [BORRAR]
  $('body').on('click', '.delete_activePrinciple', delete_activePrinciple);
  function delete_activePrinciple(e) {
    var boton = $(this),
      id = boton.data('id'),
      hook = 'bee_hook',
      action = 'delete';

    if (!confirm('¿Estás seguro?')) return false;

    $.ajax({
      url: 'ajax/delete_activePrinciple',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('body').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_activePrinciples();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('body').waitMe('hide');
    })
  }

  /**
* Indicaciónes
*/
  get_indications();
  function get_indications() {
    var wrapper = $('.wrapper_indications'),
      hook = 'bee_hook',
      action = 'get';

    if (wrapper.length === 0) {
      return;
    }

    $.ajax({
      url: 'ajax/get_indications',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action
      },
      beforeSend: function () {
        wrapper.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        wrapper.html(res.data);

      } else {
        toastr.error(res.msg, '¡Upss!');
        wrapper.html(res.msg);
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      wrapper.html('Hubo un error al cargar las indicaciones, intenta más tarde.');
    }).always(function () {
      wrapper.waitMe('hide');
    })
  }

  // Agregar un indicación
  $('#add_indication_form').on('submit', add_indication_form);
  function add_indication_form(e) {
    e.preventDefault();
    var form = $(this),
      data = new FormData(form.get(0));
    // AJAX
    $.ajax({
      url: 'ajax/add_indication_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        form.trigger('reset');
        get_indications();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Cargar información de indicación [VISTA]
  $('body').on('click', '.btnView_indication', btnView_indication);
  function btnView_indication(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#view_indication_form');

    // Cargar la información del registro de la indicación
    $.ajax({
      url: 'ajax/get_indication_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.view_indication_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        $('[name="nombre_indication"]', form_e).val(res.data.nombre_indicacion);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.view_indication_form').waitMe('hide');
    })
  }

  // Cargar información de indicación [EDITAR]
  $('body').on('click', '.btnEdit_indication', btnEdit_indication);
  function btnEdit_indication(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#edit_indication_form');

    // Cargar la información del registro de la indicación
    $.ajax({
      url: 'ajax/get_indication_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.edit_indication_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        $('[name="id"]', form_e).val(res.data.id_indicacion);
        $('[name="nombre_indication"]', form_e).val(res.data.nombre_indicacion);

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.edit_indication_form').waitMe('hide');
    })
  }

  // Guardar cambios de Principio Activo
  $('#edit_indication_form').on('submit', edit_indication_form);
  function edit_indication_form(e) {
    e.preventDefault();

    var form = $(this),
      data = new FormData(form.get(0));

    if (!confirm('¿Estás seguro?')) return;

    // AJAX
    $.ajax({
      url: 'ajax/update_indication_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_indications();
        //form.trigger('reset');
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Borrar una Principio Activo [BORRAR]
  $('body').on('click', '.btnDelete_indication', btnDelete_indication);
  function btnDelete_indication(e) {
    var boton = $(this),
      id = boton.data('id'),
      hook = 'bee_hook',
      action = 'delete';

    if (!confirm('¿Estás seguro?')) return false;

    $.ajax({
      url: 'ajax/delete_indication',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('body').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        get_indications();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('body').waitMe('hide');
    })
  }
  
  // Agregar un producto
  $('#add_product_form').on('submit', add_product_form);
  function add_product_form(e) {
    e.preventDefault();

    var form = $(this),
      data = new FormData(form.get(0));

    // AJAX
    $.ajax({
      url: 'ajax/add_product_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        form.trigger('reset');
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Cargar movimientos
  bee_get_movements();
  function bee_get_movements() {
    var wrapper = $('.bee_wrapper_movements'),
      hook = 'bee_hook',
      action = 'load';

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
      beforeSend: function () {
        wrapper.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        wrapper.html(res.data);
      } else {
        toastr.error(res.msg, '¡Upss!');
        wrapper.html('');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
      wrapper.html('');
    }).always(function () {
      wrapper.waitMe('hide');
    })
  }

  // Actualizar un movimiento
  $('body').on('dblclick', '.bee_movement', bee_update_movement);
  function bee_update_movement(event) {
    var li = $(this),
      id = li.data('id'),
      hook = 'bee_hook',
      action = 'get',
      add_form = $('.bee_add_movement'),
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
      beforeSend: function () {
        wrapper_update_form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        wrapper_update_form.html(res.data);
        add_form.hide();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      wrapper_update_form.waitMe('hide');
    })
  }

  $('body').on('submit', '.bee_save_movement', bee_save_movement);
  function bee_save_movement(event) {
    event.preventDefault();

    var form = $('.bee_save_movement'),
      hook = 'bee_hook',
      action = 'update',
      data = new FormData(form.get(0)),
      type = $('select[name="type"]', form).val(),
      description = $('input[name="description"]', form).val(),
      amount = $('input[name="amount"]', form).val(),
      add_form = $('.bee_add_movement');
    data.append('hook', hook);
    data.append('action', action);

    // Validar que este seleccionada una opción type
    if (type === 'none') {
      toastr.error('Selecciona un tipo de movimiento válido', '¡Upss!');
      return;
    }

    // Validar description
    if (description === '' || description.length < 5) {
      toastr.error('Ingresa una descripción válida', '¡Upss!');
      return;
    }

    // Validar amount
    if (amount === '' || amount <= 0) {
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
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, '¡Bien!');
        form.trigger('reset');
        form.remove();
        add_form.show();
        bee_get_movements();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Borrar un movimiento
  $('body').on('click', '.bee_delete_movement', bee_delete_movement);
  function bee_delete_movement(event) {
    var boton = $(this),
      id = boton.data('id'),
      hook = 'bee_hook',
      action = 'delete',
      wrapper = $('.bee_wrapper_movements');

    if (!confirm('¿Estás seguro?')) return false;

    $.ajax({
      url: 'ajax/bee_delete_movement',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        wrapper.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        toastr.success(res.msg, 'Bien!');
        bee_get_movements();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      wrapper.waitMe('hide');
    })
  }

  // Guardar o actualizar opciones
  $('.bee_save_options').on('submit', bee_save_options);
  function bee_save_options(event) {
    event.preventDefault();

    var form = $('.bee_save_options'),
      data = new FormData(form.get(0)),
      hook = 'bee_hook',
      action = 'add';
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
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 200 || res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        bee_get_movements();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }
});