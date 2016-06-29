package logica;

import java.util.Comparator;

import db.Bloque;

public class ComparatorBloquePreferenciaTempranito implements Comparator<Bloque>{
  //3. Se prefiere temprano a tarde ...
   public int compare(Bloque o1, Bloque o2) {
       int r = o1.getInicio().compareTo(o2.getInicio());
       if(r == 0){
	   r = o1.getIdBloque().compareTo(o2.getIdBloque());
       }
       return r;
   }; 
}
