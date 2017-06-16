$(function() {
  $('#ads-menu').addClass('active');
  $('#progress-table').hide();

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
        $('#progress-table tbody tr').last().append('<td><div class="progress" id="bar-' + ObjectIndex + '"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0 %</div></div></td>');
        $('#progress-table tbody tr').last().append('<td>' + GetSize(0) + ' / ' + GetSize(file.size) + '</td>');
        $('#progress-table tbody tr').last().append('<td><input class="btn btn-warning" type="button" value="Delete"></td>').click(ClickCancel);
        ObjectIndex++;
      });
      $('#upload-form input[name="ads[]"]').val('');
    }
  });

  function ClickCancel(e) {
    button = $(e.target);
    row = button.closest('tr');
    progressbar_id = row.find('td').eq(1).find('.progress').attr('id').substring(4);
    index = parseInt(progressbar_id);
    delete FilesToUpload[index];
    row.remove();
  }

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
          console.log(msg);
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
