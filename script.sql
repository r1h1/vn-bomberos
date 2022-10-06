
-- se crea la base de datos y se usa
-- ejecutar primero este trozo de codigo y luego
-- lo demas
create database bomberos_voluntarios_vn;
use bomberos_voluntarios_vn;


-- se crean las tablas para guardar información
create table personal_estacion(
	idPersona int primary key not null auto_increment,
    nombreCompleto varchar(100),
    noIdentificacion varchar(100),
    fechaNacimiento varchar(100),
    telefono varchar(100),
    cargo varchar(150),
    codigo varchar(100),
    usuario varchar(100),
    contrasena varchar(125),
    rolPermisos varchar(125)
);

INSERT INTO `personal_estacion`(`nombreCompleto`, `noIdentificacion`, 
`fechaNacimiento`, `telefono`, `cargo`, `codigo`, `usuario`, 
`contrasena`, `rolPermisos`) 
VALUES ('Administrador Default','1234567890','PENDIENTE DE EDICION',
'PENDIENTE DE EDICION','PENDIENTE DE EDICION','PENDIENTE DE EDICION',
'admin','Admin123BomberosV$','admin');



create table unidades_estacion(
	idUnidad int primary key not null auto_increment,
    codigoUnidad varchar(150),
    nombreUnidad varchar(100),
    placasUnidad varchar(50),
    marcaUnidad varchar(100),
    modeloUnidad varchar(100),
    tipoUnidad varchar(100)
);

INSERT INTO `unidades_estacion`(`codigoUnidad`, `nombreUnidad`, 
`placasUnidad`, `marcaUnidad`, `modeloUnidad`, `tipoUnidad`) 
VALUES ('PENDIENTE DE EDICION','PENDIENTE DE EDICION',
'PENDIENTE DE EDICION','PENDIENTE DE EDICION','PENDIENTE DE EDICION',
'PENDIENTE DE EDICION');



create table llamado_ambulancia(
	idLlamado int primary key not null auto_increment,
    controlCorrelativo varchar(250),
    fechaGeneracion varchar(100),
    horaGeneracion varchar(50),
    fechaEdicion varchar(100),
    horaEdicion varchar(50),
    nombreSolicitante varchar(100),
    telefonoSolicitante varchar(25),
    motivoLlamadoSolicitante varchar(100),
    direccionSolicitante varchar(250),
    observaciones varchar(500),
    minutosTrabajados varchar(100),
    salidaEstacion varchar(100) default '25 CIA',
    horaSalidaEstacion varchar(100),
    entradaEstacion varchar(100) default '25 CIA',
    horaEntradaEstacion varchar(100),
    cantidadPacientesAtendidos int,
    nombrePacienteAtendido varchar(100),
    cantidadDeFallecidos varchar(100),
    fallecidosEnIncidente varchar(250),
    edadPaciente varchar(250),
    nombreAcompañantePaciente varchar(150),
    tipoDeServicioProporcionado varchar(150),
    trasladoHacia varchar(150),
    fkTelefonista int,
    fkPiloto int,
    fkPersonalDestacado int,
    fkUnidadUtilizada int,
    foreign key (fkTelefonista) references personal_estacion(idPersona),
    foreign key (fkPiloto) references personal_estacion(idPersona),
    foreign key (fkPersonalDestacado) references personal_estacion(idPersona),
    foreign key (fkUnidadUtilizada) references unidades_estacion(idUnidad)
);


