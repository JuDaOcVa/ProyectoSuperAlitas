package com.superalitas.WSSuperAlitas.service;

import com.superalitas.WSSuperAlitas.dto.UsuarioDto;
import org.springframework.stereotype.Service;
import org.springframework.web.server.ResponseStatusException;

@Service
public interface UsuariosServices {
    UsuarioDto login(String correo, String contrasena);

    Boolean logout(int idUsuario);
}
