package gui;

import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
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
		//MensajesError.meEr_FallaAutentificacion();
	    VentanaPrincipal.paneles.add(mari);
		mostrarPanel("mari");
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

}