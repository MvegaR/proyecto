package gui;

import javax.swing.JPanel;
import javax.swing.JLabel;
import javax.swing.JTextField;
import javax.swing.JPasswordField;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.SystemColor;
import java.awt.Color;
import javax.swing.border.BevelBorder;
import javax.swing.SwingConstants;

public class Autentificacion extends JPanel {

    private static final long serialVersionUID = 1L;
	private JButton btnEntrar;
	private JTextField texto_user;
	private JPasswordField password_texto;

    public Autentificacion() {
    	setBackground(SystemColor.inactiveCaption);
    	
    	btnEntrar = new JButton("Iniciar Sesi\u00F3n");
    	btnEntrar.setFont(new Font("Tahoma", Font.PLAIN, 24));
    	btnEntrar.setBounds(537, 517, 207, 67);
    	
    	setLayout(null);
    	add(btnEntrar);
    	
    	JPanel panel = new JPanel(){

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
    	panel.setBorder(new BevelBorder(BevelBorder.LOWERED, null, null, null, null));
    	panel.setBackground(new Color(0, 100, 172));
    	panel.setBounds(0, 141, 1280, 85);
    	add(panel);
    	panel.setLayout(null);
    	
    	JLabel lblNombreDeUsuario = new JLabel("Nombre de Usuario");
    	lblNombreDeUsuario.setForeground(new Color(255, 255, 255));
    	lblNombreDeUsuario.setFont(new Font("Tahoma", Font.PLAIN, 32));
    	lblNombreDeUsuario.setBounds(10, 23, 282, 32);
    	panel.add(lblNombreDeUsuario);
    	
    	texto_user = new JTextField();
    	texto_user.setHorizontalAlignment(SwingConstants.CENTER);
    	texto_user.setBackground(Color.WHITE);
    	texto_user.setToolTipText("Nombre de usuario");
    	texto_user.setFont(new Font("Tahoma", Font.PLAIN, 30));
    	texto_user.setColumns(10);
    	texto_user.setBounds(394, 11, 876, 60);
    	panel.add(texto_user);
    	
    	JPanel panel_1 = new JPanel(){

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
    	panel_1.setBorder(new BevelBorder(BevelBorder.LOWERED, null, null, null, null));
    	panel_1.setLayout(null);
    	panel_1.setBackground(new Color(0, 100, 172));
    	panel_1.setBounds(0, 329, 1280, 85);
    	add(panel_1);
    	
    	JLabel label_1 = new JLabel("Contrase\u00F1a");
    	label_1.setForeground(Color.WHITE);
    	label_1.setFont(new Font("Tahoma", Font.PLAIN, 30));
    	label_1.setBounds(10, 24, 274, 32);
    	panel_1.add(label_1);
    	
    	password_texto = new JPasswordField();
    	password_texto.setHorizontalAlignment(SwingConstants.CENTER);
    	password_texto.setBackground(Color.WHITE);
    	password_texto.setToolTipText("Contrase\u00F1a");
    	password_texto.setFont(new Font("Tahoma", Font.PLAIN, 30));
    	password_texto.setBounds(394, 11, 876, 60);
    	panel_1.add(password_texto);
    	
    	JLabel lblAutentificacinAdministrador = new JLabel("Autentificaci\u00F3n del Administrador: Complete el formulario para autentificarse.");
    	lblAutentificacinAdministrador.setForeground(Color.BLACK);
    	lblAutentificacinAdministrador.setFont(new Font("Times New Roman", Font.BOLD, 30));
    	lblAutentificacinAdministrador.setBounds(127, 37, 1026, 47);
    	add(lblAutentificacinAdministrador);

    }
    public String getTexto_user(){
    	return texto_user.getText();
    }
    
    @SuppressWarnings("deprecation")
    public String getPassword_texto(){
    	return password_texto.getText();
    	
    }
    public JButton getBtnEntrar(){
    	return btnEntrar;
    }
}
