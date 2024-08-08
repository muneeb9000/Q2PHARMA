<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="{{ asset('admin/assets/images/brand-logos/logo.jpg') }}" type="image/x-icon">
    <link id="style" href="{{ asset('admin/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/styles.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet">
    <script src="{{ asset('admin/assets/js/authentication-main.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-5 d-flex justify-content-center">
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('admin/assets/images/brand-logos/logo.jpg') }}" alt="logo"
                            class="desktop-logo">
                        <img src="{{ asset('admin/assets/images/brand-logos/logo.jpg') }}" alt="logo"
                            class="desktop-dark">
                    </a>
                </div>
                <div class="card custom-card">
                    <div class="card-body p-5">
                        <h5 class="fw-bold mb-2 text-center">QPharma Medicine Distribution</h5>
                        <p class="fw-semibold mb-4 text-muted op-7 fw-normal text-center">Welcome to Admin Portal</p>

                        <!-- Display validation errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="signin-email" class="form-label text-default">Email</label>
                                    <input type="email" class="form-control form-control-lg" id="signin-email"
                                        name="email" placeholder="Email" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signin-password" class="form-label text-default d-block">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-lg"
                                            id="signin-password" name="password" placeholder="Password" required>
                                        <button class="btn btn-light" type="button" onclick="togglePasswordVisibility()"
                                            id="toggle-password"><i class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                        <label class="form-check-label text-muted fw-normal" for="remember">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/assets/js/custom-switcher.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/show-password.js') }}"></script>

    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('signin-password');
            var toggleButton = document.getElementById('toggle-password');
            var icon = toggleButton.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('ri-eye-off-line');
                icon.classList.add('ri-eye-line');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('ri-eye-line');
                icon.classList.add('ri-eye-off-line');
            }
        }
    </script>
</body>

</html>
