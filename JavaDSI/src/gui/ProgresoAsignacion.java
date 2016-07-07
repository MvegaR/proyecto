package gui;

import javax.swing.JPanel;
import java.awt.Color;
import javax.swing.JLabel;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Image;

import javax.swing.JProgressBar;
import java.awt.SystemColor;
import javax.swing.JScrollPane;
import javax.swing.JTextArea;
import java.awt.Rectangle;
import javax.swing.ScrollPaneConstants;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.io.PrintStream;
import java.util.ArrayList;
import java.util.Timer;
import java.util.TimerTask;
import java.awt.event.ActionEvent;
import javax.swing.SwingConstants;

import db.Sala;
import db.Seccion;
import logica.Planificador;
import logica.Reloj;

import java.awt.CardLayout;

public class ProgresoAsignacion extends JPanel {

    private static final long serialVersionUID = 1L;
    private JButton btnDetener;
    private JButton btnVolver;
    private JLabel lblTiempo;
    private JProgressBar totalBar;
    private JPanel panel_3;

    public ProgresoAsignacion(VentanaPrincipal ventana, ArrayList<Sala> salas, ArrayList<Seccion> secciones, ArrayList<Integer> dias) throws Exception {
	setBackground(SystemColor.inactiveCaption);
	setLayout(null);

	JPanel panel = new JPanel()//*
		{
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
		}//*/
	;
	panel.setBackground(new Color(0, 100, 172));
	panel.setBounds(10, 11, 1260, 601);
	add(panel);
	panel.setLayout(null);

	JLabel lblNewLabel = new JLabel("Progreso de la asignaci\u00F3n");
	lblNewLabel.setBounds(488, 11, 302, 37);
	lblNewLabel.setForeground(Color.WHITE);
	lblNewLabel.setFont(new Font("Tahoma", Font.PLAIN, 25));
	panel.add(lblNewLabel);

	JPanel panel_1 = new JPanel();
	panel_1.setBounds(10, 53, 1240, 47);
	panel_1.setBackground(SystemColor.activeCaption);
	panel.add(panel_1);
	panel_1.setLayout(null);

	JLabel lblAsignaciones = new JLabel("Asignaciones");
	lblAsignaciones.setBounds(10, 11, 146, 23);
	lblAsignaciones.setForeground(Color.BLACK);
	lblAsignaciones.setFont(new Font("Tahoma", Font.PLAIN, 19));
	panel_1.add(lblAsignaciones);

	totalBar = new JProgressBar();
	totalBar.setForeground(new Color(0, 0, 0));
	totalBar.setStringPainted(true);
	totalBar.setBounds(166, 11, 1064, 23);
	panel_1.add(totalBar);

	JPanel panel_2 = new JPanel();
	panel_2.setBounds(10, 108, 1240, 422);
	panel_2.setBackground(Color.LIGHT_GRAY);
	panel.add(panel_2);
	panel_2.setLayout(new CardLayout(0, 0));

	JScrollPane scrollPane = new JScrollPane();
	scrollPane.setHorizontalScrollBarPolicy(ScrollPaneConstants.HORIZONTAL_SCROLLBAR_ALWAYS);
	scrollPane.setVerticalScrollBarPolicy(ScrollPaneConstants.VERTICAL_SCROLLBAR_ALWAYS);
	panel_2.add(scrollPane, "name_1816028391590492");

	JTextArea txtrTextoDePrueba = new JTextArea();
	txtrTextoDePrueba.setEditable(false);
	txtrTextoDePrueba.setLineWrap(true);
	txtrTextoDePrueba.setFont(new Font("Monospaced", Font.PLAIN, 15));
	txtrTextoDePrueba.setBounds(new Rectangle(32, 0, 1221, 403));
	scrollPane.setViewportView(txtrTextoDePrueba);
	System.setOut(new PrintStream(new MyOut(txtrTextoDePrueba))); //Cambiando salida de consola JText.

	panel_3 = new JPanel();
	panel_3.setOpaque(false);
	panel_3.setBounds(416, 543, 223, 47);
	panel_3.setBackground(new Color(Color.TRANSLUCENT));
	panel.add(panel_3);
	panel_3.setLayout(null);

	lblTiempo = new JLabel("00:00:00");
	lblTiempo.setForeground(new Color(255, 255, 255));
	lblTiempo.setOpaque(false);
	lblTiempo.setBounds(0, 0, 224, 47);
	lblTiempo.setHorizontalAlignment(SwingConstants.CENTER);
	lblTiempo.setFont(new Font("Consolas", Font.BOLD, 30));
	panel_3.add(lblTiempo);

	btnDetener = new JButton("Detener");
	btnDetener.setBounds(652, 541, 221, 49);
	panel.add(btnDetener);
	btnDetener.setFont(new Font("Tahoma", Font.PLAIN, 25));
	btnDetener.setBackground(new Color(128, 0, 0));

	btnVolver = new JButton("Volver");
	btnVolver.setBounds(652, 541, 221, 49);
	btnVolver.setVisible(false);
	panel.add(btnVolver);
	btnVolver.setFont(new Font("Tahoma", Font.PLAIN, 25));
	btnVolver.setBackground(new Color(128, 0, 0));
	ejecutarPlanificador(ventana, salas, secciones, dias, this);

    }


