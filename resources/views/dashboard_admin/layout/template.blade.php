<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>DL | Admin</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="icon" href="{{ asset('users/themes') }}/images/pwhlogo3.png" />
    <meta name="theme-color" content="#ffffff" />
    <script src="{{ asset('admins/themes') }}/vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('admins/themes') }}/assets/js/config.js"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('admins/themes') }}/vendors/simplebar/simplebar.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('admins/themes') }}/../../../unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link href="{{ asset('admins/themes') }}/assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet"
        id="style-rtl" />
    <link href="{{ asset('admins/themes') }}/assets/css/theme.min.css" type="text/css" rel="stylesheet"
        id="style-default" />
    <link href="{{ asset('admins/themes') }}/assets/css/user-rtl.min.css" type="text/css" rel="stylesheet"
        id="user-style-rtl" />
    <link href="{{ asset('admins/themes') }}/assets/css/user.min.css" type="text/css" rel="stylesheet"
        id="user-style-default" />
    <link href="{{ asset('admins/themes') }}/assets/css/formUser.css" type="text/css" rel="stylesheet" />
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById("style-default");
            var userLinkDefault = document.getElementById("user-style-default");
            linkDefault.setAttribute("disabled", true);
            userLinkDefault.setAttribute("disabled", true);
            document.querySelector("html").setAttribute("dir", "rtl");
        } else {
            var linkRTL = document.getElementById("style-rtl");
            var userLinkRTL = document.getElementById("user-style-rtl");
            linkRTL.setAttribute("disabled", true);
            userLinkRTL.setAttribute("disabled", true);
        }
    </script>
    <link href="{{ asset('admins/themes') }}/vendors/leaflet/leaflet.css" rel="stylesheet" />
    <link href="{{ asset('admins/themes') }}/vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet" />
    <link href="{{ asset('admins/themes') }}/vendors/leaflet.markercluster/MarkerCluster.Default.css"
        rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    {{-- Data Tables CDN --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

    {{-- Bootstrap Icon CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <main class="main" id="top">
        @include('dashboard_admin.layout.navbar')

        <div class="content">
            @yield('content')
            @include('dashboard_admin.layout.footer')
        </div>


    </main>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->

    <script>
        var navbarTopShape = window.config.config.phoenixNavbarTopShape;
        var navbarPosition = window.config.config.phoenixNavbarPosition;
        var body = document.querySelector("body");
        var navbarDefault = document.querySelector("#navbarDefault");
        var navbarTop = document.querySelector("#navbarTop");
        var topNavSlim = document.querySelector("#topNavSlim");
        var navbarTopSlim = document.querySelector("#navbarTopSlim");
        var navbarCombo = document.querySelector("#navbarCombo");
        var navbarComboSlim = document.querySelector("#navbarComboSlim");
        var dualNav = document.querySelector("#dualNav");

        var documentElement = document.documentElement;
        var navbarVertical = document.querySelector(".navbar-vertical");

        if (navbarPosition === "dual-nav") {
            topNavSlim.remove();
            navbarTop.remove();
            navbarVertical.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarDefault.remove();
            dualNav.removeAttribute("style");
            documentElement.classList.add("dual-nav");
        } else if (navbarTopShape === "slim" && navbarPosition === "vertical") {
            navbarDefault.remove();
            navbarTop.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            topNavSlim.style.display = "block";
            navbarVertical.style.display = "inline-block";
            body.classList.add("nav-slim");
        } else if (navbarTopShape === "slim" && navbarPosition === "horizontal") {
            navbarDefault.remove();
            navbarVertical.remove();
            navbarTop.remove();
            topNavSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarTopSlim.removeAttribute("style");
            body.classList.add("nav-slim");
        } else if (navbarTopShape === "slim" && navbarPosition === "combo") {
            navbarDefault.remove();
            //- navbarVertical.remove();
            navbarTop.remove();
            topNavSlim.remove();
            navbarCombo.remove();
            navbarTopSlim.remove();
            navbarComboSlim.removeAttribute("style");
            navbarVertical.removeAttribute("style");
            body.classList.add("nav-slim");
        } else if (navbarTopShape === "default" && navbarPosition === "horizontal") {
            navbarDefault.remove();
            topNavSlim.remove();
            navbarVertical.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarTop.removeAttribute("style");
            documentElement.classList.add("navbar-horizontal");
        } else if (navbarTopShape === "default" && navbarPosition === "combo") {
            topNavSlim.remove();
            navbarTop.remove();
            navbarTopSlim.remove();
            navbarDefault.remove();
            navbarComboSlim.remove();
            navbarCombo.removeAttribute("style");
            navbarVertical.removeAttribute("style");
            documentElement.classList.add("navbar-combo");
        } else {
            topNavSlim.remove();
            navbarTop.remove();
            navbarTopSlim.remove();
            navbarCombo.remove();
            navbarComboSlim.remove();
            navbarDefault.removeAttribute("style");
            navbarVertical.removeAttribute("style");
        }

        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
        var navbarTop = document.querySelector(".navbar-top");
        if (navbarTopStyle === "darker") {
            navbarTop.classList.add("navbar-darker");
        }

        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
        var navbarVertical = document.querySelector(".navbar-vertical");
        if (navbarVerticalStyle === "darker") {
            navbarVertical.classList.add("navbar-darker");
        }
    </script>
    <script src="{{ asset('admins/themes') }}/vendors/popper/popper.min.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/anchorjs/anchor.min.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/is/is.min.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/fontawesome/all.min.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/lodash/lodash.min.js"></script>
    <script src="{{ asset('admins/themes') }}/../../../polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
    <script src="{{ asset('admins/themes') }}/vendors/list.js/list.min.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/dayjs/dayjs.min.js"></script>
    <script src="{{ asset('admins/themes') }}/assets/js/phoenix.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/echarts/echarts.min.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/leaflet/leaflet.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="{{ asset('admins/themes') }}/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js">
    </script>
    <script src="{{ asset('admins/themes') }}/assets/js/ecommerce-dashboard.js"></script>
    <script src="{{ asset('admins/themes') }}/assets/js/form-user.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        const quilleditberita = new Quill('#quilleditberita', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }], // Color and background color
                    ['link'],
                    ['clean']
                ]
            },
        });

        quilleditberita.clipboard.dangerouslyPasteHTML(document.getElementById('isi_berita').value);

        function sendDataEditBerita() {
            document.getElementById('isi_berita').value = quilleditberita.root.innerHTML;
        }
    </script>
    <script>
        const quilleditloker = new Quill('#quilleditloker', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }], // Color and background color
                    ['link'],
                    ['clean']
                ]
            },
        });

        quilleditloker.clipboard.dangerouslyPasteHTML(document.getElementById('deskripsi_loker').value);

        function sendDataEditLoker() {
            document.getElementById('deskripsi_loker').value = quilleditloker.root.innerHTML;
        }
    </script>
    <script>
        const quilledituser = new Quill('#quilledituser', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }], // Color and background color
                    ['link'],
                    ['clean']
                ]
            },
        });

        quilledituser.clipboard.dangerouslyPasteHTML(document.getElementById('deskripsi_diri').value);

        function sendDataEditUser() {
            document.getElementById('deskripsi_diri').value = quilledituser.root.innerHTML;
        }
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>
