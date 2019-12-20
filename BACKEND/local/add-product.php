<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product - Dashboard Admin Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body class="bg02">
    <div class="container">


        <!-- alerta success -->
        <div class="alert alert-success" role="alert">
            <span id='msjSuccess'>This is a success alert—check it out!</span>    
            <button type="button" class="close closeSuccess" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="alert alert-danger" role="alert">
            <span id='msjDanger'>This is a success alert—check it out!</span>    
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>



        <?php include 'header.php' ?>
        <!-- row -->
        <div class="row tm-mt-big">
            <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12"  style="margin: 0 auto">
                <div class="bg-white tm-block">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Agregar Menu</h2><br>
                            <p style="font-size: 0.8em; margin-top: -1em;"><span class="obligatorio">* </span>Datos obligatorios</p>
                        </div>
                    </div>
                    <div class="row mt-4 tm-edit-product-row">
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <form action="gastronomia.php" class="tm-edit-product-form" id="formAgregar" method="POST">
                                <div class="input-group mb-3">
                                    <label for="NombreMenu" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"><span class="obligatorio">*</span> Nombre
                                    </label>
                                    <input id="NombreMenu" name="NombreMenu" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="DescripcionMenu" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Descripcion</label>
                                    <textarea id="DescripcionMenu" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" rows="3" required></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="IDCategoria" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"><span class="obligatorio">*</span> Categoria</label>
                                    <select class="custom-select col-xl-9 col-lg-8 col-md-8 col-sm-7" id="IDCategoria">
                                        <option selected value="">-- Elegir --</option>
                                        <option value="1">Niños</option>
                                        <option value="2">Adultos</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="PrecioMenu" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label"><span class="obligatorio">*</span> Precio
                                    </label>
                                    <input id="PrecioMenu" name="PrecioMenu" type="number" class="form-control validate col-xl-9 col-lg-8 col-md-7 col-sm-7">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                        <button type="button" class="btn btn-primary" id="agregarMenu">Agregar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto">
                                <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                <input id="fileInput" type="file" style="display:none;" />
                                <input type="button" class="btn btn-primary d-block mx-auto" value="Upload ..." onclick="document.getElementById('fileInput').click();"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row tm-mt-big">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018 Admin Dashboard . Created by
                    <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        $(".alert-success").hide();
        $(".alert-danger").hide();
    </script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/codigo.js"></script>
</body>

</html>