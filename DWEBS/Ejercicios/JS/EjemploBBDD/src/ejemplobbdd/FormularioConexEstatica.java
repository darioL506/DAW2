/**
 * En este ejemplo, por la naturaleza del mismo, la conexión con la base de datos permanece abierta
 * durante la ejecución de la aplicación.
 * En otras aplicaciones que no necesitan el acceso continuo a la base de datos salvo para consultas o
 * modificaciones puntuales lo correcto sería abrir una conexión, hacer la operación que sea y cerrar
 * la conexión con la base de datos.
 */
package ejemplobbdd;

import Auxiliar.Constantes;

public class FormularioConexEstatica extends javax.swing.JFrame {

    public FormularioConexEstatica() {
        initComponents();

        ConexionEstatica.obtenerDatosTabla(Constantes.TablaPersonas);

        CT_DNI.setText(ConexionEstatica.obtenerPrimer("DNI"));
        CT_Nombre.setText(ConexionEstatica.obtenerPrimer("Nombre"));
        CT_Tfno.setText(ConexionEstatica.obtenerPrimer("Tfno"));
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {
        java.awt.GridBagConstraints gridBagConstraints;

        jLabel1 = new javax.swing.JLabel();
        CT_DNI = new javax.swing.JTextField();
        jLabel2 = new javax.swing.JLabel();
        CT_Nombre = new javax.swing.JTextField();
        CT_Tfno = new javax.swing.JTextField();
        jLabel3 = new javax.swing.JLabel();
        BT_Prim = new javax.swing.JButton();
        BT_Ant = new javax.swing.JButton();
        BT_Sig = new javax.swing.JButton();
        BT_Ult = new javax.swing.JButton();
        BT_Añadir = new javax.swing.JButton();
        BT_Borrar = new javax.swing.JButton();
        BT_Modificar = new javax.swing.JButton();
        BT_Nuevo = new javax.swing.JButton();
        BT_Cancelar = new javax.swing.JButton();
        BT_Salir = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Ejemplo conexión estática");
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosing(java.awt.event.WindowEvent evt) {
                formWindowClosing(evt);
            }
        });
        getContentPane().setLayout(new java.awt.GridBagLayout());

        jLabel1.setText("DNI");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 0;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(36, 29, 0, 0);
        getContentPane().add(jLabel1, gridBagConstraints);

