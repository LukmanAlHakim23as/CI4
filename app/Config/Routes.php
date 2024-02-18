<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/anggota/DaftarAnggota', 'Anggota::DaftarAnggota');
$routes->get('/Buku/DetailBuku/(:num)', 'Buku::DetailBuku/$1');