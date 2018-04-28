<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 07.03.2018
 * Time: 20:11
 */

namespace components\renderers;


interface IRenderer
{
    public function render ($template, $data_for_render, $params = []);
}