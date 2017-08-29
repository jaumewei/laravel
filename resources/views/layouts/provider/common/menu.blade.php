<ul class="nav">
    <!-- opciones de acceso (registro y login) -->
    <li>
        <a class="icon icon-list"
            href="{{sprintf('/%s/provider/main',$instance)}}">Pedidos entrantes</a>
    </li>
    <li>
        <a class="icon icon-history"
            href="{{sprintf('/%s/provider/history',$instance)}}">Historial de pedidos</a>
    </li>
    <li>
        <a class="icon icon-archive"
            href="{{sprintf('/%s/provider/archive',$instance)}}">Archivo</a>
    </li>
    <li>
        <a class="icon icon-users"
            href="{{sprintf('/%s/provider/users',$instance)}}">Usuarios</a>
    </li>
    <li>
        <a class="icon icon-profile"
            href="{{sprintf('/%s/provider/profile',$instance)}}">Perfil</a>
    </li>
    <li>
        <a class="icon icon-settings"
            href="{{sprintf('/%s/provider/settings',$instance)}}">Configuracio&oacute;n</a>
    </li>
    <li>
        <a class="icon icon-logout"
            href="{{sprintf('/%s/provider/logout',$instance)}}">Salir</a>
    </li>
</ul>
