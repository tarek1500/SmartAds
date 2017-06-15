@extends('layouts.cpanel')
@section('content')
<h1 class="page-header">Logs</h1>
@endsection
@section('scripts')
<script>
$(function(){
$('#sidebar-menu').find('a.logs').addClass('active');
});
</script>
@endsection
