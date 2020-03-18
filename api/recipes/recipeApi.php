<?php
namespace api;
require_once 'api/config/database.php';
require_once 'api/config/api.php';
use database\Database;
use PDO;

class RecipeApi extends Api
{
    public function indexAction() {
        $db = new Database();
        $dbc = $db->connect();
        $recipeList = array();
        $recipes = $dbc->query('SELECT * FROM recipes;');
        while ($row = $recipes->fetch(PDO::FETCH_ASSOC)){
            array_push($recipeList, $row);
        }
        $i = 0;
        foreach ($recipeList as $ingredient){
            $recipeList[$i]['ingredients'] = json_decode($ingredient['ingredients'], true);
            $i++;
        }
        return $this->response(
            array(
                'action' => 'indexAction',
                'requestMethod' => $this->method,
                'requestUri' => $this->requestUri,
                'requestParams' => $this->requestParams,
                'recipes' => $recipeList
            ), 200);
    }

    public function viewAction() {
        return $this->response(
            Array(
                'action' => 'viewAction',
                'requestMethod' => $this->method,
                'requestUri' => $this->requestUri,
                'requestParams' => $this->requestParams,
            ),
            200);
    }

    public function createAction() {
        // TODO: Implement createAction() method.
    }

    public function updateAction() {
        // TODO: Implement updateAction() method.
    }

    public function deleteAction() {
        // TODO: Implement deleteAction() method.
    }
}
