package gui;

import javax.swing.JPanel;
import java.awt.Color;
import javax.swing.JLabel;
import java.awt.Font;
import javax.swing.JProgressBar;
import java.awt.SystemColor;
import javax.swing.JScrollPane;
import javax.swing.JTextArea;
import java.awt.BorderLayout;
import java.awt.Rectangle;
import javax.swing.ScrollPaneConstants;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

public class CargaProcesoActual extends JPanel {

    /**
     * 
     */
    private static final long serialVersionUID = 1L;

    /**
     * Create the panel.
     */
    public CargaProcesoActual() {
	setLayout(null);

	JPanel panel = new JPanel();
	panel.setBackground(SystemColor.windowBorder);
	panel.setBounds(60, 29, 1060, 552);
	add(panel);
	panel.setLayout(null);

	JLabel lblNewLabel = new JLabel("Proceso Actual");
	lblNewLabel.setForeground(Color.WHITE);
	lblNewLabel.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblNewLabel.setBounds(459, 11, 133, 37);
	panel.add(lblNewLabel);

	JPanel panel_1 = new JPanel();
	panel_1.setBackground(Color.LIGHT_GRAY);
	panel_1.setBounds(42, 53, 996, 47);
	panel.add(panel_1);
	panel_1.setLayout(null);

	JLabel lblDocentes = new JLabel("Asignaciones");
	lblDocentes.setBounds(10, 11, 146, 23);
	lblDocentes.setForeground(Color.BLACK);
	lblDocentes.setFont(new Font("Tahoma", Font.PLAIN, 19));
	panel_1.add(lblDocentes);

	JProgressBar facultadesBar = new JProgressBar();
	facultadesBar.setForeground(new Color(50, 205, 50));
	facultadesBar.setValue(66);
	facultadesBar.setStringPainted(true);
	facultadesBar.setBounds(166, 11, 820, 23);
	panel_1.add(facultadesBar);

	JPanel panel_2 = new JPanel();
	panel_2.setBackground(Color.LIGHT_GRAY);
	panel_2.setBounds(42, 108, 996, 422);
	panel.add(panel_2);
	panel_2.setLayout(new BorderLayout(0, 0));
	
	JScrollPane scrollPane = new JScrollPane();
	scrollPane.setHorizontalScrollBarPolicy(ScrollPaneConstants.HORIZONTAL_SCROLLBAR_ALWAYS);
	scrollPane.setVerticalScrollBarPolicy(ScrollPaneConstants.VERTICAL_SCROLLBAR_ALWAYS);
	panel_2.add(scrollPane);
	
	JTextArea txtrTextoDePrueba = new JTextArea();
	txtrTextoDePrueba.setText("Texto de prueba\r\nPaso 1/1000\r\nProceso XXXXXX\r\n1%\r\n3%\r\n4%\r\nProceso XXXXXX\r\n1%\r\n3%\r\n4%\r\nProceso XXXXXX\r\n1%\r\n3%\r\n4%\r\nProceso XXXXXX\r\n1%\r\n3%\r\n4%\r\nProceso XXXXXX\r\n1%\r\n3%\r\n4%\r\nProceso XXXXXX\r\n1%\r\n3%\r\n4%\r\nProceso XXXXXX\r\n1%\r\n3%\r\n4%\r\nProceso XXXXXX\r\n1%\r\n3%\r\n4%\r\nProceso XXXXXX\r\n1%\r\n3%\r\n4%\r\nProceso XXXXXX\r\n1%\r\n3%\r\n4%");
	txtrTextoDePrueba.setBounds(new Rectangle(0, 0, 1210, 3000));
	scrollPane.setViewportView(txtrTextoDePrueba);
	
	JButton btnNewButton = new JButton("Detener");
	btnNewButton.setFont(new Font("Tahoma", Font.PLAIN, 25));
	btnNewButton.setBackground(new Color(128, 0, 0));
	btnNewButton.addActionListener(new ActionListener() {
		public void actionPerformed(ActionEvent e) {
		}
	});
	btnNewButton.setBounds(480, 593, 221, 49);
	add(btnNewButton);

    }
}
