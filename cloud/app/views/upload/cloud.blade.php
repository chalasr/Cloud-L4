@extends('layouts.master')

@section('content')
<div class="body-complete">
    <div class="mytitle page-header">
        <h1>Cloud &nbsp; <i class="fa fa-cloud"></i></h1>
    </div>

    <div class="panel panel-default">
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Taille </th>
                    <th>Download</th>
                </tr>
            </thead>

            <tbody>
             @foreach($upload as $file)
                <tr>
                    <td>{{ $file->name }}</td>
                    <td>{{ $file->type }}</td>
                    <td>{{ $file->size }}</td>
                    <td>
                        &nbsp;&nbsp;&nbsp;&nbsp;<a class="fa fa-cloud-download delpost" href="{{ URL::to('download/'.$file->id) }}"></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr />
    </div>
    <div class="pagination">
        <ul class="pagination">
            <?php echo $upload->links(); ?>
        </ul>
    </div>
</div>
@stop