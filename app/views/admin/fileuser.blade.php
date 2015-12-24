@extends('layouts.admin')

@section('content')
<div class="body-complete">
    <div class="mytitle page-header">
        <h1>Tous les fichiers &nbsp; <i class="fa fa-folder-open"></i></h1>
    </div>

    <div class="panel panel-default">
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
        <hr />
    </div>
    <div class="pagination">
        <ul class="pagination">
            <?php echo $uploads->links(); ?>
        </ul>
    </div>
</div>
@stop