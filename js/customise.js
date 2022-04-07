var origin   = window.location.origin;
$("#updateimage").on('submit', function (e) {
    e.preventDefault();
    var fd = new FormData();
    var files = $('#image_upload')[0].files[0];
    var id = $("#imgmodal").val();
    fd.append('image', files);
    fd.append('id', id);
    $.ajax({
      url: origin+'/include/update.php?page=image',
      type: "POST",
      data: fd,
      contentType: false,
      cache: false,
      processData: false,
      dataType: 'json',
      success: function (result) {
        // alert(result);
        if (result.result == "true") {
          $("#img" + id).attr('src', 'images/' + result.img);
          $("#updateimage").trigger('reset');
          $("#alert-image").html('<div class="alert alert-success">Image Successfully Updated</div>');
          $("#alert-image").show();
          setTimeout(function () {
            $("#alert-image").hide();
          }, 5000);
        } else {
          $("#alert-image").html('<div class="alert alert-danger">Something Wrong on code :(</div>');
          $("#alert-image").show();
          setTimeout(function () {
            $("#alert-image").hide();
          }, 5000);
        }
      }
    });
  });
  $('a .content-x').click(function () {
    return false
  });
  jQuery(document).on("click", ".image-x", function () {
    $("#image_upload").val('');
    /* Act on the event */
    $('.content-modal').modal('hide');
    var id = $(this).attr('id');
    var id = id.replace(/[^0-9]/g, '');
    $("#imgmodal").val(id);
    $.ajax({
      url: origin+'/include/fetch.php?page=image',
      method: "POST",
      data: {
        id: id
      },
      dataType: 'json',
      success: function (result) {
        $("#contentimg").attr('src', result.img);
        if ($('.content-modal').hasClass('show') == true) {
          $('#image-modal').modal('hide');
        } else {
          $('#image-modal').modal('show');
        }
      }
    });
  });
  $(".content-x").click(function (event) {
    /* Act on the event */
    var id = $(this).attr('id');
    var id = id.replace(/[^0-9]/g, '');
    $.ajax({
      url: origin+'/include/fetch.php?page=content',
      method: "POST",
      data: {
        id: id
      },
      dataType: 'html',
      success: function (result) {
        $('.content-modal-body').html(result);
        $('.content-modal').modal('show');
        if ($('.content-modal').hasClass('show') == true) {
          $('#image-modal').modal('hide');
        }
      }
    });
  });
  $(".contentmodelbtn").click(function (event) {
    $('.content-modal').modal('hide');
  });
  $(".imgmodelbtn").click(function (event) {
    $('#image-modal').modal('hide');
  });
  $("#updatecontent").on('submit', function (e) {
    e.preventDefault();
    var fr_content = $("#fr_content").val();
    var eng_content = $("#eng_content").val();
    var id = $(".contentid").attr('id');
    $.ajax({
      url: origin+'/include/update.php?page=content',
      type: "POST",
      data: {
        id: id,
        eng_content: eng_content,
        fr_content: fr_content
      },
      dataType: 'json',
      success: function (result) {
        if (result.result == "success") { 
          $(".content" + id).html(result.content);
          $("#alert-content").html('<div class="alert alert-success">Data Successfully Updated</div>');
          $("#alert-content").show();
          setTimeout(function () {
            $("#alert-content").hide();
          }, 5000);
        } else {
          $("#alert-content").html('<div class="alert alert-danger">Something Wrong on code :(</div>');
          $("#alert-content").show();
          setTimeout(function () {
            $("#alert-content").hide();
          }, 5000);
        }
      }
    });
  })