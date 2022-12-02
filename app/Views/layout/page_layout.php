<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= App_Name; ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    
    <link href="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/images/favicon.svg') ?>" rel="shortcut icon" type="image/x-icon">
    <!-- <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"> -->
    <script src="<?= base_url('assets/vendors/jquery/jquery.min.js') ?>"></script>

    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
</head>
<?php $session = session(); ?>
<body id="page-top">
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active">
                            <a href="<?= base_url('home') ?>" class='sidebar-link'>
                                <svg class="bi" width="1em" height="1em" fill="currentColor">
                                    <use
                                        xlink:href="<?= base_url('assets/vendors/bootstrap-icons/bootstrap-icons.svg#house-door-fill') ?>" />
                                </svg>
                                <span>Home</span>
                            </a>
                        </li>

                        <!-- <li class="sidebar-item active has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Layouts</span>
                            </a>
                            <ul class="submenu active">
                                <li class="submenu-item ">
                                    <a href="layout-default.html">Default Layout</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-1-column.html">1 Column</a>
                                </li>
                                <li class="submenu-item active">
                                    <a href="layout-vertical-navbar.html">Vertical with Navbar</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-horizontal.html">Horizontal Menu</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3 mt-2">
                                            <h6 class="mb-0 text-gray-600"><?= $session->get('full_name') ?></h6>
                                            <!-- <p class="mb-0 text-sm text-gray-600">Administrator</p> -->
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="<?= base_url('profile') ?>"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url('logout') ?>"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                <div class="page-heading">
                    <?= $this->renderSection('content') ?>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                                by <a href="https://ahmadsaugi.com">Saugi</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    
    <script src="<?= base_url('assets/vendors/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <script src="<?= base_url('assets/js/js.min.js') ?>"></script>

    <!-- filepond validation -->
    <!-- <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script> -->

    <!-- image editor -->
    <!-- <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
 -->
<!-- filepond -->
<!-- <script src="https://unpkg.com/filepond/dist/filepond.js"></script> -->
<script>
    // register desired plugins...
	// FilePond.registerPlugin(
    //     // validates the size of the file...
    //     FilePondPluginFileValidateSize,
    //     // validates the file type...
    //     FilePondPluginFileValidateType,

    //     // calculates & dds cropping info based on the input image dimensions and the set crop ratio...
    //     FilePondPluginImageCrop,
    //     // preview the image file type...
    //     FilePondPluginImagePreview,
    //     // filter the image file
    //     FilePondPluginImageFilter,
    //     // corrects mobile image orientation...
    //     FilePondPluginImageExifOrientation,
    //     // calculates & adds resize information...
    //     FilePondPluginImageResize,
    // );

    // Filepond: Image Preview
    // FilePond.create( document.querySelector('.image-preview-filepond'), { 
    //     allowImagePreview: true, 
    //     allowImageFilter: false,
    //     allowImageExifOrientation: false,
    //     allowImageCrop: false,
    //     acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
    //     fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
    //         // Do custom type detection here and return with promise
    //         resolve(type);
    //         return source;
    //         // document.querySelector('input[type="hidden"]').value = source;
    //     })
    // });

</script>    

    <!-- Page level custom scripts -->
    <script>
        // document.querySelector('input[type="file"]').onchange = (e) => {
        //     const reader = new FileReader();
        //     reader.onloadend = () => {
        //         document.querySelector('input[type="hidden"]').value = reader.result;
        //         console.log(reader.result);
        //     };
        //     reader.readAsDataURL(e.target.files[0]);
        // };

        $(document).ready(function () {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ]
            }); // ID From dataTable with Hover

            table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        });
    </script>
</body>

</html>