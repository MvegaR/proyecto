package gui;

import javax.swing.JPanel;

import javax.swing.ImageIcon;
import javax.swing.JButton;

import javax.swing.JLabel;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.SystemColor;
import java.awt.Color;

public class MenuInicial extends JPanel {

    private static final long serialVersionUID = 1L;
    private JButton btnAdministrar = new JButton("Administrar");
    private JButton btnPlanificar = new JButton("Planificar");

    public MenuInicial() {
    	setBackground(SystemColor.inactiveCaption);
	setLayout(null);

	JPanel panel = new JPanel();
	panel.setBackground(SystemColor.inactiveCaption);
	panel.setBounds(0, 0, 1270, 615);
	add(panel);
	panel.setLayout(null);
	
	JPanel panel_1 = new JPanel();
	panel_1.setBackground(SystemColor.activeCaption);
	panel_1.setBounds(10, 11, 1250, 38);
	panel.add(panel_1);
	
		JLabel lblOpcionesDisponibles = new JLabel("OPCIONES    DISPONIBLES");
		lblOpcionesDisponibles.setLocation(499, 5);
		panel_1.add(lblOpcionesDisponibles);
		lblOpcionesDisponibles.setFont(new Font("Times New Roman", Font.BOLD, 24));
		
		JPanel panel_2 = new JPanel(){

		    private static final long serialVersionUID = 1L;

		    @Override
		    public void paintComponent(Graphics g) {
			Image imagen = new ImageIcon(this.getClass().getResource("/fondo.png")).getImage();
			super.paintComponent(g);
			int i = imagen.getWidth(this);
			int j = imagen.getHeight(this);
			if (i > 0 && j > 0) {
			    for (int x = 0; x < getWidth(); x += i) {
				for (int y = 0; y < getHeight(); y += j) {
				    g.drawImage(imagen, x, y, i, j, this);
				}
			    }
			}
		    }
		};
		panel_2.setBackground(new Color(0, 100, 172));
		panel_2.setBounds(10, 71, 1250, 200);
		panel.add(panel_2);
		panel_2.setLayout(null);
		
		btnAdministrar = new JButton("Administrar");
		btnAdministrar.setFont(new Font("Tahoma", Font.PLAIN, 30));
		btnAdministrar.setBounds(482, 51, 281, 102);
		panel_2.add(btnAdministrar);
		
		JPanel panel_3 = new JPanel(){
		    private static final long serialVersionUID = 1L;
		    @Override
		    public void paintComponent(Graphics g) {
			Image imagen = new ImageIcon(this.getClass().getResource("/fondo.png")).getImage();
			super.paintComponent(g);
			int i = imagen.getWidth(this);
			int j = imagen.getHeight(this);
			if (i > 0 && j > 0) {
			    for (int x = 0; x < getWidth(); x += i) {
				for (int y = 0; y < getHeight(); y += j) {
				    g.drawImage(imagen, x, y, i, j, this);
				}
			    }
			}
		    }
		};
		panel_3.setBackground(new Color(0, 100, 172));
		panel_3.setBounds(10, 342, 1250, 200);
		panel.add(panel_3);
		panel_3.setLayout(null);
		
		btnPlanificar = new JButton("Planificar");
		btnPlanificar.setFont(new Font("Tahoma", Font.PLAIN, 30));
		btnPlanificar.setBounds(482, 54, 281, 102);
		panel_3.add(btnPlanificar);

    }

    public JButton getBtnAdministrar(){
	return this.btnAdministrar;
    }
    public JButton getBtnPlanificar(){
	return this.btnPlanificar;
    }
}
