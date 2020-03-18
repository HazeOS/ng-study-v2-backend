<?php
require_once './api/recipes/recipeApi.php';
use api\RecipeApi;
try {
    $api = new RecipeApi();
    echo $api->run();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}
