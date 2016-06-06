package gui;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.UIManager;
import db.Asignatura;
import db.Bloque;
import db.Carrera;
import db.Conexion;
import db.Departamento;
import db.Docente;
import db.Edificio;
import db.Facultad;
import db.Sala;
import db.Seccion;
import de.javasoft.plaf.synthetica.SyntheticaBlueSteelLookAndFeel;
import java.awt.BorderLayout;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

public class VentanaPrincipal extends JFrame {

    private static final long serialVersionUID = 1L;


    private GestionPaneles panelRaul;
    private PanelCabecera cabecera;
    private JPanel seccionOpciones;
    public static JButton btnVolver;

    //---------------------------------------------------------------------
    //Se debe rellenar estas listas cada vez que se inicie le programa:
    //ArrayList por que no vamos a insertar más... pero vamos a buscar mucho.

    private ArrayList<Asignatura> asignaturas = new ArrayList<>();
    private ArrayList<Bloque> bloques = new ArrayList<>();
    private ArrayList<Carrera> carreras = new ArrayList<>();
    private ArrayList<Departamento> departamentos = new ArrayList<>();
    private ArrayList<Docente> docentes = new ArrayList<>();
    private ArrayList<Edificio> edificios = new ArrayList<>();
    private ArrayList<Facultad> facultades = new ArrayList<>();
    private ArrayList<Sala> salas = new ArrayList<>();
    private ArrayList<Seccion> secciones = new ArrayList<>();

    //---------------------------------------------------------------------

    public VentanaPrincipal() {
	this.setResizable(false);
	this.setUndecorated(true);

	panelRaul = new GestionPaneles();
	cabecera = new PanelCabecera();
	seccionOpciones = new JPanel();

	btnVolver = new JButton("Volver");
	btnVolver.setVisible(false);

	seccionOpciones.add(btnVolver);

	this.add(cabecera,BorderLayout.NORTH);
	this.add(panelRaul,BorderLayout.CENTER);
	this.add(seccionOpciones,BorderLayout.SOUTH);
	this.setSize(1280, 720);
	this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	this.setLocationRelativeTo(null);
	this.rellenarListas();
    }

    private void rellenarListas(){
	//inicio rellenar asignaturas:
	ResultSet tabla = Conexion.ejecutarSQL("Select * from asignaturas");
	try {
	    while(tabla.next()){
		this.getAsignaturas().add(new Asignatura(tabla));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//fin rellenar asignaturas.

	//inicio rellenar Bloques:
	tabla = Conexion.ejecutarSQL("Select * from bloque");
	try {
	    while(tabla.next()){
		this.getBloques().add(new Bloque(tabla));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//fin rellenar Bloques.

	//inicio rellenar Carreras:
	tabla = Conexion.ejecutarSQL("Select * from carrera");
	try {
	    while(tabla.next()){
		this.getCarreras().add(new Carrera(tabla));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//fin rellenar Carrera.

	//inicio rellenar Departamentos:
	tabla = Conexion.ejecutarSQL("Select * from departamento");
	try {
	    while(tabla.next()){
		this.getDepartamentos().add(new Departamento(tabla));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//fin rellenar Departamento.

	//inicio rellenar Docentes:
	tabla = Conexion.ejecutarSQL("Select * from docente");
	try {
	    while(tabla.next()){
		this.getDocentes().add(new Docente(tabla));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//fin rellenar Docentes.

	//inicio rellenar Edificios:
	tabla = Conexion.ejecutarSQL("Select * from edificio");
	try {
	    while(tabla.next()){
		this.getEdificios().add(new Edificio(tabla));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//fin rellenar Edificios.

	//inicio rellenar Sacultades:
	tabla = Conexion.ejecutarSQL("Select * from facultad");
	try {
	    while(tabla.next()){
		this.getFacultades().add(new Facultad(tabla));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//fin rellenar Sacultades.

	//inicio rellenar Salas:
	tabla = Conexion.ejecutarSQL("Select * from sala");
	try {
	    while(tabla.next()){
		this.getSalas().add(new Sala(tabla));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//fin rellenar Salas.

	//inicio rellenar Secciones:
	tabla = Conexion.ejecutarSQL("Select * from seccion");
	try {
	    while(tabla.next()){
		this.getSecciones().add(new Seccion(tabla));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//fin rellenar Secciones.
	
	System.out.println("Numero de asignaturas agregadas: "+getAsignaturas().size());
	System.out.println("Numero de bloques agregados: "+getBloques().size());
	System.out.println("Numero de carreras agregadas: "+getCarreras().size());
	System.out.println("Numero de departamentos agregados: "+getDepartamentos().size());
	System.out.println("Numero de docentes agregados: "+getDocentes().size());
	System.out.println("Numero de edificios agregados: "+getEdificios().size());
	System.out.println("Numero de facultades agregadas: "+getFacultades().size());
	System.out.println("Numero de salas agregadas: "+getSalas().size());
	System.out.println("Numero de secciones agregadas: "+getSecciones().size());
	

    }


    /**
     * @return the asignaturas
     */
    public ArrayList<Asignatura> getAsignaturas() {
	return asignaturas;
    }



    /**
     * @return the bloques
     */
    public ArrayList<Bloque> getBloques() {
	return bloques;
    }



    /**
     * @return the carreras
     */
    public ArrayList<Carrera> getCarreras() {
	return carreras;
    }



    /**
     * @return the departamentos
     */
    public ArrayList<Departamento> getDepartamentos() {
	return departamentos;
    }



    /**
     * @return the docentes
     */
    public ArrayList<Docente> getDocentes() {
	return docentes;
    }



    /**
     * @return the edificios
     */
    public ArrayList<Edificio> getEdificios() {
	return edificios;
    }



    /**
     * @return the facultades
     */
    public ArrayList<Facultad> getFacultades() {
	return facultades;
    }



    /**
     * @return the salas
     */
    public ArrayList<Sala> getSalas() {
	return salas;
    }



    /**
     * @return the secciones
     */
    public ArrayList<Seccion> getSecciones() {
	return secciones;
    }





    public static void main(String[] args) throws Exception {

	UIManager.setLookAndFeel(new SyntheticaBlueSteelLookAndFeel()); // cambia el estilo
	//Conexion conn = new Conexion();
	VentanaPrincipal vp = new VentanaPrincipal();
	vp.setVisible(true);
    }

}