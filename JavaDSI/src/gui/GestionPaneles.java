package gui;
import db.Conexion;
import logica.Sha1;


import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.sql.ResultSet;
import java.sql.SQLException;

import javax.swing.JPanel;
import java.awt.CardLayout;


public class GestionPaneles extends JPanel {

    /**
     * Raúl
     */
    private static final long serialVersionUID = 1L;
    // private CheckResolucion coni;
    private MenuAdmin marcos;
    private MenuInicial mari;
    private PanelPlanificar panelPlanificar;
    private Autentificacion pablo;
    private CardLayout layout;
    private PanelTreeSalas salas;
    private DescargaDeDB descargaDB;
    VentanaPrincipal ventana;
    public GestionPaneles(VentanaPrincipal ventana) {
	//coni = new CheckResolucion();
	this.ventana = ventana;
	marcos = new MenuAdmin();
	mari = new MenuInicial();
	pablo = new Autentificacion();
	layout = new CardLayout();
	panelPlanificar = new PanelPlanificar(ventana);
	salas = new PanelTreeSalas();
	descargaDB = new DescargaDeDB(ventana);
	this.setLayout(layout);
	this.add(marcos,"marcos");
	this.add(mari,"mari");
	this.add(pablo,"pablo");
	this.add(panelPlanificar,"planificar");
	this.add(salas, "salas");
	this.add(descargaDB, "descargaDB");
	layout.show(this, "pablo");
	pablo.getBtnEntrar().addMouseListener(new MouseAdapter() {
	    @Override
	    public void mousePressed(MouseEvent e) {
		//prueba parte Marí
		boolean acceso = Autentificacion_Usuario();
		if (acceso){
		    ventana.getPaneles().add(mari);
		    mostrarPanel("mari");
		}else{
		    MensajesError.meEr_FallaAutentificacion();
		}
	    }
	});
	mari.getBtnAdministrar().addMouseListener(new MouseAdapter() {
	    @Override
	    public void mousePressed(MouseEvent e) {
		ventana.getPaneles().add(marcos);
		ventana.getBtnVolver().setVisible(true);
		mostrarPanel("marcos");
	    }
	});
	mari.getBtnPlanificar().addMouseListener(new MouseAdapter() {
	    @Override
	    public void mousePressed(MouseEvent e) {
		ventana.getPaneles().add(panelPlanificar);
		ventana.getBtnVolver().setVisible(true);
		if(ventana.getBloques().isEmpty()){
		    mostrarPanel("descargaDB");
		    ventana.paintComponents(ventana.getGraphics());
		}else{
		    mostrarPanel("planificar");
		}
		
		descargaDB.rellenarListas();
	    }
	});

    }

    public void mostrarPanel(String nombrePanel){
	layout.show(this,nombrePanel);
    }

    public boolean Autentificacion_Usuario(){
	String nombreUsuario = pablo.getTexto_user();
	String passwordUsuario = pablo.getPassword_texto();
	ResultSet resUser= Conexion.ejecutarSQL("Select d.USER From docente d, rol r Where d.ID_Rol = R.ID_ROl and r.id_rol=1");
	String Usuario = null;
	try {
	    while(resUser.next()){
		Usuario = resUser.getString("USER");
	    }
	    if(nombreUsuario.equals(Usuario)){
		ResultSet resPass= Conexion.ejecutarSQL("Select d.PASSWORD From docente d, rol r Where d.ID_Rol = R.ID_ROl and r.id_rol=1");
		String Password = null;
		while(resPass.next()){
		    Password = resPass.getString("PASSWORD");
		}
		if(Sha1.HashTextTest.sha1(passwordUsuario).equals(Password)){
		    return true;
		}else{
		    return false;
		}

	    }
	} catch (SQLException e) {
	    // TODO Auto-generated catch block
	    e.printStackTrace();
	}
	return false;
    }

    public DescargaDeDB getDescargaDB() {
	return descargaDB;
    }
}