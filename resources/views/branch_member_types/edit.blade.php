@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Branch Member Type
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($branchMemberType, ['route' => ['branchMemberTypes.update', $branchMemberType->id], 'method' => 'patch']) !!}

                        @include('branch_member_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection