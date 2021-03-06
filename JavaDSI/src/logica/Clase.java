package logica;
import java.util.ArrayList;
import java.util.Collections;
import java.util.LinkedList;

import db.Bloque;
import db.Facultad;
import db.Sala;
import db.Seccion;
import db.TiempoInicio;
import gui.VentanaPrincipal;
public class Clase {

    //Por ejemplo la asignatura X tiene 5 horas.
    //Queremos las clases de 2 horas o a lo m�s una de 3 por seccion. (caso horas totales impares)
    //se crea una clase para la de dos y otra para la de 3, cada una se busca su horario.

    private static Integer contador = 0;
    private static LinkedList<Bloque> bloques = new LinkedList<>();
    private Integer id;
    private Integer horasContinuadas;
    private ArrayList<Bloque> bloquesAsignados;
    private Seccion seccion;
    private Integer tipo;
    private Planificador planificador;
    //private Integer idTipo;
    private Boolean dividida = false;

    public Clase(Planificador planificador, Integer horasContinuadas, Seccion seccion, Integer tipo) {
	this.id = Clase.contador++;
	this.horasContinuadas = horasContinuadas;
	this.seccion = seccion;
	this.tipo = tipo;
	this.planificador = planificador;
	this.bloquesAsignados = new ArrayList<Bloque>();
    }



    private ArrayList<Sala> filtrarSalaPorTipoFacultadYCapacidad(ArrayList<Sala> salas, VentanaPrincipal ventana){
	//(Considerar agregar) 6. Se prefiere a una sala para una clase de hora impar estar despues de otra clase de hora impar que este despues de una hora par. 
	Integer contador = 0;
	ArrayList<Sala> r = new ArrayList<>();
	if(this.getTipo().equals(1)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(1) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(2)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(2) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(3)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(3) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(4)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(4) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(5)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(5) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(6)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(6) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(7)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(7) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(8)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(8) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(9)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(9) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(10)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(10) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(11)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(11) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(12)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(12) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }
	}else if(this.getTipo().equals(13)){
	    for(Sala sala: salas){
		//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor. (Listo)
		if(sala.getIdTipoSala().equals(13) && sala.getCapacidadSala().compareTo(this.getSeccion().getCupo()) >= 0){  
		    r.add(sala);
		}
		contador ++;
	    }

	}
	//	System.out.println("CondadorSalas="+contador);
	//r.sort(new ComparatorSalaCantidadBloquesYCapacidad(this.getSeccion().getCupo()));
	//*
	//4. Para una carrera se prefiere clases en edificios de su facultad. (Listo) (Eliminado) (Evaluar)
	ArrayList<Sala> igualFacultad = new ArrayList<>(); //edificios con facultad determinada
	ArrayList<Sala> sinFacultad = new ArrayList<>(); //edificios sin facultad determinada
	ArrayList<Sala> otraFacultad = new ArrayList<>(); //las demas salas de otras facultades que cumplen con las caracteristicas para la clase
	Facultad f = ventana.getFacultad( ventana.getCarrera( ventana.getAsignatura(this.getSeccion().getIdAsignatura()  ).getIdCarrera() ).getIdFacultad());
	for(Sala sala : r){
	    if( sala.getIdEdificio() != null && ventana.getEdificio(sala.getIdEdificio()).getIdFacultad() != null && ventana.getEdificio(sala.getIdEdificio()).getIdFacultad().equals(f.getIdFacultad())){
		igualFacultad.add(sala);
	    }else if( sala.getIdEdificio() != null && ventana.getEdificio(sala.getIdEdificio()).getIdFacultad() == null){
		sinFacultad.add(sala);
	    }else{
		otraFacultad.add(sala);
	    }
	}
	r = new ArrayList<>();

