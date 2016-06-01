package gui;

import javax.swing.JFrame;
import javax.swing.UIManager;

import de.javasoft.plaf.synthetica.SyntheticaBlueSteelLookAndFeel;
import java.awt.BorderLayout;

public class VentanaPrincipal extends JFrame {

    /**
     * 
     */
    private static final long serialVersionUID = 1L;

    public static void main(String[] args) throws Exception {

	UIManager.setLookAndFeel(new SyntheticaBlueSteelLookAndFeel()); // cambia el estilo
	Conexion conn = new Conexion();
	VentanaPrincipal vp = new VentanaPrincipal();
	vp.setVisible(true);
    }

    private GestionPaneles panelRaul;

    private PanelCabecera cabecera;

    public VentanaPrincipal() {
	this.setResizable(false);
	this.setUndecorated(true); //quita el frame de windows pero la libreria a�ade el suyo y queda muy bien.
	this.setOpacity(1f); //0% de transparencia.


	panelRaul = new GestionPaneles();
	cabecera = new PanelCabecera();

	this.add(cabecera,BorderLayout.NORTH);
	this.add(panelRaul,BorderLayout.CENTER);
	this.setSize(1280, 720);
	this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	this.setLocationRelativeTo(null);
	
    }

}