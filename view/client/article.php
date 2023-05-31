<?php
    require_once('../layout/sidebar.php');
    require_once("../layout/header.php");
    require_once("../layout/head.php");
    require_once("../../controller/homeController.php");
    $obj = new homeController();
    $article = $obj->call_article($_GET['id']);
?>
<head>
    <title>Solicitar Servicio: Articulo</title>
    <link rel="stylesheet" href="../../asset/css/article_styles.css">
</head>
<body>
    <div class="container-fluid div_article">
        <div class="title_article row">
            <p class="text_title_article">Completa los datos de tu articulo</p>
        </div>
        <p class="separate_article"></p>
        <form action="update/update_article.php" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div class="container article">
                <div class="row row_article">
                    <div class="col-3 col_article">
                        <div class="row div_article_type"> 
                            <div class="col article_type">
                                <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                                <?php echo $article['id'], ")"; ?>
                                <?php echo $article['type']; ?>
                            </div>
                        </div>
                        <div class="row div_article_name">
                            <div class="text_article_name">Nombre:</div>
                            <div class="text_article_name_description">Inserta un nombre con el que identificaras el articulo (Libros, Mesa, Nevera, etc)</div>
                            <input type="name" name="name" class="form-control article_name" value="<?= $article['name']?>" id="name" aria-describedby="inputGroupPrepend" required>
                        </div>
                        <div class="row div_article_amount">
                            <div class="text_article_amount">Cantidad:</div> 
                            <div class="text_article_amount_description">Elige la cantidad que llevaras de este articulo</div>
                            <input type="number" name="amount" class="form-control article_amount" value="<?= $article['amount']?>" id="amount" aria-describedby="inputGroupPrepend" required>
                        </div>
                    </div>
                    <div class="col-4 col_article">
                        <div class="row article_sizes"></div>
                        <div class="row div_article_image">
                            <div class="text_article_image">Foto:</div>
                            <div class="text_article_image_description">Añade una foto de tu articulo</div>
                            <input class="form-control article_image" name="image" type="file" id="image">
                            <input type="hidden" name="existing_image" value="<?= $article['image']; ?>">
                        </div>
                    </div>
                    <div class="col-5 col_article">
                        <div class="text_article_sizes">Medidas:</div> 
                        <div class="text_article_sizes_description">Coloca las medidas que lleva tu articulo (Guiate de la imagen)</div>
                            <div class="row">
                                <div class="col div_article_width">
                                    <div class="text_article_width">Ancho:</div> 
                                    <input type="number" name="width" class="form-control article_width" value="<?= $article['width']?>" id="width" aria-describedby="inputGroupPrepend" required>
                                </div>
                                <div class="col div_article_height">
                                    <div class="text_article_height">Alto:</div> 
                                    <input type="number" name="height" class="form-control article_height" value="<?= $article['height']?>" id="height" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col div_article_length">
                                    <div class="text_article_length">Largo:</div> 
                                    <input type="number" name="length" class="form-control article_length" value="<?= $article['length']?>" id="length" aria-describedby="inputGroupPrepend" required>
                                </div>
                                <div class="col div_article_weight">
                                    <div class="text_article_weight">Peso:</div> 
                                    <input type="number" name="weight" class="form-control article_weight" value="<?= $article['weight']?>" id="weight" aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="row div_article_end">
                                    <div class="col div_article_fragile">
                                        <div class="text_article_fragile">¿Fragil?</div>
                                        <div class="text_article_fragile_description">Marca esta casilla si consideras que tu articulo es fragil</div>
                                        <div class="form-check check_article_fragile">
                                            <input type="checkbox" name="fragile" class="form-check-input article_fragile" value="1" id="fragile" <?= ($article['fragile'] == 1) ? 'checked' : '' ?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row div_article_btn">
                                    <div class="row">
                                        <button id="btn-update" type="submit" class="btn-update"></button>
                                    </div>
                                    <div class="row">
                                        <a href="inventory.php" class="btn-cancel"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<?php
    require_once("../layout/footer.php");
?>