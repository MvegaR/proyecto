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
    
    public static void mensajeError1(){
        JOptionPane.showMessageDialog(null, "Este es un mensaje de Advertencia",
  "ERROR_MESSAGE", JOptionPane.WARNING_MESSAGE);
    }
    
    public static void meEr_FallaConexion(){
        JOptionPane.showMessageDialog(null, "Ha ocurrido una falla en la conexion con la base de datos",
                "Error de conexion", JOptionPane.ERROR_MESSAGE);
    }
    
    public static void meEr_SeccionSinDocentes(){
        JOptionPane.showMessageDialog(null, "Se ha detectado que existe una seccion sin docentes", 
                "Alerta Error", JOptionPane.WARNING_MESSAGE);
    }
    public static void meEr_EdificioSinSalas(){
        JOptionPane.showMessageDialog(null, "Se ha detectado que existe un edificio sin salas", 
                "Alerta Error", JOptionPane.WARNING_MESSAGE);
    }

    public static void meEr_CarrerasSinAsignaturas(){
        JOptionPane.showMessageDialog(null, "Se ha detectado que existe un carreras sin asignaturas", 
                "Alerta Error", JOptionPane.WARNING_MESSAGE);
    }
    
    public static void meEr_FallaAutentificacion(){
        JOptionPane.showMessageDialog(null, "Ha ocurrido un error en la autentificacion del usuario",
                "Problema en conexion", JOptionPane.WARNING_MESSAGE);
    }





    
}
