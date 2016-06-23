@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            UserStory
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($userStory, ['route' => ['userStories.update', $userStory->id], 'method' => 'patch']) !!}

                        @include('userStories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection