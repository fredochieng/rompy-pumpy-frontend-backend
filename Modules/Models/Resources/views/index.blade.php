@extends('adminlte::page')

@section('title', 'Rompy Pompy | Models')

@section('content_header')
    <h1>Rompy Pompy | Models</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">List of models</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-striped table-bordered" style="font-size: 11px">
            <thead>
                <!-- start row -->
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Real Phone</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Town</th>
                    <td>#</td>
                </tr> <!-- end row -->
            </thead>
            <tbody>
                @foreach ($models as $model)
            <tr>
                <td><a href="/model/details/{{$model->model_no }}">{{ $model->model_no }}</a></td>
                <td>{{ $model->name }}</td>
                <td>{{ $model->phone_no }}</td>
                <td>{{ $model->real_phone_no }}</td>
                <td>{{ $model->gender }}</td>
                <td>{{ $model->age }}</td>
                <td>{{ $model->city_name }}</td>
                <td>{{ $model->town_name }}</td>
                <td>
                    @if($model->account_status == 1)
                    <a href="" data-toggle="modal" data-target="#ModalDeactivateAccount_{{$model->user_id}}">Deactivate</a>
                    @else
                        <a href="" data-toggle="modal" data-target="#ModalActivateAccount_{{$model->user_id}}">Activate</a>
                        @endif
                </td>
            </tr>
            @include('models::modals.ModalDeactivateAccount')
            @include('models::modals.ModalActivateAccount')
             @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@stop
