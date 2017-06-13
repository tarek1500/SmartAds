@extends('cpanel.master')

@section('title', 'Control Panel - Dashboard')

@section('css')
	<link href="{{ asset('css/cpanel/index.css') }}" rel="stylesheet">
@endsection

@section('js')
	<script src="{{ asset('js/cpanel/index.js') }}"></script>
@endsection

@section('body')
	<p style="font-size: 22px;">Index</p>
@endsection