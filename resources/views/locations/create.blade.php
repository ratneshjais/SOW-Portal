@extends('layouts.app')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
              <i class="pe-7s-map-marker icon-gradient bg-happy-itmeo">
              </i>
          </div>
          <div>
                Create Location
                <div class="page-title-subheading"> 
                    {{ Breadcrumbs::render('locations.create') }}
                </div>                                                   
          </div>                                                              
        </div>                                              
      <div class="page-title-actions">
          <div class="d-inline-block dropdown">
          <a class="btn btn-primary" href="{{ route('locations.index') }}"> Back</a>
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

{!! Form::open(array('route' => 'locations.store','method'=>'POST')) !!}

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location:</strong>
            {!! Form::text('type', null, array('placeholder' => 'location','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>

{!! Form::close() !!}


@endsection