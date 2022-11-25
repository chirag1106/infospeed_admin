<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
    {{-- <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}}"> --}}
    <title>
        Admin Panel
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    {{-- select-2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <style>
        /* chirag */
        .navbar-vertical .navbar-nav .nav-link {
            color: #fff !important;
        }

        .navbar-vertical .navbar-nav>.nav-item .nav-link.active {
            background-color: transparent !important;
            color: #fff !important;
        }

        .navbar-vertical .navbar-nav .nav-link.active {
            border-radius: 0.5rem;
            box-shadow: none !important;
            font-weight: 900 !important;
        }

        .navbar-vertical .navbar-nav>.nav-item .nav-link.active .icon {
            background-image: linear-gradient(#fff, #fff) !important;
        }

        .bg-color-brown {
            background: #7D6F6C !important;
        }

        .card {
            /* box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%); */
            box-shadow: 2px 2px 5px 4px #00000040 !important;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .br-1 {
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;

        }

        @media (max-width: 767.98px) {
            .navbar-collapse .navbar-nav {
                width: auto !important;
            }
        }

        /* Dhruvi */
        .desgin-form h5 {
            font-size: 1rem;
        }

        .text-xxs {
            font-size: 0.80rem !important;
        }

        .input_label {
            font-size: 0.9rem !important;
            text-transform: capitalize !important;
        }

        .btn-success {
            background-color: #50C878 !important;
        }

        .btn-danger {
            background-color: #d63f32 !important;
        }

        .company-logo {
            height: 100%;
            width: 20%;

        }

        .page-item.active .page-link {
            background-color: #7D6F6C;
            border-color: #7D6F6C;
            color: #fff;
            z-index: 3;
        }

        .page-link:focus {
            box-shadow: 0 0 0 0.2rem rgb(149 135 135 / 25%);
            outline: 0;
            z-index: 3;
        }

        .btn-primary-2:focus,
        .btn-primary-2:active {
            background-color: #7D6F6C !important;
            border-color: #7D6F6C !important;
            color: #fff;
        }

        .toggle.ios,
        .toggle-on.ios,
        .toggle-off.ios {
            border-radius: 20px;
        }



        .toggle-off {
            background: #ccc;
        }

        /* .toggle-handle {
            position: relative;
            margin: 0 auto;
            padding-top: 0;
            padding-bottom: 0;
            height: 140%;
            width: 0;
            border-width: 0 1px;
            left: 18px;
            top: -7px;
            transform: scale(0.7);
        } */
        .toggle.ios .toggle-handle {
            border-radius: 20px;
            background-color: #fff;
        }

        /* .btn:hover:not(.btn-icon-only) {
    box-shadow: 0 3px 5px -1px rgb(0 0 0 / 9%), 0 2px 3px -1px rgb(0 0 0 / 7%);
    transform: scale();
} */

        .br-1 {
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
        }

        .navbar-vertical .navbar-brand-img,
        .navbar-vertical .navbar-brand>img {
            max-width: 100% !important;
            max-height: 100% !important;
        }

        .pointer {
            cursor: pointer;
        }

        .fixed-plugin-button {
            display: none;
        }

        .border {
            border: 0;
        }




        /* form-builder */

        .custm-form-control-2 {
            background: #0000;
            border: 0;
            border-radius: 0;
            height: 25px;
            color: var(--theme-secondry-color);
            font-size: var(--font-size-18);
            font-weight: var(--font-weight-medium);
            line-height: var(--line-height-21);
            padding: 0 20px 0 0;
        }

        .m-20 {
            margin-top: -63px;
            margin-left: 68%;
        }

        .side-s-icon {
            position: absolute;
            right: -360px;
            top: 262px;
            background: blue;
            padding: 32px 3px;
            border-radius: 5px;
            color: white;
        }

        .button-box {
            margin: 10px 10px 10px 10px;
            display: block;
        }

        .add_new_brand {
            border: 1px dashed #8f9da6;
            height: 100%;
            border-radius: 5px;
            width: 50%;
            margin: 0px 0px 0px 161px;
        }

        .pb-5,
        .py-5 {
            padding-bottom: 3rem !important;
        }

        .pt-5,
        .py-5 {
            padding-top: 3rem !important;
        }

        .display-hide {
            display: none;
        }


        /***** DHRUVI *****/

        .form-dhruvi .input-groups {
            padding: 32px;
            background: #ffffff;

            border-radius: 16px;
            margin-bottom: 24px
        }

        .form-dhruvi .input-groups .input-inner input {
            width: 100%;
            border: none;
            border-bottom: 2px solid #9ca1be;
            padding: 4px 8px;
            font-size: 24pt;
            line-height: 135%;
            font-family: 'docs-Roboto', Helvetica, Arial, sans-serif;
            letter-spacing: 0;
            color: #000000;
            margin-bottom: 24px;
        }

        .form-dhruvi .input-groups .input-outer input,
        .form-dhruvi .input-groups .input-outer select {
            width: 100%;
            border: none;
            border-bottom: 1px solid #9ca1be;
            padding: 4px 8px;
            font-family: Roboto, Arial, sans-serif;
            font-size: 11pt;
            line-height: 15pt;
            letter-spacing: 0;
            color: #000000;
        }

        .form-dhruvi select:focus {
            box-shadow: none;
            outline: none;
        }


        .form-dhruvi .input-groups .input-inner ::placeholder {

            font-size: 24pt;
            font-family: 'docs-Roboto', Helvetica, Arial, sans-serif;
            letter-spacing: 0;

            color: gray;
            /* Firefox */
        }

        .form-dhruvi .input-groups .input-inner:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            font-size: 24pt;
            font-family: 'docs-Roboto', Helvetica, Arial, sans-serif;
            letter-spacing: 0;

            color: gray;
        }

        .form-dhruvi .input-groups .input-outer ::placeholder {
            font-size: 11pt;
            line-height: 15pt;
            letter-spacing: 0;
            color: gray;
            /* Firefox */
        }


        .form-dhruvi .input-groups .input-outer:-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            font-size: 11pt;
            line-height: 15pt;
            letter-spacing: 0;
            color: gray;
        }

        .form-dhruvi .card .card-body {
            margin-top: 32px;
        }

        .form-dhruvi .p-2 input[type='checkbox'],
        .form-dhruvi .p-2 input[type='radio'] {
            margin-bottom: 0;
        }


        /* .input-groups .input-inner>input:focus {
    border-bottom: 2px solid #7D6F6C;
    outline: none;
    }

    .input-groups .input-outer>input:focus {
    border-bottom: 2px solid #7D6F6C;
    outline: none;
    } */

        .form-dhruvi input:focus {
            outline: none;

        }

        .form-dhruvi .w-100 input {
            margin-bottom: 0 !important;
        }


        .form-dhruvi .que-js-container {
            padding: 32px;
            background: #ffffff;
            padding-bottom: 24px;
            border-radius: 16px;
            margin-bottom: 24px;
            transition: all 300ms;

        }



        .form-dhruvi .table-responsive input {
            width: 65%;
            border: none;
            border-bottom: 1px solid #9ca1be;
            line-height: 24px;
            font-weight: 400;
            font-size: 12pt;
            font-family: 'docs-Roboto', Helvetica, Arial, sans-serif;
            letter-spacing: 0;
            color: #000000;
            padding: 4px 8px;
            margin-bottom: 34px;
        }



        .form-dhruvi .m-20 select {
            width: 100%;
            border: none;
            border-bottom: 1px solid #9ca1be;
            line-height: 24px;
            font-weight: 400;
            font-size: 12pt;
            font-family: 'docs-Roboto', Helvetica, Arial, sans-serif;
            letter-spacing: 0;
            color: #000000;
            padding: 4px 8px;
            color: #7D6F6C;
        }

        .form-dhruvi .p-2 input {
            width: 100%
        }

        .form-dhruvi .option-first {
            float: right;
        }

        .form-dhruvi .d-flex {
            align-items: center;
        }

        .form-dhruvi .removeQuestion {
            float: center;
            border-left: 1px solid #9ca1be;
            padding-left: 24px;
        }

        .form-dhruvi .trashcenter {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding-right: 50px !important;
        }

        .form-dhruvi .card {
            box-shadow: none !important;
        }

        .form-dhruvi .new-button {
            padding: 0px !important;
        }

        .form-dhruvi .add_new_brand {
            width: 100%;
            display: flex;
            justify-content: center;
            border: 0;
            margin: 0 !important;
            transition: all 300ms ease-in;
        }

        .form-dhruvi .material-icons {
            font-size: 32px;
            color: rgb(71, 59, 59);
        }

        .form-dhruvi .btn-primary {
            background: #7D6F6C;
            border: 1px solid #7D6F6C;

        }

        .btn-primary {
            background-color: #7D6F6C;
            border: 1px solid #7D6F6C;
        }

        .btn-primary:hover {
            background: #7D6F6C !important;
            color: #7D6F6C;
            border: 1px solid #7D6F6C;
        }

        .btn-primary-2 {
            background: #7D6F6C;
            border: 1px solid #7D6F6C;

        }

        .btn-primary-2:hover {
            background: #7D6F6C !important;
            color: #fff !important;
            border: 1px solid #7D6F6C;
        }

        .toggle {
            margin: 0 !important;
        }

        .que-js-container .mb-4 {
            margin: 0 !important
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: rgb(71, 59, 59);
        }

        input:focus+.slider {
            box-shadow: 0 0 1px rgb(71, 59, 59);
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .form-dhruvi .btn-primary:hover {
            background: #ffffff;
            color: #7D6F6C;
            border: 1px solid #7D6F6C;
        }

        .form-dhruvi .que-js-container .mb-4 {
            margin: 0 !important
        }

        .form-dhruvi .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 14px;
        }

        .form-dhruvi .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .form-dhruvi .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .form-dhruvi .slider:before {
            position: absolute;
            content: "";
            height: 25px;
            width: 25px;
            left: 0px;
            bottom: -6px;

            background-color: white;
            border: 2px solid #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .form-dhruvi input:checked+.slider {
            background-color: rgb(71, 59, 59);
        }

        .form-dhruvi input:focus+.slider {
            box-shadow: 0 0 1px rgb(71, 59, 59);

        }

        .form-dhruvi input:checked+.slider:before {
            -webkit-transform: translateX(28px);
            -ms-transform: translateX(28px);
            transform: translateX(28px);

        }

        /* Rounded sliders */
        .form-dhruvi .slider.round {
            border-radius: 34px;
        }

        .form-dhruvi .slider.round:before {
            border-radius: 50%;
        }

        .form-dhruvi .trashcenter label {
            margin: 0;
            margin-right: 8px;
        }

        .form-dhruvi .trashcenter i {
            margin-left: 24px;
        }

        .trashcenter label {
            margin: 0;
            margin-right: 4px;
        }

        .form-dhruvi .trashcenter p {
            margin-bottom: 0;
            margin-right: 16px;
        }

        .form-dhruvi .question-container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;


        }

        .form-dhruvi .row {
            justify-content: center;
        }

        @media (max-width: 767px) {
            .form-dhruvi .btn-primary {
                width: 40% !important;
            }
        }

        @media (max-width:575px) {
            .form-dhruvi .que-js-container {
                width: 100%;
                padding: 24px;
            }


            .form-dhruvi .input-groups {
                padding: 24px
            }

            .form-dhruvi .card .card-header {
                padding: 0 !important;
            }

            .form-dhruvi .trashcenter {
                padding-right: 0 !important;
            }

            .form-dhruvi .btn-primary {
                width: 100% !important;
            }


        }
 /* select-2 css */
  .select2-container {
  min-width: 400px;
}

