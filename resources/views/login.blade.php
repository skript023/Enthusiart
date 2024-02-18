<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enthusiart</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo-72.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: #D8E0FF;">
    <section class="login-section">
        <div class="container">
            <div class="row align-items-left mb-5">
                <div class="col-md-6">
                    <div class="logo-wrapper mt-3">
                        <a class="logo-img" href="#">
                            <img src="../assets/img/logo-72.png" alt="Enthusiart Logo">
                        </a>
                    </div>
                </div>
            </div>
            <!-- Form Login -->
            <div class="row align-items-center">
                <div class="col-md-6 order-md-last align-items-center mb-3">
                    <div class="container left-signin justify-content-center">
                        <img src="../assets/img/vector-05.png" class="vector4 mx-auto d-block" alt="Sign Up" width="440">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container form-wrapper">
                        <h2 class="section-title text-center mb-4 m-3" style="font-size: 28px;">Sign In</h2>
                        <form action="/auth/login" method="post">
                            @csrf
                            <!-- Email -->
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email address" required>
                            </div>
                            <!-- Password -->
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-register mt-4 text-center">Sign In</button>
                            <p class="form-label text-center mt-2">
                                Don't have an account?
                                <a href="#">Sign Up</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>