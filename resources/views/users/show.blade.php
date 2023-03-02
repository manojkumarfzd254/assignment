<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <center><h3>Assignment</h3></center>
    <div class="container-fluid">
        <div class="panel panel-success">
            <div class="panel-heading">
                User Name : <b>{{ucwords($user->name)}}</b>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Name</th> <td> {{ucwords($user->name)}}</td>
                        </tr>
                        <tr>
                            <th>Email</th> <td> {{ucwords($user->email)}}</td>
                        </tr>
                        <tr>
                            <th>Contact No.</th> <td> {{ucwords($user->contact_no)}}</td>
                        </tr>
                        <th>Delete User</th> <td><a  href="javascript:void(0)" class="btn btn-danger btn-sm delete-user" data-id="{{$user->id}}">Delete</a></td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(function () {
      $(".delete-user").click(function(){
            let conf = confirm("Are you sure you want to delete this user ?");
            if(!conf)
                return false;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                        url : "{{route('users.destroy',['id'=>$user->id])}}",
                        method : "DELETE",
                        dataType : "json",
                        success : function(res){
                            if(res.status)
                            {
                                alert(res.message);
                                location.href="{{route('users.index')}}";
                            }
                            else
                            {
                                alert(res.message);
                                location.href="{{route('users.index')}}";
                            }
                        }
            });
      });
    });
  </script>
</html>