create table llamado_incendio(
	idLlamado int primary key not null auto_increment,
    controlCorrelativo varchar(250),
    fechaGeneracion varchar(100),
    horaGeneracion varchar(50),
    fechaEdicion varchar(100),
    horaEdicion varchar(50),
    nombreSolicitante varchar(100),
    telefonoSolicitante varchar(25),
    motivoLlamadoSolicitante varchar(100),
    direccionSolicitante varchar(250),
    observaciones varchar(500),
    minutosTrabajados int,
    llamadaRecibidaDe varchar(150),
    salidaEstacion varchar(100) default '25 CIA',
    horaSalidaEstacion varchar(100),
    entradaEstacion varchar(100) default '25 CIA',
    horaEntradaEstacion varchar(100),
    propietarioInmueble varchar(250),
    sitioDondePrincipioElIncendio varchar(250),
    causasIncendio varchar(250),
    valorAproximadoInmueble varchar(250),
    montoAproximadoPerdidasInmueble varchar(250),
    compañiaAseguradoraInmueble varchar(250),
    propietarioVehiculo varchar(250),
    conductorVehiculo varchar(250),
    descripcionTipoVehiculo varchar(250),
    marcaVehiculo varchar(250),
    modeloVehiculo varchar(250),
    placasVehiculo varchar(250),
    valorAproximadoVehiculo varchar(250),
    perdidasAproximadoVehiculo varchar(250),
    compañiaAseguradoraVehiculo varchar(250),
    fkTelefonista int,
    fkPiloto int,
    fkPersonalDestacado int,
    fkUnidadUtilizada int,
    foreign key (fkTelefonista) references personal_estacion(idPersona),
    foreign key (fkPiloto) references personal_estacion(idPersona),
    foreign key (fkPersonalDestacado) references personal_estacion(idPersona),
    foreign key (fkUnidadUtilizada) references unidades_estacion(idUnidad)
);


create table llamado_rescate(
	idLlamado int primary key not null auto_increment,
    controlCorrelativo varchar(250),
    fechaGeneracion varchar(100),
    horaGeneracion varchar(50),
    fechaEdicion varchar(100),
    horaEdicion varchar(50),
    nombreSolicitante varchar(100),
    telefonoSolicitante varchar(25),
    motivoLlamadoSolicitante varchar(100),
    direccionSolicitante varchar(250),
    observaciones varchar(500),
    minutosTrabajados int,
    formaDeAvisoPorTelefono varchar(100),
    salidaEstacion varchar(100) default '25 CIA',
    horaSalidaEstacion varchar(100),
    entradaEstacion varchar(100) default '25 CIA',
    horaEntradaEstacion varchar(100),
    nombreRescatados varchar(250),
    edadRescatados varchar(250),
    trasladoHacia varchar(150),
    fkTelefonista int,
    fkPiloto int,
    fkPersonalDestacado int,
    fkUnidadUtilizada int,
    foreign key (fkTelefonista) references personal_estacion(idPersona),
    foreign key (fkPiloto) references personal_estacion(idPersona),
    foreign key (fkPersonalDestacado) references personal_estacion(idPersona),
    foreign key (fkUnidadUtilizada) references unidades_estacion(idUnidad)
);


create table llamado_servicios_varios(
	idLlamado int primary key not null auto_increment,
    controlCorrelativo varchar(250),
    fechaGeneracion varchar(100),
    horaGeneracion varchar(50),
    fechaEdicion varchar(100),
    horaEdicion varchar(50),
    nombreSolicitante varchar(100),
    telefonoSolicitante varchar(25),
    motivoLlamadoSolicitante varchar(100),
    direccionSolicitante varchar(250),
    observaciones varchar(500),
    minutosTrabajados int,
    solicitudPorTelefono varchar(150),
    claseDeServicio varchar(250),
    salidaEstacion varchar(100) default '25 CIA',
    horaSalidaEstacion varchar(100),
    entradaEstacion varchar(100) default '25 CIA',
    horaEntradaEstacion varchar(100),
    fkTelefonista int,
    fkPiloto int,
    fkPersonalDestacado int,
    fkUnidadUtilizada int,
    foreign key (fkTelefonista) references personal_estacion(idPersona),
    foreign key (fkPiloto) references personal_estacion(idPersona),
    foreign key (fkPersonalDestacado) references personal_estacion(idPersona),
    foreign key (fkUnidadUtilizada) references unidades_estacion(idUnidad)
);


-- se crean los procedimientos almacenados para logica de negocio (bussiness)

-- inserts
-- procedimiento para insertar nuevo personal
DELIMITER //
create procedure insertarPersonal(
    in varNombre varchar(100),
    in varIdentificacion varchar(100),
    in varFechaNacimiento varchar(100),
    in varTelefono varchar(100),
    in varCargo varchar(100),
    in varCodigo varchar(100),
    in varUsuario varchar(100),
    in varContrasena varchar(100),
    in varRol varchar(100)
)
begin
	INSERT INTO `personal_estacion`(`nombreCompleto`, `noIdentificacion`, `fechaNacimiento`, `telefono`, `cargo`, `codigo`, `usuario`, `contrasena`, `rolPermisos`) 
	VALUES (varNombre,varIdentificacion,varFechaNacimiento,varTelefono,varCargo,varCodigo,varUsuario,varContrasena,varRol);
