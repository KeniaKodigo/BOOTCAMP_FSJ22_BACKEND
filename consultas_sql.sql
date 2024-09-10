-- consultas SQL
-- 2 tipos de hacer consultas SQL
-- consultas DDL, DML
-- DDL (definir la estructura de la bd) CREATE DATABASE, CREATE TABLE, ALTER TABLE, DROP TABLE, TRUNCATE TABLE
-- DML (sirven para manipular la informacion de la bd), CRUD(INSERT INTO, SELECT, UPDATE, DELETE)

-- indicamos que base de datos vamos a utilizar
use railway;
-- seleccionamos todos los registros de la tabla
-- SELECT * FROM details_bookings;
-- SELECT accommodationId, accommodationName FROM details_bookings

-- verificar reservaciones de un alojamiento en especifico (368798)
-- WHERE (clausulas) condicionar, filtrar informacion
-- SELECT * FROM details_bookings WHERE accommodationId = 368798

-- filtrando reservacion del alojamiento 368798 y que tengan un monto mayor a 500
-- SELECT * FROM details_bookings WHERE accommodationId = 368798 AND totalAmount > 500 

-- Devolver el total de reservaciones del alojamiento 368798
-- SELECT COUNT(booking) AS total_bookings FROM details_bookings WHERE accommodationId = 368798

-- Devolver reservaciones del mes de febrero
-- SELECT * FROM details_bookings WHERE EXTRACT(MONTH FROM outDate) = 2

-- Insertando un nuevo registro
-- INSERT INTO users(id, name, email, password) VALUES (60, "Kenia Paiz","kenia@gmail.com","123")
-- SELECT * FROM users
-- SELECT item_expenses FROM details_bookings
-- UPDATE / DELETE (WHERE)
-- UPDATE users SET email = "paizkenia5@gmail.com", name = "Diana" WHERE id = 60
-- DELETE FROM users WHERE id = 1 (historiales (estado))

-- CREANDO UNA NUEVA TABLA (SQL)
CREATE TABLE test (
	id_test int primary key auto_increment,
    name VARCHAR(50) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    status boolean,
    salary double
)



