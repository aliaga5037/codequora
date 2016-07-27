@extends('layouts.dizayn')

@section('head')
	<link rel="stylesheet" href="/dizayn/datapicker/css/datepicker.css">
@stop
@section('script')
<script src="/dizayn/js/jquery2.min.js"></script>
	<script src="/dizayn/datapicker/js/bootstrap-datepicker.js"></script>
@stop
@section('content')
<style media="screen">
label{
font-size: 12px;
}
input{
display:block;
border:1px solid black;
font-size: 14px;
color:black;
width: 50%;
}
input:focus{
padding:15px;
background-color:;
}
textarea{
border: 1px solid black;
display:block;
background: white;
width: 50%;
}
</style>
<div style="margin-left:35%;" class="">
	<form class="" action="{{ url("$id/tours") }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<label style="color:black;" for="ad">Turun adı</label>
		<input type="text" id="ad"  name="tourName" value="{{ old('tourName') }}" required>

		<label style="color:black;" for="start">Turun başlama tarixi</label>
		<input type="date" id="start"  	name="start" value="{{ old('start') }}" required>

		<label style="color:black;" for="end">Turun bitmə tarixi</label>
		<input type="date" id="end"  	name="end" value="{{ old('end') }}" required>

		<label style="color:black;" for="country">Ölkə</label>
		<input type="text" id="country"  name="country" value="{{ old('country') }}" required>

		<label style="color:black;" for="price">Turun qiyməti</label>
		<input type="number" id="price"  name="price" value="{{ old('price') }}" required>

		<label style="color:black;" for="flyPoint">Uçuş nöqtəsi</label>
		<input type="text" id="flyPoint"  name="flyPoint" value="{{ old('flyPoint') }}" required>

		<label style="color:black;" for="hotel">Hotel</label>
		<input type="text" id="hotel"  name="hotel" value="{{ old('hotel') }}" required>

		<input type="hidden" nqme="_token" value="{{ csrf_token() }}">
		<input type="file" name="image">


		<label style="color:black;" for="about">Tur haqqında</label>
		<textarea type="text" id="about"  name="about" value="{{ old('about') }}" required></textarea>

		<input style="margin-top:50px; " type="submit" name="name" value="Tur əlavə et">
	</form>
</div>



@stop
