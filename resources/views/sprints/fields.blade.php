@inject('projectCon','\App\Http\Controllers\ProjectController')
<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Proyecto:') !!}
    {!! Form::select('project_id', $projectCon->getProjects(), null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Datereview Field -->
<div class="form-group col-sm-6">
    {!! Form::label('startdate', 'Start date:') !!}
    {!! Form::date('startdate', null, ['class' => 'form-control']) !!}
</div>

<!-- Datereview Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enddate', 'End date:') !!}
    {!! Form::date('enddate', null, ['class' => 'form-control']) !!}
</div>
<!-- Datereview Field -->
<!-- Datereview Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datereview', 'Date review:') !!}
    {!! Form::date('datereview', null, ['class' => 'form-control']) !!}
</div>

<!-- Resumereview Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('resumereview', 'Resume review:') !!}
    {!! Form::textarea('resumereview', null, ['class' => 'form-control']) !!}
</div>

<!-- Datereview Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dateplanning', 'Date planning:') !!}
    {!! Form::date('dateplanning', null, ['class' => 'form-control']) !!}
</div>

<!-- Resumereview Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('resumeplanning', 'Resume planning') !!}
    {!! Form::textarea('resumeplanning', null, ['class' => 'form-control']) !!}
</div>
<!-- Dateretrospective Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dateretrospective', 'Date retrospective:') !!}
    {!! Form::date('dateretrospective', null, ['class' => 'form-control']) !!}
</div>

<!-- Resumereview Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('resumeretrospective', 'Resume retrospective') !!}
    {!! Form::textarea('resumeretrospective', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sprints.index') !!}" class="btn btn-default">Cancel</a>
</div>
<script>
    CKEDITOR.replace('resumeplanning');
    CKEDITOR.replace('resumereview');
    CKEDITOR.replace('resumeretrospective');
</script>