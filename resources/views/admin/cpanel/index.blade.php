@extends('layouts.cpanel')
@section('content')
<h1 class="page-header">Dashboard</h1>
@endsection
@section('scripts')
<script>
$(function(){
$('#sidebar-menu').find('a.dashboard').addClass('active');
});
</script>
@endsection
