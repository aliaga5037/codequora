@extends('layouts.dizayn')
@section('basliq')
@if (auth()->guard()->guest() && auth()->guard('company')->guest())
        <a href="/login" class="login">Giriş</a>
        @endif
<h2>Öz mənzərəni KƏŞF ET</h2>
@endsection
@section('content')


<!-- Search form -->
<section class="search_box sidebar grid_4">

  <h2>Otel axtar</h2>

  <!-- Find a hotel form -->
  <form action="#" class="black">

    <label>Destination</label>
    <input type="text" name="destination" value="All" />

    <div class="half">
      <label>Check in</label>
      <input type="text" name="check_in" class="date" value="11/23/2011" />
    </div>

    <div class="half last">
      <label>Check out</label>
      <input type="text" name="check_out" class="date" value="11/23/2011" />
    </div>

    <div class="half">
      <label>Guests</label>
      <input type="text" name="guests" value="2" />
    </div>

    <div class="half last">
      <label>Rooms</label>
      <input type="text" name="rooms" value="1" />
    </div>

    <input type="submit" value="Search">

  </form>

</section>

<!-- Results -->
<ul class="results_wide grid_8">

  
  @foreach ($tours as $tour)
  
  <li>
    <a href="/tours/{{ $tour->latin }}" class="thumb"><img src="
     @if (count($tour->photos) != 0)
      
      {{ $tour->photos->first()->file_path }}

      @else

      /dizayn/img/8.jpg

      @endif
    
    " alt="" style="width:220px;height:100px;" /></a>
    <h3><a href="/tours/{{ $tour->latin }}">{{ $tour->hotel }}</a></h3>
    <span class="price">{{ $tour->price }} AZN</span>
    <div>
      <span><a href="/tours/{{ $tour->latin }}">{{ $tour->country }}</a></span>
      <span class="stars">
        <img src="dizayn/img/star_full.png" alt="" />
        <img src="dizayn/img/star_full.png" alt="" />
        <img src="dizayn/img/star_full.png" alt="" />
        <img src="dizayn/img/star_half.png" alt="" />
        <img src="dizayn/img/star_empty.png" alt="" />
      </span>
      <span>All inclusive</span>
    </div>
    <br>
    <p style="overflow:hidden;">{{ $tour->about }}</p>
  </li>

  @endforeach

</ul>

<div class="clearfix"></div>

<!-- Pagination -->
<div class="text-center"> {{ $tours->render() }}</div>


@endsection
