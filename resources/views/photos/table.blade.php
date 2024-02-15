<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="photos-table">
            <thead>
            <tr>
                <th>User</th>
                <th>Photo Details Id</th>
                <th>Url</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td><a href="../users/{{ $photo->user['id'] }}" class='btn btn-outline-info'>{{ $photo->user['name'] }}</a></td>
                    <td><a href="../photodetalles/{{ $photo->photoDetails->id }}" class='btn btn-outline-info'>Ver detalles de la Foto</a></td>
                    <td><!--{{ $photo->url }}-->
                        <p><img src="{{asset($photo->url)}}" style="width: 20%;"></p>  
                    </td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['photos.destroy', $photo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('photos.show', [$photo->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('photos.edit', [$photo->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $photos])
        </div>
    </div>
</div>
