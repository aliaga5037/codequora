@extends('layouts.dizayn')
@section('basliq');
@if (auth()->guard()->guest() && auth()->guard('company')->guest())
        <a href="/login" class="login">Giriş</a>
        @endif
<h2>Bizimlə Əlaqə</h2>
@endsection
@section('content')

<section class="contact_map grid_12">
    <script>
      $(function() {
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: new google.maps.LatLng(40.7069, -74.0096),
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });
          var marker= new google.maps.Marker({
          position: new google.maps.LatLng(40.7069, -74.0096),
          map: map
        });
      });
    </script>
    <div id="map"></div>
  </section>

  <div class="clearfix"></div>
  <hr class="dashed grid_12" />

  <!-- About -->
  <section class="about text grid_8">
    <h2 class="text_big">Zenit Travel Agentliyi</h2>

    <p class="address">
      <span><img src="dizayn/img/address.png" alt="" />Zarifa Aliyeva 35/12 BAKI</span>
      <span><img src="dizayn/img/email.png" alt="" /> info@azerbaijantour.az</span>
      <span><img src="dizayn/img/phone.png" alt="" /> +994 50 590 50 11</span>
    </p>

    <hr class="dashed" />

    <h3>Praesent laoreet sem sit amet urna dapibus?</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam faucibus placerat risus, ac vulputate enim facilisis eu. In sodales lacinia elit, ut rhoncus risus consequat sit amet. Suspendisse potenti. Nam imperdiet lacinia aliquet. Donec odio risus, dignissim id placerat et, molestie sed ligula.</p>

    <hr class="dashed" />

    <h3>Aenean nibh sem, placerat ac laoreet ac?</h3>
    <p>Vestibulum placerat rhoncus massa, vel viverra ligula placerat sit amet. Aenean nibh sem, placerat ac laoreet ac, ullamcorper in est. Nulla facilisi. Suspendisse potenti. Maecenas mollis dui id lacus semper sit amet accumsan augue rhoncus. Ut sed felis eget mi placerat accumsan ut vel risus.</p>
  </section>

  <!-- Contact form -->
  <section class="contact_form simple grid_4">

    <h2 class="text_big">Bizə Yaz</h2>

    <form action="#" id="contact_form">
      <label>Ad</label>
      <input type="text" name="name" />

      <label>Email</label>
      <input type="email" name="email" />

      <label>Mesaj</label>
      <div class="textarea">
        <textarea name="message" cols="30" rows="10"></textarea>
      </div>

      <input type="submit" value="Göndər" class="auto_width">

      <p class="status"></p>

    </form>

  </section>
@endsection
