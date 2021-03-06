@inject('userStroryCon','\App\Http\Controllers\UserStoryController')
@inject('userCon','\App\Http\Controllers\UserController')

<!-- Userstory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('userstory_id', 'User story:') !!}
    {!! Form::select('userstory_id', $userStroryCon->getUserStories(),null, ['class' => 'form-control']) !!}
</div>
<!-- Userstory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $userCon->getUsers(),null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Duration Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duration', 'Duration:') !!}
    {!! Form::text('duration', null, ['class' => 'form-control time_']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tasks.index') !!}" class="btn btn-default">Cancel</a>
</div>
<script>
    CKEDITOR.replace('description');
</script>