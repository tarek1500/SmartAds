@extends('layouts.cpanel') @section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Advertisements</h1>
      <div class="panel panel-default">
        <div class="panel-body">
          <div id="upload-new-ads">
            <form id="upload-form" action="{{ route('cpanel.ads.store') }}" method="post" enctype="multipart/form-data">
              <input class="btn btn-primary open-file-dialog" type="button" value="Upload New Ads">
              <input type="file" name="ads[]" accept="video/*" multiple> {{ csrf_field() }}
              <div id="progress-table">
                <button class="btn btn-sm btn-default pull-left add-more-files" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Add more files</button>
                <button class="btn btn-primary pull-right start-uploading" type="submit"><i class="fa fa-upload" aria-hidden="true"></i> Start Uploading</button>
                <div class="clearfix"></div>
                <hr>
                <table class="table table-hover table-condensed table-bordered">
                  <thead>
                    <th class="col-xs-5">Name</th>
                    <th class="col-xs-4">Progress</th>
                    <th class="col-xs-2">Size</th>
                    <th class="col-xs-1 text-center">Remove</th>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <table id="ads-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Preview</th>
                <th>File Name</th>
                <th>Owner</th>
                <th>Size</th>
                <th>Created At</th>
                <th class="text-center">Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ads as $ad)
              <tr>
                <td class="text-center">{{$ad->id}}</td>
                <td class="text-center"><button type="button" class="btn btn-primary btn-sm preview-ad" data-url="{{$ad->url}}">Preview</button></td>
                <td>{{$ad->name}}</td>
                <td>ID: {{$ad->user_id}}</td>
                <td>{{round($ad->size/1024/1024, 2)}} MByte</td>
                <td>{{$ad->created_at}}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-danger btn-sm delete-ad" data-id="{{$ad->id}}"><i class="fa fa-trash"></i> Delete</button>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delete-ad-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Ad</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          {{ csrf_field() }}
          <p class="lead text-danger">Are you sure you want delete this ad?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="preview-ad-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Preview Ad</h4>
      </div>
      <div class="modal-body">
        <video controls>
          <source/>
        </video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection @section('scripts')
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="{{ mix('js/admin/ads.js') }}"></script>
<script>
  $(function() {
    delete_ad_route = "{{ route('admin.cpanel.ads.delete', null) }}" + "/";
  });
</script>
@endsection @section('styles')
<link href="{{ mix('css/admin/ads.css') }}" rel="stylesheet"> @endsection
