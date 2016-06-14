package gui;

import javax.swing.JPanel;
import javax.swing.tree.DefaultMutableTreeNode;
import javax.swing.tree.TreeModel;

import db.Conexion;

import javax.swing.BoxLayout;
import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import javax.swing.JButton;

public class PanelPlanificar extends JPanel {
	
	private static final long serialVersionUID = 1L;
	
	private JPanel panelNorte, panelCentro, panelSur;
	private PanelTreeSalas panelTreeSalas;
	private PanelAsignaturas panelAsignaturas;
	private JButton btnNewButton;
	
	public PanelPlanificar(){
		this.setLayout(new BorderLayout(0, 0));
		panelNorte  = new JPanel();
		panelCentro = new JPanel();
		panelSur    = new JPanel();
		panelCentro.setLayout(new BoxLayout(panelCentro, BoxLayout.X_AXIS));
		panelTreeSalas = new PanelTreeSalas();
		panelAsignaturas = new PanelAsignaturas();
		panelCentro.add(panelTreeSalas);
		panelCentro.add(panelAsignaturas);
		panelNorte.setLayout(new FlowLayout());
		btnNewButton = new JButton("Ejecutar Planificación");
		btnNewButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				TreeModel model = panelAsignaturas.getTree().getModel();
			    DefaultMutableTreeNode root = (DefaultMutableTreeNode) model.getRoot();
			    ArrayList<String> Asignaturas = new ArrayList<String>(); //Almacena los codigos de las asignaturas
			    ArrayList<String> Secciones = new ArrayList<String>(); //Almacena los codigos de las secciones que se incluiran
			    for(int i=0; i < root.getChildCount(); i++){ // obteniendo las asignatura seleccionadas
			    	for(int j=0; j < root.getChildAt(i).getChildCount(); j++){
			    		for(int x=0; x < root.getChildAt(i).getChildAt(j).getChildCount(); x++){
			    			for(int y=0; y < root.getChildAt(i).getChildAt(j).getChildAt(x).getChildCount(); y++){
			    				DefaultMutableTreeNode nodo = (DefaultMutableTreeNode) root.getChildAt(i).getChildAt(j).getChildAt(x).getChildAt(y);
			    				CheckBoxNode checkBox = (CheckBoxNode)nodo.getUserObject();
			    			    if(checkBox.status == Status.SELECTED){
			    			    	String select = "SELECT ID_ASIGNATURA, HORAS_TEO, HORAS_LAB_COM,HORAS_AYUDANTIA,HORAS_LAB_FISICA,HORAS_LAB_QUIMICA, HORAS_LAB_ROBOTICA, HORAS_LAB_MECANICA, HORAS_TALLER_ARQUITECTURA, HORAS_TALLER_MADERA, HORAS_GYM, HORAS_AUDITORIO"
			    			    			+ " FROM asignatura"
			    			    			+ " WHERE ID_ASIGNATURA='";
			    			    	try {
			    			    		ResultSet rsAsignaturas = Conexion.ejecutarSQL(select+checkBox.label.toString().split("]")[0].substring(1)+"'");
			    			    		while(rsAsignaturas.next())
			    			    		    Asignaturas.add(rsAsignaturas.getString("ID_ASIGNATURA")+" "+rsAsignaturas.getString("HORAS_TEO")+" "+rsAsignaturas.getString("HORAS_LAB_COM")+" "+rsAsignaturas.getString("HORAS_AYUDANTIA")+" "+rsAsignaturas.getString("HORAS_LAB_FISICA")+" "+rsAsignaturas.getString("HORAS_LAB_QUIMICA")+" "+rsAsignaturas.getString("HORAS_LAB_ROBOTICA")+" "+rsAsignaturas.getString("HORAS_LAB_MECANICA")+" "+rsAsignaturas.getString("HORAS_TALLER_ARQUITECTURA")+" "+rsAsignaturas.getString("HORAS_TALLER_MADERA")+" "+rsAsignaturas.getString("HORAS_GYM")+" "+rsAsignaturas.getString("HORAS_AUDITORIO"));
									} catch (SQLException e) {
										// TODO Auto-generated catch block
										e.printStackTrace();
									}
			    			    }
			    			}
			    		}
			    	}
			    }
			    for(int i=0;i<Asignaturas.size();i++){ // obtiene las secciones y su cupo, solo las que tienen profesore asignados
			    	try {
			    		String[] partes = Asignaturas.get(i).split(" ");
			    		ResultSet rsSecciones = Conexion.ejecutarSQL("SELECT ID_SECCION, CUPO, ID_DOCENTE FROM seccion WHERE ID_DOCENTE IS NOT NULL AND ID_ASIGNATURA='"+partes[0]+"'");
						while(rsSecciones.next())
							/* ID SECCION | CUPO SECCION | ID DOCENTE SECCION | HORAS TEORIA | HORAS LAB COM | HORAS AYUDANTIAS | HORAS LAB FISICA | HORAS LAB QUIMICA | HORAS LAB ROBOTICA | HORAS LAB MECANICA | HORAS TALLER ARQUITECTURA | HORAS TALLER MADERA | HORAS GYM | HORAS AUDITORIO */
							Secciones.add(rsSecciones.getString("ID_SECCION")+" "+rsSecciones.getString("CUPO")+" "+rsSecciones.getString("ID_DOCENTE")+" "+partes[1]+" "+partes[2]+" "+partes[3]+" "+partes[4]+" "+partes[5]+" "+partes[6]+" "+partes[7]+" "+partes[8]+" "+partes[9]+" "+partes[10]+" "+partes[11]);
					} catch (SQLException e) {
						
					}
			    }
			    /*
			    System.out.println("SECCIONES A PLANIFICAR");
			    for(int i=0;i<Secciones.size();i++){
			    	System.out.println(Secciones.get(i));
			    }
			    */
			}
		});
		panelSur.add(btnNewButton);
		this.add(panelNorte, BorderLayout.NORTH);
		this.add(panelCentro, BorderLayout.CENTER);
		this.add(panelSur, BorderLayout.SOUTH);
	}
}