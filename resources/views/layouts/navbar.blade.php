<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollpase" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">CNMovies</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollpase">
            <!-- Left side menu -->
            <ul class="nav navbar-nav">
                <li><a href="/">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="/about-us">About Us</a></li>
                <li><a href="/movies">Movies</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CNM Cinemas <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">CNM Valle Oriente</a></li>
                        <li><a href="#">CNM Nuevo Sur</a></li>
                        <li><a href="#">CNM Esfera</a></li>
                    </ul>
                </li>

                <li><a href="/contact-us">Contact Us</a></li>
            </ul>

            <!-- Right side of the navbar -->
            @if(isset($user))
                @if($user->isAdmin())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                Hi, {{$user->firstname}} {{$user->lastname}}
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/logout" onclick="event.preventDefault(); $('#logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id='logout-form' action="/logout" method="POST" style="display: none;">
                                        {{csrf_field()}}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @elseif($user->isCustomer())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Hi, {{$user->firstname}} {{$user->lastname}}
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/logout" onclick="event.preventDefault(); $('#logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id='logout-form' action="/logout" method="POST" style="display: none;">
                                        {{csrf_field()}}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @else
                    <!-- Something wrong happened. It shouldn't get hete-->
                    <?php
                        die("An error has occurred");
                    ?>
                @endif

            @else
                <form method="POST" action="{{ route('login') }}" class="navbar-form navbar-right" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        Username
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        Password
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-default">Login</button>
                    <a href="/signup" class="btn btn-default">Sign up</a>
                </form>
            @endif

            <!--
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
            -->
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>



<!--
<nav class="navbar navbar-default navbar-fixed-top">

    <a class="navbar-brand" href="#">CNMovies</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    </div>

    <!--
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CNMovies</a>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li ><a href="/adminWatch">Ver clientes</a></li>
                <li ><a href="/adminAddCustomer">Nuevo Cliente</a></li>
                <li><a href="/adminAddConsultant">Nuevo Consultor</a></li>
                <li><a href="/adminAssignReq">Asignacion Req</a></li>
            </ul>
        </div>
    </div>
    -- >
</nav>
-->