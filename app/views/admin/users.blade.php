@extends('layouts.admin')

@section('content')
<div class="body-complete">
    <div class="mytitle page-header">
        <h1>Tous les membres &nbsp; <i class="fa fa-user"></i></h1>
    </div>

    <div class="panel panel-default">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Rôle </th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
             @foreach($users as $user)
                <tr>
                   <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td><?php if($user->role_id == 2) echo "Administrateur"; elseif($user->role_id == 0) echo "Bloqué"; else echo "Utilisateur"; ?></td>
                        <td>
                            <a class="fa fa-pencil" href="{{ URL::to('blok/'.$user->id) }}"></a> &nbsp;
                            <a class="fa fa-folder-open" href="{{ URL::to('admin/'.$user->username) }}"></a> &nbsp;
                            <a class="fa fa-remove" href="#" onclick="return confirm('Voulez vous vraiment supprimer ce fichier ?');"></a>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr />
    </div>
    <div class="pagination">
    <ul class="pagination">
        <?php echo $users->links(); ?>
    </ul>
    </div>
</div>
@stop