<div class="sidebar" data-color="orange">
  <!--
Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
  <div class="logo">
      <a href="#" class="simple-text logo-mini">
          UCM
      </a>
      <a href="#" class="simple-text logo-normal">
          Taca-taca
      </a>
  </div>
  <div class="sidebar-wrapper">
      <ul class="nav">
          {{-- PERFIL DEL USUARIO --}}
          <li class="@yield('perfil', ' ')">
          <a href="{{ route('estudiante.perfil.index') }}">
                  <i class="now-ui-icons business_badge"></i>
                  <p>Perfil</p>
              </a>
          </li>
          <li class="@yield('equipo', ' ')">
            <a href="{{ route('estudiante.equipo.index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Equipo</p>
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
            <a href="{{ route('estudiante.ranking') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>Ranking</p>
            </a>
          </li>
          {{-- OPCIONES DE LOS EVENTOS --}}
          <li class="@yield('eventos', ' ')">
              <a href="{{ route('estudiante.eventos') }}">
                  <i class="now-ui-icons ui-1_calendar-60"></i>
                  <p>Eventos</p>
              </a>
          </li>
          {{-- OPCIONES DE LAS INVITACIONES --}}
          <li class="@yield('invitaciones', ' ')">
            <a href="#" title="Próximamente" data-toggle="popover" data-trigger="focus" data-placement="left">
                <i class="now-ui-icons ui-1_email-85"></i>
                <p>Invitaciones</p>
            </a>
          </li>
          {{-- INFORMACION --}}
          <li class="@yield('informacion', ' ')">
                <a href="{{ route('estudiante.info') }}">
                    <i class="now-ui-icons travel_info"></i>
                    <p>Información</p>
                </a>
            </li>
          

      </ul>
  </div>
</div>