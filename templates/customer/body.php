<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="card col-lg-6 o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Pesquisar ordem de serviço</h1>
                    </div>
                    <form class="user" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="phone_number" name="phone_number" placeholder="55DD900000000" required>
                        </div>

                        <?php
                        if (isset($_POST['verify-orders'])) {
                            global $tabela_os;
                            global $mysqli;

                            $phone_number = $mysqli->real_escape_string($_POST['phone_number']);

                            if (empty($phone_number)) {
                                echo "<div class='w-full text-center p-t-25'><div class='alert alert-warning' role='alert'><strong>ATENÇÃO:</strong> Por favor, preencha corretamente o campo para pesquisar alguma ordem de serviço em seu número de telefone.</div></div>";
                            } else {
                                $sql = "SELECT * FROM $tabela_os WHERE `refContato` = '$phone_number' ORDER BY `id` DESC";
                                $query = $mysqli->query($sql);
                                $results = $query->num_rows;

                                if ($results > 0) {
                                    while ($infos_os = $query->fetch_assoc()) {
                                        if ($infos_os['refDataConclusao'] == 0) {
                                            $dataConclusao = "??/??/????";
                                        } else {
                                            $dataConclusao = FormatDateTimeFromTimestamp($infos_os['refDataConclusao'], 0);
                                        }

                                        if ($infos_os['refDataAbertura'] == 0) {
                                            $dataAbertura = "??/??/????";
                                        } else {
                                            $dataAbertura = FormatDateTimeFromTimestamp($infos_os['refDataAbertura'], 0);
                                        }

                                        if ($infos_os["refStatus"] == 0) {
                                            $Status = "Em aberto";
                                        } elseif ($infos_os["refStatus"] == 1) {
                                            $Status = "Finalizado";
                                        } elseif ($infos_os["refStatus"] == 2) {
                                            $Status = "Cancelado";
                                        } else {
                                            $Status = "Sem registro";
                                        }

                                        echo "
                                                    <div id='erro-login' class='w-full text-center mt-3'>
                                                        <div class='alert alert-info' role='alert'>
                                                            <strong>OS: " . $infos_os['refOs'] . "</strong><br>
                                                            <strong>Data de abertura da OS</strong>: " . $dataAbertura . "<br>
                                                            <strong>Técnico da OS</strong>: " . $infos_os['refTecnico'] . "<br>
                                                            <strong>Desc. Defeito</strong>: " . $infos_os['refDescricaoDefeito'] . "<br>
                                                            <strong>Obs</strong>: " . $infos_os['refObservacoes'] . "<br>
                                                            <strong>Status</strong>: " . $Status . "<br>
                                                            <strong>Data de conclusão da OS</strong>: " . $dataConclusao . "
                                                        </div>
                                                    </div>
                                                    ";
                                    }
                                } else {
                                    echo "<div class='w-full text-center p-t-25'><div class='alert alert-warning' role='alert'><strong>ATENÇÃO:</strong> Nenhuma ordem de serviço encontrada neste número de telefone informado. </div></div>";
                                }
                            }
                        }
                        ?>

                        <button type="submit" name="verify-orders" class="btn btn-primary btn-user btn-block">Verificar OS</button>
                    </form>
                    <div class="w-full text-center mt-3">
                        <button type="submit" class="btn btn-dark btn-sm px-3">
                            <a href="<?= $CONFIGURATION['site_url']; ?>" style="text-decoration:none;color:#fff">
                                <i class="fas fa-user"></i> &nbsp; Sou um administrador
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>