@inject('taskCon','\App\Http\Controllers\TaskController')


<style>
    .padding-sides{
        padding: 0 10px
    }
</style>
@foreach($userStories as $key=> $userStory)
<div class="col-md-4">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user z-depth-5">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active"  style="height: auto">
            <h3 class="widget-user-username">{!! $userStory->project->name or '' !!}
            <span class="badge pull-right">{!! count($userStory->parentUS)>0 ? 'Derivate':'' !!}</span>
            <span class="badge pull-right">{!! count($userStory->derivatesUS)>0 ? 'Parent':'' !!}</span>
            </h3>
            <h5 class="widget-user-desc">{!! $userStory->description !!}</h5>
        </div>
        {{--*/$progress=$userStory->progress()/*--}}

        <div class="panel box">
            <div class="progress progress-sm active">
                <div class="progress-bar progress-bar-{{$taskCon->progressBar($progress)}} progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{$progress}}%">
                    <span class="sr-only">{{$progress}} % Complete</span>
                </div>
            </div>
            <div class="box-header">
                <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}" aria-expanded="false" class="collapsed">
                        Criteria of acceptance 
                    </a>
                </h4>
            </div>
            <div id="collapse{{$key}}" class="panel-collapse collapse" aria-expanded="true">
                <div class="box-body">
                    <p class="padding-sides">{!! $userStory->criteriaofacceptance !!}</p>
                </div>
            </div>
        </div>
        <div class="pull-right">
            {!! Form::open(['route' => ['userStories.destroy', $userStory->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('userStories.show', [$userStory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('userStories.edit', [$userStory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="clearfix">
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">{!! $userStory->estimation !!}</h5>
                        <span class="description-text">Estimation</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        {{--*/$status=$userStory->statusUserStory;/*--}}
                        <h5 class="description-header"><span class="badge {!! $status->classcolor!!}">{!! $status->name !!}</span></h5>
                        <span class="description-text">Status</span>
                    </div>
                    <!-- /.description-block -->
                </div> 
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">{!! count($userStory->tasks) !!}</h5>
                        <span class="description-text">Tasks</span>
                    </div>
                    <!-- /.description-block -->
                </div> 
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.widget-user -->
</div>
@endforeach
