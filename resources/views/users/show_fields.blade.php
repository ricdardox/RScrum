<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>
@inject('userCon','\App\Http\Controllers\UserController')


<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p><img width="50" src="{{ $userCon->getPathPublicUserImage($user->image)}}"/></p>
    @if(!empty($user->image))
    <i class="fa fa-cloud-download"></i> {{link_to("/userscon/downloadfile/".$user->image ,$user->image)}}
    @endif
</div>

