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

<!-- Registration form - START -->
<div class="container">
    <div class="row">
        <form role="form">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label>First Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="First Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Last Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Intro</label>
                    <div class="input-group">
                        <textarea class="form-control" rows="5"></textarea>
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
        <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div>
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check all page inputs.</strong>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Registration form - END -->

</div>

    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

</body>
</html>