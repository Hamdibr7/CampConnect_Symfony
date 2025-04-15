<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/avis' => [[['_route' => 'app_admin_avis_index', '_controller' => 'App\\Controller\\Admin\\AvisController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/camping' => [[['_route' => 'app_admin_camping_index', '_controller' => 'App\\Controller\\Admin\\CampingController::index'], null, ['GET' => 0], null, true, false, null]],
        '/admin/camping/new' => [[['_route' => 'app_admin_camping_new', '_controller' => 'App\\Controller\\Admin\\CampingController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/camping' => [[['_route' => 'app_camping_index', '_controller' => 'App\\Controller\\Front\\CampingController::index'], null, ['GET' => 0], null, true, false, null]],
        '/camping/new' => [[['_route' => 'app_camping_new', '_controller' => 'App\\Controller\\Front\\CampingController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/about' => [[['_route' => 'app_about', '_controller' => 'App\\Controller\\HomeController::about'], null, null, null, false, false, null]],
        '/contact' => [[['_route' => 'app_contact', '_controller' => 'App\\Controller\\HomeController::contact'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\SecurityController::register'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/test-image' => [[['_route' => 'app_test_image', '_controller' => 'App\\Controller\\TestImageController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/a(?'
                    .'|dmin/(?'
                        .'|avis/(?'
                            .'|camping/([^/]++)(?'
                                .'|(*:242)'
                                .'|/new(*:254)'
                            .')'
                            .'|([^/]++)(?'
                                .'|(*:274)'
                                .'|/edit(*:287)'
                                .'|(*:295)'
                            .')'
                        .')'
                        .'|camping/([^/]++)(?'
                            .'|(*:324)'
                            .'|/edit(*:337)'
                            .'|(*:345)'
                        .')'
                    .')'
                    .'|vis/(?'
                        .'|camping/([^/]++)/new(*:382)'
                        .'|([^/]++)(?'
                            .'|/edit(*:406)'
                            .'|(*:414)'
                        .')'
                    .')'
                .')'
                .'|/camping/([^/]++)(?'
                    .'|(*:445)'
                    .'|/edit(*:458)'
                    .'|(*:466)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        242 => [[['_route' => 'app_admin_avis_by_camping', '_controller' => 'App\\Controller\\Admin\\AvisController::avisByCamping'], ['id'], ['GET' => 0], null, false, true, null]],
        254 => [[['_route' => 'app_admin_avis_new', '_controller' => 'App\\Controller\\Admin\\AvisController::new'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        274 => [[['_route' => 'app_admin_avis_show', '_controller' => 'App\\Controller\\Admin\\AvisController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        287 => [[['_route' => 'app_admin_avis_edit', '_controller' => 'App\\Controller\\Admin\\AvisController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        295 => [[['_route' => 'app_admin_avis_delete', '_controller' => 'App\\Controller\\Admin\\AvisController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        324 => [[['_route' => 'app_admin_camping_show', '_controller' => 'App\\Controller\\Admin\\CampingController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        337 => [[['_route' => 'app_admin_camping_edit', '_controller' => 'App\\Controller\\Admin\\CampingController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        345 => [[['_route' => 'app_admin_camping_delete', '_controller' => 'App\\Controller\\Admin\\CampingController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        382 => [[['_route' => 'app_avis_new', '_controller' => 'App\\Controller\\Front\\AvisController::new'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        406 => [[['_route' => 'app_avis_edit', '_controller' => 'App\\Controller\\Front\\AvisController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        414 => [[['_route' => 'app_avis_delete', '_controller' => 'App\\Controller\\Front\\AvisController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        445 => [[['_route' => 'app_camping_show', '_controller' => 'App\\Controller\\Front\\CampingController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        458 => [[['_route' => 'app_camping_edit', '_controller' => 'App\\Controller\\Front\\CampingController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        466 => [
            [['_route' => 'app_camping_delete', '_controller' => 'App\\Controller\\Front\\CampingController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
