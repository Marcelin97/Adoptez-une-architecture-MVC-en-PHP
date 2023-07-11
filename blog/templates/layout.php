<!-- Attention à ne pas faire l'amalgame entre layout et template ! Un layout est une façon spécifique d'utiliser un template. Il sert à créer une disposition d'affichage. Dans un fichier layout, les "trous" à remplir seront très souvent comblés... par des templates ! -->

<!-- l'idée : vous créez la structure de votre page et vous remplissez les trous par des variables. -->
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8" />
   <title><?= $title ?></title>
   <link href="style.css" rel="stylesheet" />
</head>

<body>
   <?= $content ?>
</body>

</html>