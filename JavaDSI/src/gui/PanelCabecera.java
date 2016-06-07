package gui;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.Image;
import javax.swing.ImageIcon;
import javax.swing.JLabel;
import javax.swing.JPanel;
import java.awt.Font;

public class PanelCabecera extends JPanel {

    /**
     * 
     */
    private static final long serialVersionUID = 1L;
    private Image imagen;

    public PanelCabecera() {
	this.setBackground(new Color(0, 100, 172));      
	String texto = "<html><body><h1><strong>Proyecto DSI</strong></h1>Sistema de información dedicado a la asignación de horarios y salas de clases para la universidad del Bío-Bío.</body></html>";
	JLabel lblNewLabel = new JLabel(texto);
	lblNewLabel.setForeground(Color.WHITE);
	lblNewLabel.setFont(new Font("Tahoma", Font.PLAIN, 16));
	lblNewLabel.setToolTipText("");
	add(lblNewLabel);
	imagen = new ImageIcon(this.getClass().getResource("/texturaOP.png")).getImage();
    }

    @Override
    public void paintComponent(Graphics g) {
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

}