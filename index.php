<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<body>
  <?php 
  
  include('connection.php');

  if(isset($_POST['save'])){

    $update_id = $_POST['update_id'];
    if($update_id ==Null){
       $name = $_POST['name'];
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $date = mysqli_real_escape_string($conn,$_POST['date']);
    $country = mysqli_real_escape_string($conn,$_POST['country']);

    // echo $name;
    // echo "<br>".$phone;
    // echo "<br>".$email;
    // echo "<br>".$password;
    // echo "<br>".$address;
    // echo "<br>".$date;
    // echo "<br>".$country;

    // error mysqli i ayaan ka tagay 
    
    $insert = mysqli_query($conn,"INSERT INTO `crud_table`(`name`,`phone`,`email`,`password`,`address`,`date`,`country`) VALUES ('$name','".$phone."','$email','$password','$address','$date','$country')");
    

   if($insert){
    echo '<script> alert("Record Inserted successfully")</script>';
   }
   else{
    echo '<script> alert("Record Inserted not successfully")</script>';
   }
    }else{
       $name = $_POST['name'];
       $phone = $_POST['phone'];
       $email = $_POST['email'];
       $address = $_POST['address'];
       $country = $_POST['country'];

       $update_qry = mysqli_query($conn, "UPDATE `crud_table` SET name = '$name', phone = '$phone', email = '$email', address = '$address', country = '$country'
        WHERE id = '$update_id'");

        if($update_qry){
           echo '<script> alert("Updated Successfully")</script>';
        }else{
           echo '<script> alert("Failed Failurefully")</script>';
        }
    }
    
  }

  if(isset($_POST['delete_id'])){
    $delete_id = $_POST['delete_id'];
    $delete_qry = mysqli_query($conn, "DELETE FROM `crud_table` WHERE id = '$delete_id'");

    if($delete_qry){
       echo '<script> alert("Deleted Successfully")</script>';
    }else{
        echo '<script> alert("Failed Delete data")</script>';
    }
  }
  
  ?>





   <div class="container">
    <div class="card bg-primary mt-5">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h1 class ="text-center">Form Bootstrap</h1>
                </div>
            </div>

            <form action="" method="post">
                <input type="hidden" name = "update_id" id = "update_id">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                        <input type="text" name="name" id = "name" class="form-control " placeholder="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                         <label for="">Phone</label>
                        <input type="text" name="phone" id = "phone"class="form-control" placeholder="Phone" required>
                       </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                       <div class="form-group">
                         <label for="">Email</label>
                        <input type="text" name="email" id = "email" class="form-control" placeholder="Email" required>
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id = "password"class="form-control" placeholder="************" class="form-control" maxlength="12" required>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" id = "address" class="form-control" placeholder="address" required>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" name="date" id = "date" class="form-control" placeholder="date" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Country</label>
                           <select name="country" name="country" id = "country"class="form-control">
                            <option value="">select your country</option>
                            <option value="somalia">Somalia</option>
                            <option value="djabouti">Djabouti</option>
                            <option value="kenya">Kenya</option>
                            <option value="turkey">Turkey</option>
                           </select>
                        </div>
                    </div>
                </div>
                <div class="float-end mt-3">
                    <button id="submit" type="submit" name="save" class="btn btn-success submit">Save Change</button>
                    <button id="reset" type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="serach" id="search" class="search"
                class="form-control form-control-sm" placeholder="Search........">
            </div>
        </div>

        <table class="table table-bordered bg-dark text-white mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <!-- <th>Password</th> -->
                    <th>Address</th>
                    <th>Date</th>
                    <th>Country</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id = "mytable">
                <?php
                $result_query = mysqli_query($conn, "SELECT * FROM `crud_table`");
                // echo var_dump($result_query);
                foreach($result_query as  $key => $res){
                    // echo "<br>", $res['id'] ,$res['name'],$res['email'];

                
                // }
                ?>

                <tr>
                    <td><?php echo $res['id']?></td>
                    <td><?php echo $res['name']?></td>
                    <td><?php echo $res['phone']?></td>
                    <td><?php echo $res['email']?></td>
                    <td><?php echo $res['address']?></td>
                    <td><?php echo $res['date']?></td>
                    <td><?php echo $res['country']?></td>

                 <td>
                    <button type="button" class="btn btn-success edit_btn" id="edit_btn">Edit</button>
                    <button type="button" class="btn btn-danger delete_btn" id="delete_btn">Delete</button>
                   
                     
                </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
   </div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method = "post">
            <input type="hidden" name = "delete_id" id = "delete_id">
        <h5>Are You Sure To Delete?</h5>
      </div>
    
      <div class="modal-footer">
        <button type="button" id = "no" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" name = "delete" class="btn btn-danger">Yes! delete it </button>
      </div>
        </form>
    </div>
  </div>
</div>


<script src="jquery/jquery-3.6.3.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

<script>
    //
  if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        $(document).ready(function(){
            $('.edit_btn').on('click', function(){
                let tr = $(this).closest('tr');
                let data = tr.children('td').map(function(){
                    return $(this).text();
                }).get(); 
                console.log(data[0]);
                console.log(data[1]);
                $("#update_id").val(data[0]);
                $("#name").val(data[1]);
                $("#phone").val(data[2]);
                $("#email").val(data[3]);
                $("#address").val(data[4]);
                $("#date").val(data[5]);
                $("#country").val(data[6]);

               
                })
                $(".delete_btn").on('click', function(){
                    let tr = $(this).closest('tr');
                    let table_data = tr.children('td').map(function(){
                        return $(this).text();
                    }).get();
                    // alert(table_data[0]);
                    $("#delete_id").val(table_data[0])
                    $("#exampleModal").modal('show');

                    $("#no").click(function(){
                         $("#exampleModal").modal('hide');
                    })
                    
            })
            
            $('#search').on('keyup', function(){
                let val = $(this).val().toLowerCase();
                $("#mytable tr").filter(function(){
                    $(this).toggle($(this).text().toLowerCase().indexOf(val) > -1);
                })
            })

        })
</script>

</body>
</html>