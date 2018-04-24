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
          <li class="active">
          <a href=" {{ route('estudiante.user') }}">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Perfil</p>
              </a>
          </li>
          {{-- OPCIONES DE LOS RANKING SINGLES --}}
          <li>
            <a href="../examples/tables.html">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p>Ranking</p>
            </a>
        </li>
          {{-- OPCIONES DE LOS EVENTOS --}}
          <li>
              <a href="../examples/map.html">
                  <i class="now-ui-icons location_map-big"></i>
                  <p>Eventos</p>
              </a>
          </li>
          

      </ul>
  </div>
</div>