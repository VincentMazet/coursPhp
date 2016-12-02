<?php

/*
 *Routing
 */

//Users
$app->get('/users/list', 'App\Users\Controller\IndexController::listUsers')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editUser')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newUser')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteUser')->bind('users.delete');
$app->post('/users/update', 'App\Users\Controller\IndexController::updateUser')->bind('users.update');
$app->get('/users/login','App\Users\Controller\IndexController::loginUser')->bind('users.login');

//Stops
$app->get('/stop/list','App\Stop\Controller\IndexController::listStops')->bind('stop.list');
$app->get('/stop','App\Stop\Controller\IndexController::getStopIdByName')->bind('stop.getStopIdByName');
$app->get('/stop/list/travel/id','App\Stop\Controller\IndexController::listTravelStopId')->bind('stop.listTravelStopId');

//Hours
$app->get('/hour/list','App\Hour\Controller\IndexController::listHours')->bind('hour.list');
$app->get('/hour/travel/stops/id','App\Hour\Controller\IndexController::getTravelFromStopsId')->bind('hour.getTravelFromStopsId');
