@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Responsive Hover Table</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>Rəhbərin Adı</th>
            <th>Rəhbərin Soyadı</th>
            <th>Şirkət Adı</th>
            <th>Yaranma Tarix</th>
            <th>Şirkət Məlumat</th>
            <th>Şirkətin turları</th>
            <th>Gözləyənlər</th>
            <th>Təsdiq olunanlar</th>
          </tr>
          @foreach($companyList as $company)
          <tr>
            <td>{{ $company->founderName }}</td>
            <td>{{ $company->founderSurname }}</td>
            <td>{{ $company->companyName }}</td>
            <td>{{ $company->companyDate }}</td>
            <td>{{ $company->companyAbout }}</td>
            <td><a href="/admin/{{ $company->id }}/tours"><span class="label label-primary">Turlar</span></a></td>
              <td>@if($company->onoff == 0)

                <form  action="/admin/companylist/{{ $company->id }}" method="post">

                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT" >

                <input type="submit" value="Gözləmə" class="btn btn-danger">
              </form>
              @endif</td>
            <td>@if($company->onoff == 1) <span class="label label-success">Təsdiqlənmiş</span> @endif</td>
          </tr>
          @endforeach


        </table>
        <div class="text-center">
            {{ $companyList->render() }}
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection
