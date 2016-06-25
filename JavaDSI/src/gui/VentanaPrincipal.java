package gui;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
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
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;

public class VentanaPrincipal extends JFrame {

    private static final long serialVersionUID = 1L;


    private GestionPaneles gestorPaneles;
    private PanelCabecera cabecera;
    private JPanel seccionOpciones;
    private JButton btnVolver;
    private JButton btnSalir;
    //private MensajesError error;
    private ArrayList<JPanel> paneles = new ArrayList<>();  
    
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
     * @return the btnVolver
     */
    public JButton getBtnVolver() {
        return btnVolver;
    }

    /**
     * @param btnVolver the btnVolver to set
     */
    public void setBtnVolver(JButton btnVolver) {
        this.btnVolver = btnVolver;
    }

    /**
     * @return the btnSalir
     */
    public JButton getBtnSalir() {
        return btnSalir;
    }

    /**
     * @param btnSalir the btnSalir to set
     */
    public void setBtnSalir(JButton btnSalir) {
        this.btnSalir = btnSalir;
    }

    /**
     * @return the paneles
     */
    public ArrayList<JPanel> getPaneles() {
        return paneles;
    }

    /**
     * @param paneles the paneles to set
     */
    public void setPaneles(ArrayList<JPanel> paneles) {
        this.paneles = paneles;
    }
    public GestionPaneles getGestorPaneles() {
	return gestorPaneles;
    }

    public VentanaPrincipal() {
	gestorPaneles = new GestionPaneles(this);
	this.setResizable(false);
	this.setUndecorated(true);
	cabecera = new PanelCabecera();
	seccionOpciones = new JPanel();
	btnVolver = new JButton("Volver");
	btnVolver.setVisible(false);
	btnSalir = new JButton("Salir");
	btnSalir.setBounds(746, 385, 129, 43);
	btnVolver.addActionListener(new ActionListener() {
	    public void actionPerformed(ActionEvent arg0) {
		String[] opciones = {"Si", "No" };
		int opcion = JOptionPane.showOptionDialog(null,"¿Seguro que desea volver?"
			,"Informacion",JOptionPane.DEFAULT_OPTION,JOptionPane.INFORMATION_MESSAGE
			,null,opciones,null);
		if(opciones[opcion].equals("Si")){
		    if(!paneles.isEmpty()){
			paneles.get(paneles.size()-1).setVisible(false);
			paneles.remove(paneles.size()-1);
			paneles.get(paneles.size()-1).setVisible(true);
			if(paneles.size()==1) btnVolver.setVisible(false); // Cuando llega al panel principal
		    }
		}
	    }
	});
	btnSalir.addActionListener(new ActionListener() {
	    public void actionPerformed(ActionEvent arg0) {
		String[] opciones = {"Si", "No" };
		int opcion = JOptionPane.showOptionDialog(null,"¿Seguro que desea cerrar la aplicación?"
			,"Informacion",JOptionPane.DEFAULT_OPTION,JOptionPane.INFORMATION_MESSAGE
			,null,opciones,null);
		if(opciones[opcion].equals("Si")) System.exit(0);
	    }
	});
	seccionOpciones.add(btnVolver);
	seccionOpciones.add(btnSalir);

	this.add(cabecera,BorderLayout.NORTH);
	this.add(gestorPaneles,BorderLayout.CENTER);
	this.add(seccionOpciones,BorderLayout.SOUTH);
	this.setSize(1280, 720);
	this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	this.setLocationRelativeTo(null);

	this.checkResolucion();
	
	
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


    private void checkResolucion(){

	if(Toolkit.getDefaultToolkit().getScreenSize().getWidth() < 1280 || Toolkit.getDefaultToolkit().getScreenSize().getHeight()< 720 ){
	    JOptionPane.showMessageDialog(this, "La resolución de pantalla no es lo suficientemente grande para la interfaz de la aplicación,"
		    + "\npuede tener problemas al visualizar elementos","Fuera de resolución", JOptionPane.ERROR_MESSAGE);
	}
    }


    public static void main(String[] args) throws Exception {
	UIManager.setLookAndFeel(new SyntheticaBlueSteelLookAndFeel()); // cambia el estilo
	if(Conexion.PruebaConexion()){ // realiza prueba de conexion
	    VentanaPrincipal vp = new VentanaPrincipal();
	    vp.setVisible(true);
	}
    }

}