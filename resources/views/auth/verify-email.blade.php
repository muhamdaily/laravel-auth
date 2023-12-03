<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<head>
    <title>{{ config('app.name', 'Laravel') }} | Verification Email</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/favicon.ico" />
    <meta name="theme-color" content="#ffffff">
    <meta name="color-scheme" content="light">

    <!-- Primary Meta Tags -->
    <meta name="keywords" content="Muhammad Mauribi, MuhamDaily, MuhamPedia, Laravel Breeze, Authentication" />
    <meta name="author" content="Muhammad Mauribi" />
    <meta name="title" content="Laravel - Authentication" />
    <meta name="description"
        content="Starter pack for building websites using Laravel Breeze which has been modified with Keed Admin integration." />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://demo.muhamdaily.com" />
    <meta property="og:author" content="Muhammad Mauribi" />
    <meta property="og:title" content="Laravel - Authentication" />
    <meta property="og:description"
        content="Starter pack for building websites using Laravel Breeze which has been modified with Keed Admin integration." />
    <meta property="og:image" content="{{ asset('assets/media/logo.png') }}" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://demo.muhamdaily.com" />
    <meta property="twitter:title" content="Laravel - Authentication" />
    <meta property="twitter:description"
        content="Starter pack for building websites using Laravel Breeze which has been modified with Keed Admin integration." />
    <meta property="twitter:image" content="{{ asset('assets/media/logo.png') }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    {{-- @include('sweetalert::alert') --}}
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('assets/media/auth/bg16.jpg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('assets/media/auth/bg16-dark.jpg');
            }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Signup Welcome Message -->
        <div class="d-flex flex-column flex-center flex-column-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center text-center p-10">
                <!--begin::Wrapper-->
                <div class="card card-flush w-lg-650px py-5">
                    <div class="card-body py-15 py-lg-10">
                        <!--begin::Logo-->
                        <div class="mb-14">
                            <a href="javascript:void(0);" onclick="submitForm()">
                                <img alt="Logo" src="assets/media/logos/default-small.svg" class="h-40px" />
                            </a>

                            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>

                            <script>
                                function submitForm() {
                                    document.getElementById("logoutForm").submit();
                                }
                            </script>
                        </div>
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h1 class="fw-bolder text-gray-900 mb-5">Verify your email</h1>
                        <!--end::Title-->
                        <!--begin::Action-->
                        <div class="fs-6 mb-8">
                            <p class="fw-semibold text-gray-500">Please check your email address for verification!</p>

                            <span class="fw-semibold text-gray-500">Did’t receive an email?</span>
                            <a href="javascript:void(0);" class="link-primary fw-bold" onclick="resendForm()">Try
                                Again</a>

                            <form id="resend" action="{{ route('verification.send') }}" method="POST">
                                @csrf
                            </form>

                            <script>
                                function resendForm() {
                                    document.getElementById("resend").submit();
                                }
                            </script>
                        </div>
                        <!--end::Action-->
                        <!--begin::Link-->
                        <div class="mb-11">
                            <a href="javascript:void(0);" class="btn btn-sm btn-primary" onclick="submitForm()">Skip for
                                now</a>

                            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>

                            <script>
                                function submitForm() {
                                    document.getElementById("logoutForm").submit();
                                }
                            </script>
                        </div>
                        <!--end::Link-->
                        <!--begin::Illustration-->
                        <div class="mb-0">
                            <img src="assets/media/auth/verify-email.png" class="mw-100 mh-300px theme-light-show"
                                alt="" />
                            <img src="assets/media/auth/verify-email-dark.png" class="mw-100 mh-300px theme-dark-show"
                                alt="" />
                        </div>
                        <!--end::Illustration-->
                    </div>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Signup Welcome Message-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
