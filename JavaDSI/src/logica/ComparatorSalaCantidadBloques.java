package logica;

import java.util.Comparator;

import db.Bloque;
import db.Sala;
import gui.VentanaPrincipal;

public class ComparatorSalaCantidadBloques implements Comparator<Sala>{
    //3. Se prefiere temprano a tarde ... (Listo)

    private VentanaPrincipal ventana;
    private Integer facultad;

    public ComparatorSalaCantidadBloques(VentanaPrincipal ventana, Integer facultad) {
	this.ventana = ventana;
	this.facultad = facultad;
    }


    @Override
    public int compare(Sala o1, Sala o2) {
	int r = 0;
	if(r == 0){
	    if(ventana.getEdificio(o1.getIdEdificio()).getIdFacultad().equals(facultad) && ventana.getEdificio(o2.getIdEdificio()).getIdFacultad().equals(facultad)){
		r = 0;
	    }else if(!ventana.getEdificio(o1.getIdEdificio()).getIdFacultad().equals(facultad)){
		r = 1;
	    }else{
		r = -1;
	    }
	    if(r == 0){
		r = contadorDeBloques(o2).compareTo(contadorDeBloques(o1));
		if(r == 0){
		    r = o1.getIdSala().compareTo(o2.getIdSala());
		}
	    }

	}
	return r;
    }

    private Integer contadorDeBloques(Sala sala){
	Integer contador = 0;
	for(Bloque c: Clase.getBloques()){
	    if(c.getIdSala().equals(sala.getIdSala())){
		contador++;
	    }
	}
	return contador;
    }




}
