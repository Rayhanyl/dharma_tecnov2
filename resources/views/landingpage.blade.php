<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo_dharma.png') }}">
    <title>
        PT DHARMA TEKNO INDONESIA
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"
        type="text/css">
    <link href="{{ asset('assets/css/datatables.css') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="http://127.0.0.1:8000/" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    @stack('styles')
</head>

<body class="">
    <div class="container z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-uppercase" href="#">
                            {{ Auth::user()->role ?? '' }}
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                        href="{{ route('landing.page') }}">
                                        <i class="fa fa-home opacity-6 text-dark me-1"></i>
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('auth.login.page') }}">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Sign In
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="{{ route('auth.register.page') }}">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Sign Up
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-success text-gradient">PT DHARMA TEKNO INDONESIA.
                                    </h3>
                                    <p class="mb-0">Selamat Datang di - Portal Rekrutmen</p>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <p>Terima kasih telah mengunjungi portal rekrutmen resmi PT Dharma Tekno
                                            Indonesia. Kami sangat antusias untuk menemukan individu berbakat yang ingin
                                            bergabung dengan tim kami dan berkontribusi dalam mewujudkan visi dan misi
                                            perusahaan kami.</p>
                                        <a href="{{ route('auth.login.page') }}"
                                            class="btn bg-gradient-info w-50 mt-4 mb-0">Lamar
                                            sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('../assets/img/dharma_logo_1.png')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section style="margin:50px 0px;">
            <div class="page-header min-vh-55">
                <div class="container">
                    <div class="row my-5">
                        <div class="col-12 my-5">
                            <div class="row">
                                <div class="col-12 col-lg-4 my-auto">
                                    <h2 class="text-gradient text-info">Profil <br> Perusahaan</h2>
                                </div>
                                <div class="col-12 col-lg-8">
                                    <p style="text-align: justify;line-height:30px;">
                                        <span class="text-success fw-bold">PT Dharma Tekno Indonesia</span> adalah
                                        Perusahaan lokal dengan mimpi global, yang mengepankan "kearifan lokal" dalam
                                        setiap
                                        langkahnya. Dengan "DHARMA" sebagai brand yang di usung, didominasi warna hijau
                                        menandakan "ramah lingkungan" dibalut 5 garis yang membentuk perisai sebagai
                                        bentuk
                                        rukun kompak untuk membentengi kebenaran dalam mecapai tujuan perusahaan.
                                    </p>
                                    <p>
                                        PT DTI merupakan perusahaan yang bergerak dibidang bisnis alat kesehatan.
                                        didirikan
                                        oleh pribadi yang memiliki karakter luhur warisan bangsa, - jujur amanah rukun
                                        kompak - sebagai landasan dan acuan setiap kegiatan.
                                    </p>
                                    <p>
                                        PT DTI didukung oleh team profesional yang berpengalaman dalam melaksanakan
                                        proyek,
                                        siap bersaing dengan perusahaan sejenis. PT DTI siap menjadi mitra bisnis yang
                                        profesional dengan mengedepankan kepuasan mitra bisnis dan semua customer.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 my-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2 class="text-gradient text-success">Visi</h2>
                                </div>
                                <div class="col-12 text-center">
                                    Menjadi perusahaan penyedia alat kesehatan yang handal bermanfaat untuk nkri.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 my-5">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2 class="text-gradient text-success">Misi</h2>
                                </div>
                                <div class="col-12 text-center">
                                    Menyediakan alat kesehatan terpadu dan bermutu ikut andil dalam membantu program
                                    pemerintah dalam meningkatkan tingkat kesehatan rakyat indonesia.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-5">
                        <div class="col-12 col-lg-4 my-auto">
                            <h2 class="text-gradient text-info">Mengapa Bergabung dengan Kami?</h2>
                        </div>
                        <div class="col-12 col-lg-8">
                            <p style="text-align: justify;line-height:30px;">
                                <span class="text-success fw-bold">PT Dharma Tekno Indonesia</span> adalah tempat di
                                mana
                                ide-ide cemerlang menjadi kenyataan. Kami menghargai inovasi, dedikasi, dan semangat
                                kolaboratif dalam menciptakan solusi teknologi yang memimpin industri. Bergabung dengan
                                kami berarti menjadi bagian dari tim yang dinamis dan berorientasi pada pencapaian
                                tinggi.
                            </p>
                            <p>
                                Keuntungan dan Fasilitas, Kami menyediakan paket kompensasi yang kompetitif, peluang
                                pengembangan karir, dan berbagai fasilitas yang mendukung kesejahteraan karyawan. Di PT
                                Dharma Tekno Indonesia, kami percaya bahwa kebahagiaan dan kesejahteraan karyawan adalah
                                kunci keberhasilan perusahaan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="min-vh-50">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3> CARA MELAMAR </h1>
                                <p>Jika Anda tertarik untuk menjadi bagian dari PT Dharma Tekno Indonesia, silakan
                                    telusuri posisi yang tersedia dan kirimkan lamaran Anda melalui formulir yang telah
                                    disediakan. Kami menantikan untuk mengetahui lebih lanjut tentang bakat, pengalaman,
                                    dan keterampilan yang dapat Anda bawa ke perusahaan kami.</p>
                        </div>

                        <div class="col-12 row my-4">
                            <div class="col-12 col-lg-4">
                                <div class="card shadow rounded-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Login</h3>
                                            </div>
                                            <div class="col-12 my-2">
                                                <p>
                                                    Masuk hanya dengan menggunakan email pribadi
                                                </p>
                                            </div>
                                            <div class="col-12 text-end">
                                                <h3>1</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card shadow rounded-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Melengkapi Data Diri</h3>
                                            </div>
                                            <div class="col-12 my-2">
                                                <p>
                                                    Mengisi data diri, posisi yang dilamar dan melengkapi dokumen
                                                </p>
                                            </div>
                                            <div class="col-12 text-end">
                                                <h3>2</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="card shadow rounded-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Cek Status</h3>
                                            </div>
                                            <div class="col-12 my-2">
                                                <p>
                                                    Lakukan cek status secara berkala melalui email yang terhubung
                                                </p>
                                            </div>
                                            <div class="col-12 text-end">
                                                <h3>3</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 row my-5">
                            <div class="col-12">
                                <h3>Perhatian <strong class="text-warning">!!</strong></h3>
                            </div>
                            <div class="col-12">
                                <ol>
                                    <li>Penerimaan Karyawan di PT Dharma Tekno Indonesia tidak dikenakan biaya apapun
                                        (GRATIS).</li>
                                    <li>Perhatikan semua data yang diisikan adalah BENAR. Dan dapat
                                        dipertanggungjawabkan
                                        kebenarannya.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section style="margin-top: 100px;">
            <div class="min-vh-50">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2>Contact Us</h3>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p class="fw-bold">Get in touch:</p>
                            <p>
                                <small><i class="bi bi-geo-alt"></i> 6th. Floor Gedung Manggala Wana Bhakti Blok IV,
                                    Wing Room 602 Jl. Gatot Subroto, Senayan Jakarta Indonesia,</small>
                            </p>
                            <p>
                                <small><i class="bi bi-envelope"></i> hr@dharmatekno.co.id </small>
                            </p>
                            <p>
                                <small><i class="bi bi-telephone"></i> (021) 1234-5678</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>


<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-4 mx-auto text-center">
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    Company
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    About Us
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    Contact Us
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    Sign In
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    Sign Up
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
                    Started
                </a>
            </div>
            <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                    <span class="text-lg fab fa-dribbble"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                    <span class="text-lg fab fa-twitter"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                    <span class="text-lg fab fa-instagram"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                    <span class="text-lg fab fa-pinterest"></span>
                </a>
                <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
                    <span class="text-lg fab fa-github"></span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-8 mx-auto text-center mt-1">
                <p class="mb-0 text-secondary">
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> PT DHARMA TEKNO INDONESIA.
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-3.6.1.js') }}"></script>
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    } <
    script async defer src = "https://buttons.github.io/buttons.js" >
</script>
<script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
@include('sweetalert::alert')
@stack('script')

</html>
