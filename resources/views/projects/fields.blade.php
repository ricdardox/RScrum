<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>
<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sprints_durations', 'Sprints durations (Weeks):') !!}
    {!! Form::number('sprints_durations', null, ['class' => 'form-control']) !!}
</div>
@inject('statusProjectCon','\App\Http\Controllers\StatusProjectController')
<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statusproject_id', 'Status project:') !!}
    {!! Form::select('statusproject_id', $statusProjectCon->getStatusProjects(), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('projects.index') !!}" class="btn btn-default">Cancel</a>
</div>
