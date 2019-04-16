<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
    <tbody>
   <tr> <th>Name</th>
    <th>Email</th>
    <th>Image</th>
      </tr>
      <tr>
        <td>
          {{$user->name}}
        </td>
        <td>
          {{$user->email}}
        </td>
        <td>
          {{$user->avatar}}
        </td>
      </tr>
      
      </tbody>
    </table>
  </body>
</html>