end //
DELIMITER ;


-- procedimiento para insertar nueva unidad
DELIMITER //
create procedure insertarUnidad(
    in varCodigoUnidad varchar(100),
    in varNombreUnidad varchar(100),
    in varPlacasUnidad varchar(100),
    in varMarcaUnidad varchar(100),
    in varModeloUnidad varchar(100),
    in varTipoUnidad varchar(100)
)
begin
	INSERT INTO `unidades_estacion`(`codigoUnidad`, `nombreUnidad`, `placasUnidad`, `marcaUnidad`, `modeloUnidad`, `tipoUnidad`) 
	VALUES (varCodigoUnidad,varNombreUnidad,varPlacasUnidad,varMarcaUnidad,varModeloUnidad,varTipoUnidad);
end //
DELIMITER ;



-- procedimiento para insertar nuevo llamado ambulancia
DELIMITER //
create procedure insertarLlamadoAmbulancia(
    in varControlCorrelativo varchar(100),
    in varFechaGeneracion varchar(100),
    in varHoraGeneracion varchar(100),
    in varTelefonistaID varchar(100),
    in varNombreSolicitante varchar(100),
    in varMotivoLlamado varchar(100),
    in varDireccionSolicitante varchar(100),
    in varTelefono varchar(100),
    in varObservaciones varchar(100)
)
begin
	INSERT INTO `llamado_ambulancia`(`controlCorrelativo`, `fechaGeneracion`, `horaGeneracion`, `fechaEdicion`, 
                `horaEdicion`, `nombreSolicitante`, `telefonoSolicitante`, `motivoLlamadoSolicitante`, 
                `direccionSolicitante`, `observaciones`, `minutosTrabajados`, `salidaEstacion`, `horaSalidaEstacion`, 
                `entradaEstacion`, `horaEntradaEstacion`, `cantidadPacientesAtendidos`, `nombrePacienteAtendido`, 
                `cantidadDeFallecidos`, `fallecidosEnIncidente`, `edadPaciente`, `nombreAcompañantePaciente`, 
                `tipoDeServicioProporcionado`, `trasladoHacia`, `fkTelefonista`, `fkPiloto`, `fkPersonalDestacado`, 
                `fkUnidadUtilizada`) 
    			VALUES(varControlCorrelativo,varFechaGeneracion,varHoraGeneracion,'PENDIENTE','PENDIENTE',
                       varNombreSolicitante,varTelefono,varMotivoLlamado,varDireccionSolicitante,varObservaciones,
                        'PENDIENTE','CIA 25','PENDIENTE','CIA 25','PENDIENTE','PENDIENTE','PENDIENTE',
                        'PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE','PENDIENTE',varTelefonistaID,1,1,1);
end //
DELIMITER ;



-- selects
-- procedimiento para traer datos del personal según ID
DELIMITER //
create procedure consultarPersonalPorID(
	in varIdBusqueda varchar(100)
)
begin
	SELECT * FROM `personal_estacion` WHERE idPersona = varIdBusqueda;
end //
DELIMITER ;



-- procedimiento para traer datos de las unidades según ID
DELIMITER //
create procedure consultarUnidadPorID(
	in varIdBusqueda varchar(100)
)
begin
	SELECT * FROM `unidades_estacion` WHERE idUnidad = varIdBusqueda;
end //
DELIMITER ;



-- procedimiento para traer datos del llamado ambulancia según ID
DELIMITER //
create procedure consultarLlamadoAmbulanciaPorID(
	in varIdBusqueda varchar(100)
)
begin
	SELECT * FROM `llamado_ambulancia` WHERE idLlamado = varIdBusqueda;
end //
DELIMITER ;



-- procedimiento para traer todos los datos del personal
DELIMITER //
create procedure consultarTodosLosDatosPersonal(
)
begin
	SELECT * FROM `personal_estacion` WHERE codigo NOT IN ('PENDIENTE DE EDICION');
end //
DELIMITER ;


-- procedimiento para traer todos los datos de las unidades
DELIMITER //
create procedure consultarTodosLosDatosUnidades(
)
begin
	SELECT * FROM `unidades_estacion` WHERE codigoUnidad NOT IN ('PENDIENTE DE EDICION');
