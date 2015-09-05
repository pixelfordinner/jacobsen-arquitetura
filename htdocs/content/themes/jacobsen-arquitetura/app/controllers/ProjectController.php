<?php

class ProjectController extends BaseController {
    protected $fields = array();

    public function __construct() {
        $this->fields = get_fields();
    }

    public function getFields() {
        return $this->fields;
    }

    public function index() {
        return View::make('cpt.projects.single')
            ->with(array(
                'fields' => $this->getFields()
            ));
    }
}
