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
import db.Conexion;
import java.awt.Component;
import java.awt.Dimension;
import java.sql.*;
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
	
    public PanelAsignaturas() {
    titulo = "<html><body><h2><strong><center>SELECCIONE ASIGNATURAS</center></strong></h2></body></html>";
	tituloAsignaturas = new JLabel(titulo);
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
        model.addTreeModelListener(new CheckBoxStatusUpdateListener());
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
        frame.getContentPane().add(new PanelTreeSalas());
        frame.pack();
        frame.setLocationRelativeTo(null);
        frame.setVisible(true);
    }
    
    public JTree getTree(){
    	return tree;
    }
    
}