<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 17/03/2018
 * Time: 11:25
 */

require $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

class Model {

    private $_database;

    public function __construct()
    {
        $mongo = new MongoDB\Client("mongodb://localhost:27017");
        $this->_database = $mongo->assignment1;
    }

    public function find($collection, $params = []) {
        return $this->_database->{$collection}->find($params)->toArray();
    }

    public function findOne($collection, $params) {
        return $this->_database->{$collection}->findOne($params);
    }

    public function findOneById($collection, $id) {
        // Mongo _id must be referenced using a Mongo ObjectId.
        $objectId = new MongoDB\BSON\ObjectID($id);
        return $this->_database->{$collection}->findOne(['_id' => $objectId]);
    }

    // Exposes the database object.
    public function getDatabase() {
        return $this->_database;
    }

    public function insert($collection, $data) {
        $id = $this->_database->{$collection}->insertOne($data);
        return $id->getInsertedId() . '';
    }

    public function delete($collection, $id) {
        $this->_database->{$collection}->deleteOne(['_id' => $id]);
    }
}