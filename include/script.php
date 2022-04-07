<script>
  function header_desktop() {
    var urlpage = "<?= $url ?>include/cart.php";
    $.ajax({
      url: urlpage,
      type: 'post',
      success: function(response) {
        $("#cart").html(response);
      }
    });
  }
  header_desktop();
  jQuery(document).on("click", ".removecart", function() {
    var id = $(this).attr('id');
    $.ajax({
      url: '<?= $url ?>admin/include/delete.php?page=removecart',
      type: "POST",
      data: {
        id: id
      },
      success: function(result) {
        if (result == "true") {
          header_desktop();
          swal(
            'Deleted!',
            'Your Cart Product has been deleted.',
            'success'
          )
        } else if (result == "wrong") {
          swal(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        }
      }
    })
  })
  function product_view(id) {
    $.ajax({
      url: '<?=$url?>include/model.php',
      type: 'post',
      data: {
        id: id
      },
      success: function(response) {
        // Add response in Modal body
        $('#product_modal .modal-body').html(response);
        // Display Modal
        $('#product_modal').modal('show');
      }
    });
  }
</script>