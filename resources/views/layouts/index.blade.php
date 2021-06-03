<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>TAG Heuer X Porsche Carrera Cup Italia 202</title>
<link rel="icon" href="assets/img/tag-favicon.png" type="image/png" />
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/owl.carousel.css">
<link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="row h-100">
                <div class="col-12 align-vert">
                    <div class="logo">
                        <img src="assets/img/tag-heuer-logo.png" alt="Tag Heuer" class="img-fluid">
                    </div>
                    <h1 class="text">
                     @if($name)  {{ $name }} @endif<br />
                     @if($type)  {{ $type }} @endif<br />
                     @if($cup)    {{ $cup }} @endif
                    </h1>
                    <div class="button">
                        <a href="#vote">Vota il tuo pilota<img src="assets/img/button-arrow.svg"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="next-races">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">  @if($details) {{ $details }} @endif</h2>
                </div>
            </div>
            <div class="row">
                <div class="circuits" id="circuits">
                    @if($rounds)
                    @foreach ($rounds as $round )
                    @if($round->status==0)
                    <div class="race-wrapper past">
                    @endif
                    @if($round->status==2)
                    <div class="race-wrapper current">
                    @endif
                    @if($round->status==1)
                    <div class="race-wrapper">
                    @endif

                        <div class="race">
                            <div class="race-circuit">
                                <img src="{{ url('storage/image/'.$round->map_image) }}" class="img-fluid" alt="Misano">
                            </div>
                            <div class="race-date">{{ $round->details }}</div>
                            <div class="race-name">{{ $round->name }}</div>
                            <div class="race-stage">{{ $round->racetrack }}</div>
                        </div>
                        <div class="vr"></div>
                    </div>
                    @endforeach 
                    @endif
                </div>
            </div>
        </div>
    </div>
   
    <div class="vote-section" id="vote">
        <div class="vote">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h2 class="title">I piloti della corsa</h2>
                        <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</div>
                    </div>
                    <div class="col-12">
                        <div class="row no-gutters row-vote">
                            @if($driver_arr)
                            @foreach ($driver_arr as $drivers)
                            @if($drivers)
                            @foreach($drivers as $driver)
                            @if($driver)
                            @if($driver->status==1)
                            <div class="col-6 col-md-3">
                                <div class="wrapper-pilota">
                                    <div class="card-pilota">
                                        <div class="image-pilota">
                                            <img src="{{ url('storage/image/'.$driver->image) }}"  class="img-fluid" />
                                        </div>
                                        <div class="nome-pilota">
                                            {{ $driver->name }}
                                        </div>
                                        <div class="vota-pilota">
                                            <button>Vota il pilota <img src="assets/img/button-arrow-white.svg"></button>
                                        </div>
                                    </div>
                                    <div class="vr"></div>
                                </div>
                            </div>
                            @endif
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                            
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="already-voted">
            <div class="container">
                <div class="row h-100">
                    <div class="col-12 col-md-6 col-lg-5 d-none d-md-flex">
                        <div class="mio-pilota">
                            <div class="card-pilota">
                                <div class="image-pilota">
                                    <img src="assets/img/placeholder.jpg" class="img-fluid" />
                                    <div class="result">
                                        <div>
                                            <div class="icon"><img src="assets/img/vote-thumb.svg"></div>
                                            <div class="percentage">40%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nome-pilota">
                                    Simone Laquinta
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-7">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="title">I piloti della corsa</h2>
                                <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</div>
                                <div class="date-result">I risultati saranno annunciati il 1 ° luglio 2021</div>
                            </div>
                            <div class="col-12 d-flex d-md-none">
                                <div class="mio-pilota">
                                    <div class="card-pilota">
                                        <div class="image-pilota">
                                            <img src="assets/img/placeholder.jpg" class="img-fluid" />
                                            <div class="result">
                                                <div>
                                                    <div class="icon"><img src="assets/img/vote-thumb.svg"></div>
                                                    <div class="percentage">40%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nome-pilota">
                                            Simone Laquinta
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4">
                                <div class="wrapper-pilota">
                                    <div class="card-pilota">
                                        <div class="image-pilota">
                                            <img src="assets/img/placeholder.jpg" class="img-fluid" />
                                            <div class="result">
                                                <div>
                                                    <div class="icon"><img src="assets/img/vote-thumb.svg"></div>
                                                    <div class="percentage">40%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nome-pilota">
                                            Simone Laquinta
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4">
                                <div class="wrapper-pilota">
                                    <div class="card-pilota">
                                        <div class="image-pilota">
                                            <img src="assets/img/placeholder.jpg" class="img-fluid" />
                                            <div class="result">
                                                <div>
                                                    <div class="icon"><img src="assets/img/vote-thumb.svg"></div>
                                                    <div class="percentage">40%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nome-pilota">
                                            Simone Laquinta
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4">
                                <div class="wrapper-pilota">
                                    <div class="card-pilota">
                                        <div class="image-pilota">
                                            <img src="assets/img/placeholder.jpg" class="img-fluid" />
                                            <div class="result">
                                                <div>
                                                    <div class="icon"><img src="assets/img/vote-thumb.svg"></div>
                                                    <div class="percentage">40%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nome-pilota">
                                            Simone Laquinta
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-6">
                        <h2 class="title">I piloti della corsa</h2>
                        <div class="text">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet</div>
                    </div>
                    <div class="col-12">
                        @if(!$voting)
                        <div class="form-title">A BREVE SARANNO INIZIATE LE VOTAZIONI!</div>
                        @endif
                        <div class="form-title">Registrati per lasciare il tuo voto!</div>
                        <div class="row">
                            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                                <form class="form" method="post" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <input type="text" name="name" placeholder="Nome*" class="form-input" required />
                                    <input type="text" name="family" placeholder="Cognome*" class="form-input" required />
                                    <input type="email" name="email" placeholder="Email*" class="form-input" required />
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" required class="custom-control-input" id="privacy" name="privacy">
                                        <label class="custom-control-label" for="privacy">Accetto la <a href="pdf/privacy_policy.pdf" target="_blank">privacy e cookie policy</a></label>
                                    </div>
                                    @if($errors->any())
                                    <p style="color:#fff">

                                    {{ implode('', $errors->all(':message')) }}
                                    </p>
                                    @endif
                                    <button   @if(!$voting) disabled @endif type="submit" class="form-submit">Vota ora <img src="assets/img/button-arrow.svg"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div class="tag-section">
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-lg-6 align-self-center">
                    <h2 class="title">CRONOGRAFO TAG Heuer CARRERA PORSCHE EDIZIONE SPECIALE</h2>
                    <h3 class="text">TAG Heuer e Porsche. Queste due icone di design, qualità e innovazione hanno viaggiato in parallelo dal 1963. È giunto il momento di riunirsi su un unico binario.</h3>
                    <div class="button">
                        <a href="">Scopri di più <img src="assets/img/button-arrow.svg"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col order-2 order-md-1">
                    <div class="anagrafica">
                        © TAG Heuer Brand of LVMH Swiss Manufactures SA - 2021 | <a href="pdf/privacy_policy.pdf" target="_blank">Privacy and Cookie Policy</a>
                    </div>
                </div>
                <div class="col-12 col-md-auto order-1 order-md-2">
                    <div class="social">
                        <a href="https://www.youtube.com/watch?v=FO4jOPoVkI8" target="_blank"><img src="assets/img/youtube.svg" alt="Youtube" class="img-fluid" /></a>
                        <a href="https://www.tagheuer.com/ch/fr/listen/podcast.html" target="_blank"><img src="assets/img/podcast.svg" alt="Podcast" class="img-fluid" /></a>
                        <a href="https://www.clubhouse.com/@tagheuer-italia" target="_blank"><img src="assets/img/clubhouse.svg" alt="Clubhouse" class="img-fluid" /></a>
                        <a href="https://www.facebook.com/TAGHeuer" target="_blank"><img src="assets/img/facebook.svg" alt="Facebook" class="img-fluid" /></a>
                        <a href="https://www.instagram.com/tagheuer/" target="_blank"><img src="assets/img/instagram.svg" alt="Instagram" class="img-fluid" /></a>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/tag.js"></script>
    </div>
</body>

</html>