.select2-results__option {
  padding-right: 20px;
  vertical-align: middle;
}
.select2-results__option:before {
  content: "";
  display: inline-block;
  position: relative;
  height: 20px;
  width: 20px;
  border: 2px solid #e9e9e9;
  border-radius: 4px;
  background-color: #fff;
  margin-right: 20px;
  vertical-align: middle;
}
.select2-results__option[aria-selected=true]:before {
  font-family:fontAwesome;
  content: "\f00c";
  color: #fff;
  background-color: #f77750;
  border: 0;
  display: inline-block;
  padding-left: 3px;
}
.select2-container--default .select2-results__option[aria-selected=true] {
  background-color: #fff;
}
.select2-container--default .select2-results__option--highlighted[aria-selected] {
  background-color: #eaeaeb;
  color: #272727;
}
.select2-container--default .select2-selection--multiple {
  margin-bottom: 10px;
}
.select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
  border-radius: 4px;
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
  border-color: #f77750;
  border-width: 2px;
}
.select2-container--default .select2-selection--multiple {
  border-width: 2px;
}
.select2-container--open .select2-dropdown--below {
  
  border-radius: 6px;
  box-shadow: 0 0 10px rgba(0,0,0,0.5);

}
.select2-selection .select2-selection--multiple:after {
  content: 'hhghgh';
}
/* select with icons badges single*/
.select-icon .select2-selection__placeholder .badge {
  display: none;
}
.select-icon .placeholder {
/*  display: none; */
}
.select-icon .select2-results__option:before,
.select-icon .select2-results__option[aria-selected=true]:before {
  display: none !important;
  /* content: "" !important; */
}
.select-icon  .select2-search--dropdown {
  display: none;
}
.select2-selection__clear{
display: none;
}
    </style>

