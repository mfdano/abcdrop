<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css" integrity="sha256-/Z28yXtfBv/6/alw+yZuODgTbKZm86IKbPE/5kjO/xY=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/dimmer.min.css" integrity="sha256-zJFbj9sg4kVT6Lz/S2By6sy3IRLD0rS1sZy4Actm+2Q=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/transition.min.css" integrity="sha256-bSb6pJ43fUijYws3XiwQGyv2rotKPWk3MPIytWpVjNA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/modal.min.css" integrity="sha256-Lg1fgo3niQVZ84bpMoNOKubtZ03KLlfb4drxKR8b3OQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/popup.min.css" integrity="sha256-WbJeIxr8rNxRcdCRFVrr8VxsPoA9UJ2updKZBd5R4XU=" crossorigin="anonymous" />
    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/noty.css') }}" rel="stylesheet">

    <style type="text/css">
      body {
        background: #fffff; 
      }

            /*
             * propiedades de los ítems (arrastrables)
             */
            div[id ^='caja'] {
                width:330px;
                height:auto;
                background:rgba(204, 0, 0, 0.8);
                margin:5px auto;
                padding:5px;
                color:#FFF;
            }
            /*
             * propiedades del contenedor
             */
            div[id ^='contenedor'] {
                width:1024px;
                height:620px;
                background:url({{ asset('img/school/school.jpg') }}) no-repeat;
                background-size: 1024px 620px;
                margin:5px auto;
                padding:5px;
            }
    </style>
    <script>
      var cont=0;
    var err=0;
            var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/school.mp3') }}";
                audio.volume = 0.4
                audio.play();
            }

            function au1() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/libro_abierto.mp3') }}";
                audio.play();
            }
            }

            function au2() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/plato.mp3') }}";
                audio.play();
            }
            }

            function au3() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/libro.mp3') }}";
                audio.play();
            }
            }

            function au4() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/montaña.mp3') }}";
                audio.play();
            }
            }

            function au5() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/lapiz.mp3') }}";
                audio.play();
            }
            }

            function au6() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/pluma.mp3') }}";
                audio.play();
            }
            }

            function au7() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/goma.mp3') }}";
                audio.play();
            }
            }

            function au8() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/nuez.mp3') }}";
                audio.play();
            }
            }

            function au9() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/examen.mp3') }}";
                audio.play();
            }
            }

            function au10() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/bicicleta.mp3') }}";
                audio.play();
            }
            }

            function au11() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/regla.mp3') }}";
                audio.play();
            }
            }

            function au12() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/ensalada.mp3') }}";
                audio.play();
            }
            }

            function au13() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/calculadora.mp3') }}";
                audio.play();
            }
            }

             function dragstart(caja, event) {
                document.getElementById(caja.id).className = "in";
                event.dataTransfer.setData('Data', caja.id);
            }

            function drag(caja, event) {
                return false;
            }

            function dragend(caja, event) {
                document.getElementById(caja.id).className = "out";
                return false;
            }

            function dragenter(target, event) {
                document.getElementById("contenedor").className = "inContainer";
                return false;
            }

            function dragleave(target, event) {
                document.getElementById("contenedor").className = "outContainer";
                return false;
            }

            function dragover(event) {
                event.preventDefault();

                return false;
            }

            function drop(target, event) {
                var caja = event.dataTransfer.getData('Data');
                document.getElementById("contenedor").className = "outContainer";
                target.appendChild(document.getElementById(caja));
                op();
            }

            function op() {
                if (cont <= 7) {
                  var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/drop.mp3') }}";
                audio.play();
            }
                    cont=cont+1;
                    document.getElementById('total').innerHTML=cont;
                }
                if (cont==8)
                win();
            }
            function win() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/win.mp3') }}";
                audio.play();
            }
               new Noty({
                  type: 'success',
                  layout: 'topRight',
                  text: 'Lo lograste!',
                  timeout: 1000
                }).show();

               @if (Auth::check())
                $.ajax({
                  type: 'post',
                  url: 'activity/add',
                  data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    activity_id: 3,
                    user_id: {{Auth::user()->id}},
                    errors: err,
                  },
                  dataType: 'json',
                  success: function (data) {
                    new Noty({
                      type: 'info',
                      layout: 'topRight',
                      text: data['ok'],
                      timeout: 1000
                    }).show();
                  },
                  error: function (data) {
                    console.log('Error:', data);
                  }
                });
              @endif
            }
            function erro() {
              var audio = document.createElement("audio");
            if (audio != null && audio.canPlayType && audio.canPlayType("audio/mpeg")){
                audio.src = "{{ asset('audio/error.mp3') }}";
                audio.play();
            }
              err=err+1;
              document.getElementById('error').innerHTML=err;
            }

    </script>
    <title>AbcDrop</title>
  </head>
  <body>

    <div class="ui fixed inverted menu">
      <div class="ui container">
        <a href="/" class="header item">
          <img class="logo" src="{{ asset('img/logo.png') }}">
          <span style="font-family: 'Press Start 2P', cursive;">&nbsp;ABCDrop</span>
        </a>
        <div class="right menu">
          @if (Auth::check())
            <a class="item"><i class="user circle icon"></i>Hola <div class="ui blue horizontal label">{{Auth::user()->name}}</div></a>
            <a href="{{ url('users/stats') }}" class="item"><i class="area chart icon"></i>Historial</a>
            <a href="{{ url('users/logout') }}" class="item"><i class="sign out icon"></i>Cerrar Sesión</a>
          @else
            <a class="item" id="signUp"><i class="add user icon"></i>Registrarse</a>
            <a class="item" id="logIn"><i class="sign in icon"></i>Iniciar Sesión</a>
          @endif
        </div>
      </div>
    </div>

    <br><br><br><br>

    <div class="ui main container">
      <table>
        <td style="width:35%">
          <div class="ui horizontal label">Puntuación</div>
        </td><td><div class="ui blue horizontal label" id="total"></div></td><td style="width:28%"><div class="ui horizontal label">Errores</div></td><td ><div class="ui red horizontal label" id="error"></div>
        </td>
      </table>
      <section>
        <!-- ítems -->
            <IMG SRC="{{ asset('img/school/openbook.png') }}" WIDTH=80 HEIGHT=80 id="caja1" draggable="true" ondragstart="dragstart(this, event)" onmousedown="au1()">
            <IMG SRC="{{ asset('img/school/plato.png') }}" WIDTH=80 HEIGHT=80 id="caja2" draggable="true" ondragend="erro()" onmousedown="au2()">
            <IMG SRC="{{ asset('img/school/book.png') }}" WIDTH=80 HEIGHT=80 id="caja3" draggable="true" ondragstart="dragstart(this, event)" onmousedown="au3()">
            <IMG SRC="{{ asset('img/school/montaña.png') }}" WIDTH=80 HEIGHT=80 id="caja4" draggable="true" ondragend="erro()" onmousedown="au4()">
            <IMG SRC="{{ asset('img/school/pencil.png') }}" WIDTH=80 HEIGHT=80 id="caja5" draggable="true" ondragstart="dragstart(this, event)" onmousedown="au5()">
            <IMG SRC="{{ asset('img/school/pen.png') }}" WIDTH=80 HEIGHT=80 id="caja6" draggable="true" ondragstart="dragstart(this, event)" onmousedown="au6()">
            <IMG SRC="{{ asset('img/school/eraser.png') }}" WIDTH=80 HEIGHT=80 id="caja7" draggable="true" ondragstart="dragstart(this, event)" onmousedown="au7()">
            <IMG SRC="{{ asset('img/school/nut.png') }}" WIDTH=80 HEIGHT=80 id="caja8" draggable="true" ondragend="erro()" onmousedown="au8()">
            <IMG SRC="{{ asset('img/school/exam.png') }}" WIDTH=80 HEIGHT=80 id="caja9" draggable="true" ondragstart="dragstart(this, event)" onmousedown="au9()">
            <IMG SRC="{{ asset('img/school/bike.png') }}" WIDTH=80 HEIGHT=80 id="caja10" draggable="true" ondragend="erro()" onmousedown="au10()">
            <IMG SRC="{{ asset('img/school/ruler.png') }}" WIDTH=80 HEIGHT=80 id="caja11" draggable="true" ondragstart="dragstart(this, event)" onmousedown="au11()">
            <IMG SRC="{{ asset('img/school/salad.png') }}" WIDTH=80 HEIGHT=80 id="caja12" draggable="true" ondragend="erro()" onmousedown="au12()">
            <IMG SRC="{{ asset('img/school/calc.png') }}" WIDTH=80 HEIGHT=80 id="caja13" draggable="true" ondragstart="dragstart(this, event)" onmousedown="au13()">
            <!-- contenedor -->
            <div id="contenedor" ondrop="drop(this, event)" ondragenter="return false" ondragover="return false"> 

            </div>    
      </section>

    </div>

    <div class="ui tiny modal" id="signup_modal">
      <div class="header">Abrir cuenta en ABCDrop</div>
      <div class="scrolling content" id="main">
        <form class="ui form" id="signup">
          <div class="fields">
            <div class="ten wide required field">
              <label>Nombre del usuario principal</label>
              <div class="ui left icon input">
                <input type="text" name="name" placeholder="Daniel" id="nameField">
                <i class="child icon"></i>
              </div>
            </div>
          </div>
          <div class="fields">
            <div class="ten wide required field">
              <label>Dirección de correo del tutor</label>
              <div class="ui left icon input">
                <input type="text" name="email" placeholder="usuario@email.com" id="emailField">
                <i class="at icon"></i>
              </div>
            </div>
          </div>
          <div class="fields">
            <div class="six wide required field">
              <label>Fecha de nacimiento</label>
              <div class="ui calendar" id="calendar_age">
                <div class="ui input left icon">
                  <i class="calendar icon"></i>
                  <input type="text" name="date" placeholder="" id="dateField">
                </div>
              </div>
            </div>
          </div>
          <div class="fields">
            <div class="eight wide required field">
              <label>Contraseña</label>
              <div class="ui left icon input">
                <input type="password" name="password" id="password">
                <i class="lock icon"></i>
              </div>
            </div>
            <div class="eight wide required field">
              <label>Confirmar contraseña</label>
              <div class="ui icon input">
                <input type="password" name="cpassword" id="cpassword">
                <i class="unhide link icon" id="onViewPassword"></i>
              </div>
            </div>
          </div>
          <div class="ui divider"></div>
          <div class="ui primary submit button"><i class="icon send"></i>Enviar</div>
        </form>
      </div>
    </div>

    <div class="ui mini modal" id="login_modal">
      <div class="header">Iniciar Sesión en ABCDrop</div>
      <div class="content" id="main">
        <form class="ui form" id="login">
          
            <div class="twelve wide required field">
              <label>Dirección de correo</label>
              <div class="ui left icon input">
                <input type="text" name="email_login" placeholder="usuario@email.com" id="emailLoginField">
                <i class="at icon"></i>
              </div>
            </div>
          
          
            <div class="twelve wide required field">
              <label>Contraseña</label>
              <div class="ui icon input">
                <input type="password" name="passwordLogin" id="passwordLogin">
                <i class="unhide link icon" id="onViewLoginPassword"></i>
              </div>
            </div>
          
          <div class="ui divider"></div>
          <div class="ui primary submit button"><i class="icon sign in"></i>Entrar</div>
        </form>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/dimmer.min.js" integrity="sha256-4x4i+9ta5otG/9mvVWV8Q6WfRYyJX4cxqY4eCqS3rUk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/transition.min.js" integrity="sha256-sT+wvKMKmErLJqH+T4Wb1F0WzavTDAgPZotFA0yMr1A=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/modal.min.js" integrity="sha256-3a9kCFIOTgeihcLs0mxHtkg8JGkscyN+b4NJbASLLcw=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/popup.min.js" integrity="sha256-4qXxQxHWDAy2mIrLYhQZMk72v21R2iYYtlGk/t3wGkA=" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>

    <script src="{{ asset('js/noty.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
  </body>
</html>