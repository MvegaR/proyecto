package gui;

import javax.swing.JPanel;
import java.awt.Color;
import javax.swing.JLabel;
import java.awt.Font;
import javax.swing.JProgressBar;

public class DescargaDeDB extends JPanel {

    /**
     * 
     */
    private static final long serialVersionUID = 1L;

    /**
     * Create the panel.
     */
    public DescargaDeDB() {
    	setLayout(null);
    	
    	JPanel panel = new JPanel();
    	panel.setBackground(Color.DARK_GRAY);
    	panel.setBounds(88, 29, 1060, 552);
    	add(panel);
    	panel.setLayout(null);
    	
    	JLabel lblNewLabel = new JLabel("Descarga de base de datos");
    	lblNewLabel.setForeground(Color.WHITE);
    	lblNewLabel.setFont(new Font("Tahoma", Font.PLAIN, 19));
    	lblNewLabel.setBounds(410, 8, 236, 37);
    	panel.add(lblNewLabel);
    	
    	JPanel panel_1 = new JPanel();
    	panel_1.setBackground(Color.GRAY);
    	panel_1.setBounds(42, 53, 996, 47);
    	panel.add(panel_1);
    	panel_1.setLayout(null);
    	
    	JLabel lblDocentes = new JLabel("Facultades");
    	lblDocentes.setBounds(10, 11, 146, 23);
    	lblDocentes.setForeground(Color.WHITE);
    	lblDocentes.setFont(new Font("Tahoma", Font.PLAIN, 19));
    	panel_1.add(lblDocentes);
    	
    	JProgressBar progressBar = new JProgressBar();
    	progressBar.setForeground(new Color(0, 102, 204));
    	progressBar.setValue(90);
    	progressBar.setStringPainted(true);
    	progressBar.setBounds(166, 11, 820, 23);
    	panel_1.add(progressBar);
    	
    	JPanel panel_2 = new JPanel();
    	panel_2.setLayout(null);
    	panel_2.setBackground(Color.GRAY);
    	panel_2.setBounds(42, 108, 996, 47);
    	panel.add(panel_2);
    	
    	JLabel lblDepartamentos = new JLabel("Departamentos");
    	lblDepartamentos.setForeground(Color.WHITE);
    	lblDepartamentos.setFont(new Font("Tahoma", Font.PLAIN, 19));
    	lblDepartamentos.setBounds(10, 11, 146, 23);
    	panel_2.add(lblDepartamentos);
    	
    	JProgressBar progressBar_1 = new JProgressBar();
    	progressBar_1.setForeground(new Color(0, 102, 204));
    	progressBar_1.setStringPainted(true);
    	progressBar_1.setValue(80);
    	progressBar_1.setBounds(166, 11, 820, 23);
    	panel_2.add(progressBar_1);
    	
    	JPanel panel_3 = new JPanel();
    	panel_3.setLayout(null);
    	panel_3.setBackground(Color.GRAY);
    	panel_3.setBounds(42, 163, 996, 47);
    	panel.add(panel_3);
    	
    	JLabel lblDocentes_1 = new JLabel("Docentes");
    	lblDocentes_1.setForeground(Color.WHITE);
    	lblDocentes_1.setFont(new Font("Tahoma", Font.PLAIN, 19));
    	lblDocentes_1.setBounds(10, 11, 146, 23);
    	panel_3.add(lblDocentes_1);
    	
    	JProgressBar progressBar_2 = new JProgressBar();
    	progressBar_2.setForeground(new Color(0, 102, 204));
    	progressBar_2.setValue(70);
    	progressBar_2.setStringPainted(true);
    	progressBar_2.setBounds(166, 11, 820, 23);
    	panel_3.add(progressBar_2);
    	
    	JPanel panel_4 = new JPanel();
    	panel_4.setLayout(null);
    	panel_4.setBackground(Color.GRAY);
    	panel_4.setBounds(42, 218, 996, 47);
    	panel.add(panel_4);
    	
    	JLabel lblEdificios = new JLabel("Edificios");
    	lblEdificios.setForeground(Color.WHITE);
    	lblEdificios.setFont(new Font("Tahoma", Font.PLAIN, 19));
    	lblEdificios.setBounds(10, 11, 146, 23);
    	panel_4.add(lblEdificios);
    	
    	JProgressBar progressBar_3 = new JProgressBar();
    	progressBar_3.setForeground(new Color(0, 102, 204));
    	progressBar_3.setValue(60);
    	progressBar_3.setStringPainted(true);
    	progressBar_3.setBounds(166, 11, 820, 23);
    	panel_4.add(progressBar_3);
    	
    	JPanel panel_5 = new JPanel();
    	panel_5.setLayout(null);
    	panel_5.setBackground(Color.GRAY);
    	panel_5.setBounds(42, 273, 996, 47);
    	panel.add(panel_5);
    	
    	JLabel lblSalas = new JLabel("Salas");
    	lblSalas.setForeground(Color.WHITE);
    	lblSalas.setFont(new Font("Tahoma", Font.PLAIN, 19));
    	lblSalas.setBounds(10, 11, 146, 23);
    	panel_5.add(lblSalas);
    	
    	JProgressBar progressBar_4 = new JProgressBar();
    	progressBar_4.setForeground(new Color(0, 102, 204));
    	progressBar_4.setValue(50);
    	progressBar_4.setStringPainted(true);
    	progressBar_4.setBounds(166, 11, 820, 23);
    	panel_5.add(progressBar_4);
    	
    	JPanel panel_6 = new JPanel();
    	panel_6.setLayout(null);
    	panel_6.setBackground(Color.GRAY);
    	panel_6.setBounds(42, 328, 996, 47);
    	panel.add(panel_6);
    	
    	JLabel lblCarreras = new JLabel("Carreras");
    	lblCarreras.setForeground(Color.WHITE);
    	lblCarreras.setFont(new Font("Tahoma", Font.PLAIN, 19));
    	lblCarreras.setBounds(10, 11, 146, 23);
    	panel_6.add(lblCarreras);
    	
    	JProgressBar progressBar_5 = new JProgressBar();
    	progressBar_5.setForeground(new Color(0, 102, 204));
    	progressBar_5.setValue(40);
    	progressBar_5.setStringPainted(true);
    	progressBar_5.setBounds(166, 11, 820, 23);
    	panel_6.add(progressBar_5);
    	
    	JPanel panel_7 = new JPanel();
    	panel_7.setLayout(null);
    	panel_7.setBackground(Color.GRAY);
    	panel_7.setBounds(42, 438, 996, 47);
    	panel.add(panel_7);
    	
    	JLabel lblSecciones = new JLabel("Secciones");
    	lblSecciones.setForeground(Color.WHITE);
    	lblSecciones.setFont(new Font("Tahoma", Font.PLAIN, 19));
    	lblSecciones.setBounds(10, 11, 146, 23);
    	panel_7.add(lblSecciones);
    	
    	JProgressBar progressBar_6 = new JProgressBar();
    	progressBar_6.setForeground(new Color(0, 102, 204));
    	progressBar_6.setValue(10);
    	progressBar_6.setStringPainted(true);
    	progressBar_6.setBounds(166, 11, 820, 23);
    	panel_7.add(progressBar_6);
    	
    	JPanel panel_8 = new JPanel();
    	panel_8.setLayout(null);
    	panel_8.setBackground(Color.GRAY);
    	panel_8.setBounds(42, 493, 996, 47);
    	panel.add(panel_8);
    	
    	JLabel lblBloques = new JLabel("Bloques");
    	lblBloques.setForeground(Color.WHITE);
    	lblBloques.setFont(new Font("Tahoma", Font.PLAIN, 19));
    	lblBloques.setBounds(10, 11, 146, 23);
    	panel_8.add(lblBloques);
    	
    	JProgressBar progressBar_7 = new JProgressBar();
    	progressBar_7.setForeground(new Color(0, 102, 204));
    	progressBar_7.setStringPainted(true);
    	progressBar_7.setBounds(166, 11, 820, 23);
    	panel_8.add(progressBar_7);
    	
    	JPanel panel_9 = new JPanel();
    	panel_9.setLayout(null);
    	panel_9.setBackground(Color.GRAY);
    	panel_9.setBounds(42, 383, 996, 47);
    	panel.add(panel_9);
    	
    	JLabel lblAsignaturas = new JLabel("Asignaturas");
    	lblAsignaturas.setForeground(Color.WHITE);
    	lblAsignaturas.setFont(new Font("Tahoma", Font.PLAIN, 19));
    	lblAsignaturas.setBounds(10, 11, 146, 23);
    	panel_9.add(lblAsignaturas);
    	
    	JProgressBar progressBar_8 = new JProgressBar();
    	progressBar_8.setValue(20);
    	progressBar_8.setStringPainted(true);
    	progressBar_8.setForeground(new Color(0, 102, 204));
    	progressBar_8.setBounds(166, 11, 820, 23);
    	panel_9.add(progressBar_8);
	
    }
}
