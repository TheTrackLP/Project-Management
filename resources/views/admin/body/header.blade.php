<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/styles.css')}}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/2.3.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.bootstrap5.min.js"></script>

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

    <!-- Moment -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>

    <!-- Validate -->
    <script src="{{ asset('assets/js/validate.min.js') }}"></script>
</head>

<style>
td,
p {
    margin: 0;
}

label {
    font-weight: bold;
}

.sb-sidenav .nav-link {
    color: #adb5bd;
    padding: 12px 18px;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.sb-sidenav .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
    color: #fff;
    transform: translateX(5px);
}

.sb-sidenav .nav-link.active {
    background-color: #0d6efd;
    color: #fff !important;
    font-weight: 500;
}
</style>

<body class="sb-nav-fixed" style="background-color: #eaeaea">
    @include('admin.body.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('admin.body.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('admin')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/scripts.js')}}"></script>
    <script src="{{ asset('assets/js/filter.js')}}"></script>
</body>
<script>
@if(Session::has('message'))
var type = "{{ Session::get('alert-type','info') }}"
switch (type) {
    case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

    case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

    case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

    case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
}
@endif

$(document).ready(function() {
    $('.summernote').summernote({
        height: 300,
    });
    $(".select2").select2({
        width: "100%",
        placeholder: "Select an option",
        theme: 'bootstrap-5'
    });
    $(".modalSelect2").each(function() {
        var $this = $(this);
        $this.select2({
            width: "100%",
            theme: 'bootstrap-5',
            placeholder: "Select an option",
            dropdownParent: $this.closest('.modal'),
        });
    })
});
</script>

</html>