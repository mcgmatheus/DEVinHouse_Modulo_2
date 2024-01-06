<?php
require_once '../utils.php';
require_once '../models/Pet.php';
require_once '../models/PetDAO.php';

class PetController
{

    public function createOne()
    {
        $body = getBody();

        $name = sanitizeInput($body, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $race_id = sanitizeInput($body, 'race_id', FILTER_VALIDATE_INT);

        $age = sanitizeInput($body, 'age', FILTER_VALIDATE_INT);

        $weight = sanitizeInput($body, 'weight', FILTER_VALIDATE_FLOAT);
        $size = strtolower(sanitizeInput($body,  'size', FILTER_SANITIZE_SPECIAL_CHARS));

        if (!$name) responseError("Nome do pet é obrigatório", 400);
        if (!$race_id) responseError("ID da raça do pet é obrigatório", 400);

        if (
            $size &&
            !($size === 'pequeno' ||
                $size === 'medio' ||
                $size === 'grande' ||
                $size === 'gigante')
        ) {
            responseError("O tamanho é inválido", 400);
        }

        $pet = new Pet($name, $race_id);

        if ($age) $pet->setAge($age);
        if ($weight) $pet->setWeight($weight);
        if ($size) $pet->setSize($size);

        $petDAO = new PetDAO();

        $result = $petDAO->insert($pet);

        if ($result['success'] === true) {
            response(["message" => "Cadastrado com sucesso"], 201);
        } else {
            responseError("Não foi possível realizar o cadastro", 400);
        }
    }

    public function listAll()
    {
        $petDAO = new PetDAO();
        $pets = $petDAO->findMany();
        response($pets, 200);
    }


    public function listOne()
    {
        $id = sanitizeInput($_GET, 'id', FILTER_VALIDATE_INT, false);

        if (!$id) responseError('O id é inválido', 400);

        $petDAO = new PetDAO();

        $result = $petDAO->findOne($id);

        if (!$result) responseError('Não foi encontrado um pet com esse id', 404);

        response($result, 200);
    }


    public function deleteOne()
    {
        $id = sanitizeInput($_GET, 'id', FILTER_VALIDATE_INT, false);

        if (!$id) responseError('O id é inválido', 400);

        $petDAO = new PetDAO();

        $petExists = $petDAO->findOne($id);

        if (!$petExists) responseError('Não foi encontrado um pet com esse id', 404);

        $result = $petDAO->deleteOne($id);

        if ($result['success'] === true) {
            response([], 204);
        } else {
            responseError('Não foi possível deletar o item', 400);
        }
    }


    public function updateOne(){
        $id = sanitizeInput($_GET, 'id', FILTER_VALIDATE_INT, false);
        $body = getBody();
                
        if (!$id) responseError('O id esta ausente', 400);

        if(isset($body->name) && empty($body->name)) {
            responseError('O nome não pode ser vazio', 400);
        }

        if(isset($body->race_id) && empty($body->race_id)) {
            responseError('a raça não pode ser vazia', 400);
        }

        if (
            isset($body->size) &&
            !($body->size === 'pequeno' ||
                $body->size === 'medio' ||
                $body->size === 'grande' ||
                $body->size === 'gigante')
        ) {
            responseError("O tamanho é inválido", 400);
        }

        

        $petDAO = new PetDAO();

        $result = $petDAO->updateOne($id, $body);

        if ($result['success'] === true) {
            response([], 200);
        } else {
            responseError('Não foi possível atualizar o item', 400);
        }

    }
}
