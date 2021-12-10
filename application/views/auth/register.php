<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$title?></title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">  
        <div class="col-lg-7">                
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>

                        <?= form_open ('auth/register');?>
                            <div class="form-group">
                                <input type="text" name="id_karyawan" class="form-control"
                                    placeholder="id_karyawan">
                                <small class="text-danger"> <?=form_error('id_karyawan')?></small>
                            </div>

                            <div class="form-group">
                                <input type="text" name="nama_karyawan" class="form-control"
                                    placeholder="nama_karyawan">
                                <small class="text-danger"> <?=form_error('nama_karyawan')?></small>
                            </div>
                        
                            <div class="form-group">
                                <input type="text" name="username" class="form-control"
                                placeholder="username">
                                <small class="text-danger"> <?=form_error('username')?></small>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                                    <small class="text-danger"> <?=form_error('password')?></small>
                                </div>

                                <div class="col-sm-6">
                                    <input type="password" name="password2" class="form-control" placeholder="konfirmasi Password">
                                    <small class="text-danger"> <?=form_error('password2')?></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" name="keterangan" class="form-control"
                                placeholder="keterangan">
                                <small class="text-danger"> <?=form_error('keterangan')?></small>
                            </div>

                            <div class="form-group">
                                <input type="text" name="email" class="form-control"
                                placeholder="Email">
                                <small class="text-danger"> <?=form_error('email')?></small>
                            </div>

                            <Button type="submit"  class="btn btn-primary btn-block">
                                Regis Akun
                            </Button>

                            <?= form_close(); ?>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="<?=base_url('Home')?>">Kembali ke Beranda</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>