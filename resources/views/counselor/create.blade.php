<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>OzUnimate - New Counselor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

</head>
<body>

<div class="container">

<div class="page-header">
    <h1>Add a New Counselor <small>Welcome to join!</small></h1>
</div>

<!-- New counselor form - START -->
<div class="container">
    <div class="row">
        {!! Form::open(['url'=>'counselor/store']) !!}
            <div class="form-group">
               {!! Form::label('firstName','Fist Name:') !!}
               {!! Form::text('firstName',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
               {!! Form::label('lastName','Last Name:') !!}
               {!! Form::text('lastName',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
               {!! Form::label('intro','Intro:') !!}
               {!! Form::textarea('intro',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
               {!! Form::submit('Submit',['class'=>'btn btn-success form-control']) !!}
            </div>
        {!! Form::close() !!}

        @if($errors->any())        
        <ul class="alert alert-danger">            
        @foreach($errors->all() as $error)                
        <li>{{$error}}</li>
        @endforeach        
        </ul>
        @endif
      
      <!-- notification after submition -->
<!--         <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- New counselor form - END -->

</div>

    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

</body>
</html>