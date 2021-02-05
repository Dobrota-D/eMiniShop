<?php
require_once "PHP/init.php";
$categories = $ArticleManager->getAll_Category();
for ($i=0; $i < count($categories); $i++) { 
    echo $categories[$i]['name_category'];
}
                    