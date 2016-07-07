package gui;

import javax.swing.JPanel;

import logica.BorradorPlanificacion;

import javax.swing.BoxLayout;
import javax.swing.ImageIcon;

import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.JButton;
import java.awt.SystemColor;
import javax.swing.JLabel;
import javax.swing.JOptionPane;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Image;

public class PanelPlanificar extends JPanel {

    private static final long serialVersionUID = 1L;

    private JPanel panelNorte, panelCentro, panelSur;
    private PanelSalasYDias panelTreeSalas;
    private PanelAsignaturas panelAsignaturas;
    private JButton btnBorrarPlanificacion;
    private JButton btnEjecutarPlanificacinSeleccin;
    private JLabel lblSeleccioneSalasY;
    private JButton btnVolver;

    public PanelPlanificar(VentanaPrincipal ventana){
	setBackground(SystemColor.inactiveCaption);
	panelNorte  = new JPanel();
	panelNorte.setBackground(SystemColor.activeCaption);
	panelNorte.setBounds(10, 11, 1245, 36);
	panelCentro = new JPanel();
	panelCentro.setBounds(10, 58, 1245, 498);
	panelSur    = new JPanel();
	panelSur.setBackground(SystemColor.activeCaption);
	panelSur.setBounds(10, 567, 1245, 37);
	panelCentro.setLayout(new BoxLayout(panelCentro, BoxLayout.X_AXIS));
	panelTreeSalas = new PanelSalasYDias(ventana)//*
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
	panelTreeSalas.setBackground(new Color(0, 100, 172));
	panelAsignaturas = new PanelAsignaturas(ventana)//*
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
	panelAsignaturas.setBackground(new Color(0, 100, 172));
	panelCentro.add(panelTreeSalas);
	panelCentro.add(panelAsignaturas);
	panelNorte.setLayout(new FlowLayout());
	btnBorrarPlanificacion = new JButton("Borrar planificacion de la selecci\u00F3n");
	btnBorrarPlanificacion.setFont(new Font("Tahoma", Font.PLAIN, 15));
	//btnNewButton.addActionListener(e -> new BuscarErrores(ventana).ejecutarTodasLasBusquedas()); //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	btnBorrarPlanificacion.addActionListener(e -> new BorradorPlanificacion(ventana, panelAsignaturas.getSeccionesSeleccionadas()));

	btnVolver = new JButton("Volver");
	btnVolver.setFont(new Font("Tahoma", Font.PLAIN, 15));
	panelSur.add(btnVolver);
	btnVolver.addActionListener(new ActionListener() {
	    public void actionPerformed(ActionEvent arg0) {
		String[] opciones = {"Si", "No" };
		int opcion = JOptionPane.showOptionDialog(null,"¿Seguro que desea volver?"
			,"Informacion",JOptionPane.DEFAULT_OPTION,JOptionPane.INFORMATION_MESSAGE
			,null,opciones,null);
		if(opciones[opcion].equals("Si")){
		    if(!ventana.getPaneles().isEmpty()){
			ventana.getPaneles().get(ventana.getPaneles().size()-1).setVisible(false);
			ventana.getPaneles().remove(ventana.getPaneles().size()-1);
			if(!ventana.getPaneles().isEmpty()){
			    ventana.getPaneles().get(ventana.getPaneles().size()-1).setVisible(true);
			    ventana.getGestorPaneles().mostrarPanel("menuInicial");
			}

		    }
		}
	    }
	});
	panelSur.add(btnBorrarPlanificacion);
	setLayout(null);
	this.add(panelNorte);

	lblSeleccioneSalasY = new JLabel("Seleccione salas, d\u00EDas y asignaturas con sus secciones y a continuaci\u00F3n ejecute el planificador.");
	lblSeleccioneSalasY.setFont(new Font("Tahoma", Font.PLAIN, 20));
	panelNorte.add(lblSeleccioneSalasY);
	this.add(panelCentro);
	this.add(panelSur);

	btnEjecutarPlanificacinSeleccin = new JButton("Ejecutar Planificaci\u00F3n de la selecci\u00F3n");
	btnEjecutarPlanificacinSeleccin.setFont(new Font("Tahoma", Font.PLAIN, 15));
	btnEjecutarPlanificacinSeleccin.addActionListener(e -> {

	    ProgresoAsignacion progreso;
	    try {
		progreso = new ProgresoAsignacion(ventana, this.panelTreeSalas.getSalasSeleccionadas(), this.panelAsignaturas.getSeccionesSeleccionadas(), this.panelTreeSalas.getDiasSeleccionados());
		    ventana.getPaneles().add(progreso);
		    ventana.getGestorPaneles().add(progreso, "progreso");
		    ventana.getGestorPaneles().mostrarPanel("progreso");
	    } catch (Exception e1) {
		ventana.getGestorPaneles().mostrarPanel("planificar");
		e1.printStackTrace();
	    }


	});
	panelSur.add(btnEjecutarPlanificacinSeleccin);
    }
}