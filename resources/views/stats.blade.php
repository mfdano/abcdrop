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
    <title>AbcDrop</title>
    <style type="text/css">
      body {
        background: #fffff; 
      }
    </style>
    <title>{{ Auth::check() }}</title>
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
            <a href="#" class="item active"><i class="area chart icon"></i>Historial</a>
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

      <div class="ui grid">
        <div class="eight wide column">
          <div class="ui divided items">
            @foreach($activities as $activity)
              <div class="item">
                <a class="ui tiny image">
                  <img src="{{ asset($activity->img)}}">
                </a>
                <div class="content">
                  <a class="header">{{$activity->name}}</a>
                  <div class="description">
                    <div class="ui green horizontal label">Puntuación: {{$activity->items - $activity->pivot->errors}}</div>
                    <div class="ui red horizontal label">Errores: {{$activity->pivot->errors}}</div>
                    <div class="ui blue horizontal label">Fecha: {{$activity->pivot->created_at}}</div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <div class="eight wide column">
          <canvas id="myChart" width="400" height="400"></canvas>

        </div>
      </div>
      
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js" integrity="sha256-UGwvyUFH6Qqn0PSyQVw4q3vIX0wV1miKTracNJzAWPc=" crossorigin="anonymous"></script>

    <script src="{{ asset('js/noty.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      $( document ).ready(function() {
        @if (Auth::check())
          new Noty({
            type: 'info',
            layout: 'topRight',
            text: 'Bienvenid@ {{Auth::user()->name}}',
            timeout: 1000
          }).show();  
        @endif

        var names = []
        var punctutation = []
        var errors = []
        @foreach($activities as $activity)
          names.push("{{$activity->name}}")
          errors.push({{$activity->pivot->errors}})
          punctutation.push({{$activity->items - $activity->pivot->errors}})
        @endforeach
        
        new Chart(document.getElementById("myChart"),
          {
            "type":"line",
            "data":
            {
              "labels": names.reverse(),
              "datasets":[
                {
                  "label":"Errores",
                  "data":errors.reverse(),
                  "backgroundColor": "rgba(255,51,51,0.2)",
                  "borderColor": "red"
                },
                {
                  "label":"Puntuación",
                  "data":punctutation.reverse(),
                  "backgroundColor": "rgba(51,255,51,0.2)",
                  "borderColor": "green"
                }
              ]
            },
            "options":{
              scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero: true,
                         userCallback: function(label, index, labels) {
                             // when the floored value is the same as the value we have a whole number
                             if (Math.floor(label) === label) {
                                 return label;
                             }

                         },
                     }
                 }],
             },
            }
          });
      })
    </script>
  </body>
</html>