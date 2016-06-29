<!-- Id Field -->
<div class="form-group">
    {!! Form::label('projectg_id', 'Project:') !!}
    <p>{!! $userStory->project->name !!}</p>
</div>
<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $userStory->id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $userStory->description !!}</p>
</div>

<!-- Criteriaofacceptance Field -->
<div class="form-group">
    {!! Form::label('criteriaofacceptance', 'Criteriaofacceptance:') !!}
    <p>{!! $userStory->criteriaofacceptance !!}</p>
</div>

<!-- Estimation Field -->
<div class="form-group">
    {!! Form::label('estimation', 'Estimation:') !!}
    <p>{!! $userStory->estimation !!}</p>
</div>
{{--*/$status=$userStory->statusUserStory;/*--}}

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <span class="badge {!! $status->classcolor!!}">{!! $status->name !!}</span>

</div>
 

@include('tasks.tasksUserStory',['tasks'=>$userStory->tasks])
