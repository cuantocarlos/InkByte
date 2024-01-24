<?php
//saco del perfil el nombre y el email
$nombre = $_SESSION['nombre'];
$email = $_SESSION['email'];
$id = $_SESSION['id_user'];
//una vez ya tengo el nombre y el email, hago la consulta para sacar el resto de datos
$consulta = "SELECT * FROM usuarios WHERE id_user = '$id'";

?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Perfil de usuario</h2>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="path/to/profile-image.jpg" alt="Profile Image" class="img-fluid rounded-circle"
                                width="150">
                        </div>
                        <h4 class="card-title text-center">John Doe</h4>
                        <p class="card-text text-center">Web Developer</p>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Contact Information</h5>
                                <p>Email: john.doe@example.com</p>
                                <p>Phone: +123 456 7890</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Address</h5>
                                <p>123 Main Street</p>
                                <p>Cityville, Country</p>
                            </div>
                        </div>
                        <hr>
                        <h5>Additional Information</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                            Sed cursus ante dapibus diam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-csSR1II5TRV6zW2xIqC1l4C6IN5/xtz9F1qQjD8rA7C6MSQ63bAsHtkgqFMybzRc" crossorigin="anonymous"></script>
