$(document).ready(function(){
    // Add Team Ajax Code
    $(document).on("click","#addTeamData",function(){

        var TeamName = $("#Team_name").val();
        var TeamPosition = $("#Team_position").val();
        var TeamStatus = $("#single-select-field").val();
        var TeamImage = $("#uploadImage")[0].files[0];
        var FbUrl = $("#fb_url").val();
        var GitUrl = $("#git_url").val();
        var TwUrl = $("#tw_url").val();
        var YtUrl = $("#yt_url").val();

        var formData = new FormData();
        formData.append("Team_Name",TeamName);
        formData.append("Team_Position",TeamPosition);
        formData.append("Team_Status",TeamStatus);
        formData.append("Team_Image",TeamImage);
        formData.append("Fb_Url",FbUrl);
        formData.append("Git_Url",GitUrl);
        formData.append("Tw_Url",TwUrl);
        formData.append("Yt_Url",YtUrl);

        formData.forEach(function(value, key){
            console.log(key + ': ' + value);
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:"/add/team",
            type:"POST",
            data:formData,
            processData:false,
            contentType:false,
            success:function(response){
                show();
                $(".modal").modal('hide');
                swal.fire("Team Added", "Team Added Successfully", "success");
                // show();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });



    });

    // Function To show team
    function show() {
        $.ajax({
            url: "/show/team",
            type: "GET",
            success: function(response) {
                if (response.status == 200) {
                    var Data = "";
                    $.each(response.Alldata, function(key, val) {
                        Data += '<tr>\
                            <td>' + (key+1) + '</td>\
                            <td><img src="http://127.0.0.1:8000/' + val.image + '" class="" width="60px" alt=""></td>\
                            <td>' + val.name + '</td>\
                            <td>' + val.position + '</td>\
                            <td>' + val.facebook + '</td>\
                            <td>' + val.github + '</td>\
                            <td>' + val.twitter + '</td>\
                            <td>' + val.youtube + '</td>\
                            <td>' + (val.status == 'active' ? '<button value=\'' + val.id + '\' id="Active" class="btn btn-success">Active</button>' : '<button value=\'' + val.id + '\' id="Inactive" class="btn btn-warning">Inactive</button>') + '</td>\
                            <td>\
                                <button value=\'' + val.id + '\' id="Edit" class="btn btn-info">Edit</button>\
                                <button value=\'' + val.id + '\' id="Delete" class="btn btn-danger">Delete</button>\
                            </td>\
                        </tr>';
                    });
                    $(".tbodyData").html(Data);
                }
            }
        });
    }
    show();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Active to Inactive team
    $(document).on("click","#Active",function(){
        var id = $(this).val();
        $.ajax({
            url: "/active/team/"+id,
            type: "POST",
            success: function(response){
                show();
                swal.fire("Category "+response.success, "Category Inactive Successfully", "success");
                console.log();
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
    // Inactive to Active team
    $(document).on("click","#Inactive",function(){
        var id = $(this).val();
        $.ajax({
            url: "/inactive/team/"+id,
            type: "POST",
            success: function(response){
                show();
                swal.fire("Category "+response.success, "Category Active Successfully", "success");
                console.log();
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

    // Delete Team Modal
    $(document).on("click","#Delete",function(){
        var id = $(this).val();
        $("#delete_data").val(id);
        $("#OpenDelete").modal("show");
    });
    // Deleted Ajax code
    $(document).on("click","#delete_data",function(){
        var id = $(this).val();
        $.ajax({
            url:"/delete/team/"+id,
            type:"GET",
            success: function(response){
                $("#OpenDelete").modal("hide");
                show();
                swal.fire("Team Deleted", response.status, "success");

            }
        })
    });

    // Edit Data to open modal
    $(document).on("click","#Edit",function(){
        var id = $(this).val();
        $("#UpdateTeamData").val(id);
        $("#EditTeamDataModal").modal("show");
        $.ajax({
            url:"/edit/team/"+id,
            type:"GET",
            success:function(response){
                $("#Edit_Team_name").val(response.Alldata.name);
                $("#Edit_Team_position").val(response.Alldata.position);
                $("#Edit_single-select-field").val(response.Alldata.status);
                $("#Edit_fb_url").val(response.Alldata.facebook);
                $("#Edit_git_url").val(response.Alldata.github);
                $("#Edit_tw_url").val(response.Alldata.twitter);
                $("#Edit_yt_url").val(response.Alldata.youtube);
                $("#Edit_uploadImage").attr('src','http://127.0.0.1:8000/'+response.Alldata.image);
                if (response.Alldata.image !== undefined && response.Alldata.image !== null && response.Alldata.image !== '') {
                    $("#showEditImage").attr('src', 'http://127.0.0.1:8000/' + response.Alldata.image);
                } else {
                    $("#showEditImage").attr('src', 'http://127.0.0.1:8000/upload/no_image.jpg');
                }
            }
        });
    });
    // Edit Data to update
    $(document).on("click","#UpdateTeamData",function(){
        var id = $(this).val();

       var EditTeamName = $("#Edit_Team_name").val();
       var EditTeamPosition = $("#Edit_Team_position").val();
       var EditStatus = $("#Edit_single-select-field").val();
       var EdituploadImage = $("#Edit_uploadImage")[0].files[0];
       var EditFbUrl = $("#Edit_fb_url").val();
       var EditGitUrl = $("#Edit_git_url").val();
       var EditTwUrl = $("#Edit_tw_url").val();
       var EditYtUrl = $("#Edit_yt_url").val();

        var formData = new FormData();
        formData.append("Edit_Team_Name",EditTeamName);
        formData.append("Edit_Team_Position",EditTeamPosition);
        formData.append("Edit_Status",EditStatus);
        formData.append("Edit_uploadImage",EdituploadImage);
        formData.append("Edit_Fb_Url",EditFbUrl);
        formData.append("Edit_Git_Url",EditGitUrl);
        formData.append("Edit_Tw_Url",EditTwUrl);
        formData.append("Edit_Yt_Url",EditYtUrl);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
           url:"/update/team/"+id,
           type:"POST",
           data:formData,
           processData: false,
           contentType: false,
           success: function(response){
            $("#EditTeamDataModal").modal("hide");
            show();
            swal.fire("Category Updated", "Category Updated Successfully", "success");

           },
           error: function(xhr, status, error) {
            console.log(xhr.responseText);
            }

        });
    });
})
