<?php
session_start();
if (!isset($_SESSION['status'])) {
    header("Location: login.php");
} else {
    $username = $_SESSION['username'];
?>
    <!doctype html>
    <html lang="en">

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
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-sm navbar-light bg-success mb-3">
                <div class="container-fluid">
                    <div class="navbar-brand">Bienvenido(a) <?= $_SESSION['name'] . ' ' . $_SESSION['lastname'] ?></div>
                    <a href="validate.php?logout=true">
                        <button type="button" class="btn btn-danger" aria-label="Close">
                            Salir
                        </button>
                    </a>
                </div>
            </nav>
        </header>
        <main>
            <?php
            if (isset($_SESSION['status_task'])) {
                if ($_SESSION['status_task'] == 1) {
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Tarea añadida!</strong>
                    </div>
                <?php
                } elseif ($_SESSION['status_task'] == 2) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Problemas con creación de tarea</strong>
                    </div>
                <?php
                } elseif ($_SESSION['status_task'] == 3) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Error de conexión!</strong>
                    </div>
                <?php
                } elseif ($_SESSION['status_task'] == 4) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Tarea eliminada!</strong>
                    </div>
            <?php
                }
            }
            unset($_SESSION['status_task']);
            ?>
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-header">Aquí se muestran tus tareas</div>
                    <form action="add_task.php" method="POST">
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="text" style="width: 300px;" name="task" id="task" class="form-control" placeholder="Titulo de nueva tarea" aria-describedby="helpId">
                            </div>
                            <p>Duración de la tarea</p>
                            <div class="mb-3">
                                <label for="datetask">Horas</label>
                                <input type="number" style="width: 100px;" name="datetask" id="datetask" class="form-control" value="0" aria-describedby="helpId">
                            </div>
                            <div class="mb-3">
                                <label for="mintask">Minutos</label>
                                <input type="number" style="width: 100px;" name="mintask" id="mintask" class="form-control" value="0" aria-describedby="helpId">
                            </div>
                            <button class="btn btn-primary btn-sm " type="submit" name="add_task">Nueva Tarea</button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">Aquí se muestran tus tareas</div>
                    <div class="card-body">
                        <?php
                        $connection = mysqli_connect('', 'root', '', 'cftcenco');
                        if ($connection) {
                            $query = "SELECT * FROM zapatos_3k_tasks WHERE created_by='$username'";
                            $result = mysqli_query($connection, $query);
                            if (mysqli_num_rows($result) > 0) {
                        ?>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titulo</th>
                                            <th>Duración</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?= $row['title'] ?></td>
                                                <td><?= $row['duration'] ?></td>
                                                <td>
                                                    <a href="delete_task.php?delete=true&id=<?= $row['id'] ?>">
                                                        <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                            } else {
                            ?>
                                <div class="alert alert-warning" role="alert">
                                    No hay tareas registradas
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
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
<?php
}
?>