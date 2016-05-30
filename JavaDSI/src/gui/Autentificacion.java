package gui;

import javax.swing.JPanel;
import javax.swing.JLabel;
import javax.swing.JTextField;
import javax.swing.JPasswordField;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;


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
	setLayout(null);

	JLabel label_user = new JLabel("User");
	label_user.setBounds(106, 86, 76, 20);
	add(label_user);

	JLabel label_password = new JLabel("Password");
	label_password.setBounds(106, 139, 76, 20);
	add(label_password);

	texto_user = new JTextField();
	texto_user.setBounds(192, 86, 129, 20);
	add(texto_user);
	texto_user.setColumns(10);

	password_texto = new JPasswordField();
	password_texto.setBounds(192, 139, 129, 20);
	add(password_texto);

	btnEntrar = new JButton("Entrar");
	btnEntrar.setBounds(93, 216, 89, 23);
	add(btnEntrar);

	JButton btnSalir = new JButton("Salir");
	btnSalir.addActionListener(new ActionListener() {
	    public void actionPerformed(ActionEvent arg0) {
		System.exit(0);
	    }
	});
	btnSalir.setBounds(269, 216, 89, 23);
	add(btnSalir);

    }

    public JButton getBtnEntrar(){
	return btnEntrar;
    }

}
