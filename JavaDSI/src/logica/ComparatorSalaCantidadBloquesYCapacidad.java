package logica;

import java.util.Comparator;

import db.Bloque;
import db.Sala;

public class ComparatorSalaCantidadBloquesYCapacidad implements Comparator<Sala>{

    private Integer capacidadIdeal;

    public ComparatorSalaCantidadBloquesYCapacidad(Integer capacidadIdeal) {
	this.capacidadIdeal = capacidadIdeal;
    }

    @Override
    public int compare(Sala o1, Sala o2) {
	int r = 0;
	if(r == 0){
	    //que se prefiera diferencia menor
	    Integer diferencia1 = o1.getCapacidadSala() - capacidadIdeal;
	    Integer diferencia2 = o2.getCapacidadSala() - capacidadIdeal;
	    r = diferencia1.compareTo(diferencia2);
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
