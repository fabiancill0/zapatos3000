<?php
session_start();
?>
<!doctype html>
<html lang="es">

<head>
    <title>Zapatos3000</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="img/zapato.png" type="image/x-icon">

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>

<body>
    <main>

        <div class="container">
            <h1 class="text-center">Zapatos3000</h1>
            <div class="row justify-content-center">
                <div class="col-xl-12" style="width: 400px;">
                    <?php
                    if (isset($_SESSION['status'])) {
                        if ($_SESSION['status'] == 1) {
                    ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Usuario o contraseña incorrectos!</strong>
                            </div>
                        <?php
                        } elseif ($_SESSION['status'] == 2) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Error de conexión!</strong>
                            </div>
                        <?php
                        } elseif ($_SESSION['status'] == 3) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Usuario creado existosamente! Ingresa a tu cuenta</strong>
                            </div>
                        <?php
                        } elseif ($_SESSION['status'] == 4) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>El usuario o contraseña no puede estar vacío</strong>
                            </div>
                    <?php
                        }
                    }
                    unset($_SESSION['status']);
                    ?>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-xl-12 card" style="width: 400px;">
                    <form action="validate.php" method="POST">
                        <div class="card-body">
                            <div style="text-align: center;"> <img class="card-img-top" src="img/zapato.png" style="width: 100px" alt="Title" /></div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Usuario</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="username"
                                    id="username"
                                    aria-describedby="helpId"
                                    placeholder="" />
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label">Contraseña</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="pass"
                                    id="pass"
                                    placeholder="" />
                            </div>
                            <div class="d-grid gap-2 mb-3">
                                <button
                                    type="submit"
                                    name="submit"
                                    id="submit"
                                    class="btn btn-primary">
                                    Ingresar
                                </button>
                            </div>
                            <a href="register.php"><button type="button"
                                    class="btn btn-primary">
                                    Crear Cuenta
                                </button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>