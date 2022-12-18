<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/') }}vendors/feather/feather.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/') }}css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/') }}images/logo-mini.svg" />
    {{-- custom css --}}
    <style>
        .content-wrapper{
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' preserveAspectRatio='none' viewBox='0 0 1280 720'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1258%26quot%3b)' fill='none'%3e%3crect width='1280' height='720' x='0' y='0' fill='url(%23SvgjsLinearGradient1259)'%3e%3c/rect%3e%3cpath d='M632.934%2c811.004C693.742%2c809.149%2c737.788%2c757.467%2c764.376%2c702.749C787.464%2c655.235%2c781.497%2c602.017%2c757.303%2c555.057C730.412%2c502.862%2c691.648%2c447.988%2c632.934%2c447.622C573.842%2c447.253%2c534.496%2c501.803%2c505.848%2c553.488C478.332%2c603.13%2c461.713%2c660.316%2c486.831%2c711.213C514.805%2c767.897%2c569.752%2c812.931%2c632.934%2c811.004' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1298.5175716698488 657.477695301922L1329.1113541639158 573.4219687237667 1187.7308730496493 569.5591582717439z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M641.81%2c321.368C688.629%2c322.505%2c740.786%2c320.191%2c766.553%2c281.084C794.283%2c238.998%2c786.358%2c183.805%2c761.239%2c140.111C736.031%2c96.262%2c692.387%2c63.748%2c641.81%2c64.092C591.753%2c64.433%2c549.054%2c97.728%2c525.166%2c141.719C502.394%2c183.654%2c501.149%2c235.248%2c527.135%2c275.271C551.181%2c312.305%2c597.667%2c320.296%2c641.81%2c321.368' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M-29.414%2c454.839C-9.456%2c454.564%2c6.814%2c441.188%2c17.31%2c424.21C28.503%2c406.104%2c35.33%2c384.376%2c25.963%2c365.262C15.545%2c344.002%2c-5.739%2c328.798%2c-29.414%2c328.864C-52.992%2c328.929%2c-73.6%2c344.538%2c-84.261%2c365.568C-93.993%2c384.765%2c-89.686%2c407.189%2c-78.419%2c425.527C-67.739%2c442.909%2c-49.813%2c455.12%2c-29.414%2c454.839' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M207.023%2c224.092C235.152%2c223.056%2c262.251%2c211.697%2c276.871%2c187.644C292.061%2c162.652%2c292.934%2c131.477%2c278.918%2c105.808C264.296%2c79.03%2c237.531%2c59.376%2c207.023%2c59.723C177.024%2c60.064%2c153.243%2c81.628%2c137.905%2c107.412C122.135%2c133.922%2c111.935%2c166.6%2c127.656%2c193.139C143.168%2c219.325%2c176.609%2c225.212%2c207.023%2c224.092' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M547.8842117713264 512.9985160697273L405.80220374342946 640.6847553598383 563.6915975524328 695.0504334938445z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M609.063%2c751.011C650.44%2c751.331%2c691.924%2c734.564%2c712.325%2c698.565C732.486%2c662.989%2c725.068%2c619.163%2c703.454%2c584.45C683.128%2c551.806%2c647.465%2c534.743%2c609.063%2c532.721C566.089%2c530.458%2c518.191%2c536.806%2c495.727%2c573.512C472.576%2c611.341%2c484.663%2c659.607%2c508.531%2c696.988C530.474%2c731.354%2c568.29%2c750.696%2c609.063%2c751.011' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M329.583%2c240.651C378.426%2c238.414%2c422.903%2c214.937%2c448.818%2c173.476C476.519%2c129.157%2c488.03%2c73.498%2c462.599%2c27.839C436.594%2c-18.85%2c383.025%2c-40.207%2c329.583%2c-40.598C275.366%2c-40.994%2c221.681%2c-20.238%2c193.155%2c25.869C163.173%2c74.33%2c159.247%2c137.237%2c189.801%2c185.339C218.597%2c230.673%2c275.932%2c243.108%2c329.583%2c240.651' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M906.084%2c769.278C950.031%2c767.208%2c972.768%2c721.411%2c993.64%2c682.681C1012.998%2c646.76%2c1033.612%2c605.619%2c1013.377%2c570.184C993.039%2c534.568%2c947.01%2c526.667%2c906.084%2c529.353C870.166%2c531.711%2c839.998%2c552.449%2c820.697%2c582.832C799.574%2c616.082%2c786.574%2c655.845%2c802.976%2c691.66C822.175%2c733.581%2c860.027%2c771.447%2c906.084%2c769.278' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M129.27615522030214 435.4620983842907L48.30626163423017 510.9677456762639 204.78180251227536 516.4319919703627z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M9.856265035764707 751.0847517326876L181.11891472639815 682.0799367652559 55.682978420355965 580.5039183557569z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M552.046%2c367.228C591.013%2c365.346%2c617.347%2c332.51%2c637.284%2c298.977C657.844%2c264.397%2c675.706%2c224.679%2c658.389%2c188.367C638.967%2c147.64%2c597.131%2c118.437%2c552.046%2c120.239C509.272%2c121.949%2c479.727%2c158.604%2c459.476%2c196.319C440.557%2c231.554%2c432.202%2c272.794%2c451.249%2c307.96C471.145%2c344.693%2c510.32%2c369.243%2c552.046%2c367.228' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1283.88%2c602.073C1359.779%2c601.192%2c1430.212%2c561.362%2c1467.542%2c495.272C1504.282%2c430.227%2c1502.252%2c349.345%2c1462.275%2c286.238C1424.825%2c227.121%2c1353.842%2c206.984%2c1283.88%2c205.346C1210.125%2c203.62%2c1130.602%2c215.669%2c1090.408%2c277.533C1047.177%2c344.071%2c1052.051%2c431.465%2c1092.682%2c499.622C1132.365%2c566.188%2c1206.388%2c602.972%2c1283.88%2c602.073' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M260.792%2c698.416C292.343%2c699.271%2c319.894%2c679.068%2c335.864%2c651.843C352.045%2c624.259%2c356.903%2c589.935%2c340.548%2c562.453C324.503%2c535.491%2c292.081%2c523.366%2c260.792%2c525.694C233.142%2c527.751%2c212.774%2c548.764%2c199.246%2c572.966C186.12%2c596.448%2c180.601%2c623.806%2c192.45%2c647.957C205.818%2c675.205%2c230.453%2c697.594%2c260.792%2c698.416' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M233.73%2c631.609C259.7%2c631.926%2c284.381%2c620.438%2c298.528%2c598.657C314.108%2c574.67%2c320.222%2c544.314%2c306.851%2c519.029C292.691%2c492.252%2c264.02%2c476.214%2c233.73%2c476.119C203.276%2c476.024%2c173.719%2c491.476%2c159.81%2c518.568C146.85%2c543.811%2c156.084%2c573.361%2c171.613%2c597.109C185.506%2c618.355%2c208.347%2c631.299%2c233.73%2c631.609' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1258'%3e%3crect width='1280' height='720' fill='white'%3e%3c/rect%3e%3c/mask%3e%3clinearGradient x1='10.94%25' y1='-19.44%25' x2='89.06%25' y2='119.44%25' gradientUnits='userSpaceOnUse' id='SvgjsLinearGradient1259'%3e%3cstop stop-color='%230e2a47' offset='0'%3e%3c/stop%3e%3cstop stop-color='rgba(0%2c 12%2c 158%2c 1)' offset='1'%3e%3c/stop%3e%3c/linearGradient%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e");
        }
        .auth-form-light{
            border-radius: 1rem;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <div class="row justify-content-between">
                                    <img src="{{ asset('/') }}images/logo2.png" alt="logo-sekolah">
                                    <h3 class="mt-2">X</h3>
                                    <img src="{{ asset('/') }}images/logo.svg" alt="logo">
                                </div>
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">{{ __('Login') }} to continue.</h6>
                            <form method="POST" action="{{ route('login') }}" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="Email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        >{{ __('Login') }}</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    @if (Route::has('remember'))
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    @endif
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="auth-link text-black">{{ __('Forgot Your Password?') }}</a>
                                    @endif
                                </div>
                                @if (Route::has('register'))
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="{{ route('register') }}" class="text-primary">{{ __('Register') }}</a>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/') }}vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('/') }}js/off-canvas.js"></script>
    <script src="{{ asset('/') }}js/hoverable-collapse.js"></script>
    <script src="{{ asset('/') }}js/template.js"></script>
    <!-- endinject -->
</body>

</html>
