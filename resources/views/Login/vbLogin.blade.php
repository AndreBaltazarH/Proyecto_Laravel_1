<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">     
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/app.css')}}">
</head>
<body>
<form action="{{route('acceso')}}" method="POST" >
    <div class="container">
        <div class="row">        
            <div class="col-md-4 offset-md-4">
                <br>
                <div class="card mb-4 shadow-sm">
                        {{ csrf_field() }}
                    <div class="card-header">
                            <h1 class="panel-title" style="font-size:1.25rem;">Acceso a la Aplicacion</h1>
                    </div>                                   
                        <div class="card-body">
                            <div class="form-group">
                                <label >Email</label>
                                <input class="form-control" type="email" name="user_email" placeholder="Ingrese Email">
                                @if ($errors->has('user_email'))
                                <p>{{$errors->first('user_email')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input class="form-control" type="password" name="user_password" placeholder="Ingrese Password">
                                @if ($errors->has('user_password'))
                                <p>{{$errors->first('user_password')}}</p>
                                @endif
                            </div>
                            <input type="submit" class="btn btn-lg btn-block btn-primary" name="command" value="Agregar" id="btnAgregar" />                   
                        </div>                    
                </div>        
            </div>  
                      
        </div>         
    </div>
</form>
</body>
</html>



