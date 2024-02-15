<!-- User Id Field -->
<h1>HOLA</h1>
<div class="col-sm-12">
    {!! Form::label('user_id', 'PROPIETARIO DEL PRODUCTO') !!}
    <p>
    <a href="../users/{{ $photo->user['id'] }}" class='btn btn-outline-info'>{{ $photo->user['name'] }}</a>
    </p>
</div>

<!-- Photo Details Id Field -->
<div class="col-sm-12">
    {!! Form::label('Detalles Foto', 'Detalles de la Foto:') !!}
    @if($photo->photoDetails)
        <p>
            <a href="../photodetalles/{{ $photo->photoDetails->id }}" class='btn btn-outline-info'>Ver detalles de la Foto</a>
        </p>
    <h5>Ubicacion GPS:</h5>{{$photo->photoDetails->gps_location}}
    <h5>Status</h5>{{$photo->photoDetails->status}}
    <h5>Descripción</h5>{{$photo->photoDetails->description}}

    @endif
</div>

<!-- Url Field -->
<div class="col-sm-12">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $photo->url }}</p>
    <p><img src="{{asset($photo->url)}}" style="width: 20%;"></p>  
    
</div>

