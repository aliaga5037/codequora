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
	.add{
		width: 50%;
	}
	 a:hover, a:focus {
color: #fff;
text-decoration: none;
}
</style>
<div class="container_12" style="padding:  10px;">
	<div class="text-center">
		<h2 style="margin: 20px 0; display:block;">{{ $tour->tourName }}</h2>
		<a href="/{{ $tour->id }}/images/create" class="btn btn-success add">Şəkil əlavə et</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Şəkillər</th>
					<th>Sil</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($tour->photos as $image)


				<tr>
					<td><img src="{{ $image->file_path }}" alt=""></td>
					<td>
						<form action="{{url("/$image->company_id/images/$image->id")}}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="_method" value="DELETE" >
							<input type="submit" class="btn btn-danger" value="Sil">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@stop
