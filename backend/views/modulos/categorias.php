<div class="content-wrapper">

    <section class="content-header">

        <h1>
            Gestor categorías
        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Gestor categorías</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
                    Agregar categoría
                </button>

            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">
                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Categoría</th>
                            <th>Ruta</th>
                            <th>Estado</th>
                            <th>Tipo de Oferta</th>
                            <th>Valor Oferta</th>
                            <th>Imagen Oferta</th>
                            <th>Fin Oferta</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>

</div>

<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div class="modalAgregarCategoria" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <div class="model-content">
            <form method="post" enctype="multipart/form-data">
                <!--=====================================
                HEADER
                ======================================-->
                <div class="modal-header" style="background: #474747" color=white>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Categoria</h4>
                </div>
            </form>
        </div>
    </div>
</div>