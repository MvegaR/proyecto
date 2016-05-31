package gui;
import javax.swing.JOptionPane;

/*
falla inicio de correcta autentificación.
 */

/**
 *
 * @author Nannan
 */
public class MensajesError {
    
    public void mensajeError1(){
        JOptionPane.showMessageDialog(null, "Este es un mensaje de Advertencia",
  "ERROR_MESSAGE", JOptionPane.WARNING_MESSAGE);
    }
    
    public void MeEr_FallaConexion(){
        JOptionPane.showMessageDialog(null, "Ha ocurrido una falla en la conexion...",
                "Error de conexion", JOptionPane.ERROR_MESSAGE);
    }
    
    public void MeEr_SeccionSinDocentes(){
        JOptionPane.showMessageDialog(null, "Se ha detectado que existe una seccion sin docentes", 
                "Alerta Error", JOptionPane.WARNING_MESSAGE);
    }
    public void MeEr_EdificioSinSalas(){
        JOptionPane.showMessageDialog(null, "Se ha detectado que existe un edificio sin salas", 
                "Alerta Error", JOptionPane.WARNING_MESSAGE);
    }
    
    public void MeEr_FallaAutentificacion(){
        JOptionPane.showMessageDialog(null, "Ha ocurrido un error en la autentificación del usuario.",
                "Problema en conexion", JOptionPane.WARNING_MESSAGE);
    }
    
}
