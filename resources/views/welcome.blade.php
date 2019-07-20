<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
	   <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/logo.png') }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Fahmi Handycraft - For Your Fashion Needs</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/gaia.css') }}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Cambo|Poppins:400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <link href="{{ asset('css/fonts/pe-icon-7-stroke.css') }}" rel="stylesheet">
    <style>
    #map {
      height: 200px;  /* The height is 400 pixels */
      width: 100%;  /* The width is the width of the web page */
     }
    </style>
</head>

<body>

    <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" color-on-scroll="200">
        <!-- if you want to keep the navbar hidden you can add this class to the navbar "navbar-burger"-->
        <div class="container">
            <div class="navbar-header">
                <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a href="{{ url('/') }}" class="navbar-brand">
                    Fahmi Handycraft
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right navbar-uppercase">
                    <li>
                        <a href="#katalog" class="a-link" id="a-katalog">Katalog</a>
                    </li>
                    <li>
                        <a href="#testimoni" class="a-link"  id="a-testimoni">Testimoni</a>
                    </li>
                    <li>
                        <a href="#custom" class="a-link" id="a-custom">Custom</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="section section-header">
        <div class="parallax filter filter-color-gold">
            <div class="image"
                style="background-image: url('/img/header-1.JPG')">
            </div>
            <div class="container">
                <div class="content">
                    <div class="title-area">
                        <h1 class="title-modern">Fahmi Handycraft</h1>
                        <h3>For Your Fashion Needs</h2>
                        <div class="separator line-separator">♦</div>
                    </div>

                    <!-- <div class="button-get-started">
                        <a href="http://www.creative-tim.com/product/gaia-bootstrap-template" target="_blank" class="btn btn-white btn-fill btn-lg ">
                            Download Demo
                        </a>
                    </div> -->
                </div>

            </div>
        </div>
    </div>

    <div class="section" id="katalog">
      <div class="container">
          <div class="content">
              <div class="row">
                  <div class="title-area" style="margin-bottom: 20px;">
                      <h2>Katalog</h2>
                      <div class="separator separator-danger">✻</div>
                      <p class="description" style="margin-bottom: 0px !important;">Semua produk kami merupakan hasil karya tangan dengan bahan yang berkualitas.</p>
                  </div>
              </div>
              <div class="" style="margin-bottom: 20px;">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#all" role="tab" data-toggle="tab">Semua</a></li>

                  @foreach($kategori as $i)
                  <li><a href="#kategori-{{ $i->id }}" role="tab" data-toggle="tab">{{ $i->nama }}</a></li>
                  @endforeach
                </ul>
              </div>
              <div class="team">
                <div class="tab-content container">
                  <div class="tab-pane active row" id="all">
                    @if(sizeof($all) == 0)
                    <div class="w-100 text-center">
                      <img src="{{ asset('/img/no_result.jpg') }}" alt="no result" title="no result">
                      <p>Produk tidak ditemukan</p>
                    </div>
                    @endif
                    @foreach($all as $j)
                    <div class="col-md-4 col-sm-12" style="margin-bottom: 20px">
                        <a href="{{ url('/') . '/' . $j->image }}" target="_blank">
                          <div class="card card-member">
                              <div class="content">
                                @if($j->color)
                                <div class="" style="width: 20px; height: 20px; background-color: {{ $j->color }}; border-radius: 50%;">
                                </div>
                                @endif
                                  <div class="avatar avatar-danger">
                                      <img alt="{{ $j->title }}" class="img-circle" style="object-fit:cover" src="{{ $j->thumbnail_m }}"/>
                                  </div>
                                  <div class="description">
                                      <h3 class="title">{{ $j->title }}</h3>
                                      <!-- <p class="small-text">CEO / Co-Founder</p> -->
                                      <p class="description" style="margin-bottom: 20px !important; ">{{ $j->description }}</p>
                                      <span class="" style="font-size: 12px;color: white; text-align: left; background-color: #f56856; padding: 5px 10px; border-radius: 20px;">
                                        Rp. {{ ' ' . $j->low_price }}@if($j->end_price) {{ ' - ' . $j->end_price }} @endif
                                      </span>
                                  </div>
                                  <div class="flex-container">
                                    <div class="text-left" style="margin-right: auto !important;">
                                      <i class="far fa-eye"></i> {{ $j->view }}
                                    </div>
                                    <a onclick="addView({{ $j->id }})" href="https://wa.me/6281357959023?text=Saya%20ingin%20memesan%20produk%20{{ $j->title }}" class="btn-link" target="_blank"  style="margin-left: auto">Beli</a>
                                  </div>
                              </div>
                          </div>
                        </a>
                    </div>
                    @endforeach
                  </div>
                  @foreach($kategori as $i)
                  <div class="tab-pane row" id="kategori-{{$i->id }}">
                      @if(sizeof($i->Katalog) == 0)
                      <div class="w-100 text-center">
                        <img src="{{ asset('/img/no_result.jpg') }}" alt="no result" title="no result">
                        <p>Produk tidak ditemukan</p>
                      </div>
                      @endif
                      @foreach($i->Katalog as $j)
                      <div class="col-md-4 col-sm-12" style="margin-bottom: 20px">
                          <a href="{{ url('/') . '/' . $j->image }}" target="_blank">
                            <div class="card card-member">
                                <div class="content">
                                  <div class="" style="width: 20px; height: 20px; background-color: {{ $j->color }}; border-radius: 50%;">
                                  </div>
                                    <div class="avatar avatar-danger">
                                        <img alt="{{ $j->title }}" class="img-circle" style="object-fit:cover" src="{{ $j->thumbnail_m }}"/>
                                    </div>
                                    <div class="description">
                                        <h3 class="title">{{ $j->title }}</h3>
                                        <!-- <p class="small-text">CEO / Co-Founder</p> -->
                                        <p class="description" style="margin-bottom: 20px !important; ">{{ $j->description }}</p>
                                        <span class="" style="font-size: 12px;color: white; text-align: left; background-color: #f56856; padding: 5px 10px; border-radius: 20px;">
                                          Rp. {{ ' ' . $j->low_price }}@if($j->end_price) {{ ' - ' . $j->end_price }} @endif
                                        </span>
                                    </div>
                                    <div class="flex-container">
                                      <div class="text-left" style="margin-right: auto !important;">
                                        <i class="far fa-eye"></i> {{ $j->view }}
                                      </div>
                                      <a onclick="addView($j->id)" href="https://wa.me/6281357959023?text=Saya%20ingin%20memesan%20produk%20{{ $j->title }}" class="btn-link" target="_blank" style="margin-left: auto">Beli</a>
                                    </div>
                                </div>
                            </div>
                          </a>
                      </div>
                      @endforeach
                  </div>
                  @endforeach
                </div>
              </div>
          </div>
      </div>
    </div>

    {{ csrf_field() }}
    <div class="section section-small section-get-started" id="testimoni">
        <div class="parallax filter filter-color-black">
            <div class="image"
                style="background-image: url('/img/bg-pernik.jpg')">
            </div>
            <div class="container">
                <div class="title-area">
                    <h2>Testimoni</h2>
                    <div class="separator separator-danger">∎</div>
                </div>

                <ul class="nav nav-text" role="tablist">
                    <li class="active">
                        <a href="#testimonial1" role="tab" data-toggle="tab">
                            <div class="image-clients">
                                <img alt="Aza" title="Aza" class="img-circle" src="/img/faces/face_5.jpg"/>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#testimonial2" role="tab" data-toggle="tab">
                            <div class="image-clients">
                                <img alt="Angga" title="Angga" class="img-circle" src="/img/faces/face_6.jpg"/>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#testimonial3" role="tab" data-toggle="tab">
                            <div class="image-clients">
                                <img alt="Ida" title="Ida" class="img-circle" src="/img/faces/face_2.jpg"/>
                            </div>
                        </a>
                    </li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane active" id="testimonial1">
                        <p class="description p-testi  text-white">
                          "Berbagai macam jenis produk fahmi handycraft sangat berkuliatas dan produk yang dihasilkan cocok dipakai dengan berbagai macam model hijab"
                        </p>
                    </div>
                    <div class="tab-pane" id="testimonial2">
                        <p class="description p-testi text-white">
                          "Awalnya sering langganan tas handmade di fahmi handycraft untuk istri. Lama - kelamaan sekarang jadi reseler fahmi handycraft dan mendapatkan untuk yang besar."
                        </p>
                    </div>
                    <div class="tab-pane" id="testimonial3">
                        <p class="description p-testi text-white">
                          Sudah 1 tahun langganan custom produk handmade di fahmi handycraft. Banyak yang suka karena produk yang dihasilkan berkualitas dan harganya terjangkau.
                        </p>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <div class="section section-small section-get-started" id="custom">
      <div class="container">
          <div class="title-area">
              <h2 class="text-black">Custom Handmade</h2>
              <div class="separator line-separator">♦</div>
              <p class="description">Kami siap membantu anda untuk membuat produk sesuai keinginan anda. Kami dapat menjamin produk tersebut berkualitas dan fashionable</p>
          </div>

          <div class="button-get-started">
              <a href="https://wa.me/6281357959023?text=Saya%20ingin%20custom%20produk%20sesuai%20keinginan" class="btn btn-danger btn-fill btn-lg">Kontak Kami</a>
          </div>
      </div>
    </div>


    <footer class="footer footer-big footer-color-black" data-color="black">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12"style="padding-bottom: 20px">
                    <div class="w-100">
                      <div id="map"></div>
                      <script>
                      // Initialize and add the map
                      function initMap() {
                        // The location of Uluru
                        var uluru = {lat: -7.2851443, lng: 112.7418236};
                        // The map, centered at Uluru
                        var map = new google.maps.Map(
                            document.getElementById('map'), {zoom: 17, center: uluru});
                        // The marker, positioned at Uluru
                        var marker = new google.maps.Marker({position: uluru, map: map});
                      }
                      </script>
                          <!--Load the API from the specified URL
                          * The async attribute allows the browser to render the page while the API loads
                          * The key parameter will contain your own API key (which is not needed for this tutorial)
                          * The callback parameter executes the initMap() function
                          -->
                          <script async defer
                          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8t28ByJMlCd1RIBTJKCnC0anO3-I5jjU&callback=initMap">
                          </script>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3" style="padding-bottom: 20px">
                    <div class="info">
                        <h5 class="title">Tentang Kami</h5>
                        <nav>
                           <ul>
                               <li>
                                   <a href="#"><i class="fas fa-home"></i> Jl.Dinoyo Buntu No.21, Surabaya</a>
                               </li>
                               <li>
                                   <a href="#"><i class="fas fa-phone-alt"></i> 081357959023</a>
                               </li>
                               <li>
                                   <a href="#"><i class="far fa-envelope"></i> handycraft.fahmi@gmail.com</a>
                               </li>
                           </ul>
                       </nav>
                    </div>
                    <div class="info" style="padding-top: 10px;">
                        <h5 class="title">Follow us on</h5>
                        <nav>
                            <ul>
                                <li>
                                    <a href="http://instagram.com/fahmihandycraft.id" class="btn btn-social btn-facebook btn-simple">
                                        <i class="fab fa-instagram"></i> Instagram
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <hr>
            <div class="copyright">
                 © 2019 Fahmi Handycraft
            </div>
        </div>
    </footer>

</body>

<!--   core js files    -->
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>

<!--  js library for devices recognition -->
<script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script>

<!--   file where we handle all the script from the Gaia - Bootstrap Template   -->
<script type="text/javascript" src="{{ asset('js/gaia.js') }}"></script>
<script>
function addView(id){
  var add_id = id;
  var formData = {
    _token : $("input[name=_token]").val(),
    id : add_id
  };
  $.ajax({
    type : "post",
    url : "{{ url('/api/add-view') }}",
    data : formData,
    success : function (data) {
        if (!(data.errors)){
          console.log(data.message);
        }
    },
    error : function (data) {
        console.log("Error", data);
    },
  });
}

$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: ".navbar", offset: 50});

  // Add smooth scrolling on all links inside the navbar
  $(".a-link").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>
</html>
