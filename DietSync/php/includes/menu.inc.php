    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>

                <a href="index.php" class="nav_logo">
                    <span class="nav_logo-name">Diet Sync</span>
                </a>

                <div class="nav_list">
                    <a href="index.php
                    " class="nav_link <?php if ($page == 'menu') echo 'active'; ?>">
                        <i class="bi bi-house"></i>
                        <span class="nav_name">Home</span>
                    </a>

                    <a href="registrar-dieta.php
                    " class="nav_link <?php if ($page == 'registrar-dieta') echo 'active'; ?>">
                        <i class="bi bi-egg-fried"></i>
                        <span class="nav_name">Registrar Dieta</span>
                    </a>

                    <a href="registrar-treino.php
                    " class="nav_link <?php if ($page == 'registro-treino') echo 'active'; ?>">
                        <i class="bi bi-person-plus"></i>
                        <span class="nav_name">Registrar Treino</span>
                    </a>

                    <a href="evolucao.php
                    " class="nav_link <?php if ($page == 'evolucao') echo 'active'; ?>">
                        <i class="bi bi-graph-up"></i>
                        <span class="nav_name">Evolução</span>
                    </a>

                    <a href="receitas.php
                    " class="nav_link <?php if ($page == 'receitas') echo 'active'; ?>">
                        <i class="bi bi-clock-history"></i>
                        <span class="nav_name">Receitas</span>
                    </a>

                </div>
            </div>

            <a href="#" class="nav_link">
                <i class="bi bi-gear"></i>
                <span class="nav_name">Configuração</span>
            </a>

        </nav>
    </div>