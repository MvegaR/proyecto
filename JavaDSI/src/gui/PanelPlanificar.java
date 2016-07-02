package gui;

import javax.swing.JPanel;
import javax.swing.tree.DefaultMutableTreeNode;
import javax.swing.tree.TreeModel;

import db.Conexion;
import logica.Planificador;

import javax.swing.BoxLayout;
import java.awt.FlowLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import javax.swing.JButton;
import java.awt.SystemColor;
import javax.swing.JLabel;
import javax.swing.JOptionPane;

import java.awt.Color;
import java.awt.Font;

public class PanelPlanificar extends JPanel {
	
	private static final long serialVersionUID = 1L;
	
	private JPanel panelNorte, panelCentro, panelSur;
	private PanelTreeSalas panelTreeSalas;
	private PanelAsignaturas panelAsignaturas;
	private JButton btnNewButton;
	private JButton btnEjecutarPlanificacinSeleccin;
	private JLabel lblSeleccioneSalasY;
	private JButton btnVolver;
	private JButton btnInvertirSeleccin;
	private JButton btnSeleccionarSeccionesCon;
	
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
		panelTreeSalas = new PanelTreeSalas();
		panelTreeSalas.setBackground(new Color(0, 100, 172));
		panelAsignaturas = new PanelAsignaturas();
		panelAsignaturas.setBackground(new Color(0, 100, 172));
		panelCentro.add(panelTreeSalas);
		panelCentro.add(panelAsignaturas);
		panelNorte.setLayout(new FlowLayout());
		btnNewButton = new JButton("Borrar planificacion de la selecci\u00F3n");
		btnNewButton.setFont(new Font("Tahoma", Font.PLAIN, 15));
		//btnNewButton.addActionListener(e -> new BuscarErrores(ventana).ejecutarTodasLasBusquedas());
		
		ArrayList<Integer> dias = new ArrayList<>();
		dias.add(1); //Lunes //hacer grafico.... :p
		dias.add(2); //Martes
		dias.add(3); //Miercoles
		dias.add(4); //Jueves
		dias.add(5); //Viernes
		
