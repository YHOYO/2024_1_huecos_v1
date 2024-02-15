<!-- Gps Location Field -->
<div class="col-sm-12">
    {!! Form::label('gps_location', 'Gps Location:') !!}
    <p>{{ $photodetalle->gps_location}}</p>

    <?php
    $coordinates = explode(',', $photodetalle->gps_location);
    $lon= $coordinates[0]; // Primer valor después de dividir
    $lat = $coordinates[1]; // Segundo valor después de dividir

    ?>


    <div style="overflow:hidden;max-width:100%;width:500px;height:500px;">
        <div id="google-maps-canvas" style="height:100%; width:100%;max-width:100%;">
            <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q={{ $lon }},+{{ $lat }}&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
        </div>
    </div>

   
</div>

<!-- Status Field -->
<div class="col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $photodetalle->status }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $photodetalle->description }}</p>
</div>

<!-- Fotos con la misma Descripción -->
<div class="col-sm-12">
    <h4>Fotos con la misma Descripción:</h4>
    <ul>
        @foreach ($photodetalle->photos as $photo)
            <li>
                <img src="{{asset($photo->url)}}" alt="" style="width: 20%;">
                <a href="{{ route('photos.show', $photo->id) }}">{{ $photo->url }}</a>
            </li>
        @endforeach
    </ul>
</div>