        CT_DNI.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                CT_DNIKeyReleased(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 10;
        gridBagConstraints.gridy = 0;
        gridBagConstraints.gridwidth = 9;
        gridBagConstraints.gridheight = 2;
        gridBagConstraints.ipadx = 76;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(32, 0, 0, 0);
        getContentPane().add(CT_DNI, gridBagConstraints);

        jLabel2.setText("Nombre");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 2;
        gridBagConstraints.gridwidth = 3;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(10, 29, 0, 0);
        getContentPane().add(jLabel2, gridBagConstraints);
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 10;
        gridBagConstraints.gridy = 2;
        gridBagConstraints.gridwidth = 30;
        gridBagConstraints.gridheight = 2;
        gridBagConstraints.ipadx = 266;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(6, 0, 0, 0);
        getContentPane().add(CT_Nombre, gridBagConstraints);
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 10;
        gridBagConstraints.gridy = 4;
        gridBagConstraints.gridwidth = 60;
        gridBagConstraints.gridheight = 2;
        gridBagConstraints.ipadx = 299;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(4, 0, 0, 38);
        getContentPane().add(CT_Tfno, gridBagConstraints);

        jLabel3.setText("Teléfono");
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 4;
        gridBagConstraints.gridwidth = 4;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(8, 29, 0, 0);
        getContentPane().add(jLabel3, gridBagConstraints);

        BT_Prim.setText("<<");
        BT_Prim.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BT_PrimActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 6;
        gridBagConstraints.gridwidth = 2;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(4, 29, 0, 0);
        getContentPane().add(BT_Prim, gridBagConstraints);

        BT_Ant.setText("<");
        BT_Ant.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BT_AntActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 3;
        gridBagConstraints.gridy = 6;
        gridBagConstraints.gridwidth = 8;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(4, 1, 0, 0);
        getContentPane().add(BT_Ant, gridBagConstraints);

        BT_Sig.setText(">");
        BT_Sig.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BT_SigActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 19;
        gridBagConstraints.gridy = 6;
        gridBagConstraints.gridwidth = 11;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(4, 127, 0, 0);
        getContentPane().add(BT_Sig, gridBagConstraints);

        BT_Ult.setText(">>");
        BT_Ult.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BT_UltActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 39;
        gridBagConstraints.gridy = 6;
        gridBagConstraints.gridwidth = 31;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(4, 6, 0, 38);
        getContentPane().add(BT_Ult, gridBagConstraints);

        BT_Añadir.setText("Añadir");
        BT_Añadir.setEnabled(false);
        BT_Añadir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BT_AñadirActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 7;
        gridBagConstraints.gridwidth = 7;
        gridBagConstraints.gridheight = 2;
        gridBagConstraints.ipadx = 4;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(6, 29, 0, 0);
        getContentPane().add(BT_Añadir, gridBagConstraints);

        BT_Borrar.setText("Borrar");
        BT_Borrar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BT_BorrarActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 29;
        gridBagConstraints.gridy = 7;
        gridBagConstraints.gridwidth = 41;
        gridBagConstraints.ipadx = 4;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(5, 6, 0, 38);
        getContentPane().add(BT_Borrar, gridBagConstraints);

        BT_Modificar.setText("Modificar nombre");
        BT_Modificar.setToolTipText("\"Cambiamos el nombre del DNI seleccionado\"");
        BT_Modificar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BT_ModificarActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 10;
        gridBagConstraints.gridy = 7;
        gridBagConstraints.gridwidth = 10;
        gridBagConstraints.ipadx = 69;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(5, 6, 0, 0);
        getContentPane().add(BT_Modificar, gridBagConstraints);

        BT_Nuevo.setText("Nuevo");
        BT_Nuevo.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BT_NuevoActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 0;
        gridBagConstraints.gridy = 9;
        gridBagConstraints.gridwidth = 7;
        gridBagConstraints.ipadx = 6;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(6, 29, 27, 0);
        getContentPane().add(BT_Nuevo, gridBagConstraints);

        BT_Cancelar.setText("Cancelar");
        BT_Cancelar.setEnabled(false);
        BT_Cancelar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BT_CancelarActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 10;
        gridBagConstraints.gridy = 9;
        gridBagConstraints.gridwidth = 10;
        gridBagConstraints.ipadx = 130;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(6, 6, 27, 0);
        getContentPane().add(BT_Cancelar, gridBagConstraints);

        BT_Salir.setText("Salir");
        BT_Salir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BT_SalirActionPerformed(evt);
            }
        });
        gridBagConstraints = new java.awt.GridBagConstraints();
        gridBagConstraints.gridx = 29;
        gridBagConstraints.gridy = 9;
        gridBagConstraints.gridwidth = 41;
        gridBagConstraints.ipadx = 17;
        gridBagConstraints.anchor = java.awt.GridBagConstraints.NORTHWEST;
        gridBagConstraints.insets = new java.awt.Insets(6, 6, 27, 38);
        getContentPane().add(BT_Salir, gridBagConstraints);

        pack();
    }// </editor-fold>//GEN-END:initComponents

private void BT_PrimActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BT_PrimActionPerformed
    if (!ConexionEstatica.obtenerPrimer("DNI").isEmpty()) {
        CT_DNI.setText(ConexionEstatica.obtenerPrimer("DNI"));
        CT_Nombre.setText(ConexionEstatica.obtenerPrimer("Nombre"));
        CT_Tfno.setText(ConexionEstatica.obtenerPrimer("Tfno"));
    } else {
        javax.swing.JOptionPane.showMessageDialog(null, "Primer elemento inaccesible", "Último", javax.swing.JOptionPane.ERROR_MESSAGE);
    }

}//GEN-LAST:event_BT_PrimActionPerformed

