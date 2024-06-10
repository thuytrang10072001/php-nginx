CREATE TABLE Customer (
    id SERIAL PRIMARY KEY,
    name varchar(50),
    phone TEXT,
    address varchar(100),
    email varchar(100),
    pass varchar(50)
);

INSERT INTO
    Customer (name, phone, address, email, pass)
VALUES (
        'John Doe',
        '0912341212',
        'New York City',
        'john.doe@example.com',
        '123456'
    ),
    (
        'Jane Smith',
        '0912341212',
        'Francisco City',
        'jane.smith@example.com',
        '123456'
    ),
    (
        'Anna Kenrick',
        '0912341212',
        'Washington Capital',
        'anna.kenrick@example.com',
        '123465'
    ),
    (
        'Taylor Swift',
        '0912341212',
        'Miami State',
        'taylor.swift@example.com',
        '123465'
    ),
    (
        'Charlie Puth',
        '0912341212',
        'Boston Celtic State',
        'charlie.puth@example.com',
        '123456'
    );