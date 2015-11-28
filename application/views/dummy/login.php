<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?=$title?></title>
    </head>
    <body>
        <div class="panel panel-default">
            <div class="panel-body">
                <form class="form-signin" action="<?=site_url('login')?>" method="post">

                    <h2 class="form-signin-heading">Please log in</h2>
                    <?php
                        if($this->session->flashdata('error')){
                            echo '<p class="bg-danger"><b>'.$this->session->flashdata('error').'</b></p>';
                        }
                        if($this->session->flashdata('success')){
                            echo '<p class="bg-success"><b>'.$this->session->flashdata('success').'</b></p>';
                        }
                    ?>

                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="text" id="inputEmail" class="form-control" placeholder="Email address" name="username" value="<?=set_value('username')?>" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                    <a href="" style="float:right">Forgot Your Password?</a>

                    <div class="checkbox" style="width:50%">
                        <label>
                        <input type="checkbox" id="remember" name="remember"> Remember me
                        </label>
                    </div>


                    <input type="hidden" name="next" value="">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </body>
</html>
