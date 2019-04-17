<html lang="en">
<head>
    <title>All Users</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
        <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">


</head>
      <body>
      <!-- /** data modal for the update button -->
    
      <!-- /** data modal for the update button -->

         <div class="container">
               <h2>Users Listing</h2>
            <table class="table table-bordered" id="table">
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Image Url</th>
                     <th>Image</th>
                     <th>Update</th>
                     <th>Delete</th>
                     <th>Pdf</th>
                    
                  </tr>
               </thead>
            </table>
         </div>

       <script>
 $(function() {
 var cols =[];
       $('#table').DataTable({
       processing: true,
       serverSide: true,
       ajax: '{{ url('datatable/getdata') }}',
      
       columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'avatar', name: 'avatar' },
                {  data: 'avatar',name: 'avatar',
                  render: function (data, type, full, meta) {
                      return "<img src='/storage/"+data+"' height=\"50\"/>";
                  }
               },
                {  
                 data: 'id',
                data: function (data, type, full, row) {
                  console.log(data.name);

                var message =  '<button type="button" class="btn btn-default btn-md" data='+data.id+'    id="updatedata">Update</button>  <div class="modal fade" id="newModal'+data.id+'" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">×</button> <h4 class="modal-title">Update User</h4></div>'; 

                message += '<div class="modal-body">';
                message += '{{ Form::open(array("url" => "foo/bar")) }}';
                message +=           '<div class="form-group">';
                message +=             '{{Form::label("username", "Username")}}';
                message +=            '{{Form::text("text", "example@gmail.com",array("class"=> "form-control" , "id"=>"username"))}}';
                message +=          '</div>';
                message +=         '<div class="form-group">';
                message +=           '{{Form::label("email", "E-Mail Address")}}';
                message +=          '{{Form::text("email", "example@gmail.com",array("class"=> "form-control" , "id"=>"email"))}}';
                message +=    '</div>';
                message +=       '{{ Form::close() }}';
                message += '</div><div class="modal-footer"><button type="submit" class="btn btn-default" id="submitUserData" data ="'+data.id+'">Submit</button></div></div></div></div></div>';
               
                return message;

                }
              },
              {  data: 'id',
                render: function (data, type, full, meta) {
                    return "<button type='button' class='btn btn-default btn-lg ids"+data+"' id='deletedata'>Delete</button>"; 
                }
              },
               {  data: 'id',
                render: function (data, type, full, meta) {
                    return "<a href='/downloadPDF/"+data+"' id='"+data+"'>Download</a>"; 
                }
              }
           ]  

    });
   /** for the update button in the datatable*/
   $('table tbody').on( 'click', '#updatedata', function () {
   var userid =  $(this).attr('data');
 
     $("#newModal"+userid).modal("show");
    });
   /*ajax for the update*/
     $('table tbody').on( 'click', '#submitUserData', function () {
      var userid =  $(this).attr('data');
      var username =  $("#username").val();
      var email =  $("#email").val();
       $.ajax({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
         type:'POST',
         url:'/update',
         data:'_token = <?php echo csrf_token() ?>,userid ='+userid+',username ='+username+',email ='+email+'',
         success:function(data) {
            $("#msg").html(data.msg);
         }
    });
    });


 });

         </script>

   </body>
</html>