end //
DELIMITER ;


-- procedimiento para traer todos los datos de las llamadas ambulancia
DELIMITER //
create procedure consultarTodasLasLlamadasAmbulancia(
)
begin
	SELECT llamadoa.idLlamado,llamadoa.controlCorrelativo,llamadoa.fechaGeneracion,
    llamadoa.horaGeneracion,llamadoa.fechaEdicion,llamadoa.horaEdicion, 
    llamadoa.nombreSolicitante,llamadoa.telefonoSolicitante,llamadoa.motivoLlamadoSolicitante,
    llamadoa.direccionSolicitante,llamadoa.observaciones, llamadoa.minutosTrabajados,
    llamadoa.salidaEstacion,llamadoa.horaSalidaEstacion,llamadoa.entradaEstacion,
    llamadoa.horaEntradaEstacion, llamadoa.cantidadPacientesAtendidos,
    llamadoa.nombrePacienteAtendido,llamadoa.cantidadDeFallecidos,llamadoa.fallecidosEnIncidente, 
    llamadoa.edadPaciente, llamadoa.nombreAcompañantePaciente,llamadoa.tipoDeServicioProporcionado,
    llamadoa.trasladoHacia,personal.nombreCompleto,unidades.nombreUnidad 
    FROM `llamado_ambulancia` llamadoa 
    INNER JOIN personal_estacion personal ON llamadoa.fkTelefonista = personal.idPersona 
    INNER JOIN unidades_estacion unidades ON llamadoa.fkUnidadUtilizada = unidades.idUnidad;
end //
DELIMITER ;



-- procedimiento para loguearse al sistema
DELIMITER //
create procedure inicioDeSesionSistema(
	in varUsuario varchar(100),
    in varContrasena varchar(150)
)
begin
	select nombreCompleto,usuario,contrasena,rolPermisos from `personal_estacion` 
    where usuario = varUsuario and contrasena = varContrasena;
end //
DELIMITER ;



-- procedimiento para contar el total de personal en estación
DELIMITER //
create procedure consultarTotalDePersonalEstacion(
)
begin
	SELECT COUNT(*) AS totalPersonal FROM personal_estacion;
end //
DELIMITER ;



-- procedimiento para contar el total de llamadas ambulancia
DELIMITER //
create procedure consultarTotalDeLlamadasAmbulancia(
)
begin
	SELECT COUNT(*) AS total FROM llamado_ambulancia;
end //
DELIMITER ;



-- procedimiento para contar el total de llamadas incendio
DELIMITER //
create procedure consultarTotalDeLlamadasIncendio(
)
begin
	SELECT COUNT(*) AS total FROM llamado_incendio;
end //
DELIMITER ;



-- procedimiento para contar el total de llamadas rescate
DELIMITER //
create procedure consultarTotalDeLlamadasRescate(
)
begin
	SELECT COUNT(*) AS total FROM llamado_rescate;
end //
DELIMITER ;



-- procedimiento para contar el total de llamadas servicios varios
DELIMITER //
create procedure consultarTotalDeLlamadasVarios(
)
begin
	SELECT COUNT(*) AS total FROM llamado_servicios_varios;
end //
DELIMITER ;



-- procedimiento para traer datos del personal por where like
DELIMITER //
create procedure consultarPersonalPorWhereLike(
	in varDatoBusqueda varchar(100)
)
begin
	SELECT * FROM `personal_estacion` WHERE codigo LIKE CONCAT('%', varDatoBusqueda , '%')
                   OR cargo LIKE CONCAT('%', varDatoBusqueda , '%') 
		           OR nombreCompleto LIKE CONCAT('%', varDatoBusqueda , '%') 
                   OR noIdentificacion LIKE CONCAT('%', varDatoBusqueda , '%')
                   OR fechaNacimiento LIKE CONCAT('%', varDatoBusqueda , '%') 
                   OR telefono LIKE CONCAT('%', varDatoBusqueda , '%') 
                   OR usuario LIKE CONCAT('%', varDatoBusqueda , '%') 
                   OR contrasena LIKE CONCAT('%', varDatoBusqueda , '%')
                   OR rolPermisos LIKE CONCAT('%', varDatoBusqueda , '%');
