<?php

class Controller
{
    public function view($view, $data = [])
    {
        extract($data);
        $file = '../app/views/' . $view . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            throw new Exception("View file tidak ditemukan: " . $file);
        }
    }

    public function model($model)
    {
        $file = '../app/models/' . $model . '.php';
        if (file_exists($file)) {
            require_once $file;
            return new $model;
        } else {
            throw new Exception("Model file tidak ditemukan: " . $file);
        }
    }
}
