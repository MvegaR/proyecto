package gui;

import javax.swing.JFrame;
import javax.swing.UIManager;

import de.javasoft.plaf.synthetica.SyntheticaBlackEyeLookAndFeel;
import java.awt.BorderLayout;

public class VentanaPrincipal extends JFrame {

	/**
     * 
     */
    private static final long serialVersionUID = 1L;

	public static void main(String[] args) throws Exception {
		
		UIManager.setLookAndFeel(new SyntheticaBlackEyeLookAndFeel()); // cambia el estilo
		VentanaPrincipal vp = new VentanaPrincipal();
		vp.setVisible(true);

	}
	
    private PanelEnBlancoRaul panelRaul;
    
	private PanelCabecera cabecera;
	
	public VentanaPrincipal() {
		panelRaul = new PanelEnBlancoRaul();
		cabecera = new PanelCabecera();
		
		this.add(cabecera,BorderLayout.NORTH);
		this.add(panelRaul,BorderLayout.CENTER);
        this.setSize(1024, 720);
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setLocationRelativeTo(null);
	}

}