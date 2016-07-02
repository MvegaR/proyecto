package logica;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Random;

import db.Bloque;
import db.Conexion;
import db.Seccion;
import gui.VentanaPrincipal;

public class Planificador {
    private static Planificador actual;
    private VentanaPrincipal ventana;
    private ArrayList<Integer> dias;
    private ArrayList<Clase> clasesEnSalaNormal;
    private ArrayList<Clase> clasesEnLabComputacion;
    private ArrayList<Clase> clasesEnLabFisica;
    private ArrayList<Clase> clasesEnLabQuimica;
    private ArrayList<Clase> clasesEnLabMecanica;
    private ArrayList<Clase> clasesEnLabRobotica;
    private ArrayList<Clase> clasesEnTallerArquitectura;
    private ArrayList<Clase> clasesEnTallerMadera;
    private ArrayList<Clase> clasesEnGYM;
    private ArrayList<Clase> clasesEnAuditorio;
    private ArrayList<Clase> clasesEnEspRedes;
    private ArrayList<Clase> clasesElecDigital;
    private ArrayList<Clase> clasesEnMaqElectronicas;
    
    

    public Planificador(VentanaPrincipal ventana, ArrayList<Integer> dias) {
	if(Planificador.actual != null){
        	for(Clase c: Planificador.actual.getListaDeClases()){
        	  for(Bloque b: c.getBloquesAsignados()){
        	      b.setIdSeccion(null);
        	  }
        	}
        	Clase.getBloques().clear();
        	Clase.resetContador();
	}
	Planificador.actual = this;
	this.ventana = ventana;
	this.dias = dias;
	//Cambiar por una funcion que seleccione los bloques de las salas seleccionadas en la gui
	
	for (Bloque bloque : ventana.getBloques()) {
	    if(bloque.getIdSeccion() == null){
		Clase.getBloques().add(bloque);
	    }
	}
	//3. Se prefiere temprano a tarde ...
	Clase.getBloques().sort(new ComparatorBloquePreferenciaTemprano());
	this.generarClasesEnSalaComputacion();
	this.generarClasesEnLabFisica();
	this.generarClasesEnLabQuimica();
	this.generarClasesEnLabMecanica();
	this.generarClasesEnLabRobotica();
	this.generarClasesTallerArquitectura();
	this.generarClasesTallerMadera();
	this.generarClasesGYM();
	this.generarClasesAuditorio();
	this.generarClasesEspRedes();
	this.generarClasesElecDigital();
	this.generarClasesMaqElectronicas();
	this.generarClasesEnSalaNormal();
	this.busquedaDeBloquesParaLasClases();
	this.asignarEnBD();


    }
    
    public void asignarEnBD(){
	for(Clase c: this.getListaDeClases()){
	    for(Bloque b: c.getBloquesAsignados()){
		Conexion.ejecutarSQL("UPDATE bloque SET ID_SECCION = '" + b.getIdSeccion() + "', BLOQUE_SIGUIENTE = '"+b.getBloqueSiguiente()+"' WHERE ID_BLOQUE = '" +b.getIdBloque()+"'");
	    }
	}
    }

    public ArrayList<Clase> getListaDeClases(){
	
	ArrayList<Clase> lista = new ArrayList<>();
	if(getClasesEnSalaNormal() != null){
	    lista.addAll(getClasesEnSalaNormal()); //ir agregando listas segun su tipo
	}
	if(getClasesEnLabComputacion() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnLabFisica() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnLabQuimica() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnLabMecanica() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnLabRobotica() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnTallerArquitectura() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnTallerMadera() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnGYM() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnAuditorio() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnEspRedes() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesElecDigital() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnLabMecanica() != null){
	    lista.addAll(getClasesElecDigital());
	}
	return lista;
    }

