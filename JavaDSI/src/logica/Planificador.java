package logica;

import java.util.ArrayList;
import java.util.Collections;
import java.util.HashSet;
import java.util.Random;
import java.util.Set;

import db.Bloque;
import db.Conexion;
import db.Sala;
import db.Seccion;
import gui.MensajesError;
import gui.ProgresoAsignacion;
import gui.VentanaPrincipal;

public class Planificador extends Thread{
    private static Planificador actual; //solo puede existir un planificador en el software, si se quiere con hilos, aqui dentro.
    private Integer totalDeClases;
    private Integer totalDeClasesConAsignaciones;
    private VentanaPrincipal ventana;
    private ArrayList<Integer> dias;
    private ArrayList<Seccion> secciones;
    private ArrayList<Sala> salas;
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
    private ArrayList<Clase> clasesCreadasPorDividirOtras = new ArrayList<>();
    private Boolean detener;
    private ProgresoAsignacion pro;

    @Override
    public void run() {
	super.run();
	this.generarClases();
	this.busquedaDeBloquesParaLasClases();
	pro.getBtnDetener().setEnabled(false);
	if(!detener)this.asignarEnBD();
	pro.getBtnDetener().setVisible(false);
	pro.getBtnVolver().setVisible(true);
	pro.getAumentarSegundo().cancel();
    }

    public Planificador(VentanaPrincipal ventana, ArrayList<Sala> salas, ArrayList<Seccion> secciones, ArrayList<Integer> dias, ProgresoAsignacion pro) throws Exception {

	if(salas.isEmpty()){
	    MensajesError.meEr_ListaDeSalaSeleccionadasVacia();
	    throw new Exception("La lista de salas está vacía, no es posible continuar.");
	}

	if(secciones.isEmpty()){
	    MensajesError.meEr_ListaDeSeccionesSeleccionadasVacia();
	    throw new Exception("La lista de secciones está vacía, no es posible continuar.");
	}

	if(dias.isEmpty()){
	    MensajesError.meEr_ListaDeDiasSeleccionadasVacia();
	    throw new Exception("La lista de días está vacía, no es posible continuar.");
	}
	if(Planificador.actual != null){
	    for(Clase c: Planificador.actual.getListaDeClases()){
		for(Bloque b: c.getBloquesAsignados()){
		    b.setIdSeccion(null);
		}
	    }


	}
	Clase.getBloques().clear();
	Clase.resetContador();
	this.pro = pro;
	Planificador.actual = this;
	this.detener = false;
	this.ventana = ventana;
	this.dias = dias;
	this.salas = salas;
	this.secciones = secciones;
	this.totalDeClases = 0;
	this.totalDeClasesConAsignaciones = 0;
	//Bloques sin secciones
	for (Bloque bloque : ventana.getBloques()) {
	    if(bloque.getIdSeccion() == null){
		Clase.getBloques().add(bloque);
	    }
	}
	System.out.println("Bloques para asignar "+Clase.getBloques().size());
	//3. Se prefiere temprano a tarde ...
	Clase.getBloques().sort(new ComparatorBloquePreferenciaTemprano());





    }

    public Boolean getDetener() {
	return detener;
    }
    public void setDetener(Boolean detener) {
	this.detener = detener;
    }

    public void generarClases(){
	this.generarClasesEnSalaComputacion(getSecciones());
	this.generarClasesEnLabFisica(getSecciones());
	this.generarClasesEnLabQuimica(getSecciones());
	this.generarClasesEnLabMecanica(getSecciones());
	this.generarClasesEnLabRobotica(getSecciones());
	this.generarClasesTallerArquitectura(getSecciones());
	this.generarClasesTallerMadera(getSecciones());
	this.generarClasesGYM(getSecciones());
	this.generarClasesAuditorio(getSecciones());
	this.generarClasesEspRedes(getSecciones());
	this.generarClasesElecDigital(getSecciones());
	this.generarClasesMaqElectronicas(getSecciones());
	this.generarClasesEnSalaNormal(getSecciones());
	this.totalDeClases = this.getListaDeClases().size();
    }

    public ArrayList<Seccion> getSecciones() {
	return secciones;
    }

