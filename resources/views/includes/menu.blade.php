<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
                Axelan | Boka plats
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav pull-right">
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $user->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile') }}"><i class="fa fa-user" aria-hidden="true"></i> Profil</a></li>
                            <li><a href="{{ route('logout') }}"><i class="fa fa-lock" aria-hidden="true"></i> Logga out</a></li>
                            @if($user->isAdmin(auth()->id()))
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('admin.index') }}"><i class="fa fa-cog" aria-hidden="true"></i> Admin</a></li>
                            @endif
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="/login">
                            Logga in
                        </a>
                    </li>
                    <li>
                        <a href="/register">
                            Skapa konto
                        </a>
                    </li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>