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
    private static final long serialVersionUID = 1L;
    private MenuAdmin menuAdmin;
    private MenuInicial menuInicial;
    private PanelPlanificar panelPlanificar;
    private Autentificacion panelAutentificacion;
    private CardLayout layout;
    private PanelSalasYDias salas;
    private DescargaDeDB descargaDB;
    VentanaPrincipal ventana;
    
    public GestionPaneles(VentanaPrincipal ventana) {
	//coni = new CheckResolucion();
	this.ventana = ventana;
	menuAdmin = new MenuAdmin(ventana);
	menuInicial = new MenuInicial();
	panelAutentificacion = new Autentificacion();
	layout = new CardLayout();
	//panelPlanificar = new PanelPlanificar(ventana);
	salas = new PanelSalasYDias(ventana);
	descargaDB = new DescargaDeDB(ventana);
	this.setLayout(layout);
	this.add(panelAutentificacion,"auntentificacion");
	this.add(menuInicial,"menuInicial");
	this.add(menuAdmin,"menuAdmin");
	//this.add(panelPlanificar,"planificar");
	this.add(salas, "salas");
	this.add(descargaDB, "descargaDB");
	layout.show(this, "auntentificacion");

	
	panelAutentificacion.getBtnEntrar().addMouseListener(new MouseAdapter() {
	    @Override
	    public void mousePressed(MouseEvent e) {
		boolean acceso = Autentificacion_Usuario();
		if (acceso){
		    ventana.getPaneles().add(menuInicial);
		    mostrarPanel("menuInicial");
		}else{
		    MensajesError.meEr_FallaAutentificacion();
		}
	    }
	});

	menuInicial.getBtnAdministrar().addMouseListener(new MouseAdapter() {
	    @Override
	    public void mousePressed(MouseEvent e) {
		ventana.getPaneles().add(menuAdmin);
		mostrarPanel("menuAdmin");
	    }
	});
	
	menuInicial.getBtnPlanificar().addMouseListener(new MouseAdapter() {
	    @Override
	    public void mousePressed(MouseEvent e) {

		if(getDescargaDB()!= null && ventana.getPaneles().contains(getDescargaDB())){

		    ventana.getPaneles().remove(getDescargaDB());
		    ventana.getGestorPaneles().remove(getDescargaDB());
		}
		setDescargaDB(new DescargaDeDB(ventana));
		ventana.getPaneles().add(getDescargaDB());
		add(getDescargaDB(), "descargaDB");
		mostrarPanel("descargaDB");
		getDescargaDB().rellenarListas();

		if(getPanelPlanificar() != null && ventana.getPaneles().contains(getPanelPlanificar())){
		    ventana.getPaneles().remove(getPanelPlanificar());
		    remove(getPanelPlanificar());
		}
		setPanelPlanificar(new PanelPlanificar(ventana));
		ventana.getPaneles().add(getPanelPlanificar());
		add(getPanelPlanificar(), "planificar");
		mostrarPanel("planificar");
		

	    }

	});

    }
    
    public DescargaDeDB getDescargaDB() {
	return descargaDB;
    }
    
    public void setDescargaDB(DescargaDeDB descargaDB) {
	this.descargaDB = descargaDB;
    }
    
    public PanelPlanificar getPanelPlanificar() {
	return panelPlanificar;
    }
    public void setPanelPlanificar(PanelPlanificar panelPlanificar) {
	this.panelPlanificar = panelPlanificar;
    }
    

    public void mostrarPanel(String nombrePanel){
	if("menuInicial".equals(nombrePanel)){ventana.getPaneles().add(menuInicial);}
	layout.show(this,nombrePanel);
	ventana.paintComponents(ventana.getGraphics());
    }

    public boolean Autentificacion_Usuario(){
	String nombreUsuario = panelAutentificacion.getTexto_user();
	String passwordUsuario = panelAutentificacion.getPassword_texto();
	ResultSet resUser= Conexion.ejecutarSQL("Select d.USER From docente d, rol r Where d.ID_Rol = R.ID_ROl and r.id_rol=1");
	String Usuario = null;
	if(nombreUsuario.contains(" ")==true || nombreUsuario.contains("(")|| nombreUsuario.contains(")")
		|| nombreUsuario.contains(".") || nombreUsuario.contains(",")|| nombreUsuario.contains("\'")
		|| nombreUsuario.contains("\"")){
	    return false;
	} 
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