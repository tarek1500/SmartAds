$(function() {
  $('#sidebar-menu').find('a.ads').addClass('active');
  $('#ads-table').DataTable();
  $('#ads-menu').addClass('active');
  $('#progress-table').hide();

  $('#upload-new-ads .open-file-dialog').on('click', function() {
    $('#upload-new-ads').find('input[type="file"]').trigger('click');
  });

  $('#upload-new-ads .add-more-files').on('click', function() {
    $('#upload-new-ads').find('input[type="file"]').trigger('click');
  });

  $("#ads-table").delegate(".btn.delete-ad", 'click', function() {
    $('#delete-ad-modal').find('form').attr('action', delete_ad_route + $(this).data('id'))
    $('#delete-ad-modal').modal('show')
  });

  $("#ads-table").delegate(".btn.preview-ad", 'click', function() {
    var player = $('#preview-ad-modal').find('video')[0];
    player.src = $(this).data('url');
    player.load();
    $('#preview-ad-modal').modal('show');
    player.play();
  });

  $('#preview-ad-modal').on('hide.bs.modal', function(e) {
    ($('#preview-ad-modal').find('video')[0]).pause();
  });

  var FilesToUpload = {};
  var ObjectIndex = 0,
    UploadIndex = 0;

  $('#upload-form input[name="ads[]"]').change(function(e) {
    files = $('#upload-form input[name="ads[]"]').prop('files');
    if (files.length > 0) {
      $('#progress-table').show();
      $.each(files, function(i, file) {
        FilesToUpload[ObjectIndex] = file;
        $('#progress-table tbody').append('<tr></tr>');
        $('#progress-table tbody tr').last().append('<td>' + file.name + '</td>');
        $('#progress-table tbody tr').last().append('<td><div class="progress" id="bar-' + ObjectIndex +
          '"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0 %</div></div></td>');
        $('#progress-table tbody tr').last().append('<td>' + GetSize(0) + ' / ' + GetSize(file.size) + '</td>');
        $('#progress-table tbody tr').last().append('<td class="text-center"><button class="btn btn-danger remove-ad" type="button"> <i class="fa fa-trash" aria-hidden="true"></i> </button></td>');
        ObjectIndex++;
      });
      $('#upload-form input[name="ads[]"]').val('');
      $('#upload-new-ads').addClass('uploading-mode');
    } else {
      $('#upload-new-ads').removeClass('uploading-mode');
    }
  });

  $("#progress-table").delegate(".btn.remove-ad", "click", function() {
    row = $(this).closest('tr');
    progressbar_id = row.find('td').eq(1).find('.progress').attr('id').substring(4);
    index = parseInt(progressbar_id);
    delete FilesToUpload[index];
    if (Object.keys(FilesToUpload).length == 0) {
      $('#upload-new-ads').removeClass('uploading-mode');
      $('#progress-table').css('display', 'none');
    }
    row.remove();
  });

  $('#upload-form').submit(function(e) {
    e.preventDefault(e);
    if ($('div[id^="bar-"]').length > 0) {
      $('#upload-form input[type="submit"]').prop('disabled', true);
      $('#progress-table tbody tr input[type="button"]').prop('disabled', true);
      UploadIndex = 0;
      SendFile(e.target.action, 0);
    }
  });

  function SendFile(action, index) {
    $('#upload-form button').addClass('disabled').prop('disabled', true);
    var object = GetFile(index);
    var data = object[0];
    UploadIndex++;
    $.ajax({
      url: action,
      type: "POST",
      data: data,
      processData: false,
      contentType: false,
      xhr: function() {
        var xhr = new XMLHttpRequest();
        xhr.upload.addEventListener("progress", function(evt) {
          var loaded = Round(evt.loaded / evt.total, 2) * 100;
          $('#bar-' + (UploadIndex - 1)).find('.progress-bar').attr('aria-valuenow', loaded).text(loaded + ' %').css({
            'width': loaded + '%'
          });
          $('#bar-' + (UploadIndex - 1)).parent().next().text(GetSize(evt.loaded) + ' / ' + GetSize(evt.total));
        }, false);
        return xhr;
      },
      success: function(msg) {
        if (object[1] >= object[2]) {
          $('#upload-form input[type="submit"]').prop('disabled', false);
          if (msg.success == true) {
            location.reload();
          } else {
            console.log("Error: " + msg);
          }
        } else {
          SendFile(action, index + 1);
        }
      },
      error: function(msg) {
        console.log(msg);
      }
    });
  }

  function GetFile(index) {
    var data = new FormData();
    $.each(FilesToUpload, function(i, files) {
      if (i >= UploadIndex) {
        UploadIndex = i;
        return false;
      }
    });
    data.append('_token', $('#upload-form input[type="hidden"]').val());
    data.append('ads[]', FilesToUpload[UploadIndex]);
    data.append('index', index + 1);
    data.append('length', Object.keys(FilesToUpload).length);

    return [data, (index + 1), Object.keys(FilesToUpload).length];
  }

  function GetSize(bytes) {
    if (bytes < 1024) {
      return bytes + ' B';
    } else if (bytes >= 1024 && bytes < 1048576) {
      return Round(bytes / 1024, 2) + ' KB';
    } else if (bytes >= 1048576 && bytes < 1073741824) {
      return Round(bytes / 1048576, 2) + ' MB';
    } else if (bytes >= 1073741824 && bytes < 1099511627776) {
      return Round(bytes / 1073741824, 2) + ' GB';
    }
  }

  function Round(number, digits) {
    divisor = Math.pow(10, digits);
    remainder = parseInt(number * divisor * 10) % 10;
    number = parseInt(number * divisor);
    if (remainder >= 5) {
      number += 1;
    }
    return number / divisor;
  }

});
