<table class="table table-responsive" id="sprints-table">
    <thead>
        <th>Project</th>
        <th>Name</th>
        <th>Date review</th>
        <th>Resume review</th>
        <th>Date retrospective</th>
        <th>Resume retrospective</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sprints as $sprint)
        <tr>
            <td>{!! $sprint->project->name !!}</td>
            <td>{!! $sprint->name !!}</td>
            <td>{!! $sprint->datereview !!}</td>
            <td>{!! $sprint->resumereview !!}</td>
            <td>{!! $sprint->dateretrospective !!}</td>
            <td>{!! $sprint->resumeretrospective!!}</td>
            <td>
                {!! Form::open(['route' => ['sprints.destroy', $sprint->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sprints.show', [$sprint->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sprints.edit', [$sprint->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>