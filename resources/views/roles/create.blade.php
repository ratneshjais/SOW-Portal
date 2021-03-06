@extends('layouts.app')


@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div>   
                    Create Role
                    <div class="page-title-subheading">
                    {{ Breadcrumbs::render('roles.create') }}
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    <a class=" btn btn-primary" href="{{ route('roles.index') }}">
                      Back
                    </a>
                </div>
            </div>
        </div>
    </div> 


@if (count($errors) > 0)

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

        </ul>

    </div>

@endif


{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Name:</strong>

            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

        </div>

    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Permissions
                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover"  id="access_matrix">
                            <thead>
                                <tr>
                                    <th scope="col"></th> 
                                    @foreach($accesslist as $value)
                                        <th scope="col">{{ trans( 'access.'. $value ) }}</th> 
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach($matrix as $module=>$accesses)
                                    <tr>
                                        <th scope="col">{{ trans( 'access.'. $module) }}</th> 
                                        @foreach($accesslist as $access)
                                            @if(isset($accesses["$access"]))
                                                <td>{{ Form::checkbox('permission[]', $accesses["$access"]->id, false, array('class' => 'checkbox ' . "$access $module")) }}</td>
                                            @else
                                                <td></td>
                                            @endif 
                                        @endforeach  
                                    </tr>    
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="access_quest">
                            <tbody>  
                                @foreach($accessquestion as $module=>$accesses)
                                    @foreach($accesses as $accessName=> $access)
                                    <tr>
                                        <th scope="col">{{ trans( 'access.'. $module. "." . $accessName) }}</th> 
                                        <td>
                                            <label class="switch">
                                                {{ Form::checkbox('permission[]', $access->id, false, array('class' => 'checkbox '  . "$accessName $module")) }}
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                    </tr>    
                                    @endforeach  
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</div>

{!! Form::close() !!}


@endsection