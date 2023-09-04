package com.superalitas.WSSuperAlitas.service.impl;

import com.superalitas.WSSuperAlitas.dto.UsuarioDto;
import com.superalitas.WSSuperAlitas.miscellaneous.Constantes;
import com.superalitas.WSSuperAlitas.repository.UsuariosRepository;
import com.superalitas.WSSuperAlitas.service.UsuariosServices;
import org.springframework.http.HttpStatus;
import org.springframework.stereotype.Repository;
import org.springframework.web.server.ResponseStatusException;
import org.springframework.web.servlet.mvc.method.annotation.ResponseEntityExceptionHandler;

import java.util.Optional;

@Repository
public class UsuariosServicesImpl extends ResponseEntityExceptionHandler implements UsuariosServices {

    private final UsuariosRepository usuariosRepository;

    public UsuariosServicesImpl(UsuariosRepository usuariosRepository) {
        this.usuariosRepository = usuariosRepository;
    }

    @Override
    public UsuarioDto login(String correo, String contrasena) {
        Optional<UsuarioDto> usuarioDto = usuariosRepository.consultaLogin(correo, contrasena);
        if (!usuarioDto.isPresent()) {
            throw new ResponseStatusException(
                    HttpStatus.NOT_FOUND, "Usuario no encontrado");
        }
        if (usuarioDto.get().getEstado_sesion() != Constantes.CONSTANTE_INACTIVO) {
            throw new ResponseStatusException(HttpStatus.ALREADY_REPORTED, "Usuario iniciado");
        }
        usuarioDto.get().setEstado_sesion(Constantes.CONSTANTE_ACTIVO);
        usuariosRepository.setSesion(usuarioDto.get());
        return usuarioDto.get();
    }

    @Override
    public void logout(int idUsuario) {
//        Optional<UsuarioDto> usuarioDto = usuariosRepository.consultaLogin();
//        if (!usuarioDto.isPresent()) {
//            throw new ResponseStatusException(
//                    HttpStatus.NOT_FOUND, "Usuario no encontrado");
//        }
    }
}
