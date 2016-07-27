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
              <th>Gözləyənlər</th>
            <th>Təsdiq olunanlar</th>
          </tr>
         


        </table>
        <div class="text-center">
            
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection
