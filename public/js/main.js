$('#signUp').click(function(){
  $('#signup_modal').modal('show');    
});


$('#logIn').click(function(){
  $('#login_modal').modal('show');    
});


$('#onViewPassword').on('click', function () {
  var isHide = $('#onViewPassword').attr('class').split(/\s+/)[0] == 'hide';
  if (isHide) {
    $('#cpassword').attr('type', 'password'); 
    $('#password').attr('type', 'password');
    $('#onViewPassword').removeClass()
    $('#onViewPassword').addClass('unhide link icon')
  } else {
    $('#cpassword').attr('type', 'text'); 
    $('#password').attr('type', 'text');
    $('#onViewPassword').removeClass()
    $('#onViewPassword').addClass('hide link icon')
  }
});


$('#onViewLoginPassword').on('click', function () {
  var isHide = $('#onViewLoginPassword').attr('class').split(/\s+/)[0] == 'hide';
  if (isHide) { 
    $('#passwordLogin').attr('type', 'password');
    $('#onViewLoginPassword').removeClass()
    $('#onViewLoginPassword').addClass('unhide link icon')
  } else {
    $('#passwordLogin').attr('type', 'text');
    $('#onViewLoginPassword').removeClass()
    $('#onViewLoginPassword').addClass('hide link icon')
  }
});


$('#login_modal').form({
  fields : {
    email_login: {
      identifier: 'email_login',
      rules: [
        {
          type   : 'email',
          prompt : 'Por favor introduce una dirección de correo válida'
        },
        {
          type   : 'maxLength[255]',
          prompt : 'La dirección de correo es demasiado larga'
        }
      ]
    },
    
    passwordLogin: {
      identifier: 'passwordLogin',
      rules: [
        {
          type   : 'minLength[8]',
          prompt : 'La contraseña debe contener mínimo 8 caracteres'
        },
        {
          type   : 'maxLength[16]',
          prompt : 'La contraseña es demasiado larga'
        }
      ]
    }
  },
  inline : true,
  onSuccess: function(event, fields){
      console.log("all is valid in login")
      $.ajax({
        type: 'post',
        url: 'users/login',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          email: $('#emailLoginField').val(),
          password: $('#passwordLogin').val()
        },
        dataType: 'json',
        success: function (data) {
          console.log("login successfull")
          console.log(data)
          if(data['OK']) {
            location.reload()
          } else {
            new Noty({
              type: 'error',
              layout: 'topRight',
              text: data['error'],
              timeout: 1000
            }).show();
          }
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
  },
  onFailure: function(formErrors, fields){
      console.log("something is not valid")
  }   

});


$('#signup_modal').form({
  fields : {
    name: {
      identifier: 'name',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor introduce el nombre del usuario'
        },
        {
          type   : 'maxLength[25]',
          prompt : 'El nombre de usuario es demasiado largo'
        }
      ]
    },
    email: {
      identifier: 'email',
      rules: [
        {
          type   : 'email',
          prompt : 'Por favor introduce una dirección de correo válida'
        },
        {
          type   : 'maxLength[255]',
          prompt : 'La dirección de correo es demasiado larga'
        }
      ]
    },
    password: {
      identifier: 'password',
      rules: [
        {
          type   : 'minLength[8]',
          prompt : 'La contraseña debe contener mínimo 8 caracteres'
        },
        {
          type   : 'maxLength[16]',
          prompt : 'La contraseña es demasiado larga'
        }
      ]
    },
    cpassword: {
      identifier: 'cpassword',
      rules: [
        {
          type   : 'match[password]',
          prompt : 'La contraseñas no coinciden'
        }
      ]
    },
    date: {
      identifier: 'date',
      rules: [
        {
          type   : 'empty',
          prompt : 'Por favor introduce la fecha de nacimiento del usuario'
        }
      ]
    }
  },
  inline : true,
  onSuccess: function(event, fields){
      console.log("all is valid")
      console.log($('#emailField').val())
      $.ajax({
        type: 'get',
        url: 'users/isEmailUsed?email=' + $('#emailField').val(),
        dataType: 'json',
        success: function (data) {
          if(data.length == 0) {
            console.log("email doesn't exist")
            $.ajax({
              type: 'post',
              url: 'users/add',
              data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                name: $('#nameField').val(),
                date: $('#dateField').val(),
                email: $('#emailField').val(),
                password: $('#password').val()
              },
              dataType: 'json',
              success: function (data) {
                console.log("signup successfull")
                new Noty({
                  type: 'info',
                  layout: 'topRight',
                  text: 'El registro fue exitoso!',
                  timeout: 1000
                }).show();
                $('#signup_modal').modal('hide')
                $('#login_modal').modal('show')
              },
              error: function (data) {
                console.log('Error:', data);
              }
            });
          } else {
            console.log("email already exists")
            new Noty({
                  type: 'error',
                  layout: 'topRight',
                  text: 'La dirección de correo ya ha sido registrada',
                  timeout: 1000
                }).show();
            //$('#emailSection').append("<div class='ui pointing red basic label' id='errorMsgEmailTaken'>La dirección de correo ya ha sido registrada</div>")
            $('#signup_modal').form('add rule', 'email', {
              rules: [
                {
                  type   : 'different[email]',
                  prompt : 'La dirección de correo ya ha sido registrada'
                }
              ]
            });
          }
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
  },
  onFailure: function(formErrors, fields){
      if( $('#signup').form('is valid','email') ) {
        console.log("all is valid")
      } else {
        console.log("nope email")
      }
  }   

});


$( document ).ready(function() {
  $('#calendar_age').calendar({
    type: 'date',
    maxDate: new Date(new Date().getFullYear() - 5, new Date().getMonth(), new Date().getDate()),
    minDate:  new Date(new Date().getFullYear() - 10, new Date().getMonth(), new Date().getDate()),
    startMode: 'day',
    text: {
      days: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
      months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dec'],
      today: 'Hoy',
      now: 'Actual',
      am: 'AM',
      pm: 'PM'
    }
  });
});
