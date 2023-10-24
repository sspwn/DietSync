<?php
$titulo = "Registrar Dieta";
$page = "registrar-dieta";
include '../php/includes/header.inc.php';
include '../php/includes/menu.inc.php';
?>

        <div class="container" id="main">
            <h1>Registrar dieta</h1>
            <form action="/dieta" method="post">
                <div class="mb-3">
                    <label for="data" class="form-label">Data Início</label>
                    <input type="date" class="form-control" id="data" name="data">
                </div>
                <div class="mb-3">
                    <label for="alimentos" class="form-label">Alimentos</label>
                    <input type="text" class="form-control" id="alimentos" name="alimentos">
                </div>
                <div class="mb-3">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade">
                </div>
                <div class="mb-3">
                    <label for="refeicao" class="form-label">Refeição</label>
                    <select class="form-select" id="refeicao" name="refeicao">
                        <option value="cafe-da-manha">Café da manhã</option>
                        <option value="almoco">Almoço</option>
                        <option value="jantar">Jantar</option>
                        <option value="lanche-da-manha">Lanche da manhã</option>
                        <option value="lanche-da-tarde">Lanche da tarde</option>
                        <option value="lanche-da-noite">Lanche da noite</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </body>

    </html>

</div>
</body>

</html>