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
		color: #fff;
	}
	.table-bordered>tbody>tr>td{
		border: 1px solid black!important;
	}
	a:hover, a:focus {
    color: #fff;
    text-decoration: none;
}
</style>
	<div class="container_12" style="padding:  10px;">



		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Turun adı</th>
					<th>Başlama tarixi</th>
					<th>Bitmə tarixi</th>
					<th>Uçuş nöqtəsi</th>
					<th>Ölkə</th>
					<th>Otel</th>
					<th>Şəkillər</th>
					<th>Qiymət</th>
					<th>Tur haqqında</th>
					<th>Gözləyənlər</th>
            		<th>Təsdiq olunanlar</th>
					<th>Editlə</th>
					<th>Turu sil</th>

				</tr>
			</thead>
			<tbody>
			@foreach ($company->tours as $tour)

				<tr>
					<td><a href="/tours/{{ $tour->latin }}">{{$tour->tourName}}</></td>
					<td>{{$tour->start}}</td>
					<td>{{$tour->end}}</td>
					<td>{{$tour->flyPoint}}</td>
					<td>{{$tour->country}}</td>
					<td>{{$tour->hotel}}</td>
					<td><a href="{{ url("/$tour->id/images") }}"><span class="label label-primary">Şəkillər</span></a></td>
					<td>{{$tour->price}}AZN</td>
					<td>{{$tour->about}}</td>
					<td>@if($tour->onoff == 0) <span class="label label-danger">Təsdiq Gözləyir</span> @endif</td>
					<td>@if($tour->onoff == 1) <span class="label label-success">Təsdiqlənmiş</span> @endif</td>
					<td><a href="{{ url("/$company->id/tours/$tour->id/edit") }}" class="btn btn-primary">Edit</a></td>
					<td>
						<form action="{{url("/$company->id/tours/$tour->id")}}" method="post">
							{{csrf_field()}}
							<input type="hidden" name="_method" value="DELETE" >
							<input type="submit" class="btn btn-danger" value="Sil">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>


		<div class="text-center">
		<a href="/{{$company->id}}/tours/create" class="btn btn-success text-center" style="width:30%;">Tur əlavə et</a>
		</div>
	</div>
@stop
