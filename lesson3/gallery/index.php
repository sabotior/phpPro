<?php
  include_once 'models/config.php';
  include_once 'models/photo.php';
  include 'Twig/Autoloader.php';
  Twig_Autoloader::register();
  try {
    // указывае где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem('templates');
    
    // инициализируем Twig
    $twig = new Twig_Environment($loader);
    
    // подгружаем шаблон
    $template = $twig->loadTemplate('small.tmpl');
    
    // передаём в шаблон переменные и значения
    // выводим сформированное содержание
 
    echo $content = $template->render(array(
      'images' => $images      
    ));
    
    
  } catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
  }
?>