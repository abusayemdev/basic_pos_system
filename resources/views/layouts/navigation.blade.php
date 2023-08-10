
<!-- HEADER DESKTOP-->
<header class="header-desktop fixed-top">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap d-flex flex-row-reverse">
                
                <div class="account-wrap  ">
                    <div class="account-item clearfix js-item-menu">
                    @auth
                        <span> <i class="fa fas fa-user-circle"></i> {{ Auth::user()->name }}</span>
                    @endauth
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                            @auth
                                    <h5 class="name">{{ Auth::user()->name }}</h5>
                                    <span class="email">{{ Auth::user()->email }}</span>
                            @endauth
                            </div>
                            <div class="account-dropdown__footer">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();"><i class="zmdi zmdi-power"></i>{{ __('Log Out') }}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</header>
<!-- HEADER DESKTOP-->


