<!DOCTYPE html>
<html>
 <head>
  <title>User Details</title>
  
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
  
    <!-- Latest compiled and minified JavaScript -->
    <script src="<?php echo base_url(); ?>js/jquery-1.12.3.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
 </head>
 <body>
<div class="container">
  <h2 class="text-center">User Details</h2>
  <div class="table-responsive">          
    <a class="btn btn-success pull-right" href="<?php echo base_url(); ?>user/addUser">Add User</a>
  <table class="table table-bordered" style="margin-top:50px;">
    <thead>
      <tr>
        <th>#</th>
        <th>Profile</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Bithday</th>
        <th>Hobbies</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(count($users) > 0) { $i = 1; ?>
      <?php foreach ($users as $row) { ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><img src="<?php echo base_url(); ?>uploads/<?php echo $row->profile; ?>" height="50" width="50" /></td>
          <td><?php echo $row->firstname; ?></td>
          <td><?php echo $row->lastname; ?></td>
          <td><?php echo $row->email; ?></td>
          <td><?php echo $row->gender; ?></td>
          <td><?php echo $row->dob; ?></td>
          <td><?php echo $row->hobbies; ?></td>
          <td><?php echo $row->phone; ?></td>
          <td>
            <a class="btn btn-primary" href="<?php echo base_url(); ?>user/editUser/<?php echo $row->id; ?>">Edit</a>
            <a class="btn btn-danger deleteuser" href="javascript:void(0);" data="<?php echo $row->id; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>  
      <?php }else{ ?>
        <tr>
          <td colspan="10" class="text-center">No Users Found.</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
    $(document).on('click','.deleteuser',function(){
      var obj = $(this);
      var userId = obj.attr('data');

      if(userId != "")
      {
        var c = confirm("Are you sure you want to delete User ID ?");

        if(c==true)
        {
          $.ajax({
              type : "POST",
              url : "<?php echo base_url();?>user/deleteUser",
              data : {
                id:userId
              },
              success: function(result){
                  if(result == "success"){
                    obj.parent().parent().remove();
                  }
              }
          });
        }

        else {
          return false;
        }
      }
    });
</script>