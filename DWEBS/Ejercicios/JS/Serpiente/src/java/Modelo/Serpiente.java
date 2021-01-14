/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Modelo;

import java.util.LinkedList;

/**
 *
 * @author alejandro
 */
public class Serpiente {

    private int edad;
    private LinkedList color;

    public Serpiente() {
        this.edad = 1;
        this.color = new LinkedList();
        this.color.add(dameColor());
    }

    public Serpiente(int edad, LinkedList color) {
        this.edad = edad;
        this.color = color;
    }

    public int getEdad() {
        return edad;
    }

    public String getColor(int i) {
        return (String) this.color.get(i);
    }

    public void remove() {
        color.remove();
    }

    public void crece() {
        this.edad++;
        int alea = (int) (Math.random() * 100 + 1);

        if (this.edad <= 10) {
            if (alea <= 70) {
                this.color.add(dameColor());
            } else {
                mudaPiel();
            }
        } else {
            if (alea <= 80) {
                if (this.color.size() > 0) {
                    this.color.removeFirst();
                }
            } else {
                mudaPiel();
            }
        }

    }

    public int getTamanio() {
        return this.color.size();
    }

    private String dameColor() {
        String color = "";

        int alea = (int) (Math.random() * 4);

        switch (alea) {
            case 0:
                color = "green";
                break;
            case 1:
                color = "red";
                break;
            case 2:
                color = "blue";
                break;
            case 3:
                color = "brown";
                break;
        }

        return color;
    }

    private void mudaPiel() {

        for (int i = 0; i < this.color.size(); i++) {
            this.color.set(i, dameColor());
        }

    }

}
