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
                <!--<li><a href="/about-us">About Us</a></li>-->
                <!--<li><a href="/movies">Movies</a></li>-->

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CNM Cinemas <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @php
                            $cinemas = \App\Cinema::all();
                        @endphp
                        @foreach($cinemas as $cinema)
                            <li><a href="/cinema?name={{urlencode($cinema->name)}}">{{$cinema->name}}</a> </li>
                        @endforeach
                    </ul>
                </li>

                <!--<li><a href="/contact-us">Contact Us</a></li>-->
            </ul>

            <!-- Right side of the navbar -->
            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">
                                Hi, {{Auth::user()->firstname}} {{Auth::user()->lastname}}
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
                @elseif(Auth::user()->isCustomer())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Hi, {{Auth::user()->firstname}} {{Auth::user()->lastname}}
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/userInfo">My Info</a>

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
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown" id="login-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            Login
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" id="login-dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12" id="login-div">
                                        <form method="POST" action="{{ route('login') }}">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="username-field">Username</label>
                                                <input type="text" id="username-field" name="username" class="form-control" placeholder="Username">

                                                <label for="password-field">Password</label>
                                                <input type="password" id="password-field" name="password" class="form-control" placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-primary pull-right">Login</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/signup">Sign up</a></li>

                </ul>

            @endif

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>