</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
    {{-- @auth --}}
    @yield('auth')
    {{-- @endauth
  @guest
    @yield('guest')
  @endguest --}}

    @if(session()->has('success'))
    <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show" class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
        <p class="m-0">{{ session('success')}}</p>
    </div>
    @endif
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js')}}"></script>
    @stack('rtl')
    @stack('dashboard')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>


    <script>
        $(document).on('change', '.ls_name', function() {
            //console.log('{{URL('/oksabha-post-vidhan-get')}}'); for dd
            var id = $(this).val();
            var type = $(this).data('type');
            console.log(type);
            var op = "";
            var csrf = $("[name=_token]").val();
            var url = "{{route('get_dropdowns', [':type',':id'])}}";
            url = url.replace(':type', type);
            url = url.replace(':id', id);
            $.ajax({
                url: url,

                method: "get",
                // data: {
                //   "ls_name": val,
                // },
                dataType: 'json',
                success: function(data) {
                    // alert(type);
                    if (type == "lok") {
                        op += '<option value="">Choose vidhan</option>';
                        for (i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].vs_name + '</option>';
                        }
                        $(".vs_name").html(" ");
                        $(".vs_name").append(op);
                    } else if (type == "vidhan") {
                        op += '<option value="">Choose Block</option>';
                        for (i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].block_name +
                                '</option>';
                        }
                        $(".block_container").html(" ");
                        $(".block_container").append(op);
                    } else if (type == "block") {
                        op += '<option value="">Choose Mahanagar/Panchayat</option>';
                        for (i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].panchayat_name +
                                '</option>';
                        }
                        $(".panchayat_container").html(" ");
                        $(".panchayat_container").append(op);
                    } else if (type == "village") {
                        op += '<option value="">Choose village</option>';
                        for (i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].id + '">' + data[i].village_name +
                                '</option>';
                        }
                        $(".village_container").html(" ");
                        $(".village_container").append(op);
                    }
                    // console.log(data)
                    if (type == "mahanagar-panchayat") {
                        op += '<option value="">Automatic selected</option>';
                        if (data.panchayat_choosing == 1) {
                            op += '<option value="1" selected>Ward</option>';
                        } else {
                            op += '<option value="2" selected>Village</option>';
                        }
                        $(".ward_village").html(" ");
                        $(".ward_village").append(op);
                        $(".ward_village").trigger('change');
                    }

                },
                error: function() {}
            });
        });
    </script>



    <script>
        $(document).ready(function() {
            $(".list_edit").click(function(e) {
                e.preventDefault();
                var parent = $(this).closest(".actions");
                parent.find(".table-action").hide();
                parent.find(".form-action").show();

                var tableRow = $(this).closest(".table-form");
                tableRow.find(".input_label").addClass("d-none");
                tableRow.find(".form_input").removeClass("d-none");
            });
            $(".edit_cancel").click(function(e) {
                var parent = $(this).closest(".actions");
                parent.find(".table-action").show();
                parent.find(".form-action").hide();

                var tableRow = $(this).closest(".table-form");
                tableRow.find(".input_label").removeClass("d-none");
                tableRow.find(".form_input").addClass("d-none");
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('.toggle-on').mouseenter(function() {
                // if($(this).hasClass('.btn-primary')){
                $(this).addClass('btn-primary-2');
                // }
            });
            $('.toggle-on').mouseleave(function() {
                $(this).removeClass('btn-primary-2');
            });
            $('.toggle').mouseenter(function(e) {
                e.preventDefault();
            })

            setInterval(function() {
                if ($('.sidenav').hasClass('bg-white')) {
                    $('.sidenav').removeClass('bg-white');
                }
            }, 100);

            $('input[type="checkbox"]').change(function(e) {
                e.preventDefault();
                var data_key = $(this).attr('data-key');
                var form_parent = $(this).parent().parent();
                form_parent.submit();
            });
        });
    </script>



      <script>
         $(document).ready(function() {
                $(document).on('change', '.select-value', function() {
                    var val = $(this).val();
                    // alert(val);
                    if (val == 1) {
                        // alert($(this).parents('.check-status').find('.check-input').attr('class'));
                        $(this).parents('.check-status').find('.radio-input').addClass(
                            'display-hide');
                        $(this).parents('.check-status').find('.check-input').removeClass(
                            'display-hide');
                        $(this).parents('.check-status').find('.long-answer').addClass(
                            'display-hide');
                        $(this).parents('.check-status').find('.paragraph').removeClass(
                            'display-hide');
                    } else if (val == 2 ){
                        $(this).parents('.check-status').find('.check-input').addClass(
                            'display-hide');
                        $(this).parents('.check-status').find('.radio-input').removeClass(
                            'display-hide');
                        $(this).parents('.check-status').find('.long-answer').addClass(
                            'display-hide');
                        $(this).parents('.check-status').find('.paragraph').removeClass(
                            'display-hide');
                    }else if (val == 3){
                        $(this).parents('.check-status').find('.check-input').addClass(
                            'display-hide');
                        $(this).parents('.check-status').find('.radio-input').addClass(
                            'display-hide');
                        $(this).parents('.check-status').find('.long-answer').removeClass(
                            'display-hide');
                        $(this).parents('.check-status').find('.paragraph').addClass(
                            'display-hide');
                        }
                });
            });

       
        $(document).ready(function() {
            $(document).on("click", ".addMore", function() {
                var count = ($(this).parents('.adding').prev().find('.check-container1').length) + 1;
                // alert($(this).parent().find('.option-first').attr('class'));
                // alert($(this).parents('.que-js-container').find('.option-first').attr('class'))
                if (count == 1) {
                    $(this).parents('.que-js-container').find('.option-first:first').hide();
                } else {
                    $(this).parents('.que-js-container').find('.option-first:first').show();
                }

                var status = $(this).parents('.check-status').find('.select-value').val();
                var getSection = $(this).closest(".que-js-container").data('count');
                var container = '';
                if (status == 1) {
                    container = '<div class="check-container1">' +
                        '<div class="d-flex flex-row mb-3">' +
                        '<div class="p-2"> <input type="checkbox" class="check-input" disabled><input type="radio" class="radio-input display-hide" disabled></div>' +
                        '<div class="p-2 w-100"> <input type="text" name="section[' + getSection +
                        '][option][]" placeholder="Option ' + count + ' " required></div>' +
                        '<div class="p-2 option-first"> <span class="removeNode"><i class="fa fa-trash" style="color:gray;cursor:pointer;"></i></span></div>' +
                        '</div>' +

                        '</div>';
                } else {
                    container = '<div class="check-container1">' +
                        '<div class="d-flex flex-row mb-3">' +
                        '<div class="p-2"> <input type="checkbox" class="check-input display-hide" disabled><input type="radio" class="radio-input" disabled></div>' +
                        '<div class="p-2 w-100"> <input type="text" name="section[' + getSection +
                        '][option][]" placeholder="Option ' + count + ' " required></div>' +
                        '<div class="p-2 option-first"> <span class="removeNode"><i class="fa fa-trash" style="color:gray;cursor:pointer;"></i></span></div>' +
                        '</div>' +

                        '</div>';
                }

                $(this).parents('.adding').prev().append(container);

            });

            $(document).on("click", ".removeNode", function() {
                var count = ($(this).parents('.adding').prev().find('.check-container1').length) + 1;
                var opt_count = ($(this).parents('.check-active').find('.check-container1').length)
                if (opt_count == 2) {

                    $(this).parents('.que-js-container').find('.option-first').hide();
                } else {
                    $(this).parents('.que-js-container').find('.option-first:first').show();
                }
                $(this).parents(".check-container1").remove();
            });

           


            $(document).on("click", ".addQuestion", function() {
                // alert($(this).parents().find('body'));
                //   alert($(this).parents('.question-container').find('.check-status').length);
                var section = $(".que-js-container").length;
                var question =
                    '<div class="col-lg-9 col-sm-12 que-js-container" data-count="' + section + '">' +
                    '<div class="card mb-4 check-status">' +
                    '<div class="card-header pb-0">' +
                    '<div class="table-responsive p-0">' +
                    '<input type="text" name="section[' + section +
                    '][question]"  placeholder="Question" required>' +
                    '</div>' +
                    '</div>' +
                    '<div class="m-20">' +
                    '<select name="section[' + section +
                    '][check_radio]" class="custom-input form_input select-value">' +
                    '<option value="1">Checkboxes</option>' +
                    '<option value="2">Multiple Choice</option>' +
                    '<option value="3">Long Answer</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="long-answer display-hide">'+
                    '<div class="card-header pb-0">'+
                    '<textarea name="longanswer" class="form-control"></textarea>'+
                    '</div>'+
                    '</div>'+
                    '<div class="card-body px-0 pt-0 pb-2">' +
                    '<div class="table-responsive p-0">' +
                    '<div class="paragraph">'+
                    '<div class="check-active">' +
                    '<div class="add-count">' +
                    '<div class="check-container1">' +
                    '<div class="d-flex flex-row mb-3">' +
                    '<div class="p-2"> <input type="checkbox" class="check-input " disabled><input type="radio" class="radio-input display-hide"  disabled ></div>' +
                    '<div class="p-2 w-100"> <input type="text" name="section[' + section +
                    '][option][]" placeholder="Option 1" ></div>' +
                    '<div class="p-2 option-first display-hide"> <span class="removeNode"><i class="fa fa-trash" style="color:gray;cursor:pointer;"></i></span></div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="d-flex flex-row mb-3 adding">' +
                    '<div class="p-2"> <input type="checkbox" class="check-input" disabled><input type="radio" class="radio-input display-hide" disabled></div>' +
                    '<div class="p-2"> <a href="javascript:;" class="addMore">Add More +</a></div>' +
                    '</div>'+
                    '</div>'+
                    '<hr>' +
                    '<div class="d-flex flex-row ">' +
                    '<div class="p-2 trashcenter"><label class="switch">' +
                    '<input type="checkbox">' +
                    '<span class="slider round"></span>' +
                    '</label>' +
                    '<p>Required</p> <span class="removeQuestion"><i class="fa fa-trash" style="color:rgb(71, 59, 59);cursor:pointer;"></i></span></div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
                $(".question-container").append(question);
            });
            $(document).on("click", ".removeQuestion", function() {
                $(this).parents(".que-js-container").remove();
            });
        });

        $(document).on("click", ".removeNode", function() {
            var count = ($(this).parents('.adding').prev().find('.check-container1').length) + 1;
            var opt_count = ($(this).parents('.check-active').find('.check-container1').length)
            if (opt_count == 2) {

                $(this).parents('.que-js-container').find('.option-first').hide();
            } else {
                $(this).parents('.que-js-container').find('.option-first:first').show();
            }
            $(this).parents(".check-container1").remove();

        });
    </script>
     <script>
    $(".js-select2").select2({
      closeOnSelect : false,
      placeholder : "Add people and group",
      // allowHtml: true,
      allowClear: true,
      tags: true // создает новые опции на лету
    });
</script>

</body>

</html>