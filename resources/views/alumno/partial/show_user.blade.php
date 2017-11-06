<div class="row">
  <div class="col-sm-7">
    <table class="table">
      <tbody>
        <tr>
          <th><i class="fa fa-btn fa-list-alt"></i> CI: </th>
          <td>{{ $user->ci }}</td>
        </tr>
        <tr>
          <th><i class="fa fa-btn fa-user"></i> Nombre Completo: </th>
          <td>{{ $user->paterno }} {{ $user->materno }} {{ $user->name }}</td>
        </tr>
        <tr>
          <th><i class="fa fa-btn fa-envelope"></i> Correo Electrónico: </th>
          <td>{{ $user->email }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