		btnNewButton.addActionListener(e -> new Planificador(ventana, dias));
		btnNewButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				TreeModel model = panelAsignaturas.getTree().getModel();
				TreeModel model2 = panelTreeSalas.getTree().getModel();
			    DefaultMutableTreeNode root = (DefaultMutableTreeNode) model.getRoot();
			    DefaultMutableTreeNode root2 = (DefaultMutableTreeNode) model2.getRoot();
			    ArrayList<String> Salas = new ArrayList<String>();//alamacena las salas
			    ArrayList<String> Asignaturas = new ArrayList<String>(); //Almacena los codigos de las asignaturas
			    ArrayList<String> Secciones = new ArrayList<String>(); //Almacena los codigos de las secciones que se incluiran
			    for(int i=0; i < root.getChildCount(); i++){ // obteniendo las asignatura seleccionadas
			    	for(int j=0; j < root.getChildAt(i).getChildCount(); j++){
			    		for(int x=0; x < root.getChildAt(i).getChildAt(j).getChildCount(); x++){
			    			for(int y=0; y < root.getChildAt(i).getChildAt(j).getChildAt(x).getChildCount(); y++){
			    				DefaultMutableTreeNode nodo = (DefaultMutableTreeNode) root.getChildAt(i).getChildAt(j).getChildAt(x).getChildAt(y);
			    				CheckBoxNode checkBox = (CheckBoxNode)nodo.getUserObject();
			    			    if(checkBox.status.equals(Status.SELECTED)){
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
			    		//Sin cosiderar seccione sin profesores
			    		//ResultSet rsSecciones = Conexion.ejecutarSQL("SELECT ID_SECCION, CUPO, ID_DOCENTE FROM seccion WHERE ID_DOCENTE IS NOT NULL AND ID_ASIGNATURA='"+partes[0]+"'");
			    		//Con considerar secciones con profesores
			    		ResultSet rsSecciones = Conexion.ejecutarSQL("SELECT ID_SECCION, CUPO, ID_DOCENTE FROM seccion WHERE ID_ASIGNATURA='"+partes[0]+"'");
						while(rsSecciones.next())
							/* ID SECCION | CUPO SECCION | ID DOCENTE SECCION | HORAS TEORIA | HORAS LAB COM | HORAS AYUDANTIAS | HORAS LAB FISICA | HORAS LAB QUIMICA | HORAS LAB ROBOTICA | HORAS LAB MECANICA | HORAS TALLER ARQUITECTURA | HORAS TALLER MADERA | HORAS GYM | HORAS AUDITORIO */
							Secciones.add(rsSecciones.getString("ID_SECCION")+" "+rsSecciones.getString("CUPO")+" "+rsSecciones.getString("ID_DOCENTE")+" "+partes[1]+" "+partes[2]+" "+partes[3]+" "+partes[4]+" "+partes[5]+" "+partes[6]+" "+partes[7]+" "+partes[8]+" "+partes[9]+" "+partes[10]+" "+partes[11]);
					} catch (Exception e) {
						//Falta añadir mensaje
					}
			    }
			  for(int i=0; i < root2.getChildCount(); i++){ // obteniendo las salas seleccionadas
			    	for(int j=0; j < root2.getChildAt(i).getChildCount(); j++){
			    		for(int x=0; x < root2.getChildAt(i).getChildAt(j).getChildCount(); x++){
			    			for(int y=0; y < root2.getChildAt(i).getChildAt(j).getChildAt(x).getChildCount(); y++){
			    				DefaultMutableTreeNode nodo2 = (DefaultMutableTreeNode) root2.getChildAt(i).getChildAt(j).getChildAt(x).getChildAt(y);
			    				CheckBoxNode checkBox2 = (CheckBoxNode)nodo2.getUserObject();
			    			    if(checkBox2.status.equals(Status.SELECTED)){
			    			    	String select = "SELECT ID_SALA"
			    			    			+ " FROM sala"
			    			    			+ " WHERE ID_SALA='";
			    			    	try {
			    			    		ResultSet rsSala = Conexion.ejecutarSQL(select+checkBox2.label.toString().split("]")[0].substring(1)+"'");
			    			    		while(rsSala.next())
			    			    		    Salas.add(rsSala.getString("ID_SALA"));
									} catch (SQLException e) {
										// TODO Auto-generated catch block
										e.printStackTrace();
									}
			    			    }
			    			}
			    		}
			    	}
			    }
			    
			    
			  /*  System.out.println("SECCIONES A PLANIFICAR");
			    for(int i=0;i<Salas.size();i++){
			    	System.out.println(Salas.get(i));
			    }*/
			    
			}
		});
		
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
		
		btnSeleccionarSeccionesCon = new JButton("Seleccionar secciones sin planificaci\u00F3n");
		btnSeleccionarSeccionesCon.setFont(new Font("Tahoma", Font.PLAIN, 15));
		panelSur.add(btnSeleccionarSeccionesCon);
		
		btnInvertirSeleccin = new JButton("Invertir selecci\u00F3n");
		btnInvertirSeleccin.setFont(new Font("Tahoma", Font.PLAIN, 15));
		panelSur.add(btnInvertirSeleccin);
		panelSur.add(btnNewButton);
		setLayout(null);
		this.add(panelNorte);
		
		lblSeleccioneSalasY = new JLabel("Seleccione salas y asignaturas con sus secciones y a continuaci\u00F3n ejecute el planificador.");
		lblSeleccioneSalasY.setFont(new Font("Tahoma", Font.PLAIN, 25));
		panelNorte.add(lblSeleccioneSalasY);
		this.add(panelCentro);
		this.add(panelSur);
		
		btnEjecutarPlanificacinSeleccin = new JButton("Ejecutar Planificaci\u00F3n de la selecci\u00F3n");
		btnEjecutarPlanificacinSeleccin.setFont(new Font("Tahoma", Font.PLAIN, 15));
		panelSur.add(btnEjecutarPlanificacinSeleccin);
	}
}