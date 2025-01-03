<?php
require_once __DIR__ . '/../Models/Project.php';

class HomeController {
    private $projectModel;

    public function __construct($db) {
        $this->projectModel = new Project($db);
    }

    public function index() {
        $projects = $this->projectModel->getAllProjects();
        require_once __DIR__ . '/../Views/home.php';
    }
}
