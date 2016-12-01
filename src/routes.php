<?php

$app->get('/users/list', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newUser')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');
$app->get('/users/login','App\Users\Controller\IndexController::loginAction')->bind('users.login');
$app->get('/Hour/TravelStopId','App\Hour\Controller\IndexController::getTravelStopId')->bind('hour.TravelStopId');
$app->get('/Stop/TravelStopId','App\Stop\Controller\IndexController::getStopForTravel')->bind('stop.TravelStopId');
$app->get('/Hour/list','App\Hour\Controller\IndexController::listAction')->bind('hour.list');
$app->get('/Stop/All','App\Stop\Controller\IndexController::getAll')->bind('stop.list');
