package logica;

import java.util.Comparator;

import db.Sala;

public class ComparatorDeSalaParaPreferencias implements Comparator<Sala>{
  //2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
 
    
    @Override
    public int compare(Sala o1, Sala o2) {
	int r = o1.getCapacidadSala().compareTo(o2.getCapacidadSala());
	if(r == 0){
	    r = o1.getIdSala().compareTo(o2.getIdSala());
	}
	return r;
    }

    
}
