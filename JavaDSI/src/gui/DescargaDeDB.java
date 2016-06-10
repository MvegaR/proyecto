package gui;

import javax.swing.JPanel;
import java.awt.Color;
import javax.swing.JLabel;
import java.awt.Font;
import javax.swing.JProgressBar;
import java.awt.SystemColor;

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
	panel.setBackground(SystemColor.windowBorder);
	panel.setBounds(88, 29, 1060, 552);
	add(panel);
	panel.setLayout(null);

	JLabel lblNewLabel = new JLabel("Descarga desde base de datos");
	lblNewLabel.setForeground(Color.WHITE);
	lblNewLabel.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblNewLabel.setBounds(396, 8, 267, 37);
	panel.add(lblNewLabel);

	JPanel panel_1 = new JPanel();
	panel_1.setBackground(Color.LIGHT_GRAY);
	panel_1.setBounds(42, 53, 996, 47);
	panel.add(panel_1);
	panel_1.setLayout(null);

	JLabel lblDocentes = new JLabel("Facultades");
	lblDocentes.setBounds(10, 11, 146, 23);
	lblDocentes.setForeground(Color.BLACK);
	lblDocentes.setFont(new Font("Tahoma", Font.PLAIN, 19));
	panel_1.add(lblDocentes);

	JProgressBar facultadesBar = new JProgressBar();
	facultadesBar.setForeground(new Color(0, 102, 204));
	facultadesBar.setValue(100);
	facultadesBar.setStringPainted(true);
	facultadesBar.setBounds(166, 11, 820, 23);
	panel_1.add(facultadesBar);

	JPanel panel_2 = new JPanel();
	panel_2.setLayout(null);
	panel_2.setBackground(Color.LIGHT_GRAY);
	panel_2.setBounds(42, 108, 996, 47);
	panel.add(panel_2);

	JLabel lblDepartamentos = new JLabel("Departamentos");
	lblDepartamentos.setForeground(Color.BLACK);
	lblDepartamentos.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblDepartamentos.setBounds(10, 11, 146, 23);
	panel_2.add(lblDepartamentos);

	JProgressBar departamentosBar = new JProgressBar();
	departamentosBar.setForeground(new Color(0, 102, 204));
	departamentosBar.setStringPainted(true);
	departamentosBar.setValue(100);
	departamentosBar.setBounds(166, 11, 820, 23);
	panel_2.add(departamentosBar);

	JPanel panel_3 = new JPanel();
	panel_3.setLayout(null);
	panel_3.setBackground(Color.LIGHT_GRAY);
	panel_3.setBounds(42, 163, 996, 47);
	panel.add(panel_3);

	JLabel lblDocentes_1 = new JLabel("Docentes");
	lblDocentes_1.setForeground(Color.BLACK);
	lblDocentes_1.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblDocentes_1.setBounds(10, 11, 146, 23);
	panel_3.add(lblDocentes_1);

	JProgressBar docentesBar = new JProgressBar();
	docentesBar.setForeground(new Color(0, 102, 204));
	docentesBar.setValue(100);
	docentesBar.setStringPainted(true);
	docentesBar.setBounds(166, 11, 820, 23);
	panel_3.add(docentesBar);

	JPanel panel_4 = new JPanel();
	panel_4.setLayout(null);
	panel_4.setBackground(Color.LIGHT_GRAY);
	panel_4.setBounds(42, 218, 996, 47);
	panel.add(panel_4);

	JLabel lblEdificios = new JLabel("Edificios");
	lblEdificios.setForeground(Color.BLACK);
	lblEdificios.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblEdificios.setBounds(10, 11, 146, 23);
	panel_4.add(lblEdificios);

	JProgressBar edificiosBar = new JProgressBar();
	edificiosBar.setForeground(new Color(0, 102, 204));
	edificiosBar.setValue(100);
	edificiosBar.setStringPainted(true);
	edificiosBar.setBounds(166, 11, 820, 23);
	panel_4.add(edificiosBar);

	JPanel panel_5 = new JPanel();
	panel_5.setLayout(null);
	panel_5.setBackground(Color.LIGHT_GRAY);
	panel_5.setBounds(42, 273, 996, 47);
	panel.add(panel_5);

	JLabel lblSalas = new JLabel("Salas");
	lblSalas.setForeground(Color.BLACK);
	lblSalas.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblSalas.setBounds(10, 11, 146, 23);
	panel_5.add(lblSalas);

	JProgressBar salaBar = new JProgressBar();
	salaBar.setValue(100);
	salaBar.setForeground(new Color(0, 102, 204));
	salaBar.setStringPainted(true);
	salaBar.setBounds(166, 11, 820, 23);
	panel_5.add(salaBar);

	JPanel panel_6 = new JPanel();
	panel_6.setLayout(null);
	panel_6.setBackground(Color.LIGHT_GRAY);
	panel_6.setBounds(42, 328, 996, 47);
	panel.add(panel_6);

	JLabel lblCarreras = new JLabel("Carreras");
	lblCarreras.setForeground(Color.BLACK);
	lblCarreras.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblCarreras.setBounds(10, 11, 146, 23);
	panel_6.add(lblCarreras);

	JProgressBar carrerasBar = new JProgressBar();
	carrerasBar.setForeground(new Color(0, 102, 204));
	carrerasBar.setStringPainted(true);
	carrerasBar.setBounds(166, 11, 820, 23);
	panel_6.add(carrerasBar);

	JPanel panel_7 = new JPanel();
	panel_7.setLayout(null);
	panel_7.setBackground(Color.LIGHT_GRAY);
	panel_7.setBounds(42, 438, 996, 47);
	panel.add(panel_7);

	JLabel lblSecciones = new JLabel("Secciones");
	lblSecciones.setForeground(Color.BLACK);
	lblSecciones.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblSecciones.setBounds(10, 11, 146, 23);
	panel_7.add(lblSecciones);

	JProgressBar seccionesBar = new JProgressBar();
	seccionesBar.setForeground(new Color(0, 102, 204));
	seccionesBar.setValue(100);
	seccionesBar.setStringPainted(true);
	seccionesBar.setBounds(166, 11, 820, 23);
	panel_7.add(seccionesBar);

	JPanel panel_8 = new JPanel();
	panel_8.setLayout(null);
	panel_8.setBackground(Color.LIGHT_GRAY);
	panel_8.setBounds(42, 493, 996, 47);
	panel.add(panel_8);

	JLabel lblBloques = new JLabel("Bloques");
	lblBloques.setForeground(Color.BLACK);
	lblBloques.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblBloques.setBounds(10, 11, 146, 23);
	panel_8.add(lblBloques);

	JProgressBar bloquesBar = new JProgressBar();
	bloquesBar.setValue(100);
	bloquesBar.setForeground(new Color(0, 102, 204));
	bloquesBar.setStringPainted(true);
	bloquesBar.setBounds(166, 11, 820, 23);
	panel_8.add(bloquesBar);

	JPanel panel_9 = new JPanel();
	panel_9.setLayout(null);
	panel_9.setBackground(Color.LIGHT_GRAY);
	panel_9.setBounds(42, 383, 996, 47);
	panel.add(panel_9);

	JLabel lblAsignaturas = new JLabel("Asignaturas");
	lblAsignaturas.setForeground(Color.BLACK);
	lblAsignaturas.setFont(new Font("Tahoma", Font.PLAIN, 19));
	lblAsignaturas.setBounds(10, 11, 146, 23);
	panel_9.add(lblAsignaturas);

	JProgressBar asignaturasBar = new JProgressBar();
	asignaturasBar.setValue(100);
	asignaturasBar.setStringPainted(true);
	asignaturasBar.setForeground(new Color(0, 102, 204));
	asignaturasBar.setBounds(166, 11, 820, 23);
	panel_9.add(asignaturasBar);

    }
}
