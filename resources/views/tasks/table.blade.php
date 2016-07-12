@inject('userCon','\App\Http\Controllers\UserController')
@inject('taskCon','\App\Http\Controllers\TaskController')
<table class="table table-responsive" id="tasks-table">
    <thead>
    <th>User story</th>
    <th>User</th>
    <th>Description</th>
    <th>Duration</th>
    <th>Progress</th>
    <th>Percentaje</th>
    <th colspan="3">Action</th>
</thead>
<tbody>
    @inject('userCon','\App\Http\Controllers\UserController')

    @foreach($tasks as $task)
    <tr>
        {{--*/$userStory=$task->userStory/*--}}
        <td><span data-toggle="popover" data-html="true" data-content="{!!$userStory->description!!}">{!! str_limit($userStory->description,30)  !!}</span></td>
        {{--*/$user=$task->user/*--}}
        <td><img width="30" src="{{ $userCon->getPathPublicUserImage(isset($user->image)?$user->image:'')}}"/> {{  $user->name or '' }}</td>
        <td>{!! $task->description !!}</td>
        {{--*/$user=$task->user/*--}}
        {{--*/$progress=$task->avProgress()/*--}}
        <th>{{$task->duration}}</th>
        <th>
            <div class="progress progress-xs">
                <div class="progress-bar progress-bar-{{$taskCon->progressBar($progress)}}" style="width: {{$progress}}%"></div>
            </div>

        </th>
        <th style="width: 40px"><span class="badge label-{{$taskCon->progressBar($progress)}}">{{$progress}} %</span></th>

        <td>
            {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('tasks.show', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('tasks.edit', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>