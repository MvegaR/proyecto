package logica;

import java.util.ArrayList;

import javax.swing.JOptionPane;

import db.Bloque;
import db.Conexion;
import db.Seccion;
import gui.VentanaPrincipal;

public class BorradorPlanificacion {
    
   
    public BorradorPlanificacion(VentanaPrincipal ventana, ArrayList<Seccion> secciones) {
	
	String[] opciones = {"Si", "No" };
	int opcion = JOptionPane.showOptionDialog(null,"¿Seguro que desea borrar la planificación de la base de datos?"
		,"Información",JOptionPane.DEFAULT_OPTION,JOptionPane.INFORMATION_MESSAGE
		,null,opciones,null);
	if(opciones[opcion].equals("Si")){
	    JOptionPane.showMessageDialog(null, "La operación tardará unos segundos, puede que la ventana no responda en ese tiempo, precione aceptar para comenzar.", "Información", JOptionPane.INFORMATION_MESSAGE);
	    ArrayList<Bloque> bloquesABorrar = new ArrayList<Bloque>();
		for(Bloque b: ventana.getBloques()){
		    for(Seccion s: secciones){
			if(b.getIdSeccion() != null && b.getIdSeccion().equals(s.getIdSeccion())){
			    bloquesABorrar.add(b);
			}
		    }
		}
		for(Bloque b: bloquesABorrar){
		    b.setIdSeccion(null);
		    b.setBloqueSiguiente(null);
		    Conexion.ejecutarSQL("UPDATE bloque SET ID_SECCION = NULL, BLOQUE_SIGUIENTE = NULL WHERE ID_BLOQUE = '" +b.getIdBloque()+"'");
		}
	}
	JOptionPane.showMessageDialog(null, "Planificación de las secciones seleccionada borrada correctamente", 
			"Exito", JOptionPane.INFORMATION_MESSAGE);
	
	
	
	
	
    }
    
    

}
