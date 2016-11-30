<?php

$app->get('/users/list', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newUser')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');
$app->post('/users/login','App\Users\Controller\IndexController::loginAction')->bind('users.login');
$app->get('/Line/TravelStopId','App\Line\Controller\IndexController::getTravelStopId')->bind('line.TravelStopId');
$app->get('/Hour/list','App\Hour\Controller\IndexController::listAction')->bind('hour.list');
