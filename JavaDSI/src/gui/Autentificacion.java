package gui;

import javax.swing.JPanel;
import javax.swing.JLabel;
import javax.swing.JTextField;
import javax.swing.JPasswordField;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import java.awt.Font;


public class Autentificacion extends JPanel {
	/**
     * 
     */
    private static final long serialVersionUID = 1L;
	private JTextField texto_user;
	private JPasswordField password_texto;
	private JButton btnEntrar;

    /**
     * Create the panel.
     * PANEL DE PABLO
     */
    public Autentificacion() {
    	
    	JLabel lblUsuario = new JLabel("Usuario");
    	lblUsuario.setFont(new Font("Tahoma", Font.PLAIN, 32));
    	lblUsuario.setBounds(262, 120, 115, 32);
    	
    	JLabel lblContrasea = new JLabel("Contrase\u00F1a");
    	lblContrasea.setFont(new Font("Tahoma", Font.PLAIN, 30));
    	lblContrasea.setBounds(262, 254, 181, 32);
    	
    	texto_user = new JTextField();
    	texto_user.setFont(new Font("Tahoma", Font.PLAIN, 25));
    	texto_user.setBounds(509, 123, 366, 32);
    	texto_user.setColumns(10);
    	
    	password_texto = new JPasswordField();
    	password_texto.setFont(new Font("Tahoma", Font.PLAIN, 25));
    	password_texto.setBounds(509, 254, 366, 32);
    	
    	btnEntrar = new JButton("Entrar");
    	btnEntrar.setBounds(509, 385, 134, 43);
    	
    	JButton btnSalir = new JButton("Salir");
    	btnSalir.setBounds(746, 385, 129, 43);
    	btnSalir.addActionListener(new ActionListener() {
    		public void actionPerformed(ActionEvent arg0) {
    			System.exit(0);
    		}
    	});
    	setLayout(null);
    	add(lblUsuario);
    	add(texto_user);
    	add(lblContrasea);
    	add(password_texto);
    	add(btnEntrar);
    	add(btnSalir);

    }
    
    public JButton getBtnEntrar(){
    	return btnEntrar;
    }
    
}
