<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 01/04/2018
 * Time: 14:36
 */

require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Controller.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Events/listingModel.php';

class listing extends Controller
{
    public $filePath;
    public $events;
    public $export;

    public function __construct()
    {
        parent::__construct();

        $this->filePath = [
            'Events',
            'listing'
        ];
    }

    function _urlFriendly($string) {
        $string = strtolower($string);
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^a-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }

    public function Export() {
        $model = new eventListingModel();

        $events = $model->find('events');
        $this->export = json_encode($events);
    }

    public function View($uri = false)
    {
        parent::View();

        $model = new eventListingModel();

        $events = $model->find('events');

        foreach ($events as &$event) {
            $event['urlTitle'] = $this->_urlFriendly($event['title']);
        }

        $this->events = $events;
    }
}