    private void ejecutarPlanificador(VentanaPrincipal ventana, ArrayList<Sala> salas, ArrayList<Seccion> secciones, ArrayList<Integer> dias, ProgresoAsignacion esto) throws Exception{

	//ejecutar hilo para el planificador.
	Planificador planificador;
	planificador = new Planificador(ventana, salas, secciones, dias);
	//ejecutar hilo para la barra.
	TimerTask TareaDeActualizarBarra = new TimerTask() {

	    @Override
	    public void run() {
		totalBar.setValue(planificador.getPorcentajeProgreso());
		totalBar.paintImmediately(new Rectangle(0, 0, totalBar.getWidth(), totalBar.getHeight()));

	    }
	};
	Timer periodo = new Timer();
	periodo.schedule(TareaDeActualizarBarra, 0, 1000);

	planificador.start();

	//ejecutar hilo para el tiempo.
	Timer segundero = new Timer();
	Reloj reloj = new Reloj();
	TimerTask aumentarSegundo = new TimerTask() {
	    @Override
	    public void run() {
		reloj.aumenta();
		lblTiempo.setText(reloj.toString());
		panel_3.paintImmediately(new Rectangle(panel_3.getX(), panel_3.getY(), panel_3.getWidth(), panel_3.getHeight()));
	    }
	};
	segundero.schedule(aumentarSegundo,0, 1000);

	btnDetener.addActionListener(new ActionListener() {
	    public void actionPerformed(ActionEvent e) {
		planificador.setDetener(true);
		segundero.cancel();
		periodo.cancel();
		btnDetener.setVisible(false);
		btnVolver.setVisible(true);

		/* ventana.getPaneles().remove(esto);
		    ventana.getGestorPaneles().remove(esto);
		    ventana.getGestorPaneles().mostrarPanel("planificar");*/

	    }
	});

	btnVolver.addActionListener(new ActionListener() {
	    public void actionPerformed(ActionEvent e) {
		ventana.getPaneles().remove(esto);
		ventana.getGestorPaneles().remove(esto);


		ventana.getGestorPaneles().remove(ventana.getGestorPaneles().getDescargaDB());
		ventana.getPaneles().remove(ventana.getGestorPaneles().getDescargaDB());


		ventana.getGestorPaneles().setDescargaDB(new DescargaDeDB(ventana));
		ventana.getGestorPaneles().add(ventana.getGestorPaneles().getDescargaDB(), "descargaDB");
		ventana.getPaneles().add(ventana.getGestorPaneles().getDescargaDB());
		ventana.getGestorPaneles().mostrarPanel("descargaDB");
		ventana.getGestorPaneles().getDescargaDB().rellenarListas();

		ventana.getPaneles().remove(ventana.getGestorPaneles().getPanelPlanificar());
		ventana.getGestorPaneles().remove(ventana.getGestorPaneles().getPanelPlanificar());
		ventana.getGestorPaneles().setPanelPlanificar(new PanelPlanificar(ventana));
		ventana.getPaneles().add(ventana.getGestorPaneles().getPanelPlanificar());
		ventana.getGestorPaneles().add(ventana.getGestorPaneles().getPanelPlanificar(), "planificar");
		ventana.getGestorPaneles().mostrarPanel("planificar");



	    }
	});





    }

}
