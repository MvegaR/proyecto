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
import java.util.ArrayList;

public class VentanaPrincipal extends JFrame {

    private static final long serialVersionUID = 1L;

    public static void main(String[] args) throws Exception {

	UIManager.setLookAndFeel(new SyntheticaBlueSteelLookAndFeel()); // cambia el estilo
	Conexion conn = new Conexion();
	VentanaPrincipal vp = new VentanaPrincipal();
	vp.setVisible(true);
    }

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
	
    }

}