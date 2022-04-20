
<div class="login-box">
    <div class="login-logo">
        <img src="views/img/plantilla/logo.png" class="img-responsive" style="padding:10px 50px; margin:20px 0px">
    </div>
    <!-- /.login-logo -->
    <div class="login-container">
        <h2>Ingresar al Sistema</h2>
        <form method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="contra" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                </div>
                <!-- /.col -->
            </div>

            <?php
            $login = new controllerAdmin();
            $login->ctr_ingreso_admin();
            ?>
        </form>
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->