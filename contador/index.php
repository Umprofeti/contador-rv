<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head( );?>
    <title>Contador par RV</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="cuerpo">
                <?php the_custom_logo(); ?>
                <h1 class="titulo"><?php bloginfo('name'); ?></h1>
                <p class="slogan"><?php bloginfo('description'); ?></p>
                <?php dynamic_sidebar('desc'); ?>
            </div>
            <div class="contador">
                <span id="contador-tiempo"></span>
            </div>
        </div>
    </main>
</body>
</html>