end //
DELIMITER ;



-- procedimiento para traer datos de las unidades por where like
DELIMITER //
create procedure consultarUnidadesPorWhereLike(
	in varDatoBusqueda varchar(100)
)
begin
	SELECT * FROM `unidades_estacion` WHERE codigoUnidad LIKE CONCAT('%', varDatoBusqueda , '%')
    								  OR nombreUnidad LIKE CONCAT('%', varDatoBusqueda , '%')
                                      OR placasUnidad LIKE CONCAT('%', varDatoBusqueda , '%')
                                      OR marcaUnidad LIKE CONCAT('%', varDatoBusqueda , '%')
                                      OR modeloUnidad LIKE CONCAT('%', varDatoBusqueda , '%')
                                      OR tipoUnidad LIKE CONCAT('%', varDatoBusqueda , '%');           
end //
DELIMITER ;




-- procedimiento para traer datos del personal por su identificacion
DELIMITER //
create procedure consultarPersonalPorIdentificacion(
	in varIdentificacionBusqueda varchar(100)
)
begin
	SELECT idPersona FROM `personal_estacion` WHERE noIdentificacion = varIdentificacionBusqueda;
end //
DELIMITER ;




-- update
-- procedimiento para editar una persona por ID
DELIMITER //
create procedure editarPersonalPorID(
	in varIdPersona varchar(100),
    in varNombre varchar(100),
    in varIdentificacion varchar(100),
    in varFechaNacimiento varchar(100),
    in varTelefono varchar(100),
    in varCargo varchar(100),
    in varCodigo varchar(100),
    in varUsuario varchar(100),
    in varContrasena varchar(100),
    in varRol varchar(100)
)
begin
	UPDATE `personal_estacion` SET `nombreCompleto`= varNombre,`noIdentificacion`= varIdentificacion,`fechaNacimiento`= varFechaNacimiento,
    `telefono`= varTelefono,`cargo`= varCargo,`codigo`= varCodigo,`usuario`= varUsuario,`contrasena`= varContrasena,`rolPermisos`= varRol 
    WHERE `idPersona`= varIdPersona;
end //
DELIMITER ;



-- procedimiento para editar una unidad por ID
DELIMITER //
create procedure editarUnidadPorID(
	in varIdEdicion varchar(100),
    in varCodigoUnidad varchar(100),
    in varNombreUnidad varchar(100),
    in varPlacasUnidad varchar(100),
    in varMarcaUnidad varchar(100),
    in varModeloUnidad varchar(100),
    in varTipoUnidad varchar(100)
)
begin
	UPDATE `unidades_estacion` SET `codigoUnidad`= varCodigoUnidad,`nombreUnidad`= varNombreUnidad,`placasUnidad`= varPlacasUnidad,
    		`marcaUnidad`= varMarcaUnidad,`modeloUnidad`= varModeloUnidad,`tipoUnidad`= varTipoUnidad WHERE `idUnidad`= varIdEdicion;
end //
DELIMITER ;



-- procedimiento para editar contraseña del personal por su identificacion
DELIMITER //
create procedure cambiarContrasenaPersonalPorIdentificacion(
	in varContrasenaNueva varchar(100),
    in varNoIdentificacion varchar(100)
)
begin
	UPDATE `personal_estacion` SET `contrasena`= varContrasenaNueva WHERE `noIdentificacion`= varNoIdentificacion;
end //
DELIMITER ;




-- delete
-- procedimiento para borrar una persona por ID
DELIMITER //
create procedure borrarPersonalPorID(
	in varIdPersona varchar(100)
)
begin
	DELETE FROM `personal_estacion` WHERE idPersona = varIdPersona;
end //
DELIMITER ;


-- procedimiento para borrar una unidad por ID
DELIMITER //
create procedure borrarUnidadPorID(
	in varIdBusqueda varchar(100)
)
begin
	DELETE FROM `unidades_estacion` WHERE idUnidad = varIdBusqueda;
end //
DELIMITER ;



-- procedimiento para borrar un llamado de ambulancia por ID
DELIMITER //
create procedure borrarLlamadoAmbulanciaPorID(
	in varIdBusqueda varchar(100)
)
begin
	DELETE FROM `llamado_ambulancia` WHERE idLlamado = varIdBusqueda;
end //
DELIMITER ;