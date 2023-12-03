<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<head>
    <title>{{ config('app.name', 'Laravel') }} | Reset Password</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/media/favicon.ico') }}" />
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
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank">
    <!--begin::Theme mode setup on page load-->
    @include('sweetalert::alert')
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
        <!--begin::Authentication - New password -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center"
                style="background-image: url({{ asset('assets/media/misc/auth-bg.png') }})">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center p-6 p-lg-10 w-100">
                    <!--begin::Logo-->
                    <a href="{{ url('/') }}" class="mb-0 mb-lg-20">
                        <img alt="Logo" src="{{ asset('assets/media/logos/default-white.svg') }}"
                            class="h-40px h-lg-50px" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Image-->
                    <img class="d-none d-lg-block mx-auto w-300px w-lg-75 w-xl-500px mb-10 mb-lg-20"
                        src="{{ asset('assets/media/misc/auth-screens.png') }}" alt="" />
                    <!--end::Image-->
                </div>
                <!--end::Content-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10">
                <!--begin::Form-->
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" method="POST"
                            action="{{ route('password.store') }}">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <input type="hidden" name="email" value="{{ old('email', $request->email) }}">
                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3">Setup New Password</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-500 fw-semibold fs-6">Have you already reset the password ?
                                    <a href="{{ route('login') }}" class="link-primary fw-bold">Sign in</a>
                                </div>
                                <!--end::Link-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input
                                            class="form-control bg-transparent @error('password') is-invalid @enderror"
                                            type="password" placeholder="New Password" name="password"
                                            autocomplete="new-password" />

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <span
                                            class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                            data-kt-password-meter-control="visibility">
                                            <i class="ki-duotone ki-eye-slash fs-2"></i>
                                            <i class="ki-duotone ki-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <!--end::Input wrapper-->
                                    <!--begin::Meter-->
                                    <div class="d-flex align-items-center mb-3"
                                        data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                        </div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                    <!--end::Meter-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Hint-->
                                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &
                                    symbols.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Input group=-->
                            <!--end::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Repeat Password-->
                                <input type="password" placeholder="Password Confirmation"
                                    name="password_confirmation" autocomplete="new-password"
                                    class="form-control bg-transparent @error('password_confirmation') is-invalid @enderror" />

                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!--end::Repeat Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Action-->
                            <div class="d-grid mb-10">
                                <button type="submit" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Submit</span>
                                    <!--end::Indicator label-->
                                </button>
                            </div>
                            <!--end::Action-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - New password-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/js/custom/authentication/reset-password/new-password.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
