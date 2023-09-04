package com.superalitas.WSSuperAlitas.dto;

import lombok.Data;

@Data
public class UsuarioDto {

    private int id;
    public String nombres, documento, correo, contrasena, fecha_nacimiento, telefono;
    private int id_tipo_usuario;
    private int estado;
    private Integer estado_sesion;
}
