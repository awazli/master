<!DOCTYPE html>
<html>
<head>
    <title>Submit Form Using AJAX and jQuery</title>
    <script src="<?php echo base_url(); ?>js/jquery-1.12.3.min.js"></script>
</head>
<body>
<form>
    <div id="mainform">
        <h2>Submit Form Using AJAX and jQuery</h2> <!-- Required div Starts Here -->
        <div>
            <h3>Fill Your Information !</h3>

            <div>
                <label>Name :</label>
                <input id="name" name="name" type="text" value="new">
                <label>Email :</label>
                <input id="email" name="email" type="text" value="name">
                <label>Password :</label>
                <input id="password" name="password" type="password" value="jshdg">
                <label>Contact No :</label>
                <input id="contact" name="contact" type="text" value="98734893743">
                <input id="image" name="image" type="file">

                <input id="submitbutton" type="submit" value="Submit">
            </div>
        </div>
    </div>
</form>
</body>
</html>
<script>
        $(document).on('submit','form', function (e) {
            var fd = new FormData();
            var file_data = $('input[type="file"]')[0].files; // for multiple files
            for(var i = 0;i<file_data.length;i++){
                fd.append("file_"+i, file_data[i]);
                console.log(file_data[i]);
            }
            e.preventDefault();
            $.ajax({
                url : 'save', // save url
                type : 'post',
                data : fd,
                success : function(data) {
                    alert('FormSaved.');
                }
            });
        });
</script>
