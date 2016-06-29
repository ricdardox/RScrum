@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Project {{$project->name}}</h1>
</section>
<div class="content">
    <div class="clearfix"></div>

    @include('flash::message')

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Product backlog</a></li>
                    {{--*/$sprints=$project->sprints/*--}}
                    <li><a href="#tab_2" data-toggle="tab" aria-expanded="true">Sprints({{count($sprints)}})</a></li>

                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @include('userStories.table')
                        <div class="clearfix"></div>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        @include('sprints.table',['sprints'=>$sprints])
                    </div> 
                </div>
                <!-- /.tab-content -->
            </div>

        </div>
    </div>
</div>

@endsection

