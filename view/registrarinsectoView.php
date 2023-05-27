<?php
include_once './public/header.php';
?>
<div class="contenedor d-flex align-items-center justify-content-center w-100">
    <form class="bg-dark w-75" method="POST">

        <h1 class="m-3 h3 fw-normal text-light">Registro nuevo insecto</h1>

        <div class="row mb-2 m-1">
            <h3 class="m-3 h3 fw-normal text-light">Informacion insecto</h3>
            <div class="col col-10">
                <input class="form-control" list="reOrdenList" id="reOrden" placeholder="Tipea para buscar orden...">
                <datalist id="reOrdenList">
                    <option value="San Francisco">
                </datalist>
            </div>
            <div class="col col-1">
                <input id="b" type="button" value="+" class="form-control d-flex justify-content-center align-items-center">
            </div>
        </div>

        <div class="row mb-2 m-1">
            <div class="col col-10">
                <input class="form-control" list="reFamiliaList" id="reFamilia" placeholder="Tipea para buscar familia...">
                <datalist id="reFamiliaList">
                    <option value="San Francisco">
                </datalist>
            </div>
            <div class="col col-1">
                <input id="b" type="button" value="+" class="form-control d-flex justify-content-center align-items-center">
            </div>
        </div>

        <div class="row mb-2 m-1">
            <div class="col col-10">
                <input class="form-control" list="rereSubFListList" id="rereSubFList" placeholder="Tipea para buscar subfamilia...">
                <datalist id="reSubFList">
                    <option value="San Francisco">
                </datalist>
            </div>
            <div class="col col-1">
                <input id="b" type="button" value="+" class="form-control d-flex justify-content-center align-items-center">
            </div>
        </div>

        <div class="row mb-2 m-1">
            <div class="col col-10">
                <input class="form-control" list="reGeneroList" id="reGenero" placeholder="Tipea para buscar genero...">
                <datalist id="reGeneroList">
                    <option value="San Francisco">
                </datalist>
            </div>
            <div class="col col-1">
                <input id="b" type="button" value="+" class="form-control d-flex justify-content-center align-items-center">
            </div>
        </div>

        <div class="row mb-2 m-1">
            <div class="col col-10">
                <input class="form-control" list="reEspecieList" id="reEspecie" placeholder="Tipea para buscar especie...">
                <datalist id="reEspecieList">
                    <option value="San Francisco">
                </datalist>
            </div>
            <div class="col col-1">
                <input id="b" type="button" value="+" class="form-control d-flex justify-content-center align-items-center">
            </div>
        </div>
        <div class="row mb-2 m-1">
            <h3 class="m-3 h3 fw-normal text-light">Ubicacion de recoleccion</h3>
            <div class="col col-10">
                <input type="text" class="form-control" id="floatingInput" placeholder="Pais">
                <label for="floatingInput">Pais</label>
            </div>
            <div class="col col-10">
                <input type="text" class="form-control" id="floatingInput" placeholder="Provincia">
                <label for="floatingInput">Provincia</label>
            </div>
            <div class="col col-10">
                <input type="text" class="form-control" id="floatingInput" placeholder="Cantón">
                <label for="floatingInput">Cantón</label>
            </div>
            <div class="col col-10">
                <input type="text" class="form-control" id="floatingInput" placeholder="Dictrito">
                <label for="floatingInput">Distrito</label>
            </div>
            
            <div class="col col-10">
                <input type="text" class="form-control datepicker" placeholder="Selecciona una fecha">

                <script>
                    var datepickers = document.querySelectorAll('.datepicker');
                    datepickers.forEach(function (datepicker) {
                        new bootstrap.DatePicker(datepicker);
                    });
                </script>
            </div>
        </div>
        <button class="m-3 btn btn-lg btn-primary" type="submit">Registrar</button>


    </form>


</div>

<?php
include_once './public/footer.php';
?>
