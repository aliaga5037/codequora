@extends('layouts.dizayn')

@section('head')
	<link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.css">
@stop
@section('basliq');
@if (auth()->guard()->guest() && auth()->guard('company')->guest())
				<a href="/login" class="login">Giriş</a>
				@endif
<!-- Title and navigation panel -->




<!-- Slider navigation -->
<nav class="slider_nav">
<a href="#" class="left">&nbsp;</a>
<a href="#" class="right">&nbsp;</a>
</nav>

<!-- Slider -->
<div class="slider_wrapper">

<!-- Slider content -->
<ul class="homepage_slider">


	@foreach($slide as $tourin)
	<!-- First slide -->
	<li style="display: block;">
		<h2><a href="/tours/{{ $tourin->latin }}">The {{ $tourin->country }} Expedition from <strong>{{ $tourin->price }} AZN</strong></a></h2>
		<p>{{ $tourin->about }}</p>
	</li>
	@endforeach

</ul>

<div class="clearfix"></div>
</div>
@endsection
@section('content')
<style>
a:hover, a:focus {
color: #fff;
text-decoration: none;
}
</style>


<!-- Main content -->
<div class="container_12">

	<!-- Recommended trips -->
	<ul class="results">
	<li class="text-center">
			@foreach($tourindex as $tourin)

					<li class="short grid_3">
						<a href="/tours/{{ $tourin->latin }}"><img src="
							@if (count($tourin->photos) != 0)

								{{ $tourin->photos->first()->file_path }}
							@else
								/dizayn/img/1.jpg
							@endif
						" alt="" style="width: 100%; height: 220px;" /></a>
						<h3><a href="/tours/{{ $tourin->latin }}">{{ $tourin->tourName }}</a></h3>
						<span class="stars">
							<img src="/dizayn/img/star_full.png" alt="" />
							<img src="/dizayn/img/star_full.png" alt="" />
							<img src="/dizayn/img/star_full.png" alt="" />
							<img src="/dizayn/img/star_half.png" alt="" />
							<img src="/dizayn/img/star_empty.png" alt="" />
						</span>
						<div>
							<span><a href="/tours/{{ $tourin->latin }}">{{ $tourin->country }}</a></span>
							<span><strong>{{ $tourin->price }}AZN</strong> / {{$tourin->days}} gün</span>
						</div>
					</li>
			@endforeach
			</li>
	</ul>





	<div class="clearfix"></div>
	<div class="text-center">
		{{ $tourindex->render() }}
	</div>
	<hr class="dashed grid_12" />


	<!-- Search form and last minute -->
	<section class="search_lm grid_12">

		<!-- Ticket search form -->
		<section class="search sidebar">

			<h2>
				<span data-form="find_trip" class="selected">Turlar</span>
				<span data-form="find_hotel">Otellər</span>

			</h2>

			<!-- Find a trip form -->
			<form action="#" data-form="find_trip" class="black">

				<label>Uçuş nöqtəsi</label>
				<input type="text" name="destination" value="All" />

				<div class="half">
					<label>Ölkə</label>
					<input type="text" name="transportation" value="Plane" />
				</div>

				<div class="half last">
					<label>Səfərin başlama tarixi</label>
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

				<input type="submit" value="Axtar">

			</form>

			<!-- Find a hotel form -->
			<form action="#" data-form="find_hotel" class="black" style="display:none;">

				<label>Ölkə</label>
				<input type="text" name="destination" value="All" />

				<div class="half">
					<label>Giriş</label>
					<input type="text" name="check_in" class="date" value="11/23/2011" />
				</div>

				<div class="half last">
					<label>Çıxış</label>
					<input type="text" name="check_out" class="date" value="11/23/2011" />
				</div>

				<div class="half">
						<label>Nəfər sayı</label>
					<input type="text" name="guests" value="2" />
				</div>

				<div class="half last">
					<label>Otaqlar</label>
					<input type="text" name="rooms" value="1" />
				</div>

				<input type="submit" value="Axtar">

			</form>


		</section>

		<!-- Last minute -->
		<section class="last_minute">
			<table>
				<tr class="header">
					<th>Ölkə</th>
					<th>Otel</th>
					<th>Vaxt aralıqı</th>
					<th>Müddət</th>
					<th>Qiymət</th>
				</tr>
				<tr>
					<td><a href="browse.html">Spain</a></td>
					<td>Hotel Grand 5*</td>
					<td>13 Oct - 25 Oct</td>
					<td>12 nights</td>
					<td><del>1 099 €</del> 899 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Greece</a></td>
					<td>Hotel Palma 4*</td>
					<td>15 Oct - 25 Oct</td>
					<td>10 nights</td>
					<td><del>1 099 €</del> 749 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Italy</a></td>
					<td>Holiday Inn 4*</td>
					<td>15 Oct - 25 Oct</td>
					<td>10 nights</td>
					<td><del>1 099 €</del> 799 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Egypt</a></td>
					<td>Beach Resort 5*</td>
					<td>18 Oct - 28 Oct</td>
					<td>9 nights</td>
					<td><del>1 099 €</del> 799 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">United Kingdom</a></td>
					<td>Spa & Golf Resort 4*</td>
					<td>18 Oct - 28 Oct</td>
					<td>9 nights</td>
					<td><del>1 099 €</del> 749 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Thailand</a></td>
					<td>Welness Resort 5*</td>
					<td>20 Oct - 29 Oct</td>
					<td>9 nights</td>
					<td><del>1 099 €</del> 849 €</td>
				</tr>
				<tr>
					<td><a href="browse.html">Spain</a></td>
					<td>Hotel Grand 5*</td>
					<td>25 Oct - 05 Nov</td>
					<td>11 nights</td>
					<td><del>1 099 €</del> 899 €</td>
				</tr>
			</table>
		</section>

	</section>

	<div class="clearfix"></div>
	<hr class="dashed grid_12" />

	<!-- Latest blog articles -->


@endsection
