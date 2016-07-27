@extends('layouts.dizayn')
@section('basliq')
<h2>Turlarım</h2>
@endsection
@section('content')

<ul class="results">
<li class="text-center">
    @foreach($buy as $t)
        @foreach($t->basket as $ta)
        @if($ta->user_id == Auth::user()->id)
        <li class="short grid_3">
          <a href="/tours/{{ $t->latin }}"><img src="
            @if (count($ta->photos) != 0)

              {{ $ta->photos->first()->file_path }}
            @else
              /dizayn/img/1.jpg
            @endif
          " alt="" style="width: 100%; height: 220px;" /></a>
          <h3><a href="/tours/{{ $t->latin }}">{{  $t->tourName  }}</a></h3>
          <span class="stars">
            <img src="/dizayn/img/star_full.png" alt="" />
            <img src="/dizayn/img/star_full.png" alt="" />
            <img src="/dizayn/img/star_full.png" alt="" />
            <img src="/dizayn/img/star_half.png" alt="" />
            <img src="/dizayn/img/star_empty.png" alt="" />
          </span>
          <div>
            <span><a href="/tours/{{ $ta->latin }}">{{ $t->country }}</a></span>
            <span><strong>{{ $t->price }}AZN</strong> / {{ $t->days }} gün</span>
          </div>
        </li>
        @endif
    @endforeach
    @endforeach
    </li>
</ul>



@endsection
