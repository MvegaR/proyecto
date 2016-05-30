package gui;

import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import javax.swing.JPanel;
import java.awt.CardLayout;


public class PanelEnBlancoRaul extends JPanel {

    /**
     * 
     */
    private static final long serialVersionUID = 1L;
    private CheckResolución coni;
    private MenuAdmin marcos;
    private MenuInicial mari;
    private Autentificacion pablo;
    private CardLayout layout;
	
    public PanelEnBlancoRaul() {
    	coni = new CheckResolución();
    	marcos = new MenuAdmin();
    	mari = new MenuInicial();
    	pablo = new Autentificacion();
    	layout = new CardLayout();
    	this.setLayout(layout);
    	this.add(marcos,"marcos");
    	this.add(mari,"mari");
    	this.add(pablo,"pablo");
    	layout.show(this, "pablo");
    	pablo.getBtnEntrar().addMouseListener(new MouseAdapter() {
            @Override
            public void mousePressed(MouseEvent e) {
            	mostrarPanel("mari");
            }
        });
    	mari.getBtnAdministrar().addMouseListener(new MouseAdapter() {
            @Override
            public void mousePressed(MouseEvent e) {
            	mostrarPanel("marcos");
            }
        });
    }
    
    public void mostrarPanel(String nombrePanel){
    	layout.show(this,nombrePanel);
    }
    
}