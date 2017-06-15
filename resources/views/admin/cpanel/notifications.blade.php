@extends('layouts.cpanel')
@section('content')
<h1 class="page-header">Notifications</h1>
@endsection
@section('scripts')
<script>
$(function(){
$('#sidebar-menu').find('a.notifications').addClass('active');
});
</script>
@endsection
