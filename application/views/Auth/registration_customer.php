<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create a Customer Account!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url('auth/registration_customer'); ?>">
                                <!-- <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="name" name="name"
                                        placeholder="Name" value="<?= set_value('name');?>">

                                    <?= form_error('name','<small class="text-danger pl-3">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="address" name="address"
                                        placeholder="Address" value="<?= set_value('address');?>">

                                    <?= form_error('address','<small class="text-danger pl-3">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" name="email"
                                    placeholder="Email Address" value="<?= set_value('email');?>">
                                    
                                    <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="telpon" name="telpon"
                                        placeholder="Call Number" value="<?= set_value('telpon');?>">

                                    <?= form_error('telpon','<small class="text-danger pl-3">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nik" name="nik"
                                        placeholder="NIK" value="<?= set_value('nik');?>">

                                    <?= form_error('nik','<small class="text-danger pl-3">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control form-control-user" id="foto" name="foto" placeholder="Foto Kamu" value="<?= set_value('foto')?>">

                                    <?= form_error('foto','<small class="text-danger pl-3">','</small>')?>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div> -->
                                <button type="submit"  class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <!-- <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            <hr>
                            <div class="text-center mx-auto">
                                <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Owner Account !</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth'); ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>