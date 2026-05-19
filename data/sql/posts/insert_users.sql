-- Тестовые пользователи (выполнять после create_tables.sql, до вставок постов)

USE blog;

INSERT INTO `user` (
    username,
    email,
    password_hash,
    full_name,
    avatar_url,
    role
) VALUES (
    'vanya_denisov',
    'vanya@example.com',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'Ваня Денисов',
    'src/images/avatar.png',
    'author'
);

INSERT INTO `user` (
    username,
    email,
    password_hash,
    full_name,
    avatar_url,
    role
) VALUES (
    'liza_demina',
    'liza@example.com',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    'Лиза Дёмина',
    'src/images/avatar2.png',
    'author'
);
