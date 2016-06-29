@inject('userCon','\App\Http\Controllers\UserController')
@inject('taskCon','\App\Http\Controllers\TaskController')

<ul class="timeline timeline-inverse">
    @foreach($sprints as $sprint)

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-blue">
            <a href="{!! route('sprints.show', [$sprint->id]) !!}"  style="color: white" >
                    {!! $sprint->name !!} ({!! $sprint->startdate !!} - {!! $sprint->enddate !!})
            </a>
        </span>
    </li>
    <!-- /.timeline-label -->
    <!-- timeline item -->
    <li>
        <i class="fa fa-comments bg-blue"></i>

        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> {!! $sprint->dateplanning !!}</span>

            <h3 class="timeline-header"><a href="#">Sprint planning</a> resume</h3>

            <div class="timeline-body">
                {!! $sprint->resumeplanning !!}
            </div>
            <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">Read more</a>
            </div>
        </div>
    </li>
    <!-- END timeline item -->

    <!-- timeline item -->
    <li>
        <i class="fa fa-comments bg-blue"></i>

        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> </span>

            <h3 class="timeline-header"><a href="#">Sprint backlog</a> 

            </h3>

            <div class="timeline-body">
                <div class="box">
                    <div class="box-header">
                        <!--<h3 class="box-title">Condensed Full Width Table</h3>--> 
                        <div class="progress">
                            {{--*/$progress=$sprint->progress()/*--}}
                            <div class="progress-bar progress-bar-{{$taskCon->progressBar($progress)}} progress-bar-striped" role="progressbar" aria-valuenow="{{$sprint->progress()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$progress}}%">
                                <span>{{$progress}} % Complete</span>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <table class="table table-condensed dataTable" style="width: 100% !important">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>User</th>
                                    <th>Duration</th>
                                    <th>Progress</th>
                                    <th style="width: 40px">Percentaje</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($sprint->tasks as $key=>$value)
                                <tr>
                                    <th style="width: 10px">{{$key+1}}</th>
                                    <th>{{$value->description}}</th>
                                    {{--*/$user=$value->user/*--}}
                                    {{--*/$progress=$value->avProgress()/*--}}
                                    <th><img width="30" src="{{ $userCon->getPathPublicUserImage(isset($user->image)?$user->image:'')}}"/>  {{$user->name or ''}}</th>
                                    <th>{{$value->duration}}</th>
                                    <th>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-{{$taskCon->progressBar($progress)}}" style="width: {{$progress}}%"></div>
                                        </div>

                                    </th>
                                    <th style="width: 40px"><span class="badge label-{{$taskCon->progressBar($progress)}}">{{$progress}} %</span></th>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">Read more</a>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
    <!-- timeline item -->
    <li>
        <i class="fa fa-comments bg-blue"></i>

        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> {!! $sprint->datereview !!}</span>

            <h3 class="timeline-header"><a href="#">Sprint review</a> resume</h3>

            <div class="timeline-body">
                {!! $sprint->resumereview !!}
            </div>
            <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">Read more</a>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
    <!-- timeline item -->
    <li>
        <i class="fa fa-comments bg-blue"></i>

        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> {!! $sprint->dateretrospective !!}</span>

            <h3 class="timeline-header"><a href="#">Sprint retrospective</a> resume</h3>

            <div class="timeline-body">
                {!! $sprint->resumeretrospective!!}
            </div>
            <div class="timeline-footer">
                <a class="btn btn-primary btn-xs">Read more</a>
            </div>
        </div>
    </li>
    <!-- END timeline item -->
    @endforeach

    <li>
        <i class="fa fa-clock-o bg-gray"></i>
    </li>
</ul>