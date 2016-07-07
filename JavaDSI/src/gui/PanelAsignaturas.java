package gui;

import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTree;
import javax.swing.UIManager;
import javax.swing.UnsupportedLookAndFeelException;
import javax.swing.WindowConstants;
import javax.swing.tree.DefaultMutableTreeNode;
import javax.swing.tree.DefaultTreeModel;
import javax.swing.tree.TreeModel;

import db.Asignatura;
import db.Carrera;
//import db.Conexion;
import db.Facultad;
import db.Seccion;

import java.awt.Color;
import java.awt.Component;
import java.awt.Dimension;
import java.util.ArrayList;
//import java.sql.*;
import java.util.Enumeration;
import javax.swing.BorderFactory;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.BoxLayout;

public class PanelAsignaturas extends JPanel {

    private static final long serialVersionUID = 1L;

    private JLabel tituloAsignaturas;
    private String titulo;
    private JTree tree;
    private static VentanaPrincipal ventana;


    public PanelAsignaturas(VentanaPrincipal ventana) {
	titulo = "<html><body><h2><strong><center>SELECCIONE ASIGNATURAS Y SUS SECCIONES</center></strong></h2></body></html>";
	tituloAsignaturas = new JLabel(titulo);
	PanelAsignaturas.ventana = ventana;
	tituloAsignaturas.setForeground(new Color(255, 255, 255));
	tituloAsignaturas.setAlignmentX(Component.CENTER_ALIGNMENT);
	tree = new JTree() {
	    private static final long serialVersionUID = 1L;

	    @Override public void updateUI() {
		setCellRenderer(null);
		setCellEditor(null);
		super.updateUI();
		//???#1: JDK 1.6.0 bug??? Nimbus LnF
		setCellRenderer(new CheckBoxNodeRenderer());
		setCellEditor(new CheckBoxNodeEditor());
	    }
	};
	//ubb -> semestre -> facultad -> carrera -> asignatura -> seccion
	tree.setModel(new DefaultTreeModel(
		new DefaultMutableTreeNode("UBB"){
		    private static final long serialVersionUID = 1L;
		    {
			DefaultMutableTreeNode s1 = new DefaultMutableTreeNode("Semestre I");
			for(Facultad facultad: ventana.getFacultades()){
			    DefaultMutableTreeNode f = new DefaultMutableTreeNode(facultad.getNombreFacultad());
			    for(Carrera carrera: ventana.getCarreras()){
				if(carrera.getIdFacultad().equals(facultad.getIdFacultad())){
				    DefaultMutableTreeNode c = new DefaultMutableTreeNode("["+carrera.getIdCarrera()+"] - "+carrera.getNombreCarrera());
				    for(Asignatura asignatura: ventana.getAsignaturas()){
					if(asignatura.getSemestre().equals(1) && asignatura.getIdCarrera() != null && asignatura.getIdCarrera().equals(carrera.getIdCarrera())){
					    DefaultMutableTreeNode a = new DefaultMutableTreeNode("["+asignatura.getIdAsignatura()+"] - "+asignatura.getNombreAsignatura());
					    for(Seccion seccion: ventana.getSecciones()){
						if(seccion.getIdAsignatura().equals(asignatura.getIdAsignatura())){
						    DefaultMutableTreeNode s = new DefaultMutableTreeNode(seccion.getIdSeccion());
						    a.add(s);
						}
					    }
					    c.add(a);
					}
				    }
				    f.add(c);
				}
			    }
			    s1.add(f);
			}
			add(s1);

			DefaultMutableTreeNode s2 = new DefaultMutableTreeNode("Semestre II");
			for(Facultad facultad: ventana.getFacultades()){
			    DefaultMutableTreeNode f = new DefaultMutableTreeNode(facultad.getNombreFacultad());
			    for(Carrera carrera: ventana.getCarreras()){
				if(carrera.getIdFacultad().equals(facultad.getIdFacultad())){
				    DefaultMutableTreeNode c = new DefaultMutableTreeNode("["+carrera.getIdCarrera()+"] - "+carrera.getNombreCarrera());
				    for(Asignatura asignatura: ventana.getAsignaturas()){
					if(asignatura.getSemestre().equals(2) &&  asignatura.getIdCarrera() != null && asignatura.getIdCarrera().equals(carrera.getIdCarrera())){
					    DefaultMutableTreeNode a = new DefaultMutableTreeNode("["+asignatura.getIdAsignatura()+"] - "+asignatura.getNombreAsignatura());
					    for(Seccion seccion: ventana.getSecciones()){
						if(seccion.getIdAsignatura().equals(asignatura.getIdAsignatura())){
						    DefaultMutableTreeNode s = new DefaultMutableTreeNode(seccion.getIdSeccion());
						    a.add(s);
						}
					    }
					    c.add(a);
					}
				    }
				    f.add(c);
				}
			    }
			    s2.add(f);
			}
			add(s2);
		    }



		}
		));

	/*
	tree.setModel(new DefaultTreeModel(
		new DefaultMutableTreeNode("UBB") {
		    private static final long serialVersionUID = 1L;
		    {
			try{
			    for(int i = 1; i <=2; i++){
				DefaultMutableTreeNode node_0;
				if(i==1) 
				    node_0 = new DefaultMutableTreeNode("Semestre I");
				else 
				    node_0 = new DefaultMutableTreeNode("Semestre II");
				ResultSet rsFacultad = Conexion.ejecutarSQL("select * from facultad");
				while(rsFacultad.next()){
				    DefaultMutableTreeNode node_1;
				    node_1 = new DefaultMutableTreeNode("["+rsFacultad.getString("ID_FACULTAD")+"] - "+rsFacultad.getString("NOMBRE_FACULTAD"));
				    ResultSet rsCarrera = Conexion.ejecutarSQL("select * from carrera where ID_FACULTAD="+rsFacultad.getString("ID_FACULTAD"));
				    while(rsCarrera.next()){
					DefaultMutableTreeNode node_2;
					node_2 = new DefaultMutableTreeNode("["+rsCarrera.getString("ID_CARRERA")+"] - "+rsCarrera.getString("NOMBRE_CARRERA"));
					ResultSet rsAsignatura1 = Conexion.ejecutarSQL("select * from asignatura where SEMESTRE="+i+" AND ID_CARRERA='"+rsCarrera.getString("ID_CARRERA")+"' ORDER BY ID_ASIGNATURA");
					while(rsAsignatura1.next()){
					    node_2.add(new DefaultMutableTreeNode("["+rsAsignatura1.getString("ID_ASIGNATURA")+"] - "+rsAsignatura1.getString("NOMBRE_ASIGNATURA")));
					}
					node_1.add(node_2);
				    }
				    node_0.add(node_1);
				}
				add(node_0);
			    }
			} catch (Exception e) {

			}
		    }
		}
		));
	// */
	TreeModel model = tree.getModel();
	DefaultMutableTreeNode root = (DefaultMutableTreeNode) model.getRoot();
	@SuppressWarnings("rawtypes")
	Enumeration e = root.breadthFirstEnumeration();
	while (e.hasMoreElements()) {
	    DefaultMutableTreeNode node = (DefaultMutableTreeNode) e.nextElement();
	    Object o = node.getUserObject();
	    if (o instanceof String) {
		node.setUserObject(new CheckBoxNode((String) o, Status.DESELECTED));
	    }
	}
	model.addTreeModelListener( new CheckBoxStatusUpdateListener());
	tree.setEditable(true);
	tree.setBorder(BorderFactory.createEmptyBorder(4, 4, 4, 4));
	tree.expandRow(0);
	setBorder(BorderFactory.createEmptyBorder(5, 5, 5, 5));
	setLayout(new BoxLayout(this, BoxLayout.Y_AXIS));
	add(tituloAsignaturas);
	add(new JScrollPane(tree));
	setPreferredSize(new Dimension(320, 240));
    }
    public static void createAndShowGUI() {
	try {
	    UIManager.setLookAndFeel(UIManager.getSystemLookAndFeelClassName());
	} catch (ClassNotFoundException | InstantiationException
		| IllegalAccessException | UnsupportedLookAndFeelException ex) {
	    ex.printStackTrace();
	}
	JFrame frame = new JFrame("CheckBoxNodeEditor");
	frame.setDefaultCloseOperation(WindowConstants.EXIT_ON_CLOSE);
	frame.getContentPane().add(new PanelSalasYDias(ventana));
	frame.pack();
	frame.setLocationRelativeTo(null);
	frame.setVisible(true);
    }
    //ubb -> semestre -> facultad -> carrera -> asignatura -> seccion
    public ArrayList<Seccion> getSeccionesSeleccionadas(){
	ArrayList<Seccion> seccionesSeleccionadas = new ArrayList<Seccion>();
	DefaultMutableTreeNode nodoUBB = (DefaultMutableTreeNode) this.getTree().getModel().getRoot();
	for(int i = 0; i<nodoUBB.getChildCount(); i++){
	    DefaultMutableTreeNode nodoSemestre =  (DefaultMutableTreeNode) nodoUBB.getChildAt(i);
	    for(int j = 0; j<nodoSemestre.getChildCount(); j++){
		DefaultMutableTreeNode nodoFacultad = (DefaultMutableTreeNode) nodoSemestre.getChildAt(j);
		for(int k = 0; k < nodoFacultad.getChildCount(); k++){
		    DefaultMutableTreeNode nodoCarrera = (DefaultMutableTreeNode) nodoFacultad.getChildAt(k);
		    for(int l = 0; l < nodoCarrera.getChildCount(); l++){
			DefaultMutableTreeNode nodoAsignatura = (DefaultMutableTreeNode) nodoCarrera.getChildAt(l);
			for(int a = 0; a < nodoAsignatura.getChildCount(); a++){
			    DefaultMutableTreeNode nodoSeccion = (DefaultMutableTreeNode) nodoAsignatura.getChildAt(a);
			    if( ((CheckBoxNode) nodoSeccion.getUserObject()).status.equals(Status.SELECTED) ){
				seccionesSeleccionadas.add(ventana.getSeccion(nodoSeccion.toString()));
			    }
			}
		    }
		}
	    }
	}
	//System.out.println(seccionesSeleccionadas.size());
	return seccionesSeleccionadas;
    }

    public JTree getTree(){
	return tree;
    }

    public VentanaPrincipal getVentana() {
	return ventana;
    }
}