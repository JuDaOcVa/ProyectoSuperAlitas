package com.superalitas.WSSuperAlitas.controller;

import com.superalitas.WSSuperAlitas.dto.UsuarioDto;
import com.superalitas.WSSuperAlitas.service.UsuariosServices;
import lombok.extern.slf4j.Slf4j;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
@RequestMapping("superalitas/api/users")
@Slf4j
public class ControllerUsuarios {
    @Autowired
    private UsuariosServices usuariosServices;

    public ControllerUsuarios(UsuariosServices usuariosServices) {
        this.usuariosServices = usuariosServices;
    }

    @PostMapping("/login")
    public ResponseEntity<UsuarioDto> login(@RequestParam("correo") String correo, @RequestParam("contrasena") String contrasena) {
        log.info("[{}], A entrado al microservicio Login", correo + "-" + contrasena);
        return ResponseEntity.ok().body(usuariosServices.login(correo, contrasena));
    }

    @PostMapping("/logout")
    public void logout(@RequestParam("id") int idUsuario) {
        log.info("[{}], A entrado al microservicio Logout", idUsuario);
         usuariosServices.logout(idUsuario);
    }
}
