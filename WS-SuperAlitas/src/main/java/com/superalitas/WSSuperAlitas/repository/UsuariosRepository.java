package com.superalitas.WSSuperAlitas.repository;

import com.superalitas.WSSuperAlitas.dto.UsuarioDto;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.dao.DataAccessException;
import org.springframework.jdbc.core.BeanPropertyRowMapper;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.namedparam.MapSqlParameterSource;
import org.springframework.jdbc.core.namedparam.NamedParameterJdbcTemplate;
import org.springframework.stereotype.Repository;

import java.util.Optional;

@Repository
public class UsuariosRepository {
    @Autowired
    private JdbcTemplate jdbc;

    public UsuariosRepository(JdbcTemplate jdbc) {
        this.jdbc = jdbc;
    }

    public Optional<UsuarioDto> consultaLogin(String correo, String contrasena) {

        NamedParameterJdbcTemplate namedParameterJdbcTemplate = new NamedParameterJdbcTemplate(jdbc.getDataSource());
        MapSqlParameterSource mapSqlParameterSource = new MapSqlParameterSource();

        String consulta = " SELECT * FROM usuarios WHERE correo= :correo AND contrasena= :contrasena";

        mapSqlParameterSource.addValue("correo", correo);
        mapSqlParameterSource.addValue("contrasena", contrasena);
        try {
            UsuarioDto usuarioDto = namedParameterJdbcTemplate.queryForObject(consulta, mapSqlParameterSource, new BeanPropertyRowMapper<>(UsuarioDto.class));
            return Optional.of(usuarioDto);
        } catch (DataAccessException e) {
            return Optional.empty();
        }
    }

    public void setSesion(UsuarioDto usuarioDto) {
        try {
            String updateQuery = "UPDATE usuarios set estado_sesion = ? where id = ?";
            jdbc.update(updateQuery, usuarioDto.getEstado_sesion(), usuarioDto.getId());
        } catch (DataAccessException e) {
            throw new RuntimeException(e);
        }
    }

    public Optional<UsuarioDto> consultarLoginPorId(int idUsuario) {
        NamedParameterJdbcTemplate namedParameterJdbcTemplate = new NamedParameterJdbcTemplate(jdbc.getDataSource());
        MapSqlParameterSource mapSqlParameterSource = new MapSqlParameterSource();

        String consulta = " SELECT * FROM usuarios WHERE id = :idUsuario";

        mapSqlParameterSource.addValue("idUsuario", idUsuario);

        try {
            UsuarioDto usuarioDto = namedParameterJdbcTemplate.queryForObject(consulta, mapSqlParameterSource, new BeanPropertyRowMapper<>(UsuarioDto.class));
            return Optional.of(usuarioDto);
        } catch (DataAccessException e) {
            return Optional.empty();
        }
    }

}
