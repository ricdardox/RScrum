<table class="table table-responsive" id="userStories-table">
    <thead>
    <th>Project</th>
    <th>Description</th>
    <th>Criteriaofacceptance</th>
    <th>Estimation</th>
    <th>Status</th>
    <th style="width: 150px" >Action</th>
</thead>
<tbody>
    @foreach($userStories as $userStory)
    <tr>
        <td>{!! $userStory->project->name!!}</td>
        <td>{!! $userStory->description !!}</td>
        <td>{!! $userStory->criteriaofacceptance !!}</td>
        <td>{!! $userStory->estimation !!}</td>
        <td>{!! $userStory->status !!}</td>
        <td>
            {!! Form::open(['route' => ['userStories.destroy', $userStory->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('userStories.show', [$userStory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('userStories.edit', [$userStory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</tbody>
</table>