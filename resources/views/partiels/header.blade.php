<header class="header-area">

    <!-- ***** Top Header Area ***** -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Top Header Content -->
                        <div class="top-header-meta">
                            <a href="#" {{-- data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true" --}}></i> <span>Email: Capotage@gmail.com</span></a>
                            <a href="#" {{-- data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true" --}}></i> <span>Appelez-nous: +1 234 122 122</span></a>
                        </div>

                        <!-- Top Header Content -->
                        <div class="top-header-meta d-flex">
                            <!-- Language Dropdown -->

                            <!-- Login -->
                          {{--   <div class="login">
                                <a href="{{ route('login') }}"><i class="fa fa-user" aria-hidden="true"></i> <span>Se Connecter</span></a>
                            </div> --}}
                            <!-- Cart -->
                            <div class="cart">
                                <a href="{{ route('user.paniers') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Panier <span class="cart-quantity">(1)</span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Navbar Area ***** -->
    <div class="alazea-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="alazeaNav">

                    <!-- Nav Brand -->
                    <a href="{{ route('user.index') }}" class="nav-brand"><img src="{{ asset('assets/img/core-img/logo.png') }}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Navbar Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ route('user.index') }}">Accueil</a></li>
                                <li><a href="{{ route('user.about') }}">À propos</a></li>

                                <li><a href="{{ route('user.services') }}">Services</a></li>
                                <li><a href="{{ route('user.produits') }}">Produits</a></li>
                                <li><a href="{{ route('user.contact') }}">Contact</a></li>
                                <li class="has-down"><a href="#">Connexion</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('login') }}">Acheteur</a></li>
                                        <li><a href="{{ route('vendor.login.show') }}">Vendeur</a></li>

                                    </ul>
                                <span class="dd-trigger"></span></li>
                            </ul>

                            <!-- Search Icon -->
                            <div id="searchIcon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>


                        </div>
                        <!-- Navbar End -->
                    </div>
                </nav>

                <!-- Search Form -->
                <div class="search-form">
                    <form action="#" method="get">
                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                        <button type="submit" class="d-none"></button>
                    </form>
                    <!-- Close Icon -->
                    <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</header>
