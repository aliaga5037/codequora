

@extends('layouts.dizayn')
@section('head')

<link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.css">
@stop
@section('basliq');
@if (auth()->guard()->guest() && auth()->guard('company')->guest())
        <a href="/login" class="login">Giriş</a>
        @endif
  <h2>Gəzmək sağlamlıqdır</h2>
@endsection

@section('content')

<style>
#panel a:hover, #panel a:focus {
color: #fff;
text-decoration: none;
}
</style>

<section class="filter grid_12">
    <form action="#" class="black">

      <div class="full">
        <label>Uçuş nöqtəsi</label>
        <input type="text" name="destination" value="All" />
      </div>

      <div class="full">
        <label>Ölkə</label>
        <input type="text" name="transportation" value="Plane" />
      </div>

      <div class="half">
        <label>Uçuş tarixi</label>
        <input type="text" name="date" class="date" value="11/23/2011" />
      </div>

      <div class="half">
        <label>Böyüklər</label>
        <input type="text" name="guests" value="2" />
      </div>

      <div class="half last">
        <label>Uşaqlar</label>
        <input type="text" name="rooms" value="1" />
      </div>

      <input type="submit" value="Search" />

    </form>
  </section>

  <div class="clearfix"></div>

  <!-- Results -->
  <ul class="results">
    @foreach ($tours as $tour)


    <li class="grid_4">
      <a href="/tours/{{ $tour->latin}}"><img src="
      @if (count($tour->photos) != 0)

      {{ $tour->photos->first()->file_path }}

      @else

      /dizayn/img/1.jpg

      @endif

      " alt="{{ $tour->tour_name }}" style="width:100%;height:220px;" /></a>
      <h3><a href="/tours/{{ $tour->latin }}">{{ $tour->tourName }}</a></h3>
      <span class="price"><strong>{{ $tour->price }} Azn</strong> / {{$tour->days}} gün</span>
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
    </li>

    @endforeach

  </ul>

  <div class="clearfix"></div>

  <!-- Pagination -->
  <div class="text-center">
   {!! $tours->render() !!}
  </div>


@endsection
