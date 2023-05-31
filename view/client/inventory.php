<?php
    require_once('../layout/sidebar.php');
    require_once("../layout/header.php");
    require_once("../layout/head.php");
    require_once("../../controller/homeController.php");
    $obj = new homeController();
    $article = $obj->show_article();
?>
<head>
    <title>Solicitar Servicio: Inventario</title>
    <link rel="stylesheet" href="../../asset/css/inventory_styles.css">
</head>
<body>
    <div class="container-fluid inventory">
        <div class="title_inventory row">
            <p class="text_title_inventory">¿Qué deseas llevar en tu mudanza?</p>
        </div>
        <p class="separate_inventory"></p>
        <form action="store/store_type.php" method="POST" autocomplete="off">
            <div class="article row">
                <div class="col-8">
                    <select id="type" type="text" name="type" aria-placeholder="type" class="select_article form-select" aria-label="Default select example">
                        <option value="" disabled selected>Seleccione un articulo</option>
                        <option value="Caja">Caja</option>
                        <option value="Electrodomestico">Electrodomestico</option>
                        <option value="Mueble">Mueble</option>
                    </select>
                </div>
                <div class="col-4">
                    <button id="btn-agregar" class="btn-article" type="submit">Agregar</button>
                </div>
            </div>
        </form>
        <p class="separate_inventory"></p>
        <div class="text_list row">
            Inventario
        </div>
        <div class="list_outer">
            <div class="list_inner">
                <?php if($article): ?>
                    <?php foreach($article as $article): ?>
                        <div class="container article_inventory">
                            <div class="row row_article_inventory">
                                <div class="col-3 col_article">
                                    <div class="row div_article_type"> 
                                        <div class="col article_type">
                                            <?php echo $article['id'], ")"; ?>
                                            <?php echo $article['type']; ?>
                                        </div>
                                    </div>
                                    <div class="row div_article_name">
                                            <div class="text_article_name">Nombre:</div>
                                            <div class="article_name">
                                                <?php echo $article['name']; ?>
                                            </div>
                                    </div>
                                    <div class="row div_article_amount">
                                        <div class="col text_article_amount">Cantidad:</div> 
                                        <div class="col article_amount">
                                            <?php echo $article['amount']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 col_article">
                                    <div class="article_image" style="background-image: url('../asset/image_article/<?php echo $article['image']; ?>');"></div>
                                </div>
                                <div class="col-2 col_article">
                                    <div class="row div_article_width">
                                        <div class="col text_article_width">Ancho:</div> 
                                        <div class="col article_width">
                                            <?php echo $article['width']; ?>
                                        </div>
                                    </div>
                                    <div class="row div_article_height">
                                        <div class="col text_article_height">Alto:</div> 
                                        <div class="col article_height">
                                            <?php echo $article['height']; ?>
                                        </div>
                                    </div>
                                    <div class="row div_article_length">
                                        <div class="col text_article_length">Largo:</div> 
                                        <div class="col article_length">
                                            <?php echo $article['length']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col_article">
                                    <div class="row div_article_end">
                                        <div class="col">
                                            <div class="text_article_weight">Peso:</div> 
                                            <div class="article_weight">
                                                <?php echo $article['weight']; ?>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="text_article_fragile">¿Fragil?</div> 
                                            <div class="article_fragile <?php echo $article['fragile'] == 1 ? 'fragile-yes' : 'fragile-no'; ?>">
                                                <?php echo $article['fragile'] == 1 ? 'Sí' : 'No'; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row div_article_btn">
                                        <div class="col-6">
                                            <form method="POST" action="edit/edit_article.php">
                                                <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                                                <button class="btn-edit"></button>
                                            </form>
                                        </div>
                                        <div class="col-6">
                                            <a href="delete/delete_article.php?ID=<?= $article['id']?>" class="btn btn-delete"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="list_empty row">
                        <p class="text_list_empty">Agrega algún articulo al inventario</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
<?php
    require_once("../layout/footer.php");
?>