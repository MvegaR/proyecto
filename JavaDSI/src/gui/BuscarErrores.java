package gui;

import gui.MensajesError;
import db.Asignatura;
import db.Bloque;
import db.Carrera;
import db.Departamento;
import db.Docente;
import db.Edificio;
import db.Facultad;
import db.Sala;
import db.Seccion;
import java.util.ArrayList;

public class BuscarErrores {
    
    private ArrayList<Asignatura> asignaturas ;
    private ArrayList<Bloque> bloques;
    private ArrayList<Carrera> carreras;
    private ArrayList<Departamento> departamentos;
    private ArrayList<Docente> docentes;
    private ArrayList<Edificio> edificios;
    private ArrayList<Facultad> facultades;
    private ArrayList<Sala> salas;
    private ArrayList<Seccion> secciones;

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

    public void ejecutarTodasLasBusquedas(){
        SinAsignaturas();
        SinBloques();
        SinCarreras();
        SinDepartamento();
        SinDocentes();
        SinEdificios();
        SinSalas();
        SinSecciones();
        AsignaturasSinCarreras();
        CarrerasSinFacultad();
        SeccionSinDocente();
        SalasSinEdificio();
        BloquesSinSalas();
        BloquesSinSecciones();
        DepartamentoSinFacultad();
        DocenteSinDepartamento();
        EdificioSinFacultad();
        FacultadSinDepartamento();
        SeccionSinAsignatura();
    }
    
    
    public void SinAsignaturas(){
    	 if(asignaturas.isEmpty())
    	  MensajesError.MeEr_SinAsignaturas();
    	}
    
    public void SinBloques(){
   	 if(bloques.isEmpty())
   	  MensajesError.MeEr_SinBloques();
   	}
    
    public void SinCarreras(){
      	 if(carreras.isEmpty())
      	  MensajesError.MeEr_SinCarreras();
      	}
    
    public void SinDepartamento(){
     	 if(departamentos.isEmpty())
     	  MensajesError.MeEr_SinDepartamentos();
     	}
    
    public void SinDocentes(){
     	 if(docentes.isEmpty())
     	  MensajesError.MeEr_SinDocentes();
     	}
    
    public void SinEdificios(){
     	 if(edificios.isEmpty())
     	  MensajesError.MeEr_SinEdificios();
     	}
    
    public void SinSalas(){
     	 if(salas.isEmpty())
     	  MensajesError.MeEr_SinSalas();
     	}
    
    public void SinSecciones(){
     	 if(secciones.isEmpty())
     	  MensajesError.MeEr_SinSecciones();
     	}
    
    public void AsignaturasSinCarreras(){
        for (int i = 0; i < asignaturas.size(); i++) {
            if(asignaturas.get(i).getIdCarrera() == null){
                MensajesError.meEr_CarrerasSinAsignaturas();
                break;
            }
        }
    }
    
    public void CarrerasSinFacultad(){
    	for(int i=0; i < carreras.size(); i++){
    		if(carreras.get(i).getIdFacultad() == null){
    			MensajesError.meEr_CarreraSinFacultad();
                break;
    		}
    	}
    }
    
    public void SeccionSinDocente(){
    	for(int i =0; i< secciones.size(); i++){
    		if(secciones.get(i).getIdDocente() == null){
    			MensajesError.meEr_SeccionSinDocentes();
                break;
    		}
    	}
    }
    
    public void SalasSinEdificio(){
    	for(int i=0; i< salas.size(); i++){
    		if(salas.get(i).getIdEdificio()== null){
    			MensajesError.meEr_SalasSinEdificios();
                break;
    		}
    	}
    }
    
    public void BloquesSinSalas(){
    	for(int i=0; i<bloques.size(); i++){
    		if(bloques.get(i).getIdSala() == null){
    			MensajesError.meEr_BloquesSinSalas();
                break;
    		}
    	}
    }
    
    public void BloquesSinSecciones(){
    	for(int i=0; i<bloques.size(); i++){
    		if(bloques.get(i).getIdSeccion() == null){
    			MensajesError.meEr_BloquesSinSecciones();
                break;
    		}
    	}
    }
    
    public void DepartamentoSinFacultad(){
    	for(int i=0; i< departamentos.size(); i++){
    		if(departamentos.get(i).getIdFacultad() == null){
    			MensajesError.meEr_DepartamentoSinFacultad();
                break;
    		}
    	}
    }
    
    public void DocenteSinDepartamento(){
    	for(int i=0; i< docentes.size(); i++){
    		if(docentes.get(i).getIdDepartamento() == null){
    			MensajesError.meEr_DocenteSinDepartamento();
                break;
    		}
    	}
    }
    
    public void EdificioSinFacultad(){
    	for(int i=0; i< edificios.size(); i++){
    		if(edificios.get(i).getIdFacultad() == null){
    			MensajesError.meEr_EdificioSinFacultad();
                break;
    		}
    	}
    }
    
    public void FacultadSinDepartamento(){
    	for(int i=0; i<facultades.size(); i++){
    		if(facultades.get(i).getNombreFacultad() == null){
    			MensajesError.meEr_FacultadSinDepartamento();
                break;
    		}
    	}
    }
    
    public void SeccionSinAsignatura(){
    	for(int i =0; i< secciones.size(); i++){
    		if(secciones.get(i).getIdAsignatura() == null){
    			MensajesError.meEr_SeccionSinAsignaturas();
                break;
    		}
    	}
    }
    
}
