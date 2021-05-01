<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @livewireStyles
</head>
<body>
    <div id="app">
        <nav>
            <div class="nav-layout">
                <a href="#" class="title">
                    MY SUBREDDITS <i class="fa fa-caret-down"></i>
                </a>
                <a href="#" class="sub-title">
                    POPULAR
                </a>

                <div class="categories">
                    -
                    <a href="#">
                        ALL
                    </a> -
                    <a href="#">
                        RANDOM
                    </a> | <a href="#">
                        ASKREDDIT
                    </a> -
                    <a href="#">
                        TODAYILEARNED
                    </a> -
                    <a href="#">
                        WORLDNEWS
                    </a> -
                    <a href="#">
                        FUNNY
                    </a> -
                    <a href="#">
                        PICS
                    </a> -
                    <a href="#">
                        NEWS
                    </a> -
                    <a href="#">
                        GIFS
                    </a> -
                    <a href="#">
                        VIDEOS
                    </a> -
                    <a href="#">
                        MOVIES
                    </a> -
                    <a href="#">
                        AWW
                    </a> -
                    <a href="#">
                        GAMING
                    </a> -
                    <a href="#">
                        SHOWERTHOUGHTS
                    </a> -
                    <a href="#">
                        MILDLYINTERESTING
                    </a> -
                    <a href="#">
                        JOKES
                    </a> -
                    <a href="#">
                        SPORTS
                    </a> -
                    <a href="#">
                        IAMA
                    </a> -
                    <a href="#">
                        OLDSCHOOLCOOL
                    </a> -
                    <a href="#">
                        TELEVISION
                    </a> -
                    <a href="#">
                        FOOD
                    </a> -
                    <a href="#">
                        BLOG
                    </a> -
                    <a href="#">
                        TIFU
                    </a> -
                    <a href="#">
                        SCIENCE
                    </a> -
                    <a href="#">
                        LIFEPROTIPS
                    </a> -
                    <a href="#">
                        NOTTHEONION
                    </a> -
                    <a href="#">
                        BOOKS
                    </a> -
                    <a href="#">
                        PERSONALFINANCE
                    </a> -
                    <a href="#">
                        PHOTOSHOPBATTLES
                    </a> -
                    <a href="#">
                        TWOXCHROMOSOMES
                    </a> -
                    <a href="#">
                        EXPLAINLIKEIMFIVE
                    </a> -
                    <a href="#">
                        EARTHPORN
                    </a> -
                    <a href="#">
                        SPACE
                    </a> -
                    <a href="#">
                        UPLIFTINGNEWS
                    </a> -
                    <a href="#">
                        WRITINGPROMPTS
                    </a> -
                    <a href="#">
                        MUSIC
                    </a> -
                    <a href="#">
                        ART
                    </a> -
                    <a href="#">
                        GETMOTIVATED
                    </a> -

                </div>

                <a href="#" class="more">
                    MORE »
                </a>
            </div>
        </nav>

        <header>
            <a href="#" class="title"></a>
            <div class="sub-title">
                <a href="#" class="popular">POPULAR</a>

                <div class="category">
                    <a href="#" class="active">hot</a>
                    <a href="#">new</a>
                    <a href="#">rigin</a>
                    <a href="#">controversial</a>
                    <a href="#">top</a>
                    <a href="#">gilded</a>
                </div>
            </div>
            <div class="configuration">

                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="username" id="login-modal">Login</a>|
                    @endif

                    @if(Route::has('register'))
                        <p style="display: inline;">Do you want to </p> <a href="{{ route('register') }}" class="username">Join</a>
                    @endif
                @else
                    <a href="#" class="username">{{ Auth::user()->name }}</a>|

                    <a href="{{ route('communities.index') }}">My Communities</a>|
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest


            </div>
        </header>
        <!-- Sidebar on the left -->

        <aside class="grippy"></aside>
        <div class="content">
            @yield('content')
            <!-- Sidebar on the right -->

            <!-- Sidebar -->
            <aside class="sidebar">
                <form>
                    <input type="text" placeholder="search">
                    <a href="#">
                        <i class="fa fa-search"></i>
                    </a>
                </form>

                <a href="#" class="btn-entry link">
            Submit a new link
            <div class="nub"></div>
        </a>

                <a href="#" class="btn-entry post">
            Submit a new text post
            <div class="nub"></div>
        </a>

                <!-- Goldvertisement -->
                <div class="goldvertisement">
                    <div class="inner">
                        <h2>daily reddit gold goal</h2>
                        <div class="progress">
                            <p>92%</p>
                            <div class="bar">
                                <span style="width: 92%"></span>
                            </div>
                        </div>

                        <a href="#">help support reddit</a>
                    </div>
                </div>

                <div class="recent-view">
                    <h2>MY COMMUNITIES</h2>
                    <div class="blocks">
                        @foreach ($newestCommunities as $community)
                        <div class="block">
                            <div class="voting-block">
                                <a href="#up">
                                    <i class="fa fa-arrow-up"></i>
                                </a>

                                <a href="#down">
                                    <i class="fa fa-arrow-down"></i>
                                </a>
                            </div>

                            <div class="topic-block">
                                <a href="#" class="topic-name">{{ $community->name }}
                                </a>
                                <div class="topic-detail">
                                    <p>24.9k points</p>
                                    |
                                    <a href="#">590 comments</a>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                    <a href="#" class="account-activity">account activity</a>
                </div>
            </aside>
        </div>
        <footer>
            <p>
                Use of this site constitutes acceptance of our <a href="#">User Agreement</a> and <a href="#">Privacy Policy</a>. © 2017 reddit inc. All rights reserved.
            </p>
            <p>
                REDDIT and the ALIEN Logo are registered trademarks of reddit inc.
            </p>

            <a href="#" class="advertise">
            Advertise - lifestyles
        </a>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.select2').select2();
    });
    </script>
    @livewireScripts
</body>
</html>
