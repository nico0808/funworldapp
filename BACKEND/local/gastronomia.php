
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gastronomía - FunWorld</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/tooplate.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">


            <!-- alerta success -->
            <div class="alert alert-success" role="alert">
                <span id='msjSuccess'>This is a success alert—check it out!</span>    
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- alerta danger -->
            <div class="alert alert-danger" role="alert">
                <span id='msjDanger'>This is a success alert—check it out!</span>    
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php include 'header.php' ?>

            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Gastronomía</h2>
                            </div>                       
                            <div class="col-md-4 col-sm-12 text-right" style="margin-bottom: 3em;">
                                <a href="add-product.php" class="btn btn-small btn-primary" style="width: 100%;">AGREGAR MENÚ</a>
                            </div>
                            <div class="col-md-10 col-sm-12">
                                <select name="categoria" id="categoria" class="form-control form-control-lg" style="padding: 0.1em 1em;">

                                    <option value="0" selected>Todos</option>
                                    <option value="1">Menu Niño</option>
                                    <option value="2">Menu Adulto</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-12 text-right">
                                <button type='button' class="btn btn-small btn-primary" id="elegirMenu" style="padding: 0.7em; width: 100%;">VER</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                      
                                        <th scope="col">Nombre Menu</th>
                                        <th scope="col" class="text-center">Precio</th>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaProductos">
                                   
                                </tbody>
                            </table>
                        </div>

                        <div class="tm-table-mt tm-table-actions-row">
                            <!-- <div class="tm-table-actions-col-left">
                                <button class="btn btn-danger">Delete Selected Items</button>
                            </div> -->
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title d-inline-block">Product Categories</h2>
                        <table class="table table-hover table-striped mt-3">
                            <tbody>
                                <tr>
                                    <td>1. Cras efficitur lacus</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>2. Pellentesque molestie</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>3. Sed feugiat nulla</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>4. Vestibulum varius arcu</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>5. Aenean eget urna enim</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>6. Condimentum viverra</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>7. In malesuada</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>8. Placerat</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>9. Donec semper</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="#" class="btn btn-primary tm-table-mt">Add New Category</a>
                    </div>
                </div>
            </div>
            

            <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Confirmar</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" id="modal-btn-si">Si</button>
                            <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert" role="alert" id="result"></div>




            <footer class="row tm-mt-small">
                <div class="col-12 font-weight-light">
                    <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                        Copyright &copy; 2018 Admin Dashboard . Created by
                        <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
                    </p>
                </div>
            </footer>

        </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        $(".alert-success").hide();
        $(".alert-danger").hide();
    </script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/codigo.js"></script>
    <!-- codigo para mostrar menu a modificar -->
    <script src="js/codigoMostrarMenu.js"></script>
    <script>

        /*borrar menu*/
        function borrarFuncion (data) {
            var modalConfirm = function(callback){
                $("#modal-btn-si").on("click", function(){
                    callback(true);
                    $("#mi-modal").modal('hide');
                });
            
                $("#modal-btn-no").on("click", function(){
                    callback(false);
                    $("#mi-modal").modal('hide');
                });
            };

            $("#mi-modal").modal('show');
    

            modalConfirm(function(confirm){
                if(confirm){
                    //Acciones si el usuario confirma
                    var Token=localStorage.getItem('token');    
                    var IDMenu = data;
                    $.ajax ({
                        url: "http://localhost/test/api/gastronomiaBE.php",
                        headers: {
                            Token,
                        },
                        type: "DELETE",
                        dataType: "json",
                        data: {
                            IDMenu
                        },
                        success: eliminarMenu,
                        error: mostrarError
                    });
                } else {
                    //Acciones si el usuario no confirma
                    $("#mi-modal").modal('hide');
                }
            });
        }

        function eliminarMenu (respuesta) {
            console.log(respuesta);
            $(".alert-success").show();
            $("#msjSuccess").html(respuesta.mensaje);
            mostrarMenu();
        }


    </script>
    <script>
    /*obtener get para mostrar mensajes*/
    function getSearchParameters() {
            var prmstr = window.location.search.substr(1);
            return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
    }
  
    function transformToAssocArray( prmstr ) {
        var params = {};
        var prmarr = prmstr.split("&");
        for ( var i = 0; i < prmarr.length; i++) {
            var tmparr = prmarr[i].split("=");
            params[tmparr[0]] = tmparr[1];
        }
        return params;
    }
    
    var params = getSearchParameters();

    if (typeof params.mensaje !== 'undefined') {
        var res = params.mensaje.replace(/%20/g, ' ');
        $(".alert-success").show();
        $("#msjSuccess").html(res);
    }
        
    
    // console.log(mensaje);



    </script>


</body>

</html>