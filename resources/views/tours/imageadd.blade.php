@extends('layouts.dizayn')
@section('head')
<link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.css">
@stop
@section('content')
<style>
	.table-bordered{
		border: 1px solid black!important;
	}
	.table-bordered>thead>tr>th{
		border: 1px solid black!important;
		color: black;
	}
	.table-bordered>tbody>tr>td{
		border: 1px solid black!important;
	}
<<<<<<< HEAD

=======
	
>>>>>>> 4f428a5437a4fe719cc58a816bc20b24f457626c
	a:hover, a:focus {
color: #fff;
text-decoration: none;
}

.thumbimage {
    float:left;
    width:100px;
    height: 100px;
    position:relative;
    padding:5px;
}
</style>
<div class="text-center">
	<h2 style="margin: 20px 0;">{{ $tour->tourName }}</h2>
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Whoops!</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($validator->all() as $error)
			{{ dd($error) }}
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<form action="{{ url( "/$tour->id/images" ) }}" method="post" id="form1" runat="server" enctype="multipart/form-data">
		{{ csrf_field() }}
		<input type="hidden" name="_token" value="{{  csrf_token() }}">
		<div id="wrapper">
		<input type="file" id="imageupload" name="image[]" onchange="readURL(this);" multiple>
		<br />
    	<div id="preview-image"></div>
		{{-- <img id='blah' src='#' alt='your image' style='display:none;'/> --}}
		<input type="submit">
		</div>
	</form>
</div>
<script>
// 	function readURL(input) {
// if (input.files && input.files[0]) {
// var reader = new FileReader();
// reader.onload = function (e) {
// $('#blah')
// .attr('src', e.target.result)
// .width(150)
// .height(200)
// .css("display", "block");
// };
// reader.readAsDataURL(input.files[0]);
// }
// 	}
</script>
<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
<script type="text/javascript">
 $("#imageupload").on('change', function () {

     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#preview-image");
     image_holder.empty();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {

             for (var i = 0; i < countFiles; i++) {

                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
                             "class": "thumbimage"
                     }).appendTo(image_holder);
                 }

                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("It doesn't supports");
         }
     } else {
         alert("Select Only images");
     }
 });
 </script>
@stop
