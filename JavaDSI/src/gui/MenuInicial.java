package gui;

import javax.swing.JPanel;
import javax.swing.JButton;

import javax.swing.JLabel;
import java.awt.Font;

public class MenuInicial extends JPanel {

    /**
     * 
     */
    private static final long serialVersionUID = 1L;

    /**
     * Create the panel.
     * PANEL DE MARI
     */

    private JButton btnAdministrar = new JButton("Administrar");
    private JButton btnPlanificar = new JButton("Planificar");

    public MenuInicial() {
	setLayout(null);

	JPanel panel = new JPanel();
	panel.setBounds(10, 11, 1190, 454);
	add(panel);
	panel.setLayout(null);

	JLabel lblOpcionesDisponibles = new JLabel("OPCIONES    DISPONIBLES");
	lblOpcionesDisponibles.setBounds(456, 50, 304, 26);
	lblOpcionesDisponibles.setFont(new Font("Times New Roman", Font.BOLD | Font.ITALIC, 24));
	panel.add(lblOpcionesDisponibles);
	btnAdministrar.setBounds(468, 112, 281, 102);

	btnAdministrar.setFont(new Font("Tahoma", Font.PLAIN, 30));
	panel.add(btnAdministrar);
	btnPlanificar.setBounds(468, 250, 281, 102);

	btnPlanificar.setFont(new Font("Tahoma", Font.PLAIN, 30));
	panel.add(btnPlanificar);

    }

    public JButton getBtnAdministrar(){
	return this.btnAdministrar;
    }
    public JButton getBtnPlanificar(){
	return this.btnPlanificar;
    }
  
}
