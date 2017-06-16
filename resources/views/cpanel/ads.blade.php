@extends('cpanel.master')

@section('title', 'Control Panel - Ads')

@section('css')
	<link href="{{ asset('css/cpanel/ads.css') }}" rel="stylesheet">
@endsection

@section('js')
	<script src="{{ asset('js/cpanel/ads.js') }}"></script>
@endsection

@section('body')
	<p style="font-size: 22px;">Ads</p>

	<form id="upload-form" action="{{ route('cpanel.ads.store') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="control-group">
			<label>Select ads to upload:</label>
			<input type="file" name="ads[]" accept="video/*,image/*" multiple>
		</div>
		<input class="btn btn-primary" type="submit" value="Upload">
	</form>
	<hr>
	<table id="progress-table" class="table table-striped table-hover">
		<thead>
			<th class="col-xs-3">Name</th>
			<th class="col-xs-5">Progress</th>
			<th class="col-xs-2">Size</th>
			<th class="col-xs-2">Options</th>
		</thead>
		<tbody>
		</tbody>
	</table>
@endsection
