package logica;
import java.util.ArrayList;
import java.util.Collections;
import java.util.LinkedList;
import java.util.Random;

import db.Bloque;
import db.Sala;
import db.Seccion;
import db.TiempoInicio;
import gui.VentanaPrincipal;
public class Clase {

    //Por ejemplo la asignatura X tiene 5 horas.
    //Queremos las clases de 2 horas o a lo más una de 3 por seccion. (caso horas totales impares)
    //se crea una clase para la de dos y otra para la de 3, cada una se busca su horario.

    private static Integer contador = 0;
    private static LinkedList<Bloque> bloques = new LinkedList<>();
    private Integer id;
    private Integer horasContinuadas;
    private ArrayList<Bloque> bloquesAsignados;
    private Seccion seccion;
    private String tipo;
    private Planificador planificador;

    public Clase(Planificador planificador, Integer horasContinuadas, Seccion seccion, String tipo) {
	this.id = Clase.contador++;
	this.horasContinuadas = horasContinuadas;
	this.seccion = seccion;
	this.tipo = tipo;
	this.planificador = planificador;
	this.bloquesAsignados = new ArrayList<Bloque>();
    }

    public void obtenerBloques(VentanaPrincipal ventana, ArrayList<Integer> dias){ //para ser llamada desde el planificador
	//1. Se prefiere que la seccion no deba estar en mismo dia repetido, pero si no queda de otra se hace.
	//2. Se prefiere la sala con capacidad con diferencia a cupo igual o mayor a cero y mientras menor mejor.
	//3. Se prefiere temporano a tarde ... (antes de primeros 15)
	//4. Si el profesor es del departamento de una facultad se prefiere una sala de un edificio de esa facultad. 

	// dias en orden aleatorio, cuantos dias?? En ventana debe de ponerse o en planificar
	Collections.shuffle(dias, new Random()); // que bonito =) 
	if(this.getTipo().equals("Normal")){ //eligiendo salas normales (no olvidar incluir ayudantias despues...)

	    for(Sala sala: ventana.getSalas()){
		if(sala.getIdTipoSala().equals(1)){
		    for(Integer dia: dias){
			ArrayList<Bloque> bloquesDeUnaSalaYDia = bloquesDeUnaSalaYDia(sala, dia, ventana); 
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
				//System.out.println("posTiempoAnterior" + posTiempoAnterior+ " tamaño lista tiempos "+ ventana.getTiempoInicios().size() );
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
					break;
					
				    }

				}else {
				    this.getBloquesAsignados().clear();
				   // System.out.println("borrar!! no hay tiempo siguientes suficiente");
				    break;
				}
			    }
			    //System.out.println("Bloques asignados restricciones: " + this.getBloquesAsignados().size());
			    if(!noChoque(ventana) && !profesorNoParalelo(ventana)){
				this.getBloquesAsignados().clear();
				//System.out.println("borrar!! no cumple restriccioes");
				break;
			    }
			   // System.out.println("Bloques asignadosf: " + this.getBloquesAsignados().size());
			    if(this.getBloquesAsignados().size() == this.getHorasContinuadas()){
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
		if(this.getBloquesAsignados().size() == this.getHorasContinuadas()){
		    break;
		}
	    }
	    Clase.getBloques().removeAll(this.getBloquesAsignados());
	    System.out.println("Asignado clase; sobran: " + Clase.getBloques().size() + " Bloques");
	    System.out.println("Bloques clase "+ventana.getAsignatura(this.getSeccion().getIdAsignatura()).getNombreAsignatura()+" : "+this.getBloquesAsignados().toString());
	    
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
	 año junto con otra en el mismo dia en la misma hora, 
	 exepto si existe alguna N-esima seccion de la misma asigantura que no choque. <-listo
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
		    for(Seccion seccionLegendaria: ventana.getSecciones()){
			if(!this.getSeccion().equals(seccionLegendaria) //no es legendaria =(
				&& this.getSeccion().getIdAsignatura().equals(seccionLegendaria.getIdAsignatura())){
			    //inicio de ver si tiene distinto horario.
			    //hay que tener todas las clases de la seccion de this y la que estamos comparando para ...
			    LinkedList<Clase> clasesDeLaSeccionDeThis = new LinkedList<Clase>();
			    for(Clase c: this.getPlanificador().getListaDeClases()){
				if(c.getSeccion().equals(this.getSeccion())){
				    clasesDeLaSeccionDeThis.add(c);
				}
			    }
			    LinkedList<Clase> clasesDeLaOtraSeccion = new LinkedList<Clase>();
			    for(Clase c: this.getPlanificador().getListaDeClases()){
				if(c.getSeccion().equals(seccionLegendaria)){
				    clasesDeLaSeccionDeThis.add(c);
				}
			    }
			    //... comparalas con tadas las clases de la seccion.
			    for(Clase a: clasesDeLaSeccionDeThis){
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
			    //Fin de ver si tienen distinto horario. si llego aqui tiene otro horario o aun no tiene bloques asignados.
			    return true;
			}
		    } 

		    return false;

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



    /* (non-Javadoc)
     * @see java.lang.Object#toString()
     */
    @Override
    public String toString() {
	return "Clase [id=" + id + "]";
    }

    /* (non-Javadoc)
     * @see java.lang.Object#hashCode()
     */
    @Override
    public int hashCode() {
	final int prime = 31;
	int result = 1;
	result = prime * result + ((id == null) ? 0 : id.hashCode());
	return result;
    }

    /* (non-Javadoc)
     * @see java.lang.Object#equals(java.lang.Object)
     */
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
    public String getTipo() {
	return tipo;
    }
    public Planificador getPlanificador() {
	return planificador;
    }





}
