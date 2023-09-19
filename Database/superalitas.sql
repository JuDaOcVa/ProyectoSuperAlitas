-- Crear base de datos
--CREATE DATABASE superalitas;

-- Conectar a la base de datos
\c superalitas;

-- Estructura de tabla para la tabla `tipo_usuario`
CREATE TABLE tipo_usuario (
  id serial PRIMARY KEY,
  descripcion varchar(45) NOT NULL
);

-- Volcado de datos para la tabla `tipo_usuario`
INSERT INTO tipo_usuario (descripcion) VALUES
('ADMIN'),
('EMPLEADOS'),
('CLIENTE');

-- Estructura de tabla para la tabla `estados`
CREATE TABLE estados (
  id serial PRIMARY KEY,
  descripcion varchar(45) NOT NULL
);

-- Volcado de datos para la tabla `estados`
INSERT INTO estados (descripcion) VALUES
('ACTIVO'),
('INACTIVO');

-- Estructura de tabla para la tabla `mesas`
CREATE TABLE mesas (
  id serial PRIMARY KEY,
  descripcion varchar(45) NOT NULL,
  ubicacion varchar(45) NOT NULL,
  estado int NOT NULL,
  FOREIGN KEY (estado) REFERENCES estados (id)
);

-- Volcado de datos para la tabla `mesas`
INSERT INTO mesas (descripcion, ubicacion, estado) VALUES
('Mesa 1', 'Lado de Caja', 1),
('Mesa 2', 'Al lado del estante', 1);

-- Estructura de tabla para la tabla `usuarios`
CREATE TABLE usuarios (
  id serial PRIMARY KEY,
  nombres varchar(45) NOT NULL,
  documento varchar(45) NOT NULL,
  correo varchar(45) NOT NULL,
  contrasena varchar(45) NOT NULL,
  fecha_nacimiento date NOT NULL,
  telefono varchar(45) NOT NULL,
  id_tipo_usuario int NOT NULL,
  estado int NOT NULL,
  estado_sesion int NOT NULL,
  FOREIGN KEY (id_tipo_usuario) REFERENCES tipo_usuario (id),
  FOREIGN KEY (estado) REFERENCES estados (id),
  FOREIGN KEY (estado_sesion) REFERENCES estados (id)
);

-- Volcado de datos para la tabla `usuarios`
INSERT INTO usuarios (nombres, documento, correo, contrasena, fecha_nacimiento, telefono, id_tipo_usuario, estado, estado_sesion) VALUES
('Luis Alejandro Alvarez', '123456789', 'luisalejandro@gmail.com', '12345', '2001-05-10', '12345', 3, 1, 1),
('Juan David Ocampo Valencia', '1006009546', 'juandavidocampo80@gmail.com', '12345', '2001-12-26', '3137784186', 3, 1, 1);

-- Estructura de tabla para la tabla `reserva`
CREATE TABLE reserva (
  id serial PRIMARY KEY,
  id_usuario int NOT NULL,
  fecha_solicitud date NOT NULL,
  hora_solicitud time NOT NULL,
  fecha_reserva date NOT NULL,
  hora_reserva time NOT NULL,
  observaciones_usuario varchar(60) NOT NULL,
  costo_reserva double precision NOT NULL,
  estado int NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuarios (id),
  FOREIGN KEY (estado) REFERENCES estados (id)
);

-- Volcado de datos para la tabla `reserva`
INSERT INTO reserva (id_usuario, fecha_solicitud, hora_solicitud, fecha_reserva, hora_reserva, observaciones_usuario, costo_reserva, estado) VALUES
(2, '2023-05-21', '22:33:17', '2023-05-22', '22:30:00', 'Prueba 1', 0, 1),
(2, '2023-05-21', '22:37:26', '2023-05-22', '23:40:00', 'Prueba 2', 0, 1),
(2, '2023-05-21', '22:38:40', '2023-05-22', '22:40:00', 'Prueba 3', 0, 1),
(2, '2023-05-26', '20:29:16', '2023-05-27', '20:30:00', 'Reserva actualizada', 0, 1),
(2, '2023-05-26', '22:46:00', '2023-05-29', '21:30:00', 'Reserva familiar', 0, 1);

-- Estructura de tabla para la tabla `mesas_reserva`
CREATE TABLE mesas_reserva (
  id serial PRIMARY KEY,
  reserva int NOT NULL,
  mesa int NOT NULL,
  FOREIGN KEY (reserva) REFERENCES reserva (id),
  FOREIGN KEY (mesa) REFERENCES mesas (id)
);

-- Volcado de datos para la tabla `mesas_reserva`
INSERT INTO mesas_reserva (reserva, mesa) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1);
