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
                       {{ $name }}<br />
                       {{ $type }}<br />
                       {{ $cup }}
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
                    <h2 class="title"> {{ $details }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="circuits" id="circuits">

                    @foreach ($rounds as $round )
                    @if($round->status==0)
                    <div class="race-wrapper past">
                    @endif
                    @if($round->status==2)
                    @php
                        $round_id=$round->id;
                    @endphp
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
                    
                </div>
            </div>
        </div>
    </div>
   
    <div class="vote-section" id="vote">
       


        <div class="already-voted" style="display: block">
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
                            <!--<div class="col-12 d-flex d-md-none">
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
                            </div>-->
                            @for($i=0;$i<sizeof($result_driver_id);$i++) 
                            <div class="col-6 col-lg-4">
                                <div class="wrapper-pilota">
                                    <div class="card-pilota">
                                        <div class="image-pilota">
                                            <img src="{{ url('storage/image/'.$result_image[$i]) }}" class="img-fluid" />
                                            <div class="result">
                                                <div>
                                                    <div class="icon"><img src="assets/img/vote-thumb.svg"></div>
                                                    <div class="percentage">{{ floor($result_count[$i]*100/$all_votes) }}%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nome-pilota">
                                           {{$result_name[$i]}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                           
                             
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