	igualFacultad.sort(new ComparatorSalaCantidadBloquesYCapacidad(this.getSeccion().getCupo()));
	sinFacultad.sort(new ComparatorSalaCantidadBloquesYCapacidad(this.getSeccion().getCupo()));
	otraFacultad.sort(new ComparatorSalaCantidadBloquesYCapacidad(this.getSeccion().getCupo()));
	r.addAll(igualFacultad);
	r.addAll(sinFacultad);
	r.addAll(otraFacultad); // */

	if(r.isEmpty() && existeSalaTipo(this.getTipo(), ventana.getSalas()) && !this.getTipo().equals(1) && contador != 0){ //2
	    //intentar crear nuevas clases, (mantener la capacidad de la secci�n y no considerar capacidad, intentar hacer diviciones por 2 o 3 o 4
	    //Como no hay salas en r el "obenerBloques" que esta aplicando this en este momento no tiene asignaciones.
	    //Esto ser� algo recursivo, si con dividir en dos no es sifuciente las diviciones seran divididas.
	    //Dejar en el informe documentado recomendaciones de uso para quien vaya a crear secciones.
	    Seccion seccionAux;
	    //probando solo con dividir en dos.
	    //secci�n virtual
	    seccionAux = new Seccion(this.getSeccion().getIdSeccion(), this.getSeccion().getIdDocente(), 
		    this.getSeccion().getIdAsignatura(), this.getSeccion().getCupo()/2);
	    // clases virtuales y que se busquen bloques...
	    Clase virtual1 = new Clase(this.getPlanificador(), this.getHorasContinuadas(), seccionAux, this.getTipo());
	    
	    Clase virtual2 = new Clase(this.getPlanificador(), this.getHorasContinuadas(), seccionAux, this.getTipo());
	   
	    virtual1.obtenerBloques(planificador.getVentana(), salas, planificador.getDias());
	    virtual2.obtenerBloques(planificador.getVentana(), salas, planificador.getDias());
	    planificador.getClasesCreadasPorDividirOtras().add(virtual1);
	    planificador.incTotalDeClasesConAsignaciones();
	    planificador.getClasesCreadasPorDividirOtras().add(virtual2);
	    planificador.incTotalDeClasesConAsignaciones();
	    this.dividida = true;

	}else if(!existeSalaTipo(this.getTipo(), ventana.getSalas())){
	    System.out.println();
	    System.out.println("No existen salas para este tipo de clases en la selecci�n idTipo: "+this.getTipo());
	    System.out.println();
	}

	return r; // Si esta vacio obtenerBloques de this no har� nada, por lo que esta (this) "clase" (de materia) no tendr� validez y s� sus diviciones que ya ejecutaron su "obterbloques".
    }

    private Boolean existeSalaTipo(Integer tipo, ArrayList<Sala> salas){
	for(Sala s: salas){
	    if(s.getIdTipoSala().equals(tipo)){
		return true;
	    }
	}
	return false;
    }



    public void obtenerBloques(VentanaPrincipal ventana, ArrayList<Sala> salas,  ArrayList<Integer> dias){ //para ser llamada desde el planificador
	// dias en orden aleatorio, cuantos dias?? En ventana debe de ponerse o en planificar

	Collections.shuffle(dias);

	this.ordenarDiasSegunClase(dias);
	for(Sala sala: this.filtrarSalaPorTipoFacultadYCapacidad(salas, ventana)){ 
	    for(Integer dia: dias){
		ArrayList<Bloque> bloquesDeUnaSalaYDia = this.bloquesDeUnaSalaYDia(sala, dia, ventana); 
		for(Bloque bloque: bloquesDeUnaSalaYDia){
		    this.getBloquesAsignados().add(bloque);
		    //System.out.println("horas continuadas"+this.getHorasContinuadas());
		    for(int i = 1; i < this.getHorasContinuadas(); i++){
			//System.out.println("contador "+i);
			String tiempoAnterior = this.getBloquesAsignados().get(this.getBloquesAsignados().size()-1).getInicio();
			int posTiempoAnterior = -1;
			for(TiempoInicio t: ventana.getTiempoInicios()){
			    if(tiempoAnterior.equals(t.getInicio())){
				posTiempoAnterior = ventana.getTiempoInicios().indexOf(t);
				break;
			    }
			}
			Bloque bloqueSiguiente = null;
			//System.out.println("posTiempoAnterior" + posTiempoAnterior+ " tama�o lista tiempos "+ ventana.getTiempoInicios().size() );
			if(posTiempoAnterior < ventana.getTiempoInicios().size()-1){
			    for(Bloque b: bloquesDeUnaSalaYDia){
				if(b.getInicio().equals(ventana.getTiempoInicios().get(posTiempoAnterior+1).getInicio())){
				    bloqueSiguiente = b;
				    //System.out.println("b: "+b);
				    this.getBloquesAsignados().add(b);
				    break;
				}
				//System.out.println("Bloques asignados cumpliendo: " + this.getBloquesAsignados().size());
			    }
			    if(bloqueSiguiente == null){

				this.getBloquesAsignados().clear();
				//System.out.println("Borrado por no tener siguiente suficiente");
				break;

			    }

			}else {
			    this.getBloquesAsignados().clear();
			    // System.out.println("borrar!! no hay tiempo siguientes suficiente");
			    break;
			}
		    }
		    //System.out.println("Bloques asignados restricciones: " + this.getBloquesAsignados().size());
		    if(!noChoque(ventana) || !profesorNoParalelo(ventana)){
			this.getBloquesAsignados().clear();
			//System.out.println("borrar!! no cumple restriccioes");
			//break;
		    }
		    // System.out.println("Bloques asignadosf: " + this.getBloquesAsignados().size());
		    if(this.getBloquesAsignados().size() == this.getHorasContinuadas()){
			for(Bloque b: this.getBloquesAsignados()){
			    if(this.getBloquesAsignados().indexOf(b) != 0){
				Bloque anterior = this.getBloquesAsignados().get(this.getBloquesAsignados().indexOf(b)-1);
				anterior.setBloqueSiguiente(b.getIdBloque());
			    }
			    b.setIdSeccion(this.getSeccion().getIdSeccion());
			}
			break;
		    }
		}
		if(this.getBloquesAsignados().size() == this.getHorasContinuadas()){
		    break;
		}
	    }
	    if(this.getBloquesAsignados().size() == this.getHorasContinuadas()){
		break;

	    }
	}
	if(!dividida){
	    System.out.println("Clase asignada clase; Bloques total con asignaciones: " + (ventana.getBloques().size() - Clase.getBloques().size()) + " Bloques");
	    System.out.println("Bloques clase "+ventana.getAsignatura(this.getSeccion().getIdAsignatura()).getNombreAsignatura()+" : "+this.getBloquesAsignados().toString());
	    Clase.getBloques().removeAll(this.getBloquesAsignados());
	}
    }


    private ArrayList<Bloque> bloquesDeUnaSalaYDia(Sala sala, int dia, VentanaPrincipal ventana){

	ArrayList<Bloque> lista = new ArrayList<Bloque>();
	for(Bloque bloque: Clase.bloques){
	    if(bloque.getIdDia().equals(dia) && bloque.getIdSala().equals(sala.getIdSala()) && Clase.getBloques().contains(bloque)){
		lista.add(bloque);
	    }
	}

	return lista;
    }


    private Boolean noChoque(VentanaPrincipal ventana){
	/*No puede estar la asignatura de una carrera de un mismo semestre y
	 a�o junto con otra en el mismo dia en la misma hora, 
	 exepto si existe alguna N-esima (n>=2) seccion de la misma asigantura que no choque. <-listo
	 */

	String carrera = ventana.getAsignatura(this.getSeccion().getIdAsignatura()).getIdCarrera();
	Integer semestre = ventana.getAsignatura(this.getSeccion().getIdAsignatura()).getSemestre();
	Integer annio = ventana.getAsignatura(this.getSeccion().getIdAsignatura()).getAnio();
	//String profe = this.getSeccion().getIdAsignatura();
	for(Bloque bloque: getBloquesAsignados()){
	    Integer dia = bloque.getIdDia();
	    String hora = bloque.getInicio();
	    for(Bloque elBloque: ventana.getBloques()){
		if(!getBloquesAsignados().contains(elBloque) 
			&& dia.equals(elBloque.getIdDia())
			&& hora.equals(elBloque.getInicio())
			&& elBloque.getIdSeccion() != null
			&& carrera.equals(ventana.getAsignatura(ventana.getSeccion(elBloque.getIdSeccion()).getIdAsignatura()).getIdCarrera())
			&& semestre.equals(ventana.getAsignatura(ventana.getSeccion(elBloque.getIdSeccion()).getIdAsignatura()).getSemestre())
			&& annio.equals(ventana.getAsignatura(ventana.getSeccion(elBloque.getIdSeccion()).getIdAsignatura()).getAnio())
			){
		    //Inicio de buscar la seccion distinta a la que esta en this y que sea de la misma asignatura y tenga otro horario distinto al que se intenta elejir...
		    //para tener las clases nececitamos al planificador...

		    Boolean sePuedeBuscarAlternativa = false;
		    for(Seccion s: this.getPlanificador().getSecciones()){
			if(!s.equals(this.getSeccion()) && s.getIdAsignatura().equals(this.getSeccion().getIdAsignatura())){
			    sePuedeBuscarAlternativa = true;
			    break;
			}
		    }
		    Boolean sePuedeBuscarAlternativa2 = false;
		    for(Seccion s: this.getPlanificador().getSecciones()){
			if(!s.getIdSeccion().equals(elBloque.getIdSeccion()) && s.getIdAsignatura().equals( ventana.getSeccion(elBloque.getIdSeccion()).getIdAsignatura() )){
			    sePuedeBuscarAlternativa2 = true;
			    break;
			}
		    }
		    if(sePuedeBuscarAlternativa && sePuedeBuscarAlternativa2){ 

			for(Seccion seccionLegendaria: ventana.getSecciones()){
			    if(!this.getSeccion().equals(seccionLegendaria) //no es legendaria =(
				    && this.getSeccion().getIdAsignatura().equals(seccionLegendaria.getIdAsignatura())){
				//inicio de ver si tiene distinto horario.
				//hay que tener todas las clases de la seccion de this y la que estamos comparando para ...
				LinkedList<Clase> clasesDeLaSeccionDeThis = new LinkedList<Clase>(); // Con la seccion del elBLoque que esta chocando..
				for(Clase c: this.getPlanificador().getListaDeClases()){
				    if(c.getSeccion().equals(this.getSeccion())){
					clasesDeLaSeccionDeThis.add(c);
				    }
				}

				LinkedList<Clase> clasesDeLaSeccionTopon = new LinkedList<Clase>();
				for(Clase c: this.getPlanificador().getListaDeClases()){
				    if(c.getSeccion().getIdSeccion().equals(elBloque.getIdSeccion())){
					clasesDeLaSeccionTopon.add(c);
				    }
				}


				LinkedList<Clase> clasesDeLaOtraSeccion = new LinkedList<Clase>();
				for(Clase c: this.getPlanificador().getListaDeClases()){
				    if(c.getSeccion().equals(seccionLegendaria)){
					clasesDeLaOtraSeccion.add(c);
				    }
				}
				//... comparalas con tadas las clases de la seccion. 
				for(Clase a: clasesDeLaSeccionTopon){
				    for(Clase b: clasesDeLaOtraSeccion){
					for(Bloque aa: a.getBloquesAsignados()){
					    for(Bloque bb: b.getBloquesAsignados()){
						if(aa.getInicio().equals( bb.getInicio() )&& aa.getIdDia().equals(bb.getIdDia())){
						    return false;
						}
					    }
					}
				    }
				}
			    }

			    //Fin de ver si tienen distinto horario. si llego aqui tiene otro horario o aun no tiene bloques asignados.
			    //return true;
			}
			return true;
		    } 
		    //*/

		    return false;

		    // }
		}
	    }

	}

	return true;
    }

    private Boolean profesorNoParalelo(VentanaPrincipal ventana){//Profesor no puede tener varias clases al mismo tiempo
	for(Bloque bloque: getBloquesAsignados()){
	    Integer dia = bloque.getIdDia();
	    String hora = bloque.getInicio();
	    String profe = this.getSeccion().getIdDocente();
	    for(Bloque elBloque: ventana.getBloques()){
		if( !getBloquesAsignados().contains(elBloque) 
			&& elBloque.getIdDia().equals(dia) 
			&& elBloque.getInicio().equals(hora) 
			&& elBloque.getIdSeccion() != null
			&& ventana.getSeccion(elBloque.getIdSeccion()).getIdDocente().equals(profe) ){
		    return false; //profe multi-tarea :o 
		}
	    }
	}
	return true;
    }


    public void ordenarDiasSegunClase(ArrayList<Integer> dias){
	//1. Se prefiere que la seccion no deba estar en mismo dia repetido, pero si no queda de otra se hace. (Listo)
	LinkedList<Integer> listaDeDias = new LinkedList<Integer>();

	for(Integer dia: dias){
	    for(Clase c: this.getOtrasclasesDeSeccion()){
		if(c.getBloquesAsignados().size() != 0 && c.getBloquesAsignados().get(0).getIdDia().equals(dia)){
		    listaDeDias.addLast(dia);
		    break;
		}
	    }
	    if(!listaDeDias.contains(dia)){
		listaDeDias.addFirst(dia);
	    }
	}
	dias.clear();
	dias.addAll(listaDeDias);
    }

    public ArrayList<Clase> getOtrasclasesDeSeccion(){
	ArrayList<Clase> clases = new ArrayList<Clase>();
	for(Clase c: this.getPlanificador().getListaDeClases()){
	    if(c.getSeccion().equals(this.getSeccion())){
		clases.add(c);
	    }
	}
	return clases;
    }

    @Override
    public String toString() {
	return "Clase [id=" + id + "]";
    }

    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((id == null) ? 0 : id.hashCode());
	return result;
    }

    @Override
    public boolean equals(Object obj) {
	if (this == obj) {
	    return true;
	}
	if (obj == null) {
	    return false;
	}
	if (!(obj instanceof Clase)) {
	    return false;
	}
	Clase other = (Clase) obj;
	if (id == null) {
	    if (other.id != null) {
		return false;
	    }
	} else if (!id.equals(other.id)) {
	    return false;
	}
	return true;
    }

    /**
     * @return the contador
     */
    public static Integer getContador() {
	return contador;
    }

    /**
     * @return the id
     */
    public Integer getId() {
	return id;
    }

    /**
     * @return the horasContinudas
     */
    public Integer getHorasContinuadas() {
	return horasContinuadas;
    }

    /**
     * @return the bloques
     */
    public ArrayList<Bloque> getBloquesAsignados() {
	return bloquesAsignados;
    }

    /**
     * @return the seccion
     */
    public Seccion getSeccion() {
	return seccion;
    }

    public static LinkedList<Bloque> getBloques(){
	return Clase.bloques;
    }
    public void setHorasContinuadas(Integer horasContinuadas) {
	this.horasContinuadas = horasContinuadas;
    }
    public Integer getTipo() {
	return tipo;
    }
    public Planificador getPlanificador() {
	return planificador;
    }
    public static void resetContador(){
	Clase.contador = 0;
    }





}
