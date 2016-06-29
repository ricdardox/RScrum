@inject('taskCon','\App\Http\Controllers\TaskController')


<style>
    .padding-sides{
        padding: 0 10px
    }
</style>
@foreach($userStories as $userStory)
<div class="col-md-4">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user z-depth-5">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-aqua-active">
            <h3 class="widget-user-username">{!! $userStory->project->name!!}</h3>
            <h5 class="widget-user-desc">{!! $userStory->description !!}</h5>
        </div>
        {{--*/$progress=$userStory->progress()/*--}}
        <div class="progress progress-sm active">
            <div class="progress-bar progress-bar-{{$taskCon->progressBar($progress)}} progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: {{$progress}}%">
                <span class="sr-only">{{$progress}} % Complete</span>
            </div>
        </div>
        <h4 class="padding-sides">Criteria of acceptance</h4>
        <p class="padding-sides">{!! $userStory->criteriaofacceptance !!}</p>
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
