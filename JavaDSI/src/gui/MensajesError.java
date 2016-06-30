package gui;
import javax.swing.JOptionPane;

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
    
    public static void meEr_CarreraSinFacultad(){
    	JOptionPane.showMessageDialog(null, "Se ha detectado que existe una carrera sin facultad", 
    		"Alerta Error", JOptionPane.WARNING_MESSAGE);
        }
    public static void meEr_SalasSinEdificios(){
	JOptionPane.showMessageDialog(null, "Se ha detectado que existen salas sin edificio", 
		"Alerta Error", JOptionPane.WARNING_MESSAGE);
    }
    
    public static void meEr_BloquesSinSalas(){
    	JOptionPane.showMessageDialog(null, "Se ha detectado que existen bloques sin salas", 
    			"Alerta Error", JOptionPane.WARNING_MESSAGE);
    	    }
    
    public static void meEr_BloquesSinSecciones(){
    	JOptionPane.showMessageDialog(null, "Se ha detectado que existen bloques sin secciones", 
    			"Alerta Error", JOptionPane.WARNING_MESSAGE);
    	    }
    
    public static void meEr_DepartamentoSinFacultad(){
    	JOptionPane.showMessageDialog(null, "Se ha detectado que existen departamentos sin facultad", 
    			"Alerta Error", JOptionPane.WARNING_MESSAGE);
    	    }
    
    public static void meEr_DocenteSinDepartamento(){
    	JOptionPane.showMessageDialog(null, "Se ha detectado que existen docentes sin departamento", 
    			"Alerta Error", JOptionPane.WARNING_MESSAGE);
    	    }
    
    public static void meEr_FacultadSinDepartamento(){
    	JOptionPane.showMessageDialog(null, "Se ha detectado que existen facultades sin departamento", 
    			"Alerta Error", JOptionPane.WARNING_MESSAGE);
    	    }
    
    public static void meEr_EdificioSinFacultad(){
    	JOptionPane.showMessageDialog(null, "Se ha detectado que existen edificios sin facultad", 
    			"Alerta Error", JOptionPane.WARNING_MESSAGE);
    	    }
    
    public static void meEr_CarrerasSinAsignaturas(){
	JOptionPane.showMessageDialog(null, "Se ha detectado que existe un carreras sin asignaturas", 
		"Alerta Error", JOptionPane.WARNING_MESSAGE);
    }
    
    public static void meEr_SeccionSinAsignaturas(){
    	JOptionPane.showMessageDialog(null, "Se ha detectado que existe un seccion sin asignaturas", 
    		"Alerta Error", JOptionPane.WARNING_MESSAGE);
        }
    
    public static void MeEr_SinAsignaturas(){
    JOptionPane.showMessageDialog(null, "No se han encontrado asignaturas", 
    	"Alerta Error", JOptionPane.WARNING_MESSAGE);
    }
    
    public static void MeEr_SinBloques(){
    JOptionPane.showMessageDialog(null, "No se han encontrado bloques", 
        "Alerta Error", JOptionPane.WARNING_MESSAGE);
     }
    
    public static void MeEr_SinCarreras(){
        JOptionPane.showMessageDialog(null, "No se han encontrado carreras", 
        	"Alerta Error", JOptionPane.WARNING_MESSAGE);
        }
    
    public static void MeEr_SinDepartamentos(){
        JOptionPane.showMessageDialog(null, "No se han encontrado departamentos", 
        	"Alerta Error", JOptionPane.WARNING_MESSAGE);
        }
    
    public static void MeEr_SinDocentes(){
        JOptionPane.showMessageDialog(null, "No se han encontrado docentes", 
        	"Alerta Error", JOptionPane.WARNING_MESSAGE);
        }
    
    public static void MeEr_SinEdificios(){
        JOptionPane.showMessageDialog(null, "No se han encontrado edificios", 
        	"Alerta Error", JOptionPane.WARNING_MESSAGE);
        }
    
    public static void MeEr_SinFacultades(){
        JOptionPane.showMessageDialog(null, "No se han encontrado facultades", 
        	"Alerta Error", JOptionPane.WARNING_MESSAGE);
        }
    
    public static void MeEr_SinSalas(){
        JOptionPane.showMessageDialog(null, "No se han encontrado salas", 
        	"Alerta Error", JOptionPane.WARNING_MESSAGE);
        }
    
    public static void MeEr_SinSecciones(){
        JOptionPane.showMessageDialog(null, "No se han encontrado secciones", 
        	"Alerta Error", JOptionPane.WARNING_MESSAGE);
        }
    
    public static void meEr_FallaAutentificacion(){
	JOptionPane.showMessageDialog(null, "Ha ocurrido un error en la autentificacion del usuario",
		"Problema en conexion", JOptionPane.WARNING_MESSAGE);
    }
}