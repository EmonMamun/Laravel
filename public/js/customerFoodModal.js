
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

$("#category-btn").click(function() {
    $("#category-list").slideToggle("slow");
})

function foodCardClick(id) {
    localStorage.setItem("food_id", id);
    getFoodItemsAndRestaurent();
    $("#modal").fadeIn("slow", function() {
        $("#modal").css("display", "block");
    });
}
$("#modal-close-btn").click(function() {
    $("#modal").fadeOut("slow", function() {
        $("#modal").css("display", "none");
    });
});
$("#modal-close-btn-2").click(function() {
    $("#modal").fadeOut("slow", function() {
        $("#modal").css("display", "none");
    });
});

function getFoodItemsAndRestaurent() {
    $.ajax({
        url: "getFood",
        type: "POST",
        data: { foodid: localStorage.getItem("food_id") },
        success: function(data) {
            $("#showImg").html("");
            $("#showImg").append(
                "<img id='modal-content-img' src='http://127.0.0.1:8000/"+data.picture+"'>"    
            );
            localStorage.setItem("vendor_id", data.vendor_id);
            $("#food-name").text(data.name);
            $("#description").text(data.description);
            $("#price").text("Price: Tk " + data.price);
        }
    });
}


$("#quantity").on("focusout", function() {
    if ($("#quantity").val() == 0) {
        $("#quantity").val(1);
    }
});