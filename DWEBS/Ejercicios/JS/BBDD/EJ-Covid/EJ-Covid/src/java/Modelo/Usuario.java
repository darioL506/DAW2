/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Modelo;

import java.text.SimpleDateFormat;
import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.LinkedList;

/**
 *
 * @author dario
 */
public class Usuario {
    
    private int id;
    private String dni;
    private String nombre;   
    private String password;
    private int rol;
    private int activo;


    public Usuario() {
        
    }

    public Usuario(int id, String dni, String nombre, int rol, int activo) {
        this.id = id;
        this.dni = dni;
        this.nombre = nombre;
        this.rol = rol;
        this.activo = activo;
    }

    public Usuario(String dni, String password) {
        this.dni = dni;
        this.password = password;
    }
       

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getDni() {
        return dni;
    }

    public void setDni(String dni) {
        this.dni = dni;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public int getRol() {
        return rol;
    }

    public void setRol(int rol) {
        this.rol = rol;
    }

    public int getActivo() {
        return activo;
    }

    public void setActivo(int activo) {
        this.activo = activo;
    }

    
    
}

