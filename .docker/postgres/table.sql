CREATE TABLE Customer (
    id SERIAL PRIMARY KEY,
    name varchar(50),
    address varchar(100),
    email varchar(100)
);

INSERT INTO
    Customer (name, address, email)
VALUES (
        'John Doe',
        'New York City',
        'john.doe@example.com'
    ),
    (
        'Jane Smith',
        'Francisco City',
        'jane.smith@example.com'
    ),
    (
        'Anna Kenrick',
        'Washington Capital',
        'anna.kenrick@example.com'
    ),
    (
        'Taylor Swift',
        'Miami State',
        'taylor.swift@example.com'
    ),
    (
        'Charlie Puth',
        'Boston Celtic State',
        'charlie.puth@example.com'
    );