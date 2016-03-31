//文件上传
$('#thumb_upload').on('click', function () {
    $("#thumb").click();
    return false;
});



var opts = {
    url: "/upload",
    type: "POST",
    beforeSend: function () {
        $("#loading").attr('class', 'jstree-icon jstree-ocl');
    },
    success: function (result, status, xhr) {
         console.log(result);

        $("#loading").attr('class', 'fa fa-file fileinput-exists');

        if (result.status == 0) {
            alert(result.info);
            return false;
        }
        $("#img").val(result.info);
        $("#img_show").attr("src", result.info);

    },
    error: function (result, status, errorThrown) {
         alert(errorThrown)
        $("#loading").attr('class', 'fa fa-file fileinput-exists');
        alert('文件上传失败');
    }
}
$('#thumb').fileUpload(opts);