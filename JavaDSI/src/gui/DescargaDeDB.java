package gui;

import javax.swing.JPanel;
import java.awt.Color;

import javax.swing.ImageIcon;
import javax.swing.JLabel;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.Rectangle;

import javax.swing.JProgressBar;

import db.Asignatura;
import db.Bloque;
import db.Carrera;
import db.Conexion;
import db.Departamento;
import db.Dia;
import db.Docente;
import db.Edificio;
import db.Facultad;
import db.Sala;
import db.Seccion;
import db.TiempoInicio;
import db.TipoSala;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.awt.SystemColor;

public class DescargaDeDB extends JPanel {

    /**
     * 
     */
    private static final long serialVersionUID = 1L;

	private JProgressBar departamentosBar = new JProgressBar();
	private JProgressBar docentesBar = new JProgressBar();
	private JProgressBar edificiosBar = new JProgressBar();
	private JProgressBar salaBar = new JProgressBar();
	private JProgressBar carrerasBar = new JProgressBar();
	private JProgressBar seccionesBar = new JProgressBar();
	private JProgressBar bloquesBar = new JProgressBar();
	private JProgressBar asignaturasBar = new JProgressBar();
	private JProgressBar facultadesBar = new JProgressBar();
	private VentanaPrincipal ventana;

    /**
     * Create the panel.
     */
    public DescargaDeDB(VentanaPrincipal ventana) {
    	setBackground(SystemColor.inactiveCaption);
	this.ventana = ventana;
	setLayout(null);
	departamentosBar.setDoubleBuffered(true);
	docentesBar.setDoubleBuffered(true);
	edificiosBar.setDoubleBuffered(true);
	salaBar.setDoubleBuffered(true);
	carrerasBar.setDoubleBuffered(true);
	seccionesBar.setDoubleBuffered(true);
	bloquesBar.setDoubleBuffered(true);
	asignaturasBar.setDoubleBuffered(true);
	facultadesBar.setDoubleBuffered(true);

	JPanel panel = new JPanel(){

	    private static final long serialVersionUID = 1L;

	    @Override
	    public void paintComponent(Graphics g) {
		Image imagen = new ImageIcon(this.getClass().getResource("/fondo.png")).getImage();
		super.paintComponent(g);
		int i = imagen.getWidth(this);
		int j = imagen.getHeight(this);
		if (i > 0 && j > 0) {
		    for (int x = 0; x < getWidth(); x += i) {
			for (int y = 0; y < getHeight(); y += j) {
			    g.drawImage(imagen, x, y, i, j, this);
			}
		    }
		}
	    }
	};
	panel.setBounds(87, 18, 1060, 574);
	panel.setBackground(new Color(0, 100, 172));
	panel.setDoubleBuffered(true);
	add(panel);
	panel.setLayout(null);

	JLabel lblNewLabel = new JLabel("Descarga desde base de datos");
	lblNewLabel.setForeground(Color.WHITE);
	lblNewLabel.setFont(new Font("Times New Roman", Font.PLAIN, 30));
	lblNewLabel.setBounds(346, 8, 389, 37);
	panel.add(lblNewLabel);

	JPanel panel_1 = new JPanel();
	panel_1.setDoubleBuffered(true);
	panel_1.setBackground(new Color(255, 255, 255));
	panel_1.setBounds(42, 383, 996, 47);
	panel.add(panel_1);
	panel_1.setLayout(null);

	JLabel lblDocentes = new JLabel("Facultades");
	lblDocentes.setBounds(10, 11, 146, 23);
	lblDocentes.setForeground(Color.BLACK);
	lblDocentes.setFont(new Font("Tahoma", Font.PLAIN, 19));
	panel_1.add(lblDocentes);

	
	facultadesBar.setForeground(new Color(0, 102, 204));
	facultadesBar.setStringPainted(true);
	facultadesBar.setBounds(166, 11, 820, 23);
	panel_1.add(facultadesBar);

	JPanel panel_2 = new JPanel();
	panel_2.setLayout(null);
	panel_2.setBackground(new Color(255, 255, 255));
	panel_2.setBounds(42, 218, 996, 47);
	panel_2.setDoubleBuffered(true);
	panel.add(panel_2);

	JLabel lblDepartamentos = new JLabel("Departamentos");
	lblDepartamentos.setForeground(Color.BLACK);
	lblDepartamentos.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblDepartamentos.setBounds(10, 11, 146, 23);
	
	panel_2.add(lblDepartamentos);

	
	departamentosBar.setForeground(new Color(0, 102, 204));
	departamentosBar.setStringPainted(true);
	departamentosBar.setBounds(166, 11, 820, 23);
	panel_2.add(departamentosBar);

	JPanel panel_3 = new JPanel();
	panel_3.setLayout(null);
	panel_3.setBackground(new Color(255, 255, 255));
	panel_3.setBounds(42, 273, 996, 47);
	panel_3.setDoubleBuffered(true);
	panel_3.setDoubleBuffered(true);
	panel.add(panel_3);

	JLabel lblDocentes_1 = new JLabel("Docentes");
	lblDocentes_1.setForeground(Color.BLACK);
	lblDocentes_1.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblDocentes_1.setBounds(10, 11, 146, 23);
	panel_3.add(lblDocentes_1);

	
	docentesBar.setForeground(new Color(0, 102, 204));
	docentesBar.setStringPainted(true);
	docentesBar.setBounds(166, 11, 820, 23);
	panel_3.add(docentesBar);

	JPanel panel_4 = new JPanel();
	panel_4.setLayout(null);
	panel_4.setBackground(new Color(255, 255, 255));
	panel_4.setBounds(42, 328, 996, 47);
	panel_4.setDoubleBuffered(true);
	panel.add(panel_4);

	JLabel lblEdificios = new JLabel("Edificios");
	lblEdificios.setForeground(Color.BLACK);
	lblEdificios.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblEdificios.setBounds(10, 11, 146, 23);
	panel_4.add(lblEdificios);

	
	edificiosBar.setForeground(new Color(0, 102, 204));
	edificiosBar.setStringPainted(true);
	edificiosBar.setBounds(166, 11, 820, 23);
	panel_4.add(edificiosBar);

	JPanel panel_5 = new JPanel();
	panel_5.setLayout(null);
	panel_5.setBackground(new Color(255, 255, 255));
	panel_5.setBounds(42, 438, 996, 47);
	panel_5.setDoubleBuffered(true);
	panel.add(panel_5);

	JLabel lblSalas = new JLabel("Salas");
	lblSalas.setForeground(Color.BLACK);
	lblSalas.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblSalas.setBounds(10, 11, 146, 23);
	panel_5.add(lblSalas);
	salaBar.setForeground(new Color(0, 102, 204));
	salaBar.setStringPainted(true);
	salaBar.setBounds(166, 11, 820, 23);
	panel_5.add(salaBar);

	JPanel panel_6 = new JPanel();
	panel_6.setLayout(null);
	panel_6.setBackground(new Color(255, 255, 255));
	panel_6.setBounds(42, 163, 996, 47);
	panel_6.setDoubleBuffered(true);
	panel.add(panel_6);

	JLabel lblCarreras = new JLabel("Carreras");
	lblCarreras.setForeground(Color.BLACK);
	lblCarreras.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblCarreras.setBounds(10, 11, 146, 23);
	panel_6.add(lblCarreras);

	
	carrerasBar.setForeground(new Color(0, 102, 204));
	carrerasBar.setStringPainted(true);
	carrerasBar.setBounds(166, 11, 820, 23);
	panel_6.add(carrerasBar);

	JPanel panel_7 = new JPanel();
	panel_7.setLayout(null);
	panel_7.setBackground(new Color(255, 255, 255));
	panel_7.setBounds(42, 493, 996, 47);
	panel_7.setDoubleBuffered(true);
	panel.add(panel_7);

	JLabel lblSecciones = new JLabel("Secciones");
	lblSecciones.setForeground(Color.BLACK);
	lblSecciones.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblSecciones.setBounds(10, 11, 146, 23);
	panel_7.add(lblSecciones);

	
	seccionesBar.setForeground(new Color(0, 102, 204));
	seccionesBar.setStringPainted(true);
	seccionesBar.setBounds(166, 11, 820, 23);
	panel_7.add(seccionesBar);

	JPanel panel_8 = new JPanel();
	panel_8.setLayout(null);
	panel_8.setBackground(new Color(255, 255, 255));
	panel_8.setBounds(42, 108, 996, 47);
	panel_8.setDoubleBuffered(true);
	panel.add(panel_8);

	JLabel lblBloques = new JLabel("Bloques");
	lblBloques.setForeground(Color.BLACK);
	lblBloques.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblBloques.setBounds(10, 11, 146, 23);
	panel_8.add(lblBloques);
	bloquesBar.setForeground(new Color(0, 102, 204));
	bloquesBar.setStringPainted(true);
	bloquesBar.setBounds(166, 11, 820, 23);
	panel_8.add(bloquesBar);

	JPanel panel_9 = new JPanel();
	panel_9.setLayout(null);
	panel_9.setBackground(new Color(255, 255, 255));
	panel_9.setBounds(42, 56, 996, 47);
	panel_9.setDoubleBuffered(true);
	panel.add(panel_9);

	JLabel lblAsignaturas = new JLabel("Asignaturas");
	lblAsignaturas.setForeground(Color.BLACK);
	lblAsignaturas.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblAsignaturas.setBounds(10, 11, 146, 23);
	panel_9.add(lblAsignaturas);
	asignaturasBar.setStringPainted(true);
	asignaturasBar.setForeground(new Color(0, 102, 204));
	asignaturasBar.setBounds(166, 11, 820, 23);
	panel_9.add(asignaturasBar);

    }

    
    
	/**
     * @return the facultadesBar
     */
    public JProgressBar getFacultadesBar() {
        return facultadesBar;
    }

    /**
     * @param facultadesBar the facultadesBar to set
     */
    public void setFacultadesBar(JProgressBar facultadesBar) {
        this.facultadesBar = facultadesBar;
    }

    /**
     * @return the departamentosBar
     */
    public JProgressBar getDepartamentosBar() {
        return departamentosBar;
    }

    /**
     * @param departamentosBar the departamentosBar to set
     */
    public void setDepartamentosBar(JProgressBar departamentosBar) {
        this.departamentosBar = departamentosBar;
    }

    /**
     * @return the docentesBar
     */
    public JProgressBar getDocentesBar() {
        return docentesBar;
    }

    /**
     * @param docentesBar the docentesBar to set
     */
    public void setDocentesBar(JProgressBar docentesBar) {
        this.docentesBar = docentesBar;
    }

    /**
     * @return the edificiosBar
     */
    public JProgressBar getEdificiosBar() {
        return edificiosBar;
    }

    /**
     * @param edificiosBar the edificiosBar to set
     */
    public void setEdificiosBar(JProgressBar edificiosBar) {
        this.edificiosBar = edificiosBar;
    }

    /**
     * @return the salaBar
     */
    public JProgressBar getSalaBar() {
        return salaBar;
    }

    /**
     * @param salaBar the salaBar to set
     */
    public void setSalaBar(JProgressBar salaBar) {
        this.salaBar = salaBar;
    }

    /**
     * @return the carrerasBar
     */
    public JProgressBar getCarrerasBar() {
        return carrerasBar;
    }

    /**
     * @param carrerasBar the carrerasBar to set
     */
    public void setCarrerasBar(JProgressBar carrerasBar) {
        this.carrerasBar = carrerasBar;
    }

    /**
     * @return the seccionesBar
     */
    public JProgressBar getSeccionesBar() {
        return seccionesBar;
    }

    /**
     * @param seccionesBar the seccionesBar to set
     */
    public void setSeccionesBar(JProgressBar seccionesBar) {
        this.seccionesBar = seccionesBar;
    }

    /**
     * @return the bloquesBar
     */
    public JProgressBar getBloquesBar() {
        return bloquesBar;
    }

    /**
     * @param bloquesBar the bloquesBar to set
     */
    public void setBloquesBar(JProgressBar bloquesBar) {
        this.bloquesBar = bloquesBar;
    }

    /**
     * @return the asignaturasBar
     */
    public JProgressBar getAsignaturasBar() {
        return asignaturasBar;
    }

    /**
     * @param asignaturasBar the asignaturasBar to set
     */
    public void setAsignaturasBar(JProgressBar asignaturasBar) {
        this.asignaturasBar = asignaturasBar;
    }

    /**
     * @return the serialversionuid
     */
    public static long getSerialversionuid() {
        return serialVersionUID;
    }
    
    public void rellenarListas(){
	getVentana().getAsignaturas().clear();
	getVentana().getBloques().clear();
	getVentana().getCarreras().clear();
	getVentana().getDepartamentos().clear();
	getVentana().getDias().clear();
	getVentana().getDocentes().clear();
	getVentana().getEdificios().clear();
	getVentana().getFacultades().clear();
	getVentana().getSalas().clear();
	getVentana().getSecciones().clear();
	getVentana().getTiempoInicios().clear();
	getVentana().getTiposSala().clear();
	Integer totalElementos, actual;
	ResultSet total;
	ResultSet tabla = Conexion.ejecutarSQL("Select * from asignatura");
	try {
	    total = Conexion.ejecutarSQL("Select count(*) as total from asignatura");
	    total.next();
	    totalElementos = total.getInt(1);
	    actual = 0;
	    while(tabla.next()){
		getVentana().getAsignaturas().add(new Asignatura(tabla));
		this.getAsignaturasBar().setValue( ((++actual)*100/totalElementos));
		this.getAsignaturasBar().paintImmediately(new Rectangle(0, 0, this.getAsignaturasBar().getWidth(), this.getAsignaturasBar().getHeight())); 
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//fin rellenar asignaturas.

	//inicio rellenar Bloques:

	tabla = Conexion.ejecutarSQL("Select * from bloque");
	try {
	    total = Conexion.ejecutarSQL("Select count(*) as total from bloque");
	    total.next();
	    totalElementos = total.getInt(1);
	    actual = 0;
	    while(tabla.next()){
		getVentana().getBloques().add(new Bloque(tabla));
		this.getBloquesBar().setValue( ((++actual)*100/totalElementos));
		this.getBloquesBar().paintImmediately(new Rectangle(0, 0, this.getBloquesBar().getWidth(), this.getBloquesBar().getHeight())); //por mejorar pintado así no va...
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();

	}
	//fin rellenar Bloques.

	//inicio rellenar Carreras:

	tabla = Conexion.ejecutarSQL("Select * from carrera");
	try {
	    total = Conexion.ejecutarSQL("Select count(*) as total from carrera");
	    total.next();
	    totalElementos = total.getInt(1);
	    actual = 0;
	    while(tabla.next()){
		getVentana().getCarreras().add(new Carrera(tabla));
		this.getCarrerasBar().setValue( ((++actual)*100/totalElementos));
		this.getCarrerasBar().paintImmediately(new Rectangle(0, 0, this.getCarrerasBar().getWidth(), this.getCarrerasBar().getHeight())); 
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();

	}
	//fin rellenar Carrera.

	//inicio rellenar Departamentos:

	tabla = Conexion.ejecutarSQL("Select * from departamento");
	try {
	    total = Conexion.ejecutarSQL("Select count(*) as total from departamento");
	    total.next();
	    totalElementos = total.getInt(1);
	    actual = 0;
	    while(tabla.next()){
		getVentana().getDepartamentos().add(new Departamento(tabla));
		this.getDepartamentosBar().setValue( ((++actual)*100/totalElementos));
		this.getDepartamentosBar().paintImmediately(new Rectangle(0, 0, this.getDepartamentosBar().getWidth(), this.getDepartamentosBar().getHeight())); 
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();

	}
	//fin rellenar Departamento.

	//inicio rellenar Docentes:

	tabla = Conexion.ejecutarSQL("Select * from docente");
	try {
	    total = Conexion.ejecutarSQL("Select count(*) as total from docente");
	    total.next();
	    totalElementos = total.getInt(1);
	    actual = 0;
	    while(tabla.next()){
		getVentana().getDocentes().add(new Docente(tabla));
		this.getDocentesBar().setValue( ((++actual)*100/totalElementos));
		this.getDocentesBar().paintImmediately(new Rectangle(0, 0, this.getDocentesBar().getWidth(), this.getDocentesBar().getHeight()));
	    }
	} catch (SQLException e) { 
	    // TODO Auto-generated catch block
	    e.printStackTrace();

	}
	//fin rellenar Docentes.

	//inicio rellenar Edificios:

	tabla = Conexion.ejecutarSQL("Select * from edificio");
	try {
	    total = Conexion.ejecutarSQL("Select count(*) as total from edificio");
	    total.next();
	    totalElementos = total.getInt(1);
	    actual = 0;
	    while(tabla.next()){
		getVentana().getEdificios().add(new Edificio(tabla));
		this.getEdificiosBar().setValue( ((++actual)*100/totalElementos));
		this.getEdificiosBar().paintImmediately(new Rectangle(0, 0, this.getEdificiosBar().getWidth(), this.getEdificiosBar().getHeight()));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();

	}
	//fin rellenar Edificios.

	//inicio rellenar Facultades:

	tabla = Conexion.ejecutarSQL("Select * from facultad");
	try {
	    total = Conexion.ejecutarSQL("Select count(*) as total from facultad");
	    total.next();
	    totalElementos = total.getInt(1);
	    actual = 0;
	    while(tabla.next()){
		getVentana().getFacultades().add(new Facultad(tabla));
		this.getFacultadesBar().setValue( ((++actual)*100/totalElementos));
		this.getFacultadesBar().paintImmediately(new Rectangle(0, 0, this.getFacultadesBar().getWidth(), this.getFacultadesBar().getHeight()));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();

	}
	//fin rellenar Facultades.

	//inicio rellenar Salas:

	tabla = Conexion.ejecutarSQL("Select * from sala");
	try {
	    total = Conexion.ejecutarSQL("Select count(*) as total from sala");
	    total.next();
	    totalElementos = total.getInt(1);
	    actual = 0;
	    while(tabla.next()){
		getVentana().getSalas().add(new Sala(tabla));
		this.getSalaBar().setValue( ((++actual)*100/totalElementos));
		this.getSalaBar().paintImmediately(new Rectangle(0, 0, this.getSalaBar().getWidth(), this.getSalaBar().getHeight()));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();

	}
	//fin rellenar Salas.

	//inicio rellenar Secciones:

	tabla = Conexion.ejecutarSQL("Select * from seccion");
	try {
	    total = Conexion.ejecutarSQL("Select count(*) as total from seccion");
	    total.next();
	    totalElementos = total.getInt(1);
	    actual = 0;
	    while(tabla.next()){
		getVentana().getSecciones().add(new Seccion(tabla));
		this.getSeccionesBar().setValue( ((++actual)*100/totalElementos));
		this.getSeccionesBar().paintImmediately(new Rectangle(0, 0, this.getSeccionesBar().getWidth(), this.getSeccionesBar().getHeight()));
	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();

	}
	//fin rellenar Secciones.
	
	//inicio rellenar tiempo_inicio:

		tabla = Conexion.ejecutarSQL("Select * from tiempo_inicio");
		try {
		    total = Conexion.ejecutarSQL("Select count(*) as total from tiempo_inicio");
		    total.next();
		    totalElementos = total.getInt(1);
		    actual = 0;
		    while(tabla.next()){
			getVentana().getTiempoInicios().add(new TiempoInicio(tabla));
		    }
		} catch (SQLException e) {
		    // TODO Auto-generated catch block
		    e.printStackTrace();

		}
	//fin rellenar tiempo_inicio.
		
		//inicio rellenar dias:

		tabla = Conexion.ejecutarSQL("Select * from dia");
		try {
		    total = Conexion.ejecutarSQL("Select count(*) as total from dia");
		    total.next();
		    totalElementos = total.getInt(1);
		    actual = 0;
		    while(tabla.next()){
			getVentana().getDias().add(new Dia(tabla));
		    }
		} catch (SQLException e) {
		    // TODO Auto-generated catch block
		    e.printStackTrace();

		}
	//fin rellenar dias.
	//inicio rellenar tipoSala:

		tabla = Conexion.ejecutarSQL("Select * from tipo_sala");
		try {
		    total = Conexion.ejecutarSQL("Select count(*) as total from tipo_sala");
		    total.next();
		    totalElementos = total.getInt(1);
		    actual = 0;
		    while(tabla.next()){
			getVentana().getTiposSala().add(new TipoSala(tabla));
		    }
		} catch (SQLException e) {
		    // TODO Auto-generated catch block
		    e.printStackTrace();

		}
	//fin rellenar dias.
	//*
	System.out.println("Numero de asignaturas agregadas: "+getVentana().getAsignaturas().size());
	System.out.println("Numero de bloques agregados: "+getVentana().getBloques().size());
	System.out.println("Numero de carreras agregadas: "+getVentana().getCarreras().size());
	System.out.println("Numero de departamentos agregados: "+getVentana().getDepartamentos().size());
	System.out.println("Numero de docentes agregados: "+getVentana().getDocentes().size());
	System.out.println("Numero de edificios agregados: "+getVentana().getEdificios().size());
	System.out.println("Numero de facultades agregadas: "+getVentana().getFacultades().size());
	System.out.println("Numero de salas agregadas: "+getVentana().getSalas().size());
	System.out.println("Numero de secciones agregadas: "+getVentana().getSecciones().size());
	//*/
	try {
	    Thread.sleep(1000);
	} catch (InterruptedException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	//ventana.getGestorPaneles().mostrarPanel("planificar");
    }
    
    public VentanaPrincipal getVentana() {
	return ventana;
    }
}
