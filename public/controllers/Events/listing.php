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

    public function __construct()
    {
        parent::__construct();

        $this->filePath = [
            'Events',
            'listing'
        ];
    }

    public function View($uri = false, $query = false)
    {
        parent::View();

        $model = new eventListingModel();

        $events = $model->find('events');
        $this->events = $events;
    }
}