BEGIN;

INSERT INTO
    users
VALUES
    (
        NULL,
        'ichiro',
        '$2y$10$iYG.GvlbVT61GShMKZgB/OGfQQB0sn4Q3iRg1olQ0Qd6pi3OUe9bG',
        'ichiro@example.com',
        NULL,
        0,
        '2020-11-01 08:53:15',
        '2020-11-01 08:53:15',
        0
    );

INSERT INTO
    users
VALUES
    (
        NULL,
        'jiro',
        '$2y$10$/tu4uS4gy/vGQb/rtomghu8wU824xlv75frdey1OOIfpPBE30vPim',
        'jiro@example.com',
        NULL,
        1,
        '2020-11-01 21:27:38',
        '2020-11-01 21:27:38',
        0
    );

INSERT INTO
    users
VALUES
    (
        NULL,
        'saburo',
        '$2y$10$WMrNXmWqDKS1Un3S1WrfGuO7nRwD0NoxcIMloSwLq28HEeXCOqLmq',
        'saburo@example.com',
        NULL,
        0,
        '2020-11-02 23:16:09',
        '2020-11-02 23:16:09',
        0
    );

INSERT INTO
    users
VALUES
    (
        NULL,
        'george',
        '$2y$10$YO6dmEuijClABvl3SSKps.CixkiH0GhSkd1pu.kHMM0IEn7IQEPjW',
        'george@example.com',
        NULL,
        0,
        '2020-11-05 12:49:21',
        '2020-11-08 18:52:29',
        0
    );

COMMIT;
