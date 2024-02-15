<!-- Gps Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gps_location', 'Gps Location:') !!}
    {!! Form::text('gps_location', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}



</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>