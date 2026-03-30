<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::home');
$routes->get('about', 'Pages::about');
$routes->get('projects', 'Pages::projects');
$routes->get('projects/(:segment)', 'Pages::projectDetail/$1');
$routes->get('contact', 'Pages::contact');
$routes->post('contact', 'Pages::submitContact');

// Admin Auth
$routes->get('admin/login', 'Admin\\AuthController::loginForm');
$routes->post('admin/login', 'Admin\\AuthController::attemptLogin');
$routes->post('admin/logout', 'Admin\\AuthController::logout');

$routes->group('admin', ['namespace' => 'App\\Controllers\\Admin', 'filter' => 'adminauth'], function ($routes) {
    $routes->get('/', 'DashboardController::index');

    // Home Banners
    $routes->get('banners', 'HomeBannerController::index');
    $routes->get('banners/create', 'HomeBannerController::create');
    $routes->post('banners/store', 'HomeBannerController::store');
    $routes->get('banners/edit/(:num)', 'HomeBannerController::edit/$1');
    $routes->post('banners/update/(:num)', 'HomeBannerController::update/$1');
    $routes->post('banners/delete/(:num)', 'HomeBannerController::delete/$1');

    // Portfolios
    $routes->get('portfolios', 'PortfolioController::index');
    $routes->get('portfolios/create', 'PortfolioController::create');
    $routes->post('portfolios/store', 'PortfolioController::store');
    $routes->get('portfolios/edit/(:num)', 'PortfolioController::edit/$1');
    $routes->post('portfolios/update/(:num)', 'PortfolioController::update/$1');
    $routes->post('portfolios/delete/(:num)', 'PortfolioController::delete/$1');
    $routes->post('portfolios/(:num)/images/(:num)/delete', 'PortfolioController::deleteImage/$1/$2');
});
