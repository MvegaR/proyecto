package logica;

import java.util.ArrayList;

import db.Asignatura;
import db.Bloque;
import db.Seccion;
import gui.VentanaPrincipal;

public class Planificador {

    private VentanaPrincipal ventana;
    private ArrayList<Clase> clasesEnSalaNormal;
    private ArrayList<Integer> dias;
    //private ArrayList<Clase> clasesEnLabComputacion;

    public Planificador(VentanaPrincipal ventana, ArrayList<Integer> dias) {
	this.ventana = ventana;
	this.dias = dias;
	for (Bloque bloque : ventana.getBloques()) {
	    if(bloque.getIdSeccion() == null){
		Clase.getBloques().add(bloque);
	    }
	}
	generarClasesEnSalaNormal();


    }

    public ArrayList<Clase> getListaDeClases(){
	ArrayList<Clase> lista = new ArrayList<>();
	lista.addAll(getClasesEnSalaNormal()); //ir agregando listas segun su tipo

	return lista;
    }



    private void generarClasesEnSalaNormal(){
	clasesEnSalaNormal = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	for(Seccion seccion: ventana.getSecciones()){
	    Integer horas =  getAsignatura(seccion.getIdAsignatura()).getHoraTeo();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = getAsignatura(seccion.getIdAsignatura()).getHoraTeo()/2;
	    totalDeBloques += getAsignatura(seccion.getIdAsignatura()).getHoraTeo();
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnSalaNormal.add(new Clase(this,2, seccion, "Normal"));
	    }
	    if(!par){
		Clase k = clasesEnSalaNormal.get(clasesEnSalaNormal.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases teoricas: "+ clasesEnSalaNormal.size() + " Total de bloques teoricos: "+ totalDeBloques);
	 
	//--
	//poner en otra funcion... llamada "Pedirle a las clases que se busquen un horario" o similar :p...
	for(Clase c: clasesEnSalaNormal){
	    c.obtenerBloques(getVentana(), getDias());
	}
	//---
    }
  
    private Asignatura getAsignatura(String id){
	for(Asignatura as: getVentana().getAsignaturas()){
	    if(as.getIdAsignatura().equals(id)){
		return as;
	    }
	}
	return null;
    }

    private VentanaPrincipal getVentana() {
	return ventana;
    }

    public ArrayList<Clase> getClasesEnSalaNormal() {
	return clasesEnSalaNormal;
    }
    public ArrayList<Integer> getDias() {
	return dias;
    }





}
