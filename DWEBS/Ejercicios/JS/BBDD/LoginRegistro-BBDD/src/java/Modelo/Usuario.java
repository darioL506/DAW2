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
    
    private String nombre;
    private String apellido;
    private String password;
    private int edad;
    private String genero;
    private String fecha;
    private boolean dwc;
    private boolean dws;
    private boolean di;
    private String curso;

    public Usuario() {
        
    }

    public Usuario(String nombre, String apellido, String password) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.password = password;
    }

    public Usuario(String nombre, String apellido, String password, int edad, String genero, String fecha, boolean dwc, boolean dws, boolean di, String curso) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.password = password;
        this.edad = edad;
        this.genero = genero;
        this.fecha = fecha;
        this.dwc = dwc;
        this.dws = dws;
        this.di = di;
        this.curso = curso;
    }

    public Usuario(String nombre, String apellido, String password, String genero, String fecha, boolean dwc, boolean dws, boolean di, String curso) {
        this.nombre = nombre;
        this.apellido = apellido;
        this.password = password;
        this.genero = genero;
        this.fecha = fecha;
        this.dwc = dwc;
        this.dws = dws;
        this.di = di;
        this.curso = curso;
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public String getApellido() {
        return apellido;
    }

    public void setApellido(String apellido) {
        this.apellido = apellido;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public int getEdad() {
        return edad;
    }

    public void setEdad(int edad) {
        this.edad = edad;
    }

    public String getGenero() {
        return genero;
    }

    public void setGenero(String genero) {
        this.genero = genero;
    }

    public String getFecha() {
        return fecha;
    }

    public void setFecha(String fecha) {
        this.fecha = fecha;
    }

    public boolean isDwc() {
        return dwc;
    }

    public void setDwc(boolean dwc) {
        this.dwc = dwc;
    }

    public boolean isDws() {
        return dws;
    }

    public void setDws(boolean dws) {
        this.dws = dws;
    }

    public boolean isDi() {
        return di;
    }

    public void setDi(boolean di) {
        this.di = di;
    }

    public String getCurso() {
        return curso;
    }

    public void setCurso(String curso) {
        this.curso = curso;
    }

    @Override
    public String toString() {
        return "Usuario{" + "nombre=" + nombre + ", apellido=" + apellido + ", password=" + password + ", edad=" + edad + ", genero=" + genero + ", fecha=" + fecha + ", dwc=" + dwc + ", dws=" + dws + ", di=" + di + ", curso=" + curso + '}';
    }
    
}

