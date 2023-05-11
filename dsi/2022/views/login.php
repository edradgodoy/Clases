<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="asset/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="asset/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="asset/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="asset/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php 
                        // $hash = 'A%6/[}+!|jgkd87';
                        // $pass = 'Edrad1234'.$hash;
                        // $md5 = md5($pass);
                        // var_dump($md5) ;

                        // $sha1 = sha1($pass);
                        // var_dump($sha1);

                        // $dos = sha1(md5($pass));
                        // var_dump($dos);

                        // $hash = crypt($dos, '$6$rounds=9999$kkjsdjhkufiurkhudfy7hdjue$'); 
                        // var_dump($hash);
                    ?>
                </div>
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-primary">
                        <div class="panel-heading ">
                            <h3 class="panel-title">Login</h3>
                        </div>
                        <div class="panel-body">
                            <?php 
                                if (!empty($_POST['enviarLogin'])) {
                                    if (isset($_POST['username']) && strlen($_POST['username']) != 0) {
                                        if (isset($_POST['password']) && strlen($_POST['password']) != 0) {
                                            require_once 'core/login.php';
                                            $resultado = testLogin::singleton_login();
                                            $mensaje = $resultado->testLogin();
                                        } else {
                                           $mensaje = 'El campo de la contraseña es un campo obligatorio.'; 
                                        }
                                    } else {
                                        $mensaje = 'El campo del nombre del usuario es un campo obligatorio.';
                                    }
                                }
                            ?>
                            <form role="form" action="" method="POST" name="formLogin">
                                <fieldset>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Login" name="enviarLogin" id="enviarLogin">
                                </fieldset>
                            </form>
                            <?php 
                                if (isset($mensaje)) {
                                    echo '<br><div class="col-md-12 alert alert-danger">'.$mensaje.'</div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="asset/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="asset/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="asset/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="asset/js/startmin.js"></script>

    </body>
</html>
