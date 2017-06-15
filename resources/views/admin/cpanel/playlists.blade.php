@extends('layouts.cpanel')
@section('content')
<h1 class="page-header">Playlists</h1>
@endsection
@section('scripts')
<script>
$(function(){
$('#sidebar-menu').find('a.playlists').addClass('active');
});
</script>
@endsection
