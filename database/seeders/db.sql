INSERT INTO quanlysanbong.admin_menu (id, parent_id, `order`, title, icon, uri, permission, created_at, updated_at)
VALUES (1, 0, 1, 'Dashboard', 'fa-bar-chart', '/', null, null, null);
INSERT INTO quanlysanbong.admin_menu (id, parent_id, `order`, title, icon, uri, permission, created_at, updated_at)
VALUES (2, 0, 2, 'Admin', 'fa-tasks', null, null, null, null);
INSERT INTO quanlysanbong.admin_menu (id, parent_id, `order`, title, icon, uri, permission, created_at, updated_at)
VALUES (3, 2, 3, 'User', 'fa-users', 'auth/users', null, null, null);
INSERT INTO quanlysanbong.admin_menu (id, parent_id, `order`, title, icon, uri, permission, created_at, updated_at)
VALUES (4, 2, 5, 'Roles', 'fa-user', 'auth/roles', null, null, null);
INSERT INTO quanlysanbong.admin_menu (id, parent_id, `order`, title, icon, uri, permission, created_at, updated_at)
VALUES (5, 2, 6, 'Permission', 'fa-ban', 'auth/permissions', null, null, null);
INSERT INTO quanlysanbong.admin_menu (id, parent_id, `order`, title, icon, uri, permission, created_at, updated_at)
VALUES (6, 2, 7, 'Menu', 'fa-bars', 'auth/menu', null, null, null);
INSERT INTO quanlysanbong.admin_menu (id, parent_id, `order`, title, icon, uri, permission, created_at, updated_at)
VALUES (7, 2, 8, 'Operation log', 'fa-history', 'auth/logs', null, null, null);
INSERT INTO quanlysanbong.admin_menu (id, parent_id, `order`, title, icon, uri, permission, created_at, updated_at)
VALUES (8, 2, 4, 'Field', 'fa-soccer-ball-o', 'auth/fields', null, null, null);
INSERT INTO quanlysanbong.admin_permissions (id, name, slug, http_method, http_path, created_at, updated_at)
VALUES (1, 'All permission', '*', null, '*', null, null);
INSERT INTO quanlysanbong.admin_permissions (id, name, slug, http_method, http_path, created_at, updated_at)
VALUES (2, 'Dashboard', 'dashboard', 'GET', '/', null, null);
INSERT INTO quanlysanbong.admin_permissions (id, name, slug, http_method, http_path, created_at, updated_at)
VALUES (3, 'User', 'user', 'GET,POST,PUT,DELETE,PATCH', '/auth/users
/auth/users/*
/auth/users/*/edit
/auth/users/create', '2022-04-07 03:01:53', '2022-04-07 03:24:20');
INSERT INTO quanlysanbong.admin_role_menu (role_id, menu_id, created_at, updated_at)
VALUES (1, 2, null, null);
INSERT INTO quanlysanbong.admin_role_permissions (role_id, permission_id, created_at, updated_at)
VALUES (1, 1, null, null);
INSERT INTO quanlysanbong.admin_role_permissions (role_id, permission_id, created_at, updated_at)
VALUES (2, 2, null, null);
INSERT INTO quanlysanbong.admin_role_permissions (role_id, permission_id, created_at, updated_at)
VALUES (2, 3, null, null);
INSERT INTO quanlysanbong.admin_role_users (role_id, user_id, created_at, updated_at)
VALUES (1, 1, null, null);
INSERT INTO quanlysanbong.admin_role_users (role_id, user_id, created_at, updated_at)
VALUES (2, 2, null, null);
INSERT INTO quanlysanbong.admin_roles (id, name, slug, created_at, updated_at)
VALUES (1, 'Administrator', 'administrator', null, null);
INSERT INTO quanlysanbong.admin_roles (id, name, slug, created_at, updated_at)
VALUES (2, 'User', 'user', null, null);
INSERT INTO quanlysanbong.admin_user_permissions (user_id, permission_id, created_at, updated_at)
VALUES (2, 2, null, null);
INSERT INTO quanlysanbong.admin_user_permissions (user_id, permission_id, created_at, updated_at)
VALUES (2, 3, null, null);
