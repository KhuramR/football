var current_path = window.location.href;
current_path = current_path.split('/');
current_path = current_path[current_path.length - 1];

function header() {
    $.ajax({
        url: 'include/header.php',
        type: 'post',
        success: function(response) {
            // Add response in Modal body
            $('#header').html(response);
            // Display Modal
        }
    });
}
header();
$('.deletevariation').on('click', function() {
    var id = $(this).attr('id');
    var page = $(this).attr('data-delete');
    var page_data = $(this).attr('data-page');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        padding: '2em'
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                url: 'include/delete.php?page=' + page,
                type: "POST",
                data: { id: id },
                success: function(result) {
                    if (result == "true") {
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        setTimeout(function() {
                            window.open('variation-list.php?page=' + page_data, '_self');
                        }, 1000);
                    } else if (result == "wrong") {
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                }
            })
        }
    })
})
$('.delete').on('click', function() {
    var id = $(this).attr('id');
    var page = $(this).attr('data-delete');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        padding: '2em'
    }).then(function(result) {
        if (result.value) {
            $.ajax({
                url: 'include/delete.php?page=' + page,
                type: "POST",
                data: { id: id },
                success: function(result) {
                    if (result == "true") {
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        setTimeout(function() {
                            window.open(page + '-list.php', '_self');
                        }, 1000);
                    } else if (result == "wrong") {
                        swal(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                }
            })
        }
    })
})
$('input[type="checkbox"]').change(function(e) {
    var checked = $(this).prop("checked"),
        container = $(this).parent(),
        siblings = container.siblings();
    container.find('input[type="checkbox"]').prop({
        indeterminate: false,
        checked: checked
    });

    function checkSiblings(el) {
        var parent = el.parent().parent(),
            all = true;
        el.siblings().each(function() {
            let returnValue = all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
            return returnValue;
        });
        if (all && checked) {
            parent.children('input[type="checkbox"]').prop({
                indeterminate: false,
                checked: checked
            });
            checkSiblings(parent);
        } else if (all && !checked) {
            parent.children('input[type="checkbox"]').prop("checked", checked);
            parent.children('input[type="checkbox"]').prop("indeterminate", (parent.find('input[type="checkbox"]:checked').length > 0));
            checkSiblings(parent);
        } else {
            el.parents("li").children('input[type="checkbox"]').prop({
                indeterminate: true,
                checked: false
            });
        }
    }
    checkSiblings(container);
});
$("#login").on('submit', function(e) {
    e.preventDefault();
    $('input[type="submit"]').attr('disabled', 'disabled');
    $.ajax({
        url: 'admin/include/fetch.php?page=login',
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result) {
            if (result == "admin") {
                Snackbar.show({
                    text: 'Sucessfully Login',
                    pos: 'bottom-right'
                });
                window.open("admin/index", "_self");
            } else if (result == "checkout") {
                window.open("checkout", "_self");
            } else if (result == "true") {
                Snackbar.show({
                    text: 'Sucessfully Login',
                    pos: 'bottom-right'
                });
                window.open("index", "_self");
            } else if (result == "wrong") {
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'Wrong Email Or Password .',
                    pos: 'bottom-right'
                });
            } else if (result == "verify") {
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'Please Verify Your Email To Login',
                    pos: 'bottom-right'
                });
            } else if (result == "code_error") {
                $("#login").trigger('reset')
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'Something Wrong While Inserting.',
                    pos: 'bottom-right'
                });
            }
        }
    })
});
$("#forgot").on('submit', function(e) {
    e.preventDefault();
    $('input[type="submit"]').attr('disabled', 'disabled');
    $.ajax({
        url: 'admin/include/fetch.php?page=forgot',
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result) {
            if (result == "true") {
                $("#add").trigger('reset')
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'Password Recover Email Sucessfully Sent ',
                    pos: 'bottom-right'
                });
            } else if (result == "wrong") {
                $("#add").trigger('reset')
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'Your Email or Username Wrong',
                    pos: 'bottom-right'
                });
            }
        }
    })
});
$("#contact").on('submit', function(e) {
    e.preventDefault();
    $('input[type="submit"]').attr('disabled', 'disabled');
    $.ajax({
        url: 'admin/include/insert.php?page=contact',
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result) {
            if (result == "true") {
                $("#contact").trigger('reset')
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'Mail Successfully Sent !',
                    pos: 'bottom-right'
                });
            } else {
                $("#add").trigger('reset')
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'Something Wrong While Inserting.',
                    pos: 'bottom-right'
                });
            }
        }
    })
});
$(document).ready(function() {
    $("#variation").click(function(event) {
        if ($('#variation').is(':checked')) {
            $(".productvar").css('display', 'block');
        } else {
            $(".productvar").css('display', 'none');
        }
    });
    jQuery(document).on("click", ".gallery .trash-gallery", function() {
        $(this).closest('.gallery').remove();
        return false;
    });
    $(".add-gallery").on('click', function() {
        var gallery = '<div class="form-row container-fluid gallery"><div class="form-group col-md-6 ">' +
            '<label for="inputGalery">Gallery Image</label>' +
            '<input type="file" name="gallery[]" class="form-control" id="inputGalery" >' +
            ' </div>  ' +
            '<div class="form-group col-md-6">' +
            ' <button type="button" class="btn btn-danger mt-34 trash-gallery">-</button>' +
            ' </div></div>';
        $(".gallery-body").append(gallery);
        return false;
    });
    $("#add").on('submit', function(e) {
        e.preventDefault();
        $('input[type="submit"]').attr('disabled', 'disabled');
        var page = $('#page').val();
        var design = $('#design').val();
        if (design == "front") {
            var url_design = 'admin/include/insert.php?page=' + page;
        } else if (design == "back") {
            var url_design = 'include/insert.php?page=' + page;
        } else if (design == "product") {
            var url_design = '../admin/include/insert.php?page=' + page;
        }
        $.ajax({
            url: url_design,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result == "true") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Sucessfully Inserted',
                        pos: 'bottom-right'
                    });
                    header_desktop();
                } else if (result == "wrong") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Something Wrong While Inserting.',
                        pos: 'bottom-right'
                    });
                }  else if (result == "confirmemail") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Sucessfully Register. We send you confirmation email please verify before login!',
                        pos: 'bottom-right'
                    });
                } else if (result == "req") {
                    
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'All field Are Required!',
                        pos: 'bottom-right'
                    });
                } else if (result == "true_sub") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'You Successfully Subscribe',
                        pos: 'bottom-right'
                    });
                } else if (result == "variation_add") {
                    // $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Please Add Variation in Product',
                        pos: 'bottom-right'
                    });
                } else if (result == "categoryselect") {
                    // $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Please Select Category in Product',
                        pos: 'bottom-right'
                    });
                } else if (result == "sproducts") {
                    // $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Please Select Product in Coupon',
                        pos: 'bottom-right'
                    });
                } else if (result == "alreadyemail") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Email Already Registered',
                        pos: 'bottom-right'
                    });
                } else if (result == "already_sub") {
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Email Already Subscribe',
                        pos: 'bottom-right'
                    });
                } else if (result == "alreadycart") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Product Already in cart.',
                        pos: 'bottom-right'
                    });
                } else if (result == "correctpass") {
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Please Enter Same Password and Confirm Password!',
                        pos: 'bottom-right'
                    });
                } else if (result == "addcart") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    header_desktop();
                    Swal.fire(
                        'Add to Cart!',
                        'This Product Added Successfully In  Cart.',
                        'success'
                    )
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                } else if (result == "updatecart") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    header_desktop();
                    Swal.fire(
                        'Add to Cart!',
                        'This Product Quantity Update In Cart.',
                        'success'
                    )
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
                } else if (result == "already-blog") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Blog Already Added..',
                        pos: 'bottom-right'
                    });
                } else if (result == "Already-Posted") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Question Already Added..',
                        pos: 'bottom-right'
                    });
                }
            }
        })
    });
    $("#product_model_form").on('submit', function(e) {
        e.preventDefault();
        $('input[type="submit"]').attr('disabled', 'disabled');
        $.ajax({
            url: '../admin/include/insert.php?page=addtocart',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result == "true") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Sucessfully Inserted',
                        pos: 'bottom-right'
                    });
                } else if (result == "wrong") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Something Wrong While Inserting.',
                        pos: 'bottom-right'
                    });
                } else if (result == "alreadycart") {
                    $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'This Product Already in cart.',
                        pos: 'bottom-right'
                    });
                }
            }
        })
    });
    $("#update").on('submit', function(e) {
        e.preventDefault();
        $('input[type="submit"]').attr('disabled', 'disabled');
        var page = $('#page').val();
        var design = $('#design').val();
        if (design == "front") {
            var url_design = 'admin/include/update.php?page=' + page;
        }
        if (design == "back") {
            var url_design = 'include/update.php?page=' + page;
        }
        $.ajax({
            url: url_design,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result == "true") {
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Sucessfully Updated',
                        pos: 'bottom-right'
                    });
                } else if (result == "wrong") {
                    $("#update").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Something Wrong While Updating.',
                        pos: 'bottom-right'
                    });
                } else if (result == "expirecode") {
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Forgot Password Code Was Expired!',
                        pos: 'bottom-right'
                    });
                } else if (result == "sproducts") {
                    // $("#add").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Please Select Product in Coupon',
                        pos: 'bottom-right'
                    });
                } else if (result == "truepass") {
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Password Successfully Updated',
                        pos: 'bottom-right'
                    });
                    setTimeout(function() {
                        window.open('login', '_self');
                    }, 1000);
                } else if (result == "pass") {
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Password should be atleast 8 characters',
                        pos: 'bottom-right'
                    });
                } else if (result == "notmatch") {
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Password & Confirm Password Not Match !',
                        pos: 'bottom-right'
                    });
                }
            }
        })
    });
    $("#updatecart").on('submit', function(e) {
        e.preventDefault();
        $('input[type="submit"]').attr('disabled', 'disabled');
        $.ajax({
            url: 'admin/include/update.php?page=updatecart',
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(result) {
                if (result == "true") {
                    $('input[type="submit"]').removeAttr('disabled');
                    Swal.fire(
                        'Add to Cart!',
                        'Cart Sucessfully Updated',
                        'success'
                    )
                    setTimeout(() => {
                        window.open('cart', '_self');
                    }, 1500);
                } else if (result == "wrong") {
                    $("#update").trigger('reset')
                    $('input[type="submit"]').removeAttr('disabled');
                    Snackbar.show({
                        text: 'Something Wrong While Updating.',
                        pos: 'bottom-right'
                    });
                }
            }
        })
    });
});
$("#submitNewsletter").on('submit', function(e) {
    e.preventDefault();
    $('input[type="submit"]').attr('disabled', 'disabled');
    $.ajax({
        url: 'admin/include/insert.php?page=subscribe',
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result) {
            if (result == "true_sub") {
                $("#submitNewsletter").trigger('reset')
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'Subscribe Successfully!',
                    pos: 'bottom-right'
                });
            } else if (result == "already_sub") {
                $("#submitNewsletter").trigger('reset')
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'This Email Is Already Subscribed!',
                    pos: 'bottom-right'
                });
            } else {
                $("#submitNewsletter").trigger('reset')
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'Something Wrong While Inserting.',
                    pos: 'bottom-right'
                });
            }
        }
    })
})
$("#checkout_coupon_form").on("submit", function(e) {
    e.preventDefault();
    $('input[type="submit"]').attr('disabled', 'disabled');
    $.ajax({
        url: 'admin/include/fetch.php?page=coupon',
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result) {
            console.log(result);
            if (result == "expire") {
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'This Coupon Is Expire!',
                    pos: 'bottom-right'
                });
            } else if (result == "appliedalrweay") {
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'This Coupon Is Already Applied!',
                    pos: 'bottom-right'
                });
            } else if (result == "not_avaiable") {
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'This Coupon Is Not Avaiable!',
                    pos: 'bottom-right'
                });
            } else if (result == "not_start_yet") {
                $('input[type="submit"]').removeAttr('disabled');
                Snackbar.show({
                    text: 'This Coupon Is Not Start Yet!',
                    pos: 'bottom-right'
                });
            } else if (result != "expire" && result != "appliedalrweay" && result != "not_avaiable" && result != "not_start_yet" && result != "") {
                $('input[type="submit"]').removeAttr('disabled');

                $(".your-order-table").html(result);
                Snackbar.show({
                    text: 'This Coupon Is Applied Successfully!',
                    pos: 'bottom-right'
                });

            }
        }
    })
})