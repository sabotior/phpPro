<?php
/**
 * Обрабатывает указанный шаблон, подставляя нужные переменные
 */
function renderPage($page_name, $variables = [], $isAjax = false)
{
    $full_result = null;

    if(!$isAjax){
        // работа с синхронными запросами HTML страниц
        $file = TPL_DIR . "/" . $page_name . ".tpl";

        if (!is_file($file)) {
            echo 'Template file "' . $file . '" not found';
            exit(ERROR_NOT_FOUND);
        }

        // если переменных для подстановки не указано, просто
        // возвращаем шаблон как есть
        if (empty($variables)) {
            $templateContent = file_get_contents($file);
        }
        else {
            $templateContent = file_get_contents($file);

            // заполняем значениями
            $templateContent = pasteValues($variables, $page_name, $templateContent);
        }

        // вставляем контент в основной шаблон, если это не блок и не ajax запрос
        if(!$isAjax && !strstr($file, "_block")){
            $skeleton = file_get_contents(TPL_DIR . "/skeleton.tpl");
            $variables["tplcontent"] = $templateContent;
            $templateContent = pasteValues($variables, $page_name, $skeleton);
        }

        $full_result = $templateContent;
    }else{
        // AJAX запросы
        $full_result = $variables['response'];
    }

    return $full_result;
}

/**
 * Расстановка переменных в шаблоне
 * @param $variables
 * @param $page_name
 * @param $templateContent
 * @return mixed
 */
function pasteValues($variables, $page_name, $templateContent){
    foreach ($variables as $key => $value) {
        // собираем ключи
        $p_key = '{{' . strtoupper($key) . '}}';

        if(is_array($value)){
            // замена массивом
            $result = "";

            foreach ($value as $value_key => $item){
                $itemTemplateContent = file_get_contents(TPL_DIR . "/" . $page_name ."_".$key."_item.tpl");

                foreach($item as $item_key => $item_value){
                    $i_key = '{{' . strtoupper($item_key) . '}}';

                    $itemTemplateContent = str_replace($i_key, $item_value, $itemTemplateContent);
                }

                $result .= $itemTemplateContent;
            }
        }
        else
            $result = $value;

        $templateContent = str_replace($p_key, $result, $templateContent);
    }

    return $templateContent;
}