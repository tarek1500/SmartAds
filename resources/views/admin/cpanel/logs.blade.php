@extends('layouts.cpanel') @section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Activity Logs</h1>
      <iframe src="{{url('/admin/logs/logs')}}"></iframe>
    </div>
    <div>
    </div>
    @endsection @section('scripts')
    <script>
      $(function() {
        $('#sidebar-menu').find('a.logs').addClass('active');
      });
    </script>
    @endsection @section('styles')
    <style>
      iframe {
        width: 100%;
        height: calc(100vh - 150px);
      }
    </style>
    @endsection
