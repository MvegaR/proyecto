package gui;

import javax.swing.JPanel;
import javax.swing.JButton;
import java.awt.BorderLayout;
import java.awt.GridBagLayout;
import java.awt.GridBagConstraints;
import java.awt.Insets;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

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
    
    public MenuInicial() {
    	setLayout(new BorderLayout(0, 0));
    	
    	JPanel panel = new JPanel();
    	add(panel, BorderLayout.CENTER);
    	GridBagLayout gbl_panel = new GridBagLayout();
    	gbl_panel.columnWidths = new int[]{0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0};
    	gbl_panel.rowHeights = new int[]{0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0};
    	gbl_panel.columnWeights = new double[]{0.0, 0.0, 1.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, Double.MIN_VALUE};
    	gbl_panel.rowWeights = new double[]{0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, 0.0, Double.MIN_VALUE};
    	panel.setLayout(gbl_panel);
    	
    	JLabel lblOpcionesDisponibles = new JLabel("OPCIONES    DISPONIBLES");
    	lblOpcionesDisponibles.setFont(new Font("Papyrus", Font.BOLD | Font.ITALIC, 16));
    	GridBagConstraints gbc_lblOpcionesDisponibles = new GridBagConstraints();
    	gbc_lblOpcionesDisponibles.gridwidth = 11;
    	gbc_lblOpcionesDisponibles.insets = new Insets(0, 0, 5, 5);
    	gbc_lblOpcionesDisponibles.gridx = 1;
    	gbc_lblOpcionesDisponibles.gridy = 3;
    	panel.add(lblOpcionesDisponibles, gbc_lblOpcionesDisponibles);
    	
    	JLabel lblParaPoderAcceder = new JLabel("Para poder acceder a las opciones...");
    	GridBagConstraints gbc_lblParaPoderAcceder = new GridBagConstraints();
    	gbc_lblParaPoderAcceder.gridwidth = 5;
    	gbc_lblParaPoderAcceder.insets = new Insets(0, 0, 5, 5);
    	gbc_lblParaPoderAcceder.gridx = 2;
    	gbc_lblParaPoderAcceder.gridy = 5;
    	panel.add(lblParaPoderAcceder, gbc_lblParaPoderAcceder);
    	
    	btnAdministrar.setFont(new Font("Tahoma", Font.PLAIN, 14));
    	GridBagConstraints gbc_btnAdministrar = new GridBagConstraints();
    	gbc_btnAdministrar.gridwidth = 6;
    	gbc_btnAdministrar.insets = new Insets(0, 0, 5, 0);
    	gbc_btnAdministrar.gridx = 7;
    	gbc_btnAdministrar.gridy = 5;
    	panel.add(btnAdministrar, gbc_btnAdministrar);
    	
    	JLabel lblNewLabel = new JLabel("Realizar la distribuci\u00F3n de los horarios...");
    	GridBagConstraints gbc_lblNewLabel = new GridBagConstraints();
    	gbc_lblNewLabel.gridwidth = 6;
    	gbc_lblNewLabel.insets = new Insets(0, 0, 5, 5);
    	gbc_lblNewLabel.gridx = 2;
    	gbc_lblNewLabel.gridy = 8;
    	panel.add(lblNewLabel, gbc_lblNewLabel);
    	
    	JButton btnPlanificar = new JButton("Planificar");
    	btnPlanificar.setFont(new Font("Tahoma", Font.PLAIN, 14));
    	GridBagConstraints gbc_btnPlanificar = new GridBagConstraints();
    	gbc_btnPlanificar.gridwidth = 3;
    	gbc_btnPlanificar.insets = new Insets(0, 0, 5, 5);
    	gbc_btnPlanificar.gridx = 9;
    	gbc_btnPlanificar.gridy = 8;
    	panel.add(btnPlanificar, gbc_btnPlanificar);
    	
    	JButton btnCerrar = new JButton("Cerrar");
    	btnCerrar.addActionListener(new ActionListener() {
    		public void actionPerformed(ActionEvent arg0) {
    			System.exit(0);
    		}
    	});
    	GridBagConstraints gbc_btnCerrar = new GridBagConstraints();
    	gbc_btnCerrar.insets = new Insets(0, 0, 5, 5);
    	gbc_btnCerrar.gridx = 11;
    	gbc_btnCerrar.gridy = 10;
    	panel.add(btnCerrar, gbc_btnCerrar);

    }
    
    public JButton getBtnAdministrar(){
    	return this.btnAdministrar;
    }

}
