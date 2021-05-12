<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="/">
            <img src="{!! asset('theme/images/hotel-laravel.jpg') !!}" alt="Hotel-Laravel" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                @if (Auth::check())
                    <li @if ($currentPage == 'bedrooms') class="active has-sub" @else class="has-sub" @endif>
                        <a href="{{ route('bedrooms.index')}}">
                            <i class="fas fa-bed"></i>Habitaciones</a>
                    </li>
                    <li @if ($currentPage == 'reservations') class="active has-sub" @else class="has-sub" @endif>
                        <a href="{{ route('reservations.index')}}">
                            <i class="fas fa-calendar-check"></i>Reservas</a>
                    </li>
                @else
                    <li @if ($currentPage == 'bedrooms') class="active has-sub" @else class="has-sub" @endif >
                        <a  href="#"
                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Inicia sesión para acceder a Habitaciones">
                            <i class="fas fa-bed"></i>Habitaciones</a>
                    </li>
                    <li @if ($currentPage == 'reservations') class="active has-sub" @else class="has-sub" @endif>
                        <a href="#"
                        data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Inicia sesión para acceder a Reservas">
                            <i class="fas fa-calendar-check"></i>Reservas</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>