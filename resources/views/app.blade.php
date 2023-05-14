<!DOCTYPE html>
<html
lang="en"
class="light-style"
dir="ltr"
data-theme="theme-default"
data-assets-path="../../assets/"
data-template="horizontal-menu-template"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
        />

        <!-- Icons -->
        <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
        <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="../../assets/css/demo.css" />

        <!-- From ProfileS -->

        <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/tagify/tagify.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/sweetalert2/sweetalert2.css">
        <link rel="stylesheet" href="../../assets/vendor/libs/animate-css/animate.css">
        <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css" />


        <!-- Page CSS -->
        <!-- Page CSS -->
        <link rel="stylesheet" href="../../assets/vendor/css/pages/page-profile.css" />
        <link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-help-center.css" />
    <!-- Helpers -->
        <script type="application/javascript" src="../../assets/vendor/js/helpers.js"></script>

        <link rel="stylesheet" href="../../assets/vendor/css/pages/page-misc.css" />

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
        <script type="application/javascript" src="../../assets/vendor/js/template-customizer.js"></script>
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script type="application/javascript" src="../../assets/js/config.js"></script>

        @routes
        @vite('resources/js/app.js')

        @inertiaHead

    </head>
    <body>

        @inertia
        @vite('resources/js/assets.js')
        <script>


        </script>
{{--        <div id="app" data-page="{{json_encode($page)}}"></div>--}}
{{--        <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>--}}
{{--        <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>--}}
{{--        <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>--}}
{{--        <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>--}}
{{--        <script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>--}}
{{--        <script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>--}}
{{--        <script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>--}}

{{--        <script src="{{asset('assets/vendor/js/menu.js')}}"></script>--}}
{{--        <!-- endbuild -->--}}

{{--        <!-- Vendors JS -->--}}
{{--        <script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>--}}

{{--        <!-- Main JS -->--}}
{{--        <script src="{{asset('assets/js/main.js')}}"></script>--}}

{{--        <!-- Page JS -->--}}
{{--        <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/jquery/jquery.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/popper/popper.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/js/bootstrap.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/hammer/hammer.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/i18n/i18n.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>--}}

{{--        <script type="application/javascript" src="../../assets/vendor/js/menu.js"></script>--}}
{{--        <!-- endbuild -->--}}

{{--        <!-- Vendors JS -->--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/select2/select2.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/moment/moment.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/tagify/tagify.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>--}}


{{--        <!-- From Profile JS -->--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/datatables/jquery.dataTables.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js"></script>--}}

{{--        <!-- Main JS -->--}}
{{--        <script type="application/javascript" src="../../assets/js/main.js"></script>--}}

{{--        <!-- Page JS -->--}}
{{--        <script type="application/javascript" src="../../assets/js/dashboards-analytics.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/js/extended-ui-perfect-scrollbar.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/js/form-validation.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>--}}
{{--        <script type="application/javascript" src="../../assets/js/extended-ui-sweetalert2.js"></script>--}}
{{--        <script>--}}
{{--            $(function() {--}}

{{--                @if(Session::has('success'))--}}
{{--                Swal.fire({--}}
{{--                    icon: 'success',--}}
{{--                    title: 'Great!',--}}
{{--                    text: '{{ Session::get("success") }}'--}}
{{--                })--}}

{{--                @endif--}}

{{--                @if(count($errors)>0)--}}

{{--                Swal.fire({--}}
{{--                    icon: 'error',--}}
{{--                    title: 'Oops...',--}}
{{--                    @foreach($errors->all() as $error)--}}
{{--                    text: '{{$error}}'--}}
{{--                    @endforeach--}}


{{--                })--}}
{{--                @endif--}}
{{--            });--}}

{{--            $('#confirm-text').on('click', function (e) {--}}
{{--                e.preventDefault();--}}
{{--                let id = $(this).data('id');--}}
{{--                Swal({--}}
{{--                    title: 'Are you sure ?',--}}
{{--                    text: "You won't be able to revert this !",--}}
{{--                    icon: 'warning',--}}
{{--                    showCancelButton: true,--}}
{{--                    confirmButtonText: 'Yes, delete it!'--}}
{{--                }).then((result) => {--}}
{{--                    if (result.isConfirmed) {--}}
{{--                        $('#confirm-text').submit();--}}
{{--                    }--}}
{{--                })--}}
{{--            });--}}
{{--        </script>--}}
    </body>
</html>
