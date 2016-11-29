<?php

$app->get('/users/list', 'App\Users\Controller\IndexController::listAction')->bind('users.list');
$app->get('/users/edit/{id}', 'App\Users\Controller\IndexController::editAction')->bind('users.edit');
$app->get('/users/new', 'App\Users\Controller\IndexController::newAction')->bind('users.new');
$app->post('/users/delete/{id}', 'App\Users\Controller\IndexController::deleteAction')->bind('users.delete');
$app->post('/users/save', 'App\Users\Controller\IndexController::saveAction')->bind('users.save');
$app->post('/users/login','App\Users\Controller\IndexController::loginAction')->bind('users.login');
$app->get('/passage/line','App\Passage\Controller\IndexController::getLine')->bind('passage.line');
$app->get('/passage/AllStops','App\Passage\Controller\IndexController::getAllStops')->bind('passage.AllStops');
$app->get('/passage/StopNameById','App\Passage\Controller\IndexController::getStopNameById')->bind('passage.StopNameById');
$app->get('/passage/NextStop','App\Passage\Controller\IndexController::getNextStop')->bind('passage.NextStop');
$app->get('/passage/PreviousStop','App\Passage\Controller\IndexController::getPreviousStop')->bind('passage.PreviousStop');