    public void asignarEnBD(){
	System.out.println("Insertando en base de datos; Ahora no se puede detener el proceso.");
	for(Clase c: this.getListaDeClases()){
	    for(Bloque b: c.getBloquesAsignados()){
		String sql = "UPDATE bloque SET ID_SECCION = '" + b.getIdSeccion() + "', BLOQUE_SIGUIENTE = "+b.getBloqueSiguiente()+" WHERE ID_BLOQUE = '" +b.getIdBloque()+"'";
		Conexion.ejecutarSQL(sql);
	    }
	}
	System.out.println("Finalizado.");
    }

    public ArrayList<Clase> getListaDeClases(){

	ArrayList<Clase> lista = new ArrayList<>();
	if(getClasesEnSalaNormal() != null){
	    lista.addAll(getClasesEnSalaNormal()); //ir agregando listas segun su tipo
	}
	if(getClasesEnLabComputacion() != null){
	    lista.addAll(getClasesEnLabComputacion());
	}
	if(getClasesEnLabFisica() != null){
	    lista.addAll(getClasesEnLabFisica());
	}
	if(getClasesEnLabQuimica() != null){
	    lista.addAll(getClasesEnLabQuimica());
	}
	if(getClasesEnLabMecanica() != null){
	    lista.addAll(getClasesEnLabMecanica());
	}
	if(getClasesEnLabRobotica() != null){
	    lista.addAll(getClasesEnLabRobotica());
	}
	if(getClasesEnTallerArquitectura() != null){
	    lista.addAll(getClasesEnTallerArquitectura());
	}
	if(getClasesEnTallerMadera() != null){
	    lista.addAll(getClasesEnTallerMadera());
	}
	if(getClasesEnGYM() != null){
	    lista.addAll(getClasesEnGYM());
	}
	if(getClasesEnAuditorio() != null){
	    lista.addAll(getClasesEnAuditorio());
	}
	if(getClasesEnEspRedes() != null){
	    lista.addAll(getClasesEnEspRedes());
	}
	if(getClasesElecDigital() != null){
	    lista.addAll(getClasesElecDigital());
	}
	if(getClasesEnLabMecanica() != null){
	    lista.addAll(getClasesEnLabMecanica());
	}
	if(getClasesCreadasPorDividirOtras() != null){
	    lista.addAll(getClasesCreadasPorDividirOtras());
	}
	return lista;
    }



