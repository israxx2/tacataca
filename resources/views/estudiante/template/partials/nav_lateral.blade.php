<div class="sidebar" data-color="orange">
  <!--
Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          UCM
      </a>
      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Taca-taca
      </a>
  </div>
  <div class="sidebar-wrapper">
      <ul class="nav">
          {{-- PERFIL DEL USUARIO --}}
          <li class="@yield('perfil', ' ')">
          <a href="{{ route('estudiante.user') }}">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Perfil</p>
              </a>
          </li>
          {{-- HISTORIAL--}}
          <li class="@yield('historial', ' ')">
            <a href="{{ route('estudiante.historial') }}">
                <i class="now-ui-icons education_paper"></i>
                <p>Historial</p>
            </a>
          </li>
          {{-- OPCIONES DE LOS RANKING --}}
          <li class="@yield('ranking', ' ')">
            <a href="#">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>Ranking</p>
            </a>
          </li>
          {{-- OPCIONES DE LOS EVENTOS --}}
          <li class="@yield('eventos', ' ')">
              <a href="#">
                  <i class="now-ui-icons ui-1_calendar-60"></i>
                  <p>Eventos</p>
              </a>
          </li>
          {{-- OPCIONES DE LOS EVENTOS --}}
          <li class="@yield('invitaciones', ' ')">
            <a href="#">
                <i class="now-ui-icons ui-1_calendar-60"></i>
                <p>Invitaciones</p>
            </a>
          </li>
          

      </ul>
  </div>
</div>