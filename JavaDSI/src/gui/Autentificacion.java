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
    	
    	JLabel label_user = new JLabel("User");
    	label_user.setFont(new Font("Tahoma", Font.PLAIN, 17));
    	label_user.setBounds(67, 86, 115, 32);
    	
    	JLabel label_password = new JLabel("Password");
    	label_password.setFont(new Font("Tahoma", Font.PLAIN, 17));
    	label_password.setBounds(67, 139, 115, 32);
    	
    	texto_user = new JTextField();
    	texto_user.setBounds(192, 86, 206, 32);
    	texto_user.setColumns(10);
    	
    	password_texto = new JPasswordField();
    	password_texto.setBounds(192, 139, 206, 32);
    	
    	btnEntrar = new JButton("Entrar");
    	btnEntrar.setBounds(93, 216, 134, 43);
    	
    	JButton btnSalir = new JButton("Salir");
    	btnSalir.setBounds(269, 216, 129, 43);
    	btnSalir.addActionListener(new ActionListener() {
    		public void actionPerformed(ActionEvent arg0) {
    			System.exit(0);
    		}
    	});
    	setLayout(null);
    	add(label_user);
    	add(texto_user);
    	add(label_password);
    	add(password_texto);
    	add(btnEntrar);
    	add(btnSalir);

    }
    
    public JButton getBtnEntrar(){
    	return btnEntrar;
    }
    
}
