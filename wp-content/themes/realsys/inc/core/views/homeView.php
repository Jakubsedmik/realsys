
<div class="container mainContainer mt-5">


    <div class="md-form">
        <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker">
        <label for="date-picker-example">Try me...</label>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#souteze" role="tab" aria-controls="home"
               aria-selected="true">Soutěže</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#fotografie" role="tab" aria-controls="profile"
               aria-selected="false">Fotografie</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#autori" role="tab" aria-controls="contact"
               aria-selected="false">Autoři</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="souteze" role="tabpanel" aria-labelledby="home-tab">
            <h1 class="mt-3">Soutěže</h1>
            <p class="lead">Zvolte soutěž pro editaci</p>
            <!-- Default button -->
            <?php
            $query = array(
                "controller" => "soutez",
                "action" => "newSoutez"
            );
            $link = globalUtils::generateGetLink($query);
            ?>
            <a href="<?php echo $link; ?>" class="btn btn-default btn-lg ml-0 mb-3"><i class="fas fa-plus-circle"></i> Založit novou soutěž</a>
            <table class="table table-striped table-responsive-md btn-table">
                <thead class="">
                <tr class="bg-primary white-text">
                    <th scope="col">ID</th>
                    <th scope="col">Název</th>
                    <th scope="col">Ročník</th>
                    <th scope="col">Datum od</th>
                    <th scope="col">Datum do</th>
                    <th scope="col">Akce</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $souteze = $this->viewData['souteze'];
                    $id = assetsFactory::dejAktualniSoutez();
                    foreach ($souteze as $val) :

                        $query = array(
                            "id" => $val->getId(),
                            "controller" => "soutez"
                        );
                        $edit_link = globalUtils::generateGetLink($query);


                ?>

                    <tr class="<?php echo ($id==$val->getId()) ? "blue lighten-4" : "" ;?>">
                        <td>
                            <?php echo $val->getId(); ?>
                        </td>
                        <td>
                            <?php echo $val->dejData("db_nazev"); ?>
                        </td>
                        <td>
                            <?php echo $val->dejData("db_rocnik"); ?>
                        </td>
                        <td>
                            <?php echo date("d.m.Y",$val->dejData("db_termin_od")); ?>
                        </td>
                        <td>
                            <?php echo date("d.m.Y",$val->dejData("db_termin_do")); ?>
                        </td>
                        <td>
                            <a href="<?php echo $edit_link; ?>" class="btn btn-primary btn-sm m-0"><i class="far fa-edit"></i> Upravit</a>
                            <form method="post" class="d-inline-block">
                                <input type="hidden" name="action" value="removeSoutez">
                                <input type="hidden" name="id" value="<?php echo $val->getId(); ?>">
                                <button type="submit" class="btn btn-danger btn-sm m-0 js-confirm-submit"><i class="fas fa-trash-alt"></i> Smazat</button>
                            </form>
                        </td>
                    </tr>

                <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="fotografie" role="tabpanel" aria-labelledby="profile-tab">
            <h1 class="mt-3">Fotografie</h1>
            <p class="lead">Zvolte fotografii pro editaci</p>
            <?php
            $query = array(
                "controller" => "fotografie",
                "action" => "newFotografie"
            );
            $link = globalUtils::generateGetLink($query);
            ?>
            <a href="<?php echo $link; ?>" class="btn btn-default btn-lg ml-0 mb-3"><i class="fas fa-plus-circle"></i> Založit novou fotografii</a>
            <table class="table table-striped table-responsive-md btn-table">
                <thead class="">
                <tr class="bg-secondary white-text">
                    <th scope="col">Obrázek</th>
                    <th scope="col">ID</th>
                    <th scope="col">Počet hlasů</th>
                    <th scope="col">Akce</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $fotografie = $this->viewData['fotografie'];
                    foreach ($fotografie as $val) :

                        $query = array(
                            "id" => $val->getId(),
                            "controller" => "fotografie"
                        );
                        $edit_link = globalUtils::generateGetLink($query);

                        ?>

                        <tr>
                            <td>
                                <img src="<?php echo $val->dejData("db_url_small"); ?>" alt="thumbnail" class="img-thumbnail small-photo-img">

                            </td>
                            <td class="align-middle">
                                <?php echo $val->getId(); ?>
                            </td>
                            <td class="align-middle">
                                <?php echo $val->dejData("db_pocet_hlasu"); ?>
                            </td>
                            <td>
                                <a href="<?php echo $edit_link; ?>" class="btn btn-primary btn-sm m-0"><i class="far fa-edit"></i> Upravit</a>

                                <form method="post" class="d-inline-block" action="">
                                    <input type="hidden" value="<?php echo $val->getId(); ?>" name="id">
                                    <input type="hidden" value="removeFotografie" name="action">
                                    <button type="submit" class="btn btn-danger btn-sm m-0 js-confirm-submit"><i class="fas fa-trash-alt"></i> Smazat</button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="autori" role="tabpanel" aria-labelledby="contact-tab">
            <h1 class="mt-3">Autoři</h1>
            <p class="lead">Zvolte autora pro editaci</p>
            <?php
            $query = array(
                "controller" => "autor",
                "action" => "newAutor"
            );
            $link = globalUtils::generateGetLink($query);
            ?>
            <a href="<?php echo $link; ?>" class="btn btn-default btn-lg ml-0 mb-3"><i class="fas fa-plus-circle"></i> Založit nového autora</a>
            <table class="table table-striped table-responsive-md btn-table">
                <thead class="">
                <tr class="bg-info white-text">
                    <th scope="col">ID</th>
                    <th scope="col">Jméno</th>
                    <th scope="col">Příjmení</th>
                    <th scope="col">Email</th>
                    <th scope="col">Akce</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $autori = $this->viewData['autori'];
                    foreach ($autori as $val) :

                        $query = array(
                            "id" => $val->getId(),
                            "controller" => "autor"
                        );
                        $edit_link = globalUtils::generateGetLink($query);



                        ?>



                        <tr>
                            <td>
                                <?php echo $val->getId(); ?>
                            </td>
                            <td>
                                <?php echo $val->dejData("db_jmeno"); ?>
                            </td>
                            <td>
                                <?php echo $val->dejData("db_prijmeni"); ?>
                            </td>
                            <td>
                                <?php echo $val->dejData("db_email"); ?>
                            </td>
                            <td>
                                <a href="<?php echo $edit_link; ?>" class="btn btn-primary btn-sm m-0"><i class="far fa-edit"></i> Upravit</a>
                                <form method="post" class="d-inline-block">
                                    <input type="hidden" name="action" value="removeAutor">
                                    <input type="hidden" name="id" value="<?php echo $val->getId(); ?>">
                                    <button type="submit" class="btn btn-danger btn-sm m-0 js-confirm-submit"><i class="fas fa-trash-alt"></i> Smazat</button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

</div>