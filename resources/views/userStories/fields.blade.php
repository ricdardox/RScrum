@inject('projectCon','\App\Http\Controllers\ProjectController')
@inject('userStroryCon','\App\Http\Controllers\UserStoryController')

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Proyecto:') !!}
    {!! Form::select('project_id', $projectCon->getProjects(), null, ['class' => 'form-control']) !!}
</div>
<!-- Userstory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parentuserstory_id', 'User story Parent:') !!}
    {!! Form::select('parentuserstory_id', $userStroryCon->getUserStories(),null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Criteriaofacceptance Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('criteriaofacceptance', 'Criteria of acceptance:') !!}
    {!! Form::textarea('criteriaofacceptance', null, ['class' => 'form-control']) !!}
</div>

<!-- Estimation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estimation', 'Estimation:') !!}
    {!! Form::number('estimation', null, ['class' => 'form-control']) !!}
</div>
@inject('statusUserStoryCon','\App\Http\Controllers\StatusUserStoryController')

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statususerstory_id', 'Status:') !!}
    {!! Form::select('statususerstory_id', $statusUserStoryCon->getStatusUserStories(), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('userStories.index') !!}" class="btn btn-default">Cancel</a>
</div>
<script>
    CKEDITOR.replace('criteriaofacceptance');
</script>