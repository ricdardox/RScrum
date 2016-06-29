<div class="pull-right">
    {!! Form::open(['route' => ['sprints.destroy', $sprint->id], 'method' => 'delete']) !!}
    <div class='btn-group'>
        <a href="{!! route('sprints.edit', [$sprint->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
    </div>
    {!! Form::close() !!}
</div>
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
<!-- Project Id Field -->
<div class="form-group">
    {!! Form::label('startdate', 'Date:') !!}
    <p>{!! $sprint->startdate!!} - {!! $sprint->enddate!!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $sprint->name !!}</p>
</div>

<!-- Datereview Field -->
<div class="form-group">
    {!! Form::label('dateplanning', 'Date planning:') !!}
    <p>{!! $sprint->dateplanning !!}</p>
</div>

<!-- Resumereview Field -->
<div class="form-group">
    {!! Form::label('resumeplanning', 'Resume planning:') !!}
    <p>{!! $sprint->resumeplanning !!}</p>
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
