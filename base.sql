-- 1. Crear Tabla Departamentos
CREATE TABLE Departamentos (
    id_dep INT AUTO_INCREMENT PRIMARY KEY,
    nombre_dep VARCHAR(100) NOT NULL
);

-- 2. Crear Tabla Empleados
CREATE TABLE Empleados (
    id_emp INT AUTO_INCREMENT PRIMARY KEY,
    nombre_completo VARCHAR(150) NOT NULL,
    id_dep INT,
    FOREIGN KEY (id_dep) REFERENCES Departamentos(id_dep)
);

-- 3. Crear Tabla Clientes
CREATE TABLE Clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(150) NOT NULL,
    correo VARCHAR(100),
    telefono VARCHAR(20)
);

-- 4. Crear Tabla Categorias
CREATE TABLE Categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nom_cat VARCHAR(100) NOT NULL,
    prioridad VARCHAR(50)
);

-- 5. Crear Tabla Tickets (La joya de la corona)
CREATE TABLE Tickets (
    id_ticket INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    estado VARCHAR(50) DEFAULT 'Abierto',
    descripcion TEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_cliente INT,
    id_empleado_creador INT,
    id_empleado_tecnico INT, -- El que lo arregla
    id_categoria INT,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente),
    FOREIGN KEY (id_empleado_creador) REFERENCES Empleados(id_emp),
    FOREIGN KEY (id_empleado_tecnico) REFERENCES Empleados(id_emp),
    FOREIGN KEY (id_categoria) REFERENCES Categorias(id_categoria)
);