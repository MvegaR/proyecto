package logica;

import java.util.Comparator;

import db.Sala;

public class ComparatorDeSalaParaPreferencias implements Comparator<Sala>{
  //2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor.
  //4. Si el profesor es del departamento de una facultad se prefiere una sala de un edificio de esa facultad. 
    @Override
    public int compare(Sala o1, Sala o2) {
	// TODO Auto-generated method stub
	return 0;
    }

    
}
