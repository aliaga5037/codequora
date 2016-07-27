@extends('layouts.dizayn')
@section('head')

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
	<form action="{{url("/$tour->company_id/tours/$tour->id")}}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT" >

		<label style="color:black;" for="ad">Turun adı</label>
		<input type="text" id="ad"  name="tourName" value="{{ $tour->tourName }}" required>

		<label style="color:black;" for="start">Turun başlama tarixi</label>
        <input type="date" name="start"  id="start" value="{{ $tour->start }}" />

		<label style="color:black;" for="end">Turun bitmə tarixi</label>
		<input type="date" name="end"  id="end" value="{{ $tour->end }}" required/>

		<label style="color:black;" for="country">Ölkə</label>
		<input type="text" id="country"  name="country" value="{{ $tour->country }}" required>

		<label style="color:black;" for="flyPoint">Uçuş nöqtəsi</label>
		<input type="text" id="flyPoint"  name="flyPoint" value="{{ $tour->flyPoint }}" required>

		<label style="color:black;" for="hotel">Hotel</label>
		<input type="text" id="hotel"  name="hotel" value="{{ $tour->hotel }}" required>

		<label style="color:black;" for="about">Tur haqqında</label>
		<textarea type="text" id="about"  name="about" value="" required>{{ $tour->about }}</textarea>

		<label style="color:black;" for="price">Turun qiyməti</label>
		<input type="number" id="price"  name="price" value="{{ $tour->price }}" required>

		<input style="margin-top:50px; " type="submit" name="name" value="Dəyişikliyi qeyd et">
	</form>
</div>


<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
@stop
