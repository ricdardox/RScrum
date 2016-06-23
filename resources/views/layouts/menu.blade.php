<li class="{{ Request::is('projects*') ? 'active' : '' }}">
    <a href="{!! route('projects.index') !!}">
        <img src="{{asset('images/project.png')}}" width="30"/> <span>Projects</span>
    </a>
</li>

<li class="{{ Request::is('userStories*') ? 'active' : '' }}">
    <a href="{!! route('userStories.index') !!}">
         <img src="{{asset('images/storyuser.png')}}" width="30"/> <span>UserStories</span></a>
</li>
<li class="{{ Request::is('sprints*') ? 'active' : '' }}">
    <a href="{!! route('sprints.index') !!}"> 
         <img src="{{asset('images/sprint.png')}}" width="30"/>  <span>Sprints</span></a>
</li>

<li class="{{ Request::is('tasks*') ? 'active' : '' }}">
    <a href="{!! route('tasks.index') !!}">
        <img src="{{asset('images/task.png')}}" width="30"/> <span>Tasks</span></a>
</li>

