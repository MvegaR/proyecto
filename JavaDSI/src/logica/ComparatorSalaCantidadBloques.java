package logica;

import java.util.Comparator;

import db.Bloque;
import db.Sala;

public class ComparatorSalaCantidadBloques implements Comparator<Sala>{
    //3. Se prefiere temprano a tarde ... (Listo)
    @Override
    public int compare(Sala o1, Sala o2) {
	int r = 0;
	if(r == 0){
	    r = contadorDeBloques(o2).compareTo(contadorDeBloques(o1));
	    if(r == 0){
		r = o1.getIdSala().compareTo(o2.getIdSala());
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
