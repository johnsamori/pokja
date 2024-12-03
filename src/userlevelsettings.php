<?php

namespace PHPMaker2025\Pokja2025;

/**
 * User levels
 *
 * @var array<int, string, string>
 * [0] int User level ID
 * [1] string User level name
 * [2] string User level hierarchy
 */
$USER_LEVELS = [["-2","Anonymous",""],
    ["0","Default",""]];

/**
 * User roles
 *
 * @var array<int, string>
 * [0] int User level ID
 * [1] string User role name
 */
$USER_ROLES = [["-1","ROLE_ADMIN"],
    ["0","ROLE_DEFAULT"]];

/**
 * User level permissions
 *
 * @var array<string, int, int>
 * [0] string Project ID + Table name
 * [1] int User level ID
 * [2] int Permissions
 */
// Begin of modification by Masino Sinaga, September 17, 2023
$USER_LEVEL_PRIVS_1 = [["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}announcement","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}announcement","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}help","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}help","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}help_categories","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}help_categories","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}home.php","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}home.php","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}languages","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}languages","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}settings","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}settings","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}theuserprofile","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}theuserprofile","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}userlevelpermissions","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}userlevelpermissions","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}userlevels","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}userlevels","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}users","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}users","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}documents","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}documents","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}items","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}items","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}procurements","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}procurements","0","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}suppliers","-2","0"],
    ["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}suppliers","0","0"]];
$USER_LEVEL_PRIVS_2 = [["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}breadcrumblinksaddsp","-1","8"],
					["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}breadcrumblinkschecksp","-1","8"],
					["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}breadcrumblinksdeletesp","-1","8"],
					["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}breadcrumblinksmovesp","-1","8"],
					["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}loadhelponline","-2","8"],
					["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}loadaboutus","-2","8"],
					["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}loadtermsconditions","-2","8"],
					["{15F7FECB-EBDF-48AE-B272-3A5F7015D238}printtermsconditions","-2","8"]];
$USER_LEVEL_PRIVS = array_merge($USER_LEVEL_PRIVS_1, $USER_LEVEL_PRIVS_2);
// End of modification by Masino Sinaga, September 17, 2023

/**
 * Tables
 *
 * @var array<string, string, string, bool, string>
 * [0] string Table name
 * [1] string Table variable name
 * [2] string Table caption
 * [3] bool Allowed for update (for userpriv.php)
 * [4] string Project ID
 * [5] string URL (for OthersController::index)
 */
// Begin of modification by Masino Sinaga, September 17, 2023
$USER_LEVEL_TABLES_1 = [["announcement","announcement","Announcement",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","announcementlist"],
    ["help","help","Help (Details)",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","helplist"],
    ["help_categories","help_categories","Help (Categories)",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","helpcategorieslist"],
    ["home.php","home","Home",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","home"],
    ["languages","languages","Languages",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","languageslist"],
    ["settings","settings","Application Settings",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","settingslist"],
    ["theuserprofile","theuserprofile","User Profile",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","theuserprofilelist"],
    ["userlevelpermissions","userlevelpermissions","User Level Permissions",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","userlevelpermissionslist"],
    ["userlevels","userlevels","User Levels",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","userlevelslist"],
    ["users","users","Users",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","userslist"],
    ["documents","documents","documents",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","documentslist"],
    ["items","items","items",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","itemslist"],
    ["procurements","procurements","procurements",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","procurementslist"],
    ["suppliers","suppliers","suppliers",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","supplierslist"]];
$USER_LEVEL_TABLES_2 = [["breadcrumblinksaddsp","breadcrumblinksaddsp","System - Breadcrumb Links - Add",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","breadcrumblinksaddsp"],
						["breadcrumblinkschecksp","breadcrumblinkschecksp","System - Breadcrumb Links - Check",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","breadcrumblinkschecksp"],
						["breadcrumblinksdeletesp","breadcrumblinksdeletesp","System - Breadcrumb Links - Delete",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","breadcrumblinksdeletesp"],
						["breadcrumblinksmovesp","breadcrumblinksmovesp","System - Breadcrumb Links - Move",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","breadcrumblinksmovesp"],
						["loadhelponline","loadhelponline","System - Load Help Online",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","loadhelponline"],
						["loadaboutus","loadaboutus","System - Load About Us",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","loadaboutus"],
						["loadtermsconditions","loadtermsconditions","System - Load Terms and Conditions",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","loadtermsconditions"],
						["printtermsconditions","printtermsconditions","System - Print Terms and Conditions",true,"{15F7FECB-EBDF-48AE-B272-3A5F7015D238}","printtermsconditions"]];
$USER_LEVEL_TABLES = array_merge($USER_LEVEL_TABLES_1, $USER_LEVEL_TABLES_2);
// End of modification by Masino Sinaga, September 17, 2023
