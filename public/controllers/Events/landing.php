<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 01/04/2018
 * Time: 14:36
 */

require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Events/landingModel.php';

class landing extends Controller
{
    public $filePath;
    public $event;
    public $export;
    public $user;

    public function __construct()
    {
        parent::__construct();

        $this->filePath = [
            'Events',
            'landing'
        ];
    }

    public function Export($uri) {
        $uriArray = explode('/', substr ($uri,1));

        if (!$uriArray || empty($uriArray[2])) _404();

        $id = $uriArray[2];

        $model = new eventLandingModel();

        $event = $model->findOneById('events', $id);

        // Event not found
        if (empty($event)) _404();

        if (!empty($event->userId)) {
            $user = $model->findOneById('users', $event->userId);

            // unset fields that we don't want exposed in the API.
            unset($user['hash']);
            unset($user['email']);

            $event['user'] = $user;
        }

        $this->export = json_encode($event);
    }

    public function View($uri = false)
    {
        parent::View();

        // $uri will be in the form '/events/view/$_id' where $_id is the eventId stored in the Mongo database.
        // Remove the leading '/' and explode on '/'
        $uriArray = explode('/', substr ($uri,1));

        if (!$uriArray || empty($uriArray[2])) _404();

        $id = $uriArray[2];

        $model = new eventLandingModel();

        $this->event = $model->findOneById('events', $id);

        // Event not found
        if (empty($this->event)) _404();

        $this->user = $model->findOneById('users', $this->event->userId);
    }
}