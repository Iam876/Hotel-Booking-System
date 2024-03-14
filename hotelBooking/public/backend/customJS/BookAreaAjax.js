$(document).ready(function(){

show();

function show(){
    var bk_image = $("#uploadImage")[0].files[0];
    $.ajax({
        url: "/booking/area/show",
        type: "GET",
        success: function(response){
            if(response.status == 200){
                $("#bk_id").val(response.Alldata.id);
                $("#bk_short_desc").val(response.Alldata.short_desc);
                $("#bk_title").val(response.Alldata.title);
                $("#bk_desc").val(response.Alldata.long_desc);
                $("#bk_url").val(response.Alldata.url);
                $("#showImage").attr('src','http://127.0.0.1:8000/'+response.Alldata.image);
            }
        }
    })
}

$(document).on("click","#UpdateBookingData",function(){
    var id =  $("#bk_id").val();
    var bk_short_desc = $("#bk_short_desc").val();
    var bk_title = $("#bk_title").val();
    var bk_desc = $("#bk_desc").val();
    var bk_url = $("#bk_url").val();
    var bk_image = $("#uploadImage")[0].files[0];

    var formData = new FormData();
    formData.append('BookingShortDescription',bk_short_desc);
    formData.append('BookingTitle',bk_title);
    formData.append('BookingDescription',bk_desc);
    formData.append('BookingURL',bk_url);
    formData.append('BookingUploadImage',bk_image);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url:"/booking/area/update/"+id,
        type:"POST",
        data:formData,
        processData: false,
        contentType: false,
        success:function(response){
            if(response.status == 200){
                swal.fire('Booking Area Updated', response.message,'success');
                show();
            }
        }
    })

})

});
