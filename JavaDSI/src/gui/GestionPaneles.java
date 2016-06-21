package gui;
import db.Conexion;
import logica.Sha1;


import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

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

    public GestionPaneles() {
	//coni = new CheckResolucion();
	marcos = new MenuAdmin();
	mari = new MenuInicial();
	pablo = new Autentificacion();
	layout = new CardLayout();
	panelPlanificar = new PanelPlanificar();
	salas = new PanelTreeSalas();
	this.setLayout(layout);
	this.add(marcos,"marcos");
	this.add(mari,"mari");
	this.add(pablo,"pablo");
	this.add(panelPlanificar,"planificar");
	this.add(salas, "salas");
	layout.show(this, "pablo");
	pablo.getBtnEntrar().addMouseListener(new MouseAdapter() {
	    @Override
	    public void mousePressed(MouseEvent e) {
		//prueba parte Marí
	    	boolean acceso = Autentificacion_Usuario();
	    	if (acceso){
	    		 VentanaPrincipal.paneles.add(mari);
	    		 mostrarPanel("mari");
	    	}else{
	    		MensajesError.meEr_FallaAutentificacion();
	    	}
	    }
	});
	mari.getBtnAdministrar().addMouseListener(new MouseAdapter() {
	    @Override
	    public void mousePressed(MouseEvent e) {
	    VentanaPrincipal.paneles.add(marcos);
	    VentanaPrincipal.btnVolver.setVisible(true);
		mostrarPanel("marcos");
	    }
	});
	mari.getBtnPlanificar().addMouseListener(new MouseAdapter() {
	    @Override
	    public void mousePressed(MouseEvent e) {
	    VentanaPrincipal.paneles.add(panelPlanificar);
	    VentanaPrincipal.btnVolver.setVisible(true);
		mostrarPanel("planificar");
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
    
}