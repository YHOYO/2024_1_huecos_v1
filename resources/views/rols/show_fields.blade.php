<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $rol->name }}</p>
</div>


<!-- Name Field -->
<div class="col-sm-12">
<!-- Usuarios con este rol -->
@if ($rol->users->isNotEmpty())
    <h4>Usuarios con este rol:</h4>
    <ul>
        @foreach ($rol->users as $user)
            <li><a href="../users/{{ $user->id }}">{{ $user->name }}</a>
            </li>
        @endforeach
    </ul>
@else
    <p>No hay usuarios con este rol.</p>
@endif
</div>
