@extends('app')
@section('title', 'Account Setting')

@section('content')
    @include('sweetalert::alert')
    <div class="d-flex flex-column flex-column-fluid">
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">

                <!--begin::info akun-->
                <div class="card mb-5 mt-19 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Profile Information</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form id="sendVerification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <script>
                            function sendForm() {
                                document.getElementById("sendVerification").submit();
                            }
                        </script>

                        <form class="form" action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('patch')
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">

                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Name</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-9 fv-row">
                                        <input type="text" name="name"
                                            class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                                            placeholder="Name" value="{{ old('name', $user->name) }}" autocomplete="name" />

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Username</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-9 fv-row">
                                        <input type="text" name="username"
                                            class="form-control form-control-lg form-control-solid @error('username') is-invalid @enderror"
                                            placeholder="Username" value="{{ old('name', $user->username) }}"
                                            autocomplete="username" />

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Email</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-9 fv-row">
                                        <input type="text" name="email"
                                            class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                            placeholder="Email" value="{{ old('email', $user->email) }}" />

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Col-->

                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                        <!--begin::Notice-->
                                        <div
                                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6 mt-6">
                                            <!--begin::Icon-->
                                            <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                <!--begin::Content-->
                                                <div class="mb-3 mb-md-0 fw-semibold">
                                                    <h4 class="text-gray-900 fw-bold">Verify Your New Email</h4>
                                                    <div class="fs-6 text-gray-700 pe-7">
                                                        Please press the <span class="text-primary">Send</span> button, to
                                                        send
                                                        the verification link to your new
                                                        email address
                                                    </div>
                                                </div>
                                                <!--end::Content-->
                                                <!--begin::Action-->
                                                <a href="javascript:void(0);"
                                                    class="btn btn-primary px-6 align-self-center text-nowrap"
                                                    onclick="sendForm()">
                                                    Send
                                                </a>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->

                                        @if (session('status') === 'verification-link-sent')
                                            <!--begin::Notify-->
                                            <div
                                                class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6 mt-6">
                                                <!--begin::Icon-->
                                                <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>
                                                <!--end::Icon-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack flex-grow-1">
                                                    <!--begin::Content-->
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">
                                                            A new verification link has been sent to your email address.
                                                        </div>
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Notify-->
                                        @endif
                                    @endif
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                                    Changes</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::info akun-->

                <!--begin::password akun-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Update Password</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form class="form" action="{{ route('password.update') }}" method="POST">
                            @csrf
                            @method('put')
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Current Password</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-9 fv-row">
                                        <input type="password" name="current_password"
                                            class="form-control form-control-lg form-control-solid @error('current_password') is-invalid @enderror"
                                            placeholder="Current Password" autocomplete="current-password" />

                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">New Password</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-9 fv-row">
                                        <input type="password" name="password"
                                            class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                            placeholder="New Password" autocomplete="new-password" />

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Confirm Password</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-9 fv-row">
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Confirm Password" autocomplete="new-password" />

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">Save Changes</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::password akun-->

                {{-- <!--begin::Delete Account-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_deactivate" aria-expanded="true"
                        aria-controls="kt_account_deactivate">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Delete Account</h3>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_deactivate" class="collapse show">
                        <!--begin::Form-->
                        <form id="kt_account_deactivate_form" class="form" action="{{ route('profile.destroy') }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Notice-->
                                <div
                                    class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    <!--end::Icon-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">Delete Account?</h4>
                                            <div class="fs-6 text-gray-700">
                                                Once your account is deleted, all of its resources and data will be
                                                permanently deleted. Before deleting your account, please download any data
                                                or information that you wish to retain.
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                                <!--begin::Form input row-->
                                <div class="form-check form-check-solid fv-row">
                                    <input name="deactivate" class="form-check-input" type="checkbox" value="1"
                                        id="deactivate" />
                                    <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my
                                        account deactivation</label>
                                </div>
                                <!--end::Form input row-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Card footer-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button id="kt_account_deactivate_account_submit" type="submit"
                                    class="btn btn-danger fw-semibold">Delete Account</button>
                            </div>
                            <!--end::Card footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Delete Account--> --}}


            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection

@push('custom-javascript')
    {{-- <script src="assets/js/custom/account/settings/deactivate-account.js"></script> --}}
@endpush