private void BT_UltActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BT_UltActionPerformed
    if (!ConexionEstatica.obtenerUltimo("DNI").isEmpty()) {

        CT_DNI.setText(ConexionEstatica.obtenerUltimo("DNI"));
        CT_Nombre.setText(ConexionEstatica.obtenerUltimo("Nombre"));
        CT_Tfno.setText(ConexionEstatica.obtenerUltimo("Tfno"));
    } else {
        javax.swing.JOptionPane.showMessageDialog(null, "Último elemento inaccesible", "Último", javax.swing.JOptionPane.ERROR_MESSAGE);
    }
}//GEN-LAST:event_BT_UltActionPerformed

private void BT_AntActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BT_AntActionPerformed
    if (ConexionEstatica.irAnterior()) {
        CT_DNI.setText(ConexionEstatica.obtenerActual("DNI"));
        CT_Nombre.setText(ConexionEstatica.obtenerActual("Nombre"));
        CT_Tfno.setText(ConexionEstatica.obtenerActual("Tfno"));
    } else {
        javax.swing.JOptionPane.showMessageDialog(null, "No hay más elementos", "Anterior", javax.swing.JOptionPane.INFORMATION_MESSAGE);
        ConexionEstatica.irSiguiente();
    }
}//GEN-LAST:event_BT_AntActionPerformed

private void BT_SigActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BT_SigActionPerformed
    //ConexionEstatica.abrirConexion();
    if (ConexionEstatica.irSiguiente()) {
        CT_DNI.setText(ConexionEstatica.obtenerActual("DNI"));
        CT_Nombre.setText(ConexionEstatica.obtenerActual("Nombre"));
        CT_Tfno.setText(ConexionEstatica.obtenerActual("Tfno"));
    } else {
        javax.swing.JOptionPane.showMessageDialog(null, "No hay más elementos", "Siguiente", javax.swing.JOptionPane.INFORMATION_MESSAGE);
        ConexionEstatica.irAnterior();
    }
    //ConexionEstatica.cerrarConexion();
}//GEN-LAST:event_BT_SigActionPerformed

private void BT_AñadirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BT_AñadirActionPerformed
    int cod = ConexionEstatica.insertarDato(Constantes.TablaPersonas, CT_DNI.getText(), CT_Nombre.getText(), Integer.parseInt(CT_Tfno.getText()));
    if (cod == 0) { //Inserción correcta.    
        javax.swing.JOptionPane.showMessageDialog(null, "Elemento añadido", "Añadir", javax.swing.JOptionPane.INFORMATION_MESSAGE);
        ConexionEstatica.obtenerDatosTabla(Constantes.TablaPersonas);
        this.desahabilitarNuevo();
    } else {
        javax.swing.JOptionPane.showMessageDialog(null, "Clave duplicada", "Añadir", javax.swing.JOptionPane.ERROR_MESSAGE);
    }
}//GEN-LAST:event_BT_AñadirActionPerformed

private void CT_DNIKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_CT_DNIKeyReleased
    CT_Nombre.setText("");
    CT_Tfno.setText("");
}//GEN-LAST:event_CT_DNIKeyReleased

private void BT_BorrarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BT_BorrarActionPerformed
    int cod = ConexionEstatica.borrarDato(Constantes.TablaPersonas, CT_DNI.getText());
    if (cod == 0) {//Borrado correcto
        javax.swing.JOptionPane.showMessageDialog(null, "Elemento borrado", "Borrar", javax.swing.JOptionPane.INFORMATION_MESSAGE);
        CT_DNI.setText("");
        CT_Nombre.setText("");
        CT_Tfno.setText("");
        ConexionEstatica.obtenerDatosTabla(Constantes.TablaPersonas);
        CT_DNI.setText(ConexionEstatica.obtenerPrimer("DNI"));
        CT_Nombre.setText(ConexionEstatica.obtenerPrimer("Nombre"));
        CT_Tfno.setText(ConexionEstatica.obtenerPrimer("Tfno"));
        CT_DNI.requestFocus();
    } else {
        javax.swing.JOptionPane.showMessageDialog(null, "Elemento no encontrado", "Borrar", javax.swing.JOptionPane.ERROR_MESSAGE);
    }
}//GEN-LAST:event_BT_BorrarActionPerformed

