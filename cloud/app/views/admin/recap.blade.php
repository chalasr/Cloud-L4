@extends('layouts.admin')

@section('content')
<div class="body-complete">
    <div class="mytitle page-header">
        <h1>Panel d'Administration &nbsp; <i class="fa fa-dropbox"></i></h1>
    </div>
    <div class="panel panel-default">
        <hr />
        <div class="drop101">
            <span class="last10">10 derners inscrits &nbsp; <i class="fa fa-user"></i></span><a class="voir btn btn-default btn-sm" href="{{ URL::to('admin/users') }}">Voir tous</a>
            <hr />
        </div>
        <div class="tab2">
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
        </div>
    </div>
    <div class="panel panel-default">
        <hr />
        <div class="drop102">
            <span class="last10">10 derners fichiers &nbsp;<i class="fa fa-folder-open"></i></span><a class="voir btn btn-default btn-sm" href="{{ URL::to('admin/files') }}">Voir tous</a>
            <hr />
        </div>
        <div class="tab1">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Taille </th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                 @foreach($uploads as $file)
                    <tr>
                        <td>{{ $file->id }}</td>
                        <td>{{ $file->name }}</td>
                        <td>{{ $file->type }}</td>
                        <td>{{ $file->size }} Mio</td>
                        <td>
                            <a class="fa fa-pencil" href="{{ URL::to('rename/'.$file->id) }}"></a> &nbsp;
                            <a class="fa fa-cloud-download delpost" href="{{ URL::to('download/'.$file->id) }}">&nbsp;</a>
                            <a class="fa fa-share delpost" href="{{ URL::to('share/'.$file->id) }}">&nbsp;</a>
                            <a class="fa fa-remove" href="{{ URL::to('delete/'.$file->id) }}" onclick="return confirm('Voulez vous vraiment supprimer ce fichier ?');"></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop