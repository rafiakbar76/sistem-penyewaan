<?php
session_start();
include("include/inc.koneksi.php");
error_reporting(0)

    ?>

<body>

    <!-- header -->
    <?php include("include/header.php"); ?>

    <!-- header -->
    <!-- isi -->
    <div class="content">
        <div class="isi">
            <h3>Bingung cari kendaraan buat main?</h3>
            <img src="img/logo-rentaja.png" alt="logo" />
            <h3>Solusinya</h3>
            <button type="button" class="btn btn-warning">PROMO TAHUN BARU!!!</button>
        </div>
        <div class="gambar-isi">
            <img src="img/gambar1.png" alt="Mobil">
        </div>
    </div>
    <!-- isi -->



    <!-- isi2 end -->

    <!-- Carousel wrapper -->
    <div class="caraousel">
        <div id="carouselDarkVariant" class="carousel slide carousel-fade carousel-dark" data-mdb-ride="carousel"
            data-mdb-carousel-init>
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
                <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="1" aria-label="Slide 1"></button>
                <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="2" aria-label="Slide 1"></button>
            </div>

            <!-- Inner -->
            <div class="carousel-inner">
                <!-- Single item -->
                <div class="carousel-item active">
                    <img src="img/gmbr5.png" class="d-block w-100" alt="Motorbike Smoke" style="left:50%;" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        <button type="submit" class="btn btn-warning position-relative"><a href="booking.php">Pesan
                                Sekarang</a></button>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item">
                    <img src="img/gmbr3sd.png" class="d-block w-100" alt="Mountaintop" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button type="submit" class="btn btn-warning position-relative"><a href="booking.php">Pesan
                                Sekarang</a></button>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item">
                    <img src="img/gambar3s.png" class="d-block w-100" alt="Woman Reading a Book" />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        <button type="submit" class="btn btn-warning position-relative"><a href="booking.php">Pesan
                                Sekarang</a></button>
                    </div>
                </div>
            </div>
            <!-- Inner -->

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselDarkVariant"
                data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-mdb-target="#carouselDarkVariant"
                data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
        <!-- Carousel wrapper -->
    </div>



    <div class="content">
        <div class="card mb-3">
            <img src="img/candi.jpg" class="card-img-top" alt="Wild Landscape" />
            <div class="card-body">
                <h5 class="card-title">Wisata 3 Hari 2 Malam Yogyakarta</h5>
                <p class="card-text">
                    Kami Menawarkan Paket Wisata Kepada Anda dengan harga yang terjangkau
                    Mari ikuti keseruannya dengan RENTAJA
                </p>
                <button type="submit" class="btn btn-warning position-relative"><a href="wisata.php">Cek
                        Wisata</a></button>
            </div>
        </div>
        <div class="card">
            <img src="img/candi.jpg" class="card-img-bottom" alt="Camera" />
            <div class="card-body">
                <h5 class="card-title">Wisata 5 Hari 4 Malam Bromo</h5>
                <p class="card-text">
                    Kami Menawarkan Paket Wisata Kepada Anda dengan harga yang terjangkau
                    Mari ikuti keseruannya dengan RENTAJA
                </p>
                <button type="submit" class="btn btn-warning position-relative"><a href="wisata.php">Cek
                        Wisata</a></button>
            </div>

        </div>
    </div>
    <!-- isi3 end -->

    <!-- footer -->
    <?php include("include/footer.php"); ?>
    <!-- footer -->



    <!-- js mdb -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>