
<!DOCTYPE html>
<html lang="id-ID">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PT. Agrikultur Gemilang Indonesia</title>

        <link href="<?php echo base_url() ?>assets/login/login/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/login/login/css/fontawesome-all.css" rel="stylesheet" />
        <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    </head>

    <body>
        <h1>Login ke Order PT AGI</h1>
        
        <div class=" w3l-login-form">
            <h2>Login Akun</h2>
            <?php if ($this->session->flashdata('sukses')){ ?>
            <div class="flash-message">
                <?php echo $this->session->flashdata('sukses') ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('warning')){ ?>
            <div class="flash-message">
                <?php echo $this->session->flashdata('warning') ?>
            </div>
        <?php } ?>
            <?php 
        //display error
        echo validation_errors('<div class="alert alert-warning">','</div>');
        //form open
        echo form_open(base_url('login'),'class="leave-comment"'); ?>
            
            <form method="post" accept-charset="utf-8">

            <div class=" w3l-form-group">
                <label>Username:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" value="" class="form-control" placeholder="Username" minlength="4" maxlength="16" required>
                </div>
                            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                            </div>
            <div class="forgot">
                <a href="#">Lupa password?</a>
            </div>
            <button type="submit">Login</button>
            </form>
            <?php echo form_close(); ?>
        </div>

        <footer>
            <p class="copyright-agileinfo"> &copy; 2021 <a href="http://localhost/toko_sayur/">PT AGI</a></p>
        </footer>

    </body>
</html>