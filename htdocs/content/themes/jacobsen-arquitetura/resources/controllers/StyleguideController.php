<?php

class StyleguideController extends BaseController {

    public function index() {
        $assets = Config::get('application.assets');

        if (array_key_exists('styles', $assets)) {
            Asset::add('styleguide', $assets['styles']['path'].'/styleguide.css');
        }

        return View::make('pages.styleguide')
            ->with([
                'dlist' => $this->_data_dlist()
            ]);
    }

    protected function _data_dlist() {
        return [
            [
                'title' => 'Credits',
                'content' => [
                    ['name' => 'Studio', 'value' => 'Jacobsen Arquitetura'],
                    ['name' => 'Authors', 'value' => 'Paulo Jacobsen, Bernardo Jacbosen'],
                    ['name' => 'Equipe', 'value' => 'Edgar Murata, Christian Rojas']
                ]
            ],
            [
                'title' => 'Technical Data',
                'content' => [
                    ['name' => 'Terrain', 'value' => '746,00m²'],
                    ['name' => 'Constructed area', 'value' => '708,00m²'],
                    ['name' => 'Project start', 'value' => '2012'],
                    ['name' => 'Project end', 'value' => '2014']
                ]
            ]
        ];
    }
}
