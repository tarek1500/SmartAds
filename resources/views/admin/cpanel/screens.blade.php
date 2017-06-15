@extends('layouts.cpanel')
@section('content')
<h1 class="page-header">Screens</h1>
@endsection
@section('scripts')
<script>
$(function(){
$('#sidebar-menu').find('a.screens').addClass('active');
});
</script>
@endsection
