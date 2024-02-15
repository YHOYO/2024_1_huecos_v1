
<!-- User Id Field (Hidden) -->
{!! Form::hidden('user_id', $photo->id ?? Auth::user()->id, ['class' => 'form-control', 'required']) !!}


<!-- Photo Details Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo_details_id', 'Photo Details Id:') !!}
    {!! Form::number('photo_details_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('url', $photo->url ?? 'indefinido', ['class' => 'form-control', 'maxlength' => 255]) !!}
    @if ($photo->url)
        <img src="{{ asset($photo->url) }}" alt="" style="width: 20%;">
    @else
        <p>No se ha cargado ninguna imagen.</p>
    @endif

</div>

<!-- Product Url Image Path Field -->
<div class="form-group col-sm-6">
{!! Form::label('product_url_image_path', 'Product Url Image Path:') !!}
{!! Form::file('product_url_image_path', null, ['class' => 'form-control-file', 'accept' => '.jpg, .png']) !!}
</div>
