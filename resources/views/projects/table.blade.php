@inject('userCon','\App\Http\Controllers\UserController')

@foreach($projects as $project)

<div class="col-md-4">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user-2">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        {{--*/ $status=$project->statusProject; /*--}}
        <div class="widget-user-header {{$status->classcolor}}">

            <div class="widget-user-image">
                <img class="img-circles" src="{{asset('images/project.png')}}" alt="User Avatar">
            </div>

            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">{!! $project->name !!}</h3>
            <h5 class="widget-user-desc">{!! $project->description !!}</h5>
            <span class="badge pull-right {{$status->classcolor}}">{{$status->name}}</span>
            <br>
            <div class="">
                {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                <div class='btn-group bg-info'>
                    <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('projects.edit', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="box-footer no-padding">
            <ul class="nav nav-stacked">
                <li><a href="#">User Stories <span class="pull-right badge bg-blue">{{count($project->userStories)}}</span></a></li>
                <li><a href="#">Sprints durations <span class="pull-right badge bg-aqua">{{$project->sprints_durations}} (Weeks)</span></a></li>
                <li><a href="#">Sprints <span class="pull-right badge bg-aqua">{{count($project->sprints)}}</span></a></li>
                <li>
                    <a>
                        <span>

                            {{--*/$users=$project->users/*--}}
                            Followers 
                            <span class="pull-right badge bg-red">
                                {{count($users)}}
                            </span>
                            <span style="display: inline-block;text-align: right;width: 70%" >

                                @foreach($users as $keyUser=>$user)
                                <img title="{{$user->name}}" width="25" src="{{ $userCon->getPathPublicUserImage($user->image)}}" alt="{{$user->name}}"  />
                                @endforeach
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.widget-user -->
</div>
@endforeach
