<html>
<head>
    <script src="<?php echo base_url(); ?>js/jquery-1.12.3.min.js"></script>
</head>
<body>
<form id="myForm" enctype="multipart/form-data">
    <div class="col-sm-6">
        <label>Name :</label>
        <input name="name" id="name" type="text" value="new">
    </div>
    <div class="col-sm-6">
        <label>Email :</label>
        <input name="email" id="email" type="text" value="name">
    </div>
    <div class="col-sm-6">
        <label>Password :</label>
        <input name="password" id="password" type="password" value="jshdg">
    </div>
    <div class="col-sm-6">
        <label>Contact No :</label>
        <input name="contact" id="contact" type="text" value="98734893743">
    </div>
    <div class="col-sm-6">
        <input type="file" name="newFiles[]" id="newFiles" multiple>
    </div>
    <div class="col-sm-6">
        <input name="time" value="00:00:00.00"><br>
    </div>
    <div class="col-sm-6">
        <input name="date" value="0000-00-00"><br>
    </div>
    <input id="submit" type="submit" value="Submit">
</form>
</body>
</html>
<script>
    $(function () {
        $('#myForm').on('submit', function (e) {
//            var fd = $('form').serialize();
            var fd = new FormData($(this)[0]);

            var file_data = $('input[type="file"]')[0].files; // for multiple files
            for(var i = 0;i<file_data.length;i++){
                fd.append("file", file_data);
            }
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url();?>user/save',
                data: fd,
                success: function (result) {
                    if(result == "success"){
                    alert('form was submitted');
                    }
                    else{
                        alert("fail");
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                context: this,
            });
        });
    });
</script>