    private Integer generarClases(String tipo, ArrayList<Clase> listaDeClasesVacia){
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: ventana.getSecciones()){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraTeo() + ventana.getAsignatura(seccion.getIdAsignatura()).getHoraAyudantia();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		listaDeClasesVacia.add(new Clase(this,2, seccion, tipo));
	    }
	    if(numerosDeClases == 0){
		listaDeClasesVacia.add(new Clase(this,1, seccion, tipo));	
	    }
	    Collections.shuffle(listaDeClasesVacia, new Random());
	    if(horas != 1 && !par){
		Clase k = listaDeClasesVacia.get(listaDeClasesVacia.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	return totalDeBloques;
    }


    public void generarClasesEnSalaNormal(){
	
	clasesEnSalaNormal = new ArrayList<Clase>();
	Integer totalDeBloques = generarClases("Normal", clasesEnSalaNormal);
	System.out.println("Cantidad de clases teoricas: "+ clasesEnSalaNormal.size() + " Total de bloques teoricos: "+ totalDeBloques);
	 
    }
    
    public void generarClasesEnSalaComputacion(){
	
	clasesEnLabComputacion = new ArrayList<Clase>();
	Integer totalDeBloques = generarClases("Computacion", clasesEnSalaNormal);
	System.out.println("Cantidad de clases computación: "+ clasesEnLabComputacion.size() + " Total de bloques computación: "+ totalDeBloques);
	 
    }
    
    public void generarClasesEnLabFisica(){
	
	clasesEnLabFisica = new ArrayList<Clase>();
	Integer totalDeBloques = generarClases("LabFisica", clasesEnLabFisica);
	System.out.println("Cantidad de clases lab fisica: "+ clasesEnLabFisica.size() + " Total de bloques lab fisica: "+ totalDeBloques);
	 
    }
    

    public void generarClasesEnLabQuimica(){
	
	clasesEnLabQuimica = new ArrayList<Clase>();
    	Integer totalDeBloques = generarClases("LabQuimica", clasesEnLabQuimica);
	System.out.println("Cantidad de clases lab quimica: "+ clasesEnLabQuimica.size() + " Total de bloques lab quimica: "+ totalDeBloques);
	 
    }
    
    
    public void generarClasesEnLabMecanica(){
	
	clasesEnLabMecanica = new ArrayList<Clase>();
	Integer totalDeBloques = generarClases("LabMecanica", clasesEnLabMecanica);
	System.out.println("Cantidad de clases lab mecanica: "+ clasesEnLabMecanica.size() + " Total de bloques lab mecanica: "+ totalDeBloques);
	 
    }
    
    public void generarClasesEnLabRobotica(){
	
	clasesEnLabRobotica = new ArrayList<Clase>();
	Integer totalDeBloques = generarClases("LabRobotica", clasesEnLabRobotica);
	System.out.println("Cantidad de clases lab robotica: "+ clasesEnLabRobotica.size() + " Total de bloques lab robotica: "+ totalDeBloques);
	 
    }
    
    public void generarClasesTallerArquitectura(){
	
	clasesEnTallerArquitectura = new ArrayList<Clase>();
	Integer totalDeBloques = generarClases("TallerArquitectura", clasesEnTallerArquitectura);
	System.out.println("Cantidad de clases taller arquitectura: "+ clasesEnTallerArquitectura.size() + " Total de bloques taller arquitectura: "+ totalDeBloques);
    }
    
    public void generarClasesTallerMadera(){
	
	clasesEnTallerMadera = new ArrayList<Clase>();
	Integer totalDeBloques = generarClases("TallerMadera", clasesEnTallerMadera);
	System.out.println("Cantidad de clases taller madera: "+ clasesEnTallerMadera.size() + " Total de bloques taller madera: "+ totalDeBloques);
    }
    
    public void generarClasesGYM(){
	
	clasesEnGYM = new ArrayList<Clase>();
	Integer totalDeBloques = generarClases("GYM", clasesEnGYM);
	System.out.println("Cantidad de clases GYM: "+ clasesEnGYM.size() + " Total de bloques GYM: "+ totalDeBloques);
    }
    
    public void generarClasesAuditorio(){
	
	clasesEnAuditorio = new ArrayList<Clase>();
	Integer totalDeBloques = generarClases("LabEspRedes", clasesEnAuditorio);
	System.out.println("Cantidad de clases auditorio: "+ clasesEnAuditorio.size() + " Total de bloques auditorio: "+ totalDeBloques);
    }
    
    public void generarClasesEspRedes(){
	
	clasesEnEspRedes = new ArrayList<Clase>();
	Integer totalDeBloques = generarClases("LabEspRedes", clasesEnEspRedes);
	System.out.println("Cantidad de clases lab redes: "+ clasesEnEspRedes.size() + " Total de bloques lab rades: "+ totalDeBloques);
    }
    
    public void generarClasesElecDigital(){
	
   	clasesElecDigital = new ArrayList<Clase>();
   	Integer totalDeBloques =generarClases("LabElectDigital", clasesElecDigital);
   	System.out.println("Cantidad de clases lab elect digital: "+ clasesElecDigital.size() + " Total de bloques lab elec digital: "+ totalDeBloques);
       }
    
    public void generarClasesMaqElectronicas(){
	
   	clasesEnMaqElectronicas = new ArrayList<Clase>();
   	Integer totalDeBloques = generarClases("LabMaquinasElectricas", clasesEnMaqElectronicas);
   	System.out.println("Cantidad de clases taller maq electronicas: "+ clasesEnMaqElectronicas.size() + " Total de bloques taller maq electronicas: "+ totalDeBloques);
       }
    
    public void busquedaDeBloquesParaLasClases(){
	

	for(Clase c: this.getClasesEnLabComputacion()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesEnLabFisica()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesEnLabQuimica()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesEnLabMecanica()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesEnLabRobotica()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesEnTallerArquitectura()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesEnTallerMadera()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesEnGYM()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesEnAuditorio()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesEnEspRedes()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesElecDigital()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	for(Clase c: this.getClasesEnMaqElectronicas()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	//importante al final
	for(Clase c: this.getClasesEnSalaNormal()){
	    c.obtenerBloques(getVentana(), getDias());
	}
	
    }
    
    
  
    public VentanaPrincipal getVentana() {
	return ventana;
    }

    public ArrayList<Clase> getClasesEnSalaNormal() {
	return clasesEnSalaNormal;
    }
    public ArrayList<Integer> getDias() {
	return dias;
    }

    /**
     * @return the actual
     */
    public static Planificador getActual() {
        return actual;
    }

    /**
     * @return the clasesEnLabComputacion
     */
    public ArrayList<Clase> getClasesEnLabComputacion() {
        return clasesEnLabComputacion;
    }

    /**
     * @return the clasesEnLabFisica
     */
    public ArrayList<Clase> getClasesEnLabFisica() {
        return clasesEnLabFisica;
    }

    /**
     * @return the clasesEnLabQuimica
     */
    public ArrayList<Clase> getClasesEnLabQuimica() {
        return clasesEnLabQuimica;
    }

    /**
     * @return the clasesEnLabMecanica
     */
    public ArrayList<Clase> getClasesEnLabMecanica() {
        return clasesEnLabMecanica;
    }

    /**
     * @return the clasesEnLabRobótica
     */
    public ArrayList<Clase> getClasesEnLabRobotica() {
        return clasesEnLabRobotica;
    }

    /**
     * @return the clasesEnTallerArquitectura
     */
    public ArrayList<Clase> getClasesEnTallerArquitectura() {
        return clasesEnTallerArquitectura;
    }

    /**
     * @return the clasesEnTallerMadera
     */
    public ArrayList<Clase> getClasesEnTallerMadera() {
        return clasesEnTallerMadera;
    }

    /**
     * @return the clasesEnGYM
     */
    public ArrayList<Clase> getClasesEnGYM() {
        return clasesEnGYM;
    }

    /**
     * @return the clasesEnAuditorio
     */
    public ArrayList<Clase> getClasesEnAuditorio() {
        return clasesEnAuditorio;
    }

    /**
     * @return the clasesEnEspRedes
     */
    public ArrayList<Clase> getClasesEnEspRedes() {
        return clasesEnEspRedes;
    }

    /**
     * @return the clasesEnMaqElectronicas
     */
    public ArrayList<Clase> getClasesEnMaqElectronicas() {
        return clasesEnMaqElectronicas;
    }
    
    public ArrayList<Clase> getClasesElecDigital() {
	return clasesElecDigital;
    }




}
