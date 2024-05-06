<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="home.php" class="nav_logo">
                <span class="nav_logo-name">Diet Sync</span>
            </a>

            <div class="nav_list">
                <a href="home.php" class="nav_link <?php if ($page == 'menu') echo 'active'; ?>">
                    <i class="bi bi-house"></i>
                    <span class="nav_name">Home</span>
                </a>

                <a href="registrar-dieta.php" class="nav_link <?php if ($page == 'registrar-dieta') echo 'active'; ?>">
                    <i class="bi bi-egg-fried"></i>
                    <span class="nav_name">Registrar Dieta</span>
                </a>

                <a href="registrar-treino.php" class="nav_link <?php if ($page == 'registro-treino') echo 'active'; ?>">
                    <i class="bi bi-clipboard-heart"></i>
                    <span class="nav_name">Registrar Treino</span>
                </a>

                <a href="registrar-receita.php" class="nav_link <?php if ($page == 'registrar-receitas') echo 'active'; ?>">
                    <i class="bi bi-clipboard-plus"></i>
                    <span class="nav_name">Registrar Receitas</span>
                </a>
                    <a href="dieta.php" class="nav_link <?php if ($page == 'dieta') echo 'active'; ?>">
                        <i class="bi bi-ui-checks-grid"></i>
                        <span class="nav_name">Dieta</span>
                    </a>

                    <a href="treinos.php" class="nav_link <?php if ($page == 'treino') echo 'active'; ?>">
                        <i class="bi bi-heart-pulse-fill"></i>
                        <span class="nav_name">Treinos</span>
                    </a>

                    <a href="evolucao.php" class="nav_link <?php if ($page == 'evolucao') echo 'active'; ?>">
                        <i class="bi bi-graph-up-arrow"></i>
                        <span class="nav_name">Evolução</span>
                    </a>

                <a href="receitas.php" class="nav_link <?php if ($page == 'receitas') echo 'active'; ?>">
                    <i class="bi bi-journal-check"></i>
                    <span class="nav_name">Receitas</span>
                </a>

                <a href="agradecimentos.php" class="nav_link <?php if ($page == 'agradecimentos') echo 'active'; ?>">
                    <i class="bi bi-hearts"></i>
                    <span class="nav_name">Agradecimentos</span>
                </a>
            </div>
        </div>

        <a href="config.php" class="nav_link <?php if ($page == 'configuracoes') echo 'active'; ?>">
            <i class="bi bi-gear"></i>
            <span class="nav_name">Configurações</span>
        </a>
    </nav>
</div>
