
<!-- Project Id Field -->
<div class="form-group">
    {!! Form::label('project_id', 'Project:') !!}
    <p>{!! $sprint->project->name !!}</p>
</div>


<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $sprint->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $sprint->name !!}</p>
</div>

<!-- Datereview Field -->
<div class="form-group">
    {!! Form::label('datereview', 'Date review:') !!}
    <p>{!! $sprint->datereview !!}</p>
</div>

<!-- Resumereview Field -->
<div class="form-group">
    {!! Form::label('resumereview', 'Resume review:') !!}
    <p>{!! $sprint->resumereview !!}</p>
</div>

<!-- Dateretrospective Field -->
<div class="form-group">
    {!! Form::label('dateretrospective', 'Date retrospective:') !!}
    <p>{!! $sprint->dateretrospective !!}</p>
</div>

<!-- Resumeretrospective Field -->
<div class="form-group">
    {!! Form::label('resumeretrospective', 'Resume retrospective:') !!}
    <p>{!! $sprint->resumeretrospective !!}</p>
</div>
