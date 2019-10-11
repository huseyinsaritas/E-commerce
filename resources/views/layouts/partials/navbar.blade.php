<body id="commerce">
<nav class="navbar navbar-expand-lg position-static">
    <div class="container">
        <a class="navbar-brand" href="{{ route('anasayfa') }}">
            <img src="/img/logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <form class="navbar-form navbar-left" action="{{ route('urun_ara') }}" method="post">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" name="aranan" id="navbar-search" class="form-control" placeholder="Ara" value="{{ old('aranan') }}">
                    <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sepet') }}"><i class="fa fa-shopping-cart"></i> Sepet
                <span class="badge badge-danger">{{ Cart::count() }}</span>
                    </a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kullanici.oturumac') }}">Oturum Aç</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kullanici.kaydol') }}">Kaydol</a>
                </li>
                @endguest
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Profil</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('siparisler') }}">Siparişlerim</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById
                        ('logout-form').submit()">Çıkış</a>
                            <form id="logout-form" action="{{ route('kullanici.oturumukapat') }}"
                            method="post" style="display:none;">
                                {{ csrf_field() }}
                            </form>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
</body>