private void BT_ModificarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BT_ModificarActionPerformed
    int cod = ConexionEstatica.modificarDato(Constantes.TablaPersonas, CT_DNI.getText().trim(), CT_Nombre.getText().trim());
    if (cod == 0) { //Modificación correcta.
        javax.swing.JOptionPane.showMessageDialog(null, "Nombre cambiado", "Modificar", javax.swing.JOptionPane.INFORMATION_MESSAGE);
        ConexionEstatica.obtenerDatosTabla(Constantes.TablaPersonas);
        CT_DNI.requestFocus();
    } else {
        javax.swing.JOptionPane.showMessageDialog(null, "Elemento no encontrado", "Modificar", javax.swing.JOptionPane.ERROR_MESSAGE);
    }
}//GEN-LAST:event_BT_ModificarActionPerformed

    private void BT_NuevoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BT_NuevoActionPerformed
        CT_DNI.setText("");
        CT_Nombre.setText("");
        CT_Tfno.setText("");
        this.habilitarNuevo();
        CT_DNI.requestFocus();
    }//GEN-LAST:event_BT_NuevoActionPerformed

    private void BT_CancelarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BT_CancelarActionPerformed
        this.desahabilitarNuevo();
        if (!ConexionEstatica.obtenerPrimer("DNI").isEmpty()) {
            CT_DNI.setText(ConexionEstatica.obtenerPrimer("DNI"));
            CT_Nombre.setText(ConexionEstatica.obtenerPrimer("Nombre"));
            CT_Tfno.setText(ConexionEstatica.obtenerPrimer("Tfno"));
        }
        CT_DNI.requestFocus();
    }//GEN-LAST:event_BT_CancelarActionPerformed

    private void BT_SalirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BT_SalirActionPerformed
        ConexionEstatica.cerrarConexion();
        System.exit(0);
    }//GEN-LAST:event_BT_SalirActionPerformed

    private void formWindowClosing(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosing
        ConexionEstatica.cerrarConexion();
    }//GEN-LAST:event_formWindowClosing

    private void habilitarNuevo() {
        BT_Añadir.setEnabled(true);
        BT_Cancelar.setEnabled(true);
        BT_Modificar.setEnabled(false);
        BT_Borrar.setEnabled(false);
        BT_Nuevo.setEnabled(false);
        BT_Ant.setEnabled(false);
        BT_Prim.setEnabled(false);
        BT_Sig.setEnabled(false);
        BT_Ult.setEnabled(false);
    }

    private void desahabilitarNuevo() {
        BT_Añadir.setEnabled(false);
        BT_Modificar.setEnabled(true);
        BT_Borrar.setEnabled(true);
        BT_Cancelar.setEnabled(false);
        BT_Nuevo.setEnabled(true);
        BT_Ant.setEnabled(true);
        BT_Prim.setEnabled(true);
        BT_Sig.setEnabled(true);
        BT_Ult.setEnabled(true);
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton BT_Ant;
    private javax.swing.JButton BT_Añadir;
    private javax.swing.JButton BT_Borrar;
    private javax.swing.JButton BT_Cancelar;
    private javax.swing.JButton BT_Modificar;
    private javax.swing.JButton BT_Nuevo;
    private javax.swing.JButton BT_Prim;
    private javax.swing.JButton BT_Salir;
    private javax.swing.JButton BT_Sig;
    private javax.swing.JButton BT_Ult;
    private javax.swing.JTextField CT_DNI;
    private javax.swing.JTextField CT_Nombre;
    private javax.swing.JTextField CT_Tfno;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    // End of variables declaration//GEN-END:variables

}
