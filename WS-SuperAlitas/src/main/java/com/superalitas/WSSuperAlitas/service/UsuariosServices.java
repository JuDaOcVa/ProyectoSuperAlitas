package com.superalitas.WSSuperAlitas.service;

import com.superalitas.WSSuperAlitas.dto.UsuarioDto;
import org.springframework.stereotype.Service;

@Service
public interface UsuariosServices {
    UsuarioDto login(String correo, String contrasena);

    void logout(int idUsuario);
}
