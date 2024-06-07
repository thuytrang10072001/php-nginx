CREATE TABLE Customer (
    id SERIAL PRIMARY KEY,
    name varchar(50),
    phone TEXT,
    address varchar(100),
    email varchar(100)
);

INSERT INTO
    Customer (name, phone, address, email)
VALUES (
        'John Doe',
        '0912341212',
        'New York City',
        'john.doe@example.com'
    ),
    (
        'Jane Smith',
        '0912341212',
        'Francisco City',
        'jane.smith@example.com'
    ),
    (
        'Anna Kenrick',
        '0912341212',
        'Washington Capital',
        'anna.kenrick@example.com'
    ),
    (
        'Taylor Swift',
        '0912341212',
        'Miami State',
        'taylor.swift@example.com'
    ),
    (
        'Charlie Puth',
        '0912341212',
        'Boston Celtic State',
        'charlie.puth@example.com'
    );