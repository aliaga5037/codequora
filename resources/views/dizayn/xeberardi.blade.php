@extends('layouts.dizayn')
@section('basliq')
@if (auth()->guard()->guest() && auth()->guard('company')->guest())
				<a href="/login" class="login">Giriş</a>
				@endif
<h2>
    @if(auth()->guard('')->user() or auth()->guard('company')->user() or auth()->guard('')->guest() )
    {{ $tourlink->tourName }}
    @endif
</h2>
@endsection
@section('content')


	<!-- Image gallery -->
	<section class="gallery grid_12">

		<!-- Slider navigation -->
		<nav class="slider_nav">
			<a href="#" class="left">&nbsp;</a>
			<a href="#" class="right">&nbsp;</a>
		</nav>

		<!-- Slider -->
		<div class="slider_wrapper">

			<!-- Slider content -->
			<div class="slider_content">


			@if (count($photos) == 0)





					<a href="/dizayn/img/1.jpg">
					<img src="/dizayn/img/1.jpg" alt="" />
				</a>
				@else
				@foreach ($photos as $image)
				<a href="{{ $image->file_path }} ">
					<img src="{{ $image->file_path }} " alt="" />
				</a>
				@endforeach
				@endif


			</div>

		</div>

	</section>

	<div class="clearfix"></div>
	<hr class="dashed grid_12" />

	<!-- Simple text -->
	<section class="text padded_right grid_8">
		<h3 class="text_big">
      @if(auth()->guard('')->user() or auth()->guard('company')->user() or auth()->guard('')->guest() )
      {{ $tourlink->tourName }}
      @endif
    </h3>

		<p>
      @if(auth()->guard('')->user() or auth()->guard('company')->user() or auth()->guard('')->guest() )
      {{ $tourlink->about }}
      @endif

    </p>

    <p> <b>Vaxt aralığı</b>  </p>
    <p>

      @if(auth()->guard('')->user() or auth()->guard('company')->user() or auth()->guard('')->guest() )
      {{ $vaxt }}
      @endif

        -   @if(auth()->guard('')->user() or auth()->guard('company')->user() or auth()->guard('')->guest() )
          {{$vaxtdan}}
          @endif
    </p>

      <p> <b>Qiymət</b>  </p>

<p>
  @if(auth()->guard('')->user() or auth()->guard('company')->user() or auth()->guard('')->guest() )
  {{ $tourlink->price }}&nbspAZN
  @endif
</p>




	</section>

	<!-- Video -->
	<section class="video grid_4">


		<img src="@if (count($tourlink->photos) == 0)
			/dizayn/img/1.jpg
			@else
			{{ $tourlink->photos->first()->file_path }}

		@endif" alt="">
		@if(auth()->guard('')->user())


			@if( count($tourlink->basket)==0)
			<form class="" action="{{ url("/tours/$tourlink->id/".Auth::user()->id) }}" method="post">
				{{csrf_field()}}



				<input style="width:300px;" type="submit" value="Səbətə Əlavə Et">

			</form>
			@endif

			@foreach($tourlink->basket as $tur)





		@if( $tur->tour_id != $tourlink->id && $tur->user_id != Auth::user()->id )
		<form class="" action="{{ url("/tours/$tourlink->id/".Auth::user()->id) }}" method="post">
			{{csrf_field()}}



			<input style="width:300px;" type="submit" value="Səbətə Əlavə Et">

		</form>




	@if(1==1)@break; @endif

		@else

		<form class="" action="/tours/tourbuy/{{$tur->id}}" method="post">

			{{csrf_field()}}
			<input type="hidden" name="_method" value="delete">


			<input style="width:300px;" type="submit" value="Səbətdən Çıxart">

		</form>


		@endif

			@endforeach
		@endif


	</section>

	<div class="clearfix"></div>
	<hr class="dashed grid_12" />

@endsection