    private void generarClasesEnSalaNormal(ArrayList<Seccion> secciones){

	clasesEnSalaNormal = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraTeo() + ventana.getAsignatura(seccion.getIdAsignatura()).getHoraAyudantia();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    //horas teo + ahoras ayudantia = sala normal
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnSalaNormal.add(new Clase(this,2, seccion, 1));
	    }
	    if(numerosDeClases == 0){
		clasesEnSalaNormal.add(new Clase(this,1, seccion, 1));	
	    }
	    Collections.shuffle(clasesEnSalaNormal, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnSalaNormal.get(clasesEnSalaNormal.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases teoricas: "+ clasesEnSalaNormal.size() + " Total de bloques teoricos: "+ totalDeBloques);

    }



    private void generarClasesEnSalaComputacion(ArrayList<Seccion> secciones){

	clasesEnLabComputacion = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	//	System.out.println(secciones);
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraLabCom();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnLabComputacion.add(new Clase(this,2, seccion, 2));
	    }
	    if(numerosDeClases == 0){
		clasesEnLabComputacion.add(new Clase(this,1, seccion, 2));	
	    }
	    Collections.shuffle(clasesEnLabComputacion, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnLabComputacion.get(clasesEnLabComputacion.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases computación: "+ clasesEnLabComputacion.size() + " Total de bloques computación: "+ totalDeBloques);

    }

    private void generarClasesEnLabFisica(ArrayList<Seccion> secciones){

	clasesEnLabFisica = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraLabFisica();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnLabFisica.add(new Clase(this,2, seccion, 3));
	    }
	    if(numerosDeClases == 0){
		clasesEnLabFisica.add(new Clase(this,1, seccion, 3));	
	    }
	    Collections.shuffle(clasesEnLabFisica, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnLabFisica.get(clasesEnLabFisica.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases lab fisica: "+ clasesEnLabFisica.size() + " Total de bloques lab fisica: "+ totalDeBloques);

    }


    private void generarClasesEnLabQuimica(ArrayList<Seccion> secciones){

	clasesEnLabQuimica = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraLabQuimica();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnLabQuimica.add(new Clase(this,2, seccion, 4));
	    }
	    if(numerosDeClases == 0){
		clasesEnLabQuimica.add(new Clase(this,1, seccion, 4));	
	    }
	    Collections.shuffle(clasesEnLabQuimica, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnLabQuimica.get(clasesEnLabQuimica.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases lab quimica: "+ clasesEnLabQuimica.size() + " Total de bloques lab quimica: "+ totalDeBloques);

    }


    private void generarClasesEnLabMecanica(ArrayList<Seccion> secciones){

	clasesEnLabMecanica = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraLabMecanica();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnLabMecanica.add(new Clase(this,2, seccion, 5));
	    }
	    if(numerosDeClases == 0){
		clasesEnLabMecanica.add(new Clase(this,1, seccion, 5));	
	    }
	    Collections.shuffle(clasesEnLabMecanica, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnLabMecanica.get(clasesEnLabMecanica.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases lab mecanica: "+ clasesEnLabMecanica.size() + " Total de bloques lab mecanica: "+ totalDeBloques);

    }

    private void generarClasesEnLabRobotica(ArrayList<Seccion> secciones){

	clasesEnLabRobotica = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraLabRobotica();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnLabRobotica.add(new Clase(this,2, seccion, 6));
	    }
	    if(numerosDeClases == 0){
		clasesEnLabRobotica.add(new Clase(this,1, seccion, 6));	
	    }
	    Collections.shuffle(clasesEnLabRobotica, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnLabRobotica.get(clasesEnLabRobotica.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases lab mecanica: "+ clasesEnLabRobotica.size() + " Total de bloques lab mecanica: "+ totalDeBloques);

    }

    private void generarClasesTallerArquitectura(ArrayList<Seccion> secciones){

	clasesEnTallerArquitectura = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraTallerArquitectura();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnTallerArquitectura.add(new Clase(this,2, seccion, 7));
	    }
	    if(numerosDeClases == 0){
		clasesEnTallerArquitectura.add(new Clase(this,1, seccion, 7));	
	    }
	    Collections.shuffle(clasesEnTallerArquitectura, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnTallerArquitectura.get(clasesEnTallerArquitectura.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases taller arquitectura: "+ clasesEnTallerArquitectura.size() + " Total de bloques taller arquitectura: "+ totalDeBloques);
    }

    private void generarClasesTallerMadera(ArrayList<Seccion> secciones){

	clasesEnTallerMadera = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraTallerMadera();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnTallerMadera.add(new Clase(this,2, seccion, 8));
	    }
	    if(numerosDeClases == 0){
		clasesEnTallerMadera.add(new Clase(this,1, seccion, 8));	
	    }
	    Collections.shuffle(clasesEnTallerMadera, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnTallerMadera.get(clasesEnTallerMadera.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases taller madera: "+ clasesEnTallerMadera.size() + " Total de bloques taller madera: "+ totalDeBloques);
    }

    private void generarClasesGYM(ArrayList<Seccion> secciones){

	clasesEnGYM = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraGYM();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnGYM.add(new Clase(this,2, seccion, 9));
	    }
	    if(numerosDeClases == 0){
		clasesEnGYM.add(new Clase(this,1, seccion, 9));	
	    }
	    Collections.shuffle(clasesEnGYM, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnGYM.get(clasesEnGYM.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases GYM: "+ clasesEnGYM.size() + " Total de bloques GYM: "+ totalDeBloques);
    }

    private void generarClasesAuditorio(ArrayList<Seccion> secciones){

	clasesEnAuditorio = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraAuditorio();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnAuditorio.add(new Clase(this,2, seccion, 10));
	    }
	    if(numerosDeClases == 0){
		clasesEnAuditorio.add(new Clase(this,1, seccion, 10));	
	    }
	    Collections.shuffle(clasesEnAuditorio, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnAuditorio.get(clasesEnAuditorio.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases auditorio: "+ clasesEnAuditorio.size() + " Total de bloques auditorio: "+ totalDeBloques);
    }

    private void generarClasesEspRedes(ArrayList<Seccion> secciones){

	clasesEnEspRedes = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraLabRedes();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnEspRedes.add(new Clase(this,2, seccion, 11));
	    }
	    if(numerosDeClases == 0){
		clasesEnEspRedes.add(new Clase(this,1, seccion, 11));	
	    }
	    Collections.shuffle(clasesEnEspRedes, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnEspRedes.get(clasesEnEspRedes.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases lab redes: "+ clasesEnEspRedes.size() + " Total de bloques lab rades: "+ totalDeBloques);
    }

    private void generarClasesElecDigital(ArrayList<Seccion> secciones){

	clasesElecDigital = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraLabElectronica();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesElecDigital.add(new Clase(this,2, seccion, 12));
	    }
	    if(numerosDeClases == 0){
		clasesElecDigital.add(new Clase(this,1, seccion, 12));	
	    }
	    Collections.shuffle(clasesElecDigital, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesElecDigital.get(clasesElecDigital.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases lab elect digital: "+ clasesElecDigital.size() + " Total de bloques lab elec digital: "+ totalDeBloques);
    }

    private void generarClasesMaqElectronicas(ArrayList<Seccion> secciones){

	clasesEnMaqElectronicas = new ArrayList<Clase>();
	Integer totalDeBloques = 0;
	//Modificar para que reciba las Asignaturas seleccionadas por la GUI (esta con todas las secciones existentes)
	for(Seccion seccion: secciones){
	    Integer horas =  ventana.getAsignatura(seccion.getIdAsignatura()).getHoraLabMaqElectricas();
	    if(horas == 0) continue;
	    Boolean par = horas%2 == 0;
	    Integer numerosDeClases = horas/2;
	    totalDeBloques += horas;
	    for(int i = 0; i<numerosDeClases; i++){
		clasesEnMaqElectronicas.add(new Clase(this,2, seccion, 13));
	    }
	    if(numerosDeClases == 0){
		clasesEnMaqElectronicas.add(new Clase(this,1, seccion, 13));	
	    }
	    Collections.shuffle(clasesEnMaqElectronicas, new Random());
	    if(horas != 1 && !par){
		Clase k = clasesEnMaqElectronicas.get(clasesEnMaqElectronicas.size()-1);
		k.setHorasContinuadas(k.getHorasContinuadas()+1);
	    }
	}
	System.out.println("Cantidad de clases taller maq electronicas: "+ clasesEnMaqElectronicas.size() + " Total de bloques taller maq electronicas: "+ totalDeBloques);
    }

    public void busquedaDeBloquesParaLasClases(){

	HashSet<Clase> claseIniciales = new HashSet();;
	HashSet<Clase> ClasesFinales  = new HashSet();;
	
	for(Clase c: this.getClasesEnLabComputacion()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesEnLabFisica()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesEnLabQuimica()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesEnLabMecanica()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesEnLabRobotica()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesEnTallerArquitectura()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesEnTallerMadera()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesEnGYM()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesEnAuditorio()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesEnEspRedes()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesElecDigital()){
	    
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	for(Clase c: this.getClasesEnMaqElectronicas()){
	
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
	//importante al final si se quiere dar preferencia a laboratorios y no queden dispersos en caso de sub-diviciones de secciones...
	for(Clase c: this.getClasesEnSalaNormal()){
	    c.obtenerBloques(getVentana(), getSalas(), getDias());
	    this.totalDeClasesConAsignaciones++;
	    if(detener){break;}
	}
    }

    private ArrayList<Sala> getSalas() {
	return salas;
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
    public ArrayList<Clase> getClasesCreadasPorDividirOtras() {
	return clasesCreadasPorDividirOtras;
    }
    public Integer getPorcentajeProgreso(){
		System.err.println(totalDeClasesConAsignaciones);
		System.err.println(totalDeClases);
		System.err.println((int) (( (this.totalDeClasesConAsignaciones * 1.0) / (this.totalDeClases * 1.0 ) ) * 100));
	    return (int) (( (this.totalDeClasesConAsignaciones * 1.0) / (this.totalDeClases * 1.0 ) ) * 100) ;
	
    }






}
