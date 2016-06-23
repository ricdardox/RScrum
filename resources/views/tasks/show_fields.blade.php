<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $task->id !!}</p>
</div>

<!-- Userstory Id Field -->
<div class="form-group">
    {!! Form::label('userstory_id', 'Userstory Id:') !!}
    <p>{!! $task->userStory->description !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $task->description !!}</p>
</div>

<!-- Duration Field -->
<div class="form-group">
    {!! Form::label('duration', 'Duration:') !!}
    <p>{!! $task->duration !!}</p>
</div>

