package gui;

import gui.MensajesError;
import db.Asignatura;
import db.Bloque;
import db.Carrera;
import db.Conexion;
import db.Departamento;
import db.Docente;
import db.Edificio;
import db.Facultad;
import db.Sala;
import db.Seccion;
import java.util.ArrayList;

public class BuscarErrores {
    
    private ArrayList<Asignatura> asignaturas = new ArrayList<>();
    private ArrayList<Bloque> bloques = new ArrayList<>();
    private ArrayList<Carrera> carreras = new ArrayList<>();
    private ArrayList<Departamento> departamentos = new ArrayList<>();
    private ArrayList<Docente> docentes = new ArrayList<>();
    private ArrayList<Edificio> edificios = new ArrayList<>();
    private ArrayList<Facultad> facultades = new ArrayList<>();
    private ArrayList<Sala> salas = new ArrayList<>();
    private ArrayList<Seccion> secciones = new ArrayList<>();

    public BuscarErrores(VentanaPrincipal ventanaPrincipal) {
        asignaturas = ventanaPrincipal.getAsignaturas();
        bloques = ventanaPrincipal.getBloques();
        carreras = ventanaPrincipal.getCarreras();
        departamentos = ventanaPrincipal.getDepartamentos();
        docentes = ventanaPrincipal.getDocentes();
        edificios = ventanaPrincipal.getEdificios();
        facultades = ventanaPrincipal.getFacultades();
        salas = ventanaPrincipal.getSalas();
        secciones = ventanaPrincipal.getSecciones();
    }
    
    
    public void AsignaturasSinCarreras(){
        for (int i = 0; i < asignaturas.size(); i++) {
            if(asignaturas.get(i).getIdCarrera() == null){
                MensajesError.meEr_CarrerasSinAsignaturas();
            }
        }
    }
    
    public void CarrerasSinFacultad(){
    	for(int i=0; i < carreras.size(); i++){
    		if(carreras.get(i).getIdFacultad() == null){
    			MensajesError.meEr_CarreraSinFacultad();
    		}
    	}
    }
    
    
}
