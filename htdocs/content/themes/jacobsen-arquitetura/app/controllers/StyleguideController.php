<?php

class StyleguideController extends BaseController {

    public function index() {
        $assets = Application::get('assets');

        if (array_key_exists('styles', $assets)) {
            Asset::add('styleguide', $assets['styles']['path'].'/styleguide.css');
        }

        return View::make('pages.styleguide')
            ->with(array(
                'dlist' => $this->_data_dlist()
            ));
    }

    protected function _data_dlist() {
        return array(
            array(
                'title' => 'Credits',
                'content' => array(
                    array('name' => 'Studio', 'value' => 'Jacobsen Arquitetura'),
                    array('name' => 'Authors', 'value' => 'Paulo Jacobsen, Bernardo Jacbosen'),
                    array('name' => 'Equipe', 'value' => 'Edgar Murata, Christian Rojas')
                )
            ),
            array(
                'title' => 'Technical Data',
                'content' => array(
                    array('name' => 'Terrain', 'value' => '746,00m²'),
                    array('name' => 'Constructed area', 'value' => '708,00m²'),
                    array('name' => 'Project start', 'value' => '2012'),
                    array('name' => 'Project end', 'value' => '2014')
                )
            )
        );
    }
}
