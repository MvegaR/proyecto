package gui;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.UIManager;

import de.javasoft.plaf.synthetica.SyntheticaBlueSteelLookAndFeel;
import java.awt.BorderLayout;

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