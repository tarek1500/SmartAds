@extends('layouts.cpanel')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Dashboard</h1>
      <div class="panel panel-default">
        <div class="panel-body">
          Section Content
        </div>
      </div>
    </div>
    <div>
</div>
@endsection
@section('scripts')
<script>
$(function(){
$('#sidebar-menu').find('a.dashboard').addClass('active');
});
</script>
@endsection
