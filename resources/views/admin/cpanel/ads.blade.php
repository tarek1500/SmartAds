@extends('layouts.cpanel')
@section('content')
<h1 class="page-header">Ads</h1>
@endsection
@section('scripts')
<script>
$(function(){
$('#sidebar-menu').find('a.ads').addClass('active');
});
</script>
@endsection
