$(document).ready(function(){
    $("#uploadImage").change(function(e){
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $("#showImage").attr("src", e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    $("#Edit_uploadImage").change(function(e){
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $("#showEditImage").attr("src", e.target.result); // Use